<?php

namespace App\Livewire;

use App\Models\Subcategory;
use Livewire\Component;
use Livewire\WithPagination;

class SearchSubcategory extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 5; // Number of items per page (default value)

    public $subcategoryId;

    public $subcategoryStatus;

    public function updateSubcategoryStatus(Subcategory $subcategory)
    {
        $this->subcategoryId = $subcategory->id;
        $this->subcategoryStatus = !$subcategory->status;

        $subcategory->update(['status' => $this->subcategoryStatus]);
    }

    public function render()
    {
        $subcategories = Subcategory::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('slug', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate($this->perPage);
        return view('livewire.search-subcategory', compact('subcategories'));
    }
}
