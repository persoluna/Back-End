<?php

namespace App\Http\Controllers;

use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleryCategories = GalleryCategory::latest()->get();
        return view('gallery-categories.index', compact('galleryCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gallery-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' =>'required|max:255',
            'slug' =>'required|unique:gallery_categories|max:255',
        ]);

        $galleryCategory = GalleryCategory::create($validatedData);

        return redirect()->route('gallerycategories.index')->with('success', 'Gallery Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(GalleryCategory $galleryCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GalleryCategory $gallerycategory)
    {
        return view('gallery-categories.edit', compact('gallerycategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GalleryCategory $gallerycategory)
    {
        $validateData = $request->validate([
            'name' => 'nullable|max:255',
            'slug' => 'nullable',
        ]);

        $gallerycategory->update($validateData);

        return redirect()->route('gallerycategories.index')->with('success', 'Gallery Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GalleryCategory $gallerycategory)
    {
        // Update associated gallery to have a null gallery category value
        $gallerycategory->galleries()->update(['category_id' => null]);

        $gallerycategory->delete();

        return redirect()->route('gallerycategories.index')->with('success', 'Gallery Category deleted successfully.');
    }
}
