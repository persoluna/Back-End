<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class SearchCategory extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 5; // Number of items per page (default value)

    public $categoryId;

    public $categoryStatus;

    public function updateCategoryStatus(Category $category)
    {
        $this->categoryId = $category->id;
        $this->categoryStatus = !$category->status;

        $category->update(['status' => $this->categoryStatus]);
    }

    public function render()
    {
        $categories = Category::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('slug', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate($this->perPage);
        return view('livewire.search-category', compact('categories'));
    }
}
