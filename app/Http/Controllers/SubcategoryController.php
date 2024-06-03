<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = Subcategory::latest()->get();
        return view('subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories|max:255',
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

        $subcategoryImagePath = $request->file('image')->store('public/sub_category_images');
        $validatedData['image'] = basename($subcategoryImagePath);

        $subcategory = Subcategory::create($validatedData);

        return redirect()->route('subcategories.index')->with('success', 'Sub Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();
        return view('subcategories.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        if (!$request->has('category_id')) {
            return back()->withInput()->withErrors(['category_id' => 'Please select a category']);
        }

        $validatedData = $request->validate([
            'category_id' => 'required',
            'name' => 'nullable|max:255',
            'slug' => 'nullable|max:255|unique:subcategories,slug,' . $subcategory->id,
            'image' => 'nullable',
            'alt_tag' => 'nullable|max:255',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_keyword' => 'nullable',
            'meta_canonical' => 'nullable|url',
        ]);

        Storage::delete('public/sub_category_images/' . $subcategory->image);

        $subcategoryImagePath = $request->file('image')->store('public/sub_category_images');
        $validatedData['image'] = basename($subcategoryImagePath);

        $subcategory->update($validatedData);

        return redirect()->route('subcategories.index')->with('success', 'Sub category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {

        // Update associated products to have a default subcategory value
        $subcategory->products()->update(['subcategory_id' => null]);

        Storage::delete('public/sub_category_images/' . $subcategory->image);
        $subcategory->delete();

        return redirect()->route('subcategories.index')->with('success', 'Sub category deleted successfully.');
    }
}
