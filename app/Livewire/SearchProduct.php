<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class SearchProduct extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 30; // Number of items per page (default value)
    public $productId;
    public $productStatus;
    public $selectedCategory = null;
    public $metaTagsFilter = 'all';

    public function mount()
    {
        $this->selectedCategory = request()->query('category', null);
        $this->metaTagsFilter = request()->query('meta_tags', 'all');
    }

    public function updateProductStatus(Product $product)
    {
        $this->productId = $product->id;
        $this->productStatus = !$product->status;

        $product->update(['status' => $this->productStatus]);
    }

    public function hasMetaTags($product)
    {
        return !empty($product->meta_tags);
    }

    public function render()
    {
        $categories = Category::all();
        $products = Product::query()
            ->when($this->search, function ($query) {
                $query->where('product_name', 'like', '%' . $this->search . '%')
                    ->orWhere('slug', 'like', '%' . $this->search . '%');
            })
            ->when($this->selectedCategory, function ($query) {
                $query->where('category_id', $this->selectedCategory);
            })
            ->when($this->metaTagsFilter === 'complete', function ($query) {
                $query->whereNotNull('meta_tags'); // Filter for products with meta tags
            })
            ->when($this->metaTagsFilter === 'incomplete', function ($query) {
                $query->whereNull('meta_tags'); // Filter for products without meta tags
            })
            ->with('category') // Eager loading
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.search-product', [
            'products' => $products,
            'categories' => $categories,
            'hasMetaTags' => function($product) {
                return $this->hasMetaTags($product);
            }
        ]);
    }
}
