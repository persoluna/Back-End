<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serviceCategories = ServiceCategory::latest()->get();
        return view('service-categories.index', compact('serviceCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('service-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' =>'required|max:255',
           'slug' =>'required|unique:service_categories|max:255',
            'image' =>'required',
            'alt_tag' =>'required|max:255',
            'icon' =>'required',
            'icon_alt_tag' =>'required|max:255',
           'meta_title' =>'required|max:255',
           'meta_description' =>'required',
           'meta_keyword' =>'required',
           'meta_canonical' =>'required|url',
        ]);

        $serviceCategoryImagePath = $request->file('image')->store('public/service_category_images');
        $validatedData['image'] = basename($serviceCategoryImagePath);

        $serviceCategoryIconPath = $request->file('icon')->store('public/service_category_icons');
        $validatedData['icon'] = basename($serviceCategoryIconPath);

        $serviceCategory = ServiceCategory::create($validatedData);

        return redirect()->route('servicecategories.index')->with('success', 'Service Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceCategory $servicecategory)
    {
        // You can add code here if needed
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceCategory $servicecategory)
    {
        return view('service-categories.edit', compact('servicecategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceCategory $servicecategory)
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
            Storage::delete('public/service_category_images/'. $servicecategory->image);

            // Store new image
            $serviceCategoryImagePath = $request->file('image')->store('public/service_category_images');
            $validateData['image'] = basename($serviceCategoryImagePath);

        }

        if ($request->hasFile('icon')) {
            // Delete old icon
            Storage::delete('public/service_category_icons/'. $servicecategory->icon);

            // Store new icon
            $serviceCategoryIconPath = $request->file('icon')->store('public/service_category_icons');
            $validateData['icon'] = basename($serviceCategoryIconPath);

        }

        $servicecategory->update($validateData);

        return redirect()->route('servicecategories.index')->with('success', 'Service Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceCategory $servicecategory)
    {
        // Update associated services to have a null service category value
        // $serviceCategory->services()->update(['service_category_id' => null]);

        // Delete the image from the 'public/service_category_images/' directory
        Storage::delete('public/service_category_images/'. $servicecategory->image);

        // Delete the icon from the 'public/service_category_icons/' directory
        Storage::delete('public/service_category_icons/'. $servicecategory->icon);

        $servicecategory->delete();

        return redirect()->route('servicecategories.index')->with('success', 'Service Category deleted successfully.');
    }
}