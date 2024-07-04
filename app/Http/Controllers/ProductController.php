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
            'category_id' => 'nullable',
            'subcategory_id' => 'nullable',
            'product_name' => 'required|max:255',
            'slug' => 'nullable|unique:products|max:255',
            'description' => 'nullable',
            'image' => 'nullable|array',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'alt_tag' => 'nullable|max:255',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_keyword' => 'nullable',
            'meta_canonical' => 'nullable|url',
            'meta_tags' => 'nullable',
        ]);

        if (!$request->has('category_id')) {
            return back()->withInput()->withErrors(['category_id' => 'Please select a category']);
        }

        $imageNames = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/product_images', $filename);
                $imageNames[] = $filename;
            }
        }

        $validatedData['image'] = json_encode($imageNames);

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
            'category_id' => 'nullable',
            'subcategory_id' => 'nullable',
            'product_name' => 'required|max:255',
            'slug' => 'nullable|max:255|unique:products,slug,' . $product->id,
            'description' => 'nullable',
            'image' => 'nullable|array',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'existing_images' => 'nullable|array',
            'alt_tag' => 'nullable|max:255',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_keyword' => 'nullable',
            'meta_canonical' => 'nullable|url',
            'meta_tags' => 'nullable',
        ]);

        // Start with existing images that weren't removed
        $currentImages = $request->input('existing_images', []);

        // Handle new images
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $newImage) {
                $filename = time() . '_' . uniqid() . '.' . $newImage->getClientOriginalExtension();
                $newImage->storeAs('public/product_images', $filename);
                $currentImages[] = $filename;
            }
        }

        // Remove old images that are no longer in use
        $oldImages = json_decode($product->image, true) ?? [];
        foreach ($oldImages as $oldImage) {
            if (!in_array($oldImage, $currentImages)) {
                Storage::delete('public/product_images/' . $oldImage);
            }
        }

        // Update the image field with the new array of images
        $validatedData['image'] = json_encode($currentImages);

        // Remove the 'existing_images' key from validatedData as it's not a field in the products table
        unset($validatedData['existing_images']);

        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Decode the JSON string to get an array of image filenames
        $images = json_decode($product->image, true) ?? [];

        // Delete each image file
        foreach ($images as $image) {
            Storage::delete('public/product_images/' . $image);
        }

        // Delete the product
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
