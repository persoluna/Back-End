<?php

namespace App\Livewire;

use App\Models\Banner;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\BannerCategory;

class SearchBanner extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 5; // Number of items per page (default value)

    public $bannerId;

    public $bannerStatus;

    public function updateBannerStatus(Banner $banner)
    {
        $this->bannerId = $banner->id;
        $this->bannerStatus = !$banner->status;

        $banner->update(['status' => $this->bannerStatus]);
    }

    public function render()
    {
        $banners = Banner::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('alt_tag', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.search-banner', compact('banners'));
    }
}
