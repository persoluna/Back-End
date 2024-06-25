<?php

namespace App\Livewire;

use App\Models\BlogCategory;
use Livewire\Component;
use Livewire\WithPagination;

class SearchBlogCategory extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 5; // Number of items per page (default value)

    public $blogcategoryId;

    public $blogcategoryStatus;

    public function updateBlogCategoryStatus(BlogCategory $blogcategory)
    {
        $this->blogcategoryId = $blogcategory->id;
        $this->blogcategoryStatus = !$blogcategory->status;

        $blogcategory->update(['status' => $this->blogcategoryStatus]);
    }

    public function render()
    {
        $blogcategories = BlogCategory::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate($this->perPage);
        return view('livewire.search-blog-category', compact('blogcategories'));
    }
}
