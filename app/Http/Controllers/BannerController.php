<?php

namespace App\Http\Controllers;

use App\Exports\BannersExport;
use App\Imports\BannersImport;
use App\Models\Banner;
use App\Models\BannerCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

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
     */
    public function export()
    {
        return Excel::download(new BannersExport, 'banners.xlsx');
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

        Excel::import(new BannersImport, $request->file('file'));

        return back()->with('success', 'Banners imported successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bannercategories = BannerCategory::all();
        return view('banners.create', compact('bannercategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
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
        $bannercategories = BannerCategory::get();
        return view('banners.edit', compact('banner', 'bannercategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $validatedData = $request->validate([
            'category_id' => 'nullable',
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
