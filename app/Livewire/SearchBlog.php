<?php

namespace App\Livewire;

use App\Models\blog;
use Livewire\Component;
use Livewire\WithPagination;

class SearchBlog extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 30; // Number of items per page (default value)

    public $blogId;
    public $blogStatus;
    public $metaTagsFilter = 'all';

    public function mount()
    {
        $this->metaTagsFilter = request()->query('meta_tags', 'all');
    }

    public function updateBlogStatus(Blog $blog)
    {
        $this->blogId = $blog->id;
        $this->blogStatus = !$blog->status;

        $blog->update(['status' => $this->blogStatus]);
    }

    public function hasMetaTags($blog)
    {
        return !empty($blog->meta_tags);
    }

    public function render()
    {
        $blogs = blog::query()
            ->when($this->search, function ($query) {
                $query->where('blog_title', 'like', '%' . $this->search . '%')
                    ->orWhere('alt_tag', 'like', '%' . $this->search . '%');
            })
            ->when($this->metaTagsFilter === 'complete', function ($query) {
                $query->whereNotNull('meta_tags'); // Filter for products with meta tags
            })
            ->when($this->metaTagsFilter === 'incomplete', function ($query) {
                $query->whereNull('meta_tags'); // Filter for products without meta tags
            })
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.search-blog', [
            'blogs' => $blogs,
            'hasMetaTags' => function($blog) {
                return $this->hasMetaTags($blog);
            }
        ]);
    }
}
