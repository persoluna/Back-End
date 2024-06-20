<?php

namespace App\Livewire;

use App\Models\GalleryCategory;
use Livewire\Component;
use Livewire\WithPagination;

class SearchGalleryCategory extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 5; // Number of items per page (default value)

    public $gallerycategoryId;

    public $gallerycategoryStatus;

    public function updateGalleryCategoryStatus(GalleryCategory $gallerycategory)
    {
        $this->gallerycategoryId = $gallerycategory->id;
        $this->gallerycategoryStatus = !$gallerycategory->status;

        $gallerycategory->update(['status' => $this->gallerycategoryStatus]);
    }

    public function render()
    {
        $gallerycategories = GalleryCategory::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('slug', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate($this->perPage);
        return view('livewire.search-gallery-category', compact('gallerycategories'));
    }
}
