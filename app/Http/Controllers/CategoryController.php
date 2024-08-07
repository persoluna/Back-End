<?php

namespace App\Http\Controllers;

use App\Exports\CategoriesExport;
use App\Imports\CategoriesImport;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('categories.index', compact('categories'));
    }

    /**
     */
    public function export()
    {
        return Excel::download(new CategoriesExport, 'categories.xlsx');
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

        Excel::import(new CategoriesImport, $request->file('file'));

        return back()->with('success', 'Categories imported successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|max:255',
            'slug' => 'nullable|unique:categories|max:255',
            'image' => 'nullable',
            'alt_tag' => 'nullable|max:255',
            'icon' => 'nullable',
            'icon_alt_tag' => 'nullable|max:255',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_keyword' => 'nullable',
            'meta_canonical' => 'nullable|url',
        ]);

        $categoryImagePath = $request->file('image')->store('public/category_images');
        $validatedData['image'] = basename($categoryImagePath);

        $categoryIconPath = $request->file('icon')->store('public/category_icons');
        $validatedData['icon'] = basename($categoryIconPath);

        $category = Category::create($validatedData);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validateData = $request->validate([
            'name' => 'nullable|max:255',
            'slug' => 'nullable',
            'image' => 'nullable',
            'alt_tag' => 'nullable|max:255',
            'icon' => 'nullable',
            'icon_alt_tag' => 'nullable|max:255',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_keyword' => 'nullable',
            'meta_canonical' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            Storage::delete('public/category_images/' . $category->image);

            // Store new image
            $categoryImagePath = $request->file('image')->store('public/category_images');
            $validateData['image'] = basename($categoryImagePath);

        }

        if ($request->hasFile('icon')) {
            // Delete old icon
            Storage::delete('public/category_icons/' . $category->icon);

            // Store new icon
            $categoryIconPath = $request->file('icon')->store('public/category_icons');
            $validateData['icon'] = basename($categoryIconPath);

        }

        $category->update($validateData);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Update associated products to have a null category value
        $category->products()->update(['category_id' => null]);

        // Update associated subcategories to have a null category value
        $category->subcategories()->update(['category_id' => null]);

        // Delete the image from the 'public/category_images/' directory
        Storage::delete('public/category_images/' . $category->image);

        // Delete the icon from the 'public/category_icons/' directory
        Storage::delete('public/category_icons/' . $category->icon);

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
