<?php

namespace App\Livewire;

use App\Models\blog;
use Livewire\Component;
use Livewire\WithPagination;

class SearchBlog extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 5; // Number of items per page (default value)

    public $blogId;
    public $blogStatus;

    public function updateBlogStatus(Blog $blog)
    {
        $this->blogId = $blog->id;
        $this->blogStatus = !$blog->status;

        $blog->update(['status' => $this->blogStatus]);
    }

    public function render()
    {
        $blogs = blog::query()
            ->when($this->search, function ($query) {
                $query->where('blog_title', 'like', '%' . $this->search . '%')
                    ->orWhere('alt_tag', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate($this->perPage);
        return view('livewire.search-blog', compact('blogs'));
    }
}
