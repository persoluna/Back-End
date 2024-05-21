<?php

namespace App\Livewire;

use App\Models\Banner;
use Livewire\Component;

class SearchBanner extends Component
{
    public $search = '';

    // ! For Status filed change functionallity
    public $bannerId;
    public $bannerStatus;

    public function updateBannerStatus(Banner $banner)
    {
        $this->bannerId = $banner->id;
        $this->bannerStatus = !$banner->status;

        $banner->update(['status' => $this->bannerStatus]);

        $this->dispatch('banner-status-updated', [
            'message' => 'Banner status updated successfully.',
        ]);
    }

    public function render()
    {
        $banners = Banner::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('alt_tag', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->get();

        return view('livewire.search-banner', compact('banners'));
    }
}