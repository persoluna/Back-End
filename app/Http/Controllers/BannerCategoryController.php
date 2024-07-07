<?php

namespace App\Http\Controllers;

use App\Models\BannerCategory;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bannerCategories = BannerCategory::latest()->get();
        return view('banner-categories.index', compact('bannerCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('banner-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' =>'required|max:255',
        ]);

        $bannerCategory = BannerCategory::create($validatedData);

        return redirect()->route('bannercategories.index')->with('success', 'Banner category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BannerCategory $bannercategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BannerCategory $bannercategory)
    {
        return view('banner-categories.edit', compact('bannercategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BannerCategory $bannercategory)
    {
        $validateData = $request->validate([
            'name' => 'nullable|max:255',
        ]);

        $bannercategory->update($validateData);

        return redirect()->route('bannercategories.index')->with('success', 'Banner category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BannerCategory $bannercategory)
    {
        // Update associated banners to have a null banner category value
        $bannercategory->banners()->update(['category_id' => null]);

        $bannercategory->delete();

        return redirect()->route('bannercategories.index')->with('success', 'Banner category deleted successfully.');
    }
}
