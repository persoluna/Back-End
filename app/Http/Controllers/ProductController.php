<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('products.index', compact('products'));
    }

    /**
     */
    public function export()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    /**
     *
     */
    public function import(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'file' => 'required|max:2048',
        ]);

        Excel::import(new ProductsImport, $request->file('file'));

        return back()->with('success', 'Products imported successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subcategories = Subcategory::all();
        $categories = Category::all();
        return view('products.create', compact('categories', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'product_name' => 'required|max:255',
            'slug' => 'required|unique:products|max:255',
            'description' => 'required',
            'image' => 'required',
            'alt_tag' => 'required|max:255',
            'meta_title' => 'required|max:255',
            'meta_description' => 'required',
            'meta_keyword' => 'required',
            'meta_canonical' => 'required|url',
        ]);

        if (!$request->has('category_id')) {
            return back()->withInput()->withErrors(['category_id' => 'Please select a category']);
        }

        $productImagePath = $request->file('image')->store('public/product_images');
        $validatedData['image'] = basename($productImagePath);

        $product = Product::create($validatedData);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $subcategories = Subcategory::all();
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        if (!$request->has('category_id')) {
            return back()->withInput()->withErrors(['category_id' => 'Please select a category']);
        }

        $validatedData = $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'product_name' => 'nullable|max:255',
            'slug' => 'nullable|max:255|unique:products,slug,' . $product->id,
            'description' => 'nullable',
            'image' => 'nullable',
            'alt_tag' => 'nullable|max:255',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_keyword' => 'nullable',
            'meta_canonical' => 'nullable|url',
        ]);

        Storage::delete('public/product_images/' . $product->image);

        $productImagePath = $request->file('image')->store('public/product_images');
        $validatedData['image'] = basename($productImagePath);

        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Storage::delete('public/product_images/' . $product->image);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
