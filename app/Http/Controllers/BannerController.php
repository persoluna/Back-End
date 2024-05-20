<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::latest()->get();
        return view('banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'sub_title' => 'nullable|max:255',
            'description' => 'nullable',
            'banner_image' => 'required|image|max:2048',
            'alt_tag' => 'nullable|max:255',
        ]);

        if ($request->hasFile('banner_image')) {
            $bannerImage = $request->file('banner_image');
            $filename = time() . '.' . $bannerImage->getClientOriginalExtension();

            // Store the original image in the 'public/banners' directory
            $bannerImage->storeAs('public/banners', $filename);

            $validatedData['banner_image'] = $filename;
        }

        $banner = Banner::create($validatedData);

        return redirect()->route('banners.index')->with('success', 'Banner created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        return view('banners.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'sub_title' => 'nullable|max:255',
            'description' => 'nullable',
            'banner_image' => 'nullable|image|max:2048',
            'alt_tag' => 'nullable|max:255',
        ]);

        // Check if a new image is uploaded
        if ($request->hasFile('banner_image')) {
            // Delete the old image from the "banners" folder
            Storage::delete('public/banners/' . $banner->banner_image);

            // Store the new image in the "banners" folder
            $bannerImage = $request->file('banner_image');
            $filename = time() . '.' . $bannerImage->getClientOriginalExtension();
            $bannerImage->storeAs('public/banners', $filename);

            // Update the banner_image field with the new image filename
            $validatedData['banner_image'] = $filename;
        }

        $banner->update($validatedData);

        return redirect()->route('banners.index')->with('success', 'Banner updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        // Delete the associated image file from the "banners" folder
        Storage::delete('public/banners/' . $banner->banner_image);

        $banner->delete();

        return redirect()->route('banners.index')->with('success', 'Banner deleted successfully.');
    }
}
