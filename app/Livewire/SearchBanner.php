<?php

namespace App\Livewire;

use App\Models\Banner;
use App\Models\BannerCategory;
use Livewire\Component;
use Livewire\WithPagination;

class SearchBanner extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 5;
    public $bannerId;
    public $bannerStatus;
    public $selectedCategory = null;
    public $editingPosition = null;
    public $newPosition = null;

    public function mount()
    {
        $this->selectedCategory = request()->query('category', BannerCategory::first()->id ?? null);
    }

    public function updateBannerStatus(Banner $banner)
    {
        $this->bannerId = $banner->id;
        $this->bannerStatus = !$banner->status;
        $banner->update(['status' => $this->bannerStatus]);
    }

    public function editPosition($bannerId)
    {
        $this->editingPosition = $bannerId;
        $this->newPosition = Banner::find($bannerId)->position;
    }

    public function startEditingPosition($bannerId)
    {
        $this->editingPosition = $bannerId;
        $this->newPosition = Banner::find($bannerId)->position;
    }

    public function cancelEditingPosition()
    {
        $this->editingPosition = null;
        $this->newPosition = null;
    }

    public function updatePosition($bannerId)
    {
        $banner = Banner::find($bannerId);
        $oldPosition = $banner->position;
        $newPosition = max(1, min($this->newPosition, Banner::where('category_id', $banner->category_id)->count()));

        if ($oldPosition != $newPosition) {
            \DB::transaction(function () use ($banner, $oldPosition, $newPosition) {
                if ($oldPosition < $newPosition) {
                    Banner::where('category_id', $banner->category_id)
                        ->whereBetween('position', [$oldPosition + 1, $newPosition])
                        ->decrement('position');
                } else {
                    Banner::where('category_id', $banner->category_id)
                        ->whereBetween('position', [$newPosition, $oldPosition - 1])
                        ->increment('position');
                }

                $banner->update(['position' => $newPosition]);
            });
        }

        $this->editingPosition = null;
        $this->newPosition = null;
    }

    private function reorderBanners($categoryId)
    {
        $banners = Banner::where('category_id', $categoryId)
            ->orderBy('position')
            ->get();

        foreach ($banners as $index => $banner) {
            $banner->update(['position' => $index + 1]);
        }
    }

    public function render()
    {
        $categories = BannerCategory::all();

        $banners = Banner::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('alt_tag', 'like', '%' . $this->search . '%');
            })
            ->when($this->selectedCategory, function ($query) {
                $query->where('category_id', $this->selectedCategory);
            })
            ->with('bannercategory')
            ->orderBy('position')
            ->paginate($this->perPage);

        return view('livewire.search-banner', [
            'banners' => $banners,
            'categories' => $categories,
        ]);
    }
}