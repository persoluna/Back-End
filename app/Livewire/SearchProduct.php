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

    public $perPage = 5; // Number of items per page (default value)

    public $productId;

    public $productStatus;

    public $selectedCategory = null;

    public function mount()
    {
        $this->selectedCategory = request()->query('category', null);
    }

    public function updateProductStatus(Product $product)
    {
        $this->productId = $product->id;
        $this->productStatus = !$product->status;

        $product->update(['status' => $this->productStatus]);
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
            ->with('category') // Eager loading
            ->latest()
            ->paginate($this->perPage);
        return view('livewire.search-product', compact('products', 'categories'));
    }
}
