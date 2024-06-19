<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::latest()->get();
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $servicecategories = ServiceCategory::all();
        return view('services.create', compact('servicecategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'name' => 'required|max:255',
            'slug' => 'required|unique:services|max:255',
            'description' => 'required',
            'image' => 'required',
            'alt_tag' => 'required|max:255',
            'meta_title' => 'required|max:255',
            'meta_description' => 'required',
            'meta_keyword' => 'required',
            'meta_canonical' => 'required|url',
        ]);

        // if (!$request->has('category_id')) {
        //     return back()->withInput()->withErrors(['category_id' => 'Please select a category']);
        // }

        $serviceImagePath = $request->file('image')->store('public/service_images');
        $validatedData['image'] = basename($serviceImagePath);

        $Service = Service::create($validatedData);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $servicecategories = ServiceCategory::all();
        return view('services.edit', compact('service', 'servicecategories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'name' => 'nullable|max:255',
            'slug' => 'nullable|max:255|unique:services,slug,' . $service->id,
            'description' => 'nullable',
            'image' => 'nullable|image',
            'alt_tag' => 'nullable|max:255',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_keyword' => 'nullable',
            'meta_canonical' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image if a new one is provided
            Storage::delete('public/service_images/' . $service->image);

            // Store the new image
            $serviceImagePath = $request->file('image')->store('public/service_images');
            $validatedData['image'] = basename($serviceImagePath);
        }

        $service->update($validatedData);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        Storage::delete('public/service_images/' . $service->image);
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
}
