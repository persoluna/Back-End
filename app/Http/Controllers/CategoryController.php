<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories|max:255',
            'image' => 'required',
            'alt_tag' => 'required|max:255',
            'icon' => 'required',
            'icon_alt_tag' => 'required|max:255',
            'meta_title' => 'required|max:255',
            'meta_description' => 'required',
            'meta_keyword' => 'required',
            'meta_canonical' => 'required|url',
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
        // Delete the image from the 'public/category_images/' directory
        Storage::delete('public/category_images/' . $category->image);

        // Delete the icon from the 'public/category_icons/' directory
        Storage::delete('public/category_icons/' . $category->icon);

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
