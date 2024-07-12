<?php

namespace App\Livewire;

use App\Models\VideoCategory;
use Livewire\Component;
use Livewire\WithPagination;

class SearchVideoCategory extends Component
{
     use WithPagination;

    public $search = '';

    public $perPage = 30; // Number of items per page (default value)

    public function render()
    {
        $videocategories = VideoCategory::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate($this->perPage);
        return view('livewire.search-video-category', compact('videocategories'));
    }
}
