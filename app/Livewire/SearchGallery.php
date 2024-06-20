<?php

namespace App\Livewire;

use App\Models\Gallery;
use Livewire\Component;
use Livewire\WithPagination;

class SearchGallery extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 5; // Number of items per page (default value)

    public $galleryId;

    public $galleryStatus;

    public function render()
    {
        $galleries = Gallery::query()
        ->when($this->search, function ($query) {
            $query->where('alt_tag', 'like', '%' . $this->search . '%');
        })
        ->latest()
        ->paginate($this->perPage);

        return view('livewire.search-gallery', compact('galleries'));
    }
}
