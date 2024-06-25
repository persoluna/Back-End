<?php

namespace App\Livewire;

use App\Models\BannerCategory;
use Livewire\Component;
use Livewire\WithPagination;

class SearchBannerCategory extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 5; // Number of items per page (default value)

    public $bannercategoryId;

    public $bannercategoryStatus;

    public function updateBannerCategoryStatus(BannerCategory $bannercategory)
    {
        $this->bannercategoryId = $bannercategory->id;
        $this->bannercategoryStatus = !$bannercategory->status;

        $bannercategory->update(['status' => $this->bannercategoryStatus]);
    }

    public function render()
    {
        $bannercategories = BannerCategory::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate($this->perPage);
        return view('livewire.search-banner-category', compact('bannercategories'));
    }
}
