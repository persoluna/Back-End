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

    public function upload(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle the file upload
        $file = $request->file('upload');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/banners', $filename);

        $url = asset('storage/banners/' . $filename);

        return response()->json([
            'uploaded' => true,
            'url' => $url
        ]);
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

        // Get the highest position for the selected category
        $highestPosition = Banner::where('category_id', $validatedData['category_id'])
            ->max('position');

        // Set the new banner's position
        $validatedData['position'] = $highestPosition ? $highestPosition + 1 : 1;

        // Retrieve the list of uploaded image URLs
        $uploadedImageUrls = json_decode($request->input('uploadedImages'), true);

        // Detect image URLs in description
        $imageUrls = $this->detectImages($validatedData['description']);

        // Delete unused images
        $this->deleteUnusedImages($uploadedImageUrls, $imageUrls);

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
        $bannercategories = BannerCategory::all();
        $detectedImageUrls = $this->detectImages($banner->description);

        return view('banners.edit', compact('banner', 'bannercategories', 'detectedImageUrls'));
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'title' => 'required|max:255',
            'sub_title' => 'nullable|max:255',
            'description' => 'nullable',
            'banner_image' => 'nullable|image|max:2048',
            'alt_tag' => 'nullable|max:255',
        ]);

        $banner = Banner::findOrFail($id);
        $oldCategoryId = $banner->category_id;

        // Retrieve the list of uploaded image URLs
        $uploadedImageUrls = json_decode($request->input('uploadedImages'), true) ?? [];

        // Detect image URLs in long_description
        $imageUrls = $this->detectImages($validatedData['description']);

        // Delete unused images
        if (!empty($uploadedImageUrls)) {
            $this->deleteUnusedImages($uploadedImageUrls, $imageUrls);
        }

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

        // Check if the category has changed
        if ($oldCategoryId != $validatedData['category_id']) {
            // Adjust the position in the old category
            Banner::where('category_id', $oldCategoryId)
                ->where('position', '>', $banner->position)
                ->decrement('position');

            // Get the highest position in the new category
            $highestPosition = Banner::where('category_id', $validatedData['category_id'])
                ->max('position');

            // Set the new position
            $validatedData['position'] = $highestPosition ? $highestPosition + 1 : 1;
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

        // Detect and delete images in the description
        $this->deleteImagesFromDescription($banner->description);

        // Get the category ID and position before deleting
        $categoryId = $banner->category_id;
        $position = $banner->position;

        $banner->delete();

        // Adjust the positions of the remaining banners in the same category
        Banner::where('category_id', $categoryId)
            ->where('position', '>', $position)
            ->decrement('position');

        return redirect()->route('banners.index')->with('success', 'Banner deleted successfully.');
    }

    private function deleteImagesFromDescription($description)
    {
        $imageUrls = $this->detectImages($description);
        $this->deleteUnusedImages($imageUrls, []);
    }

    // Helper method to detect image URLs in the description
    private function detectImages($Description)
    {
        preg_match_all('/<img[^>]+src="([^">]+)"/', $Description, $matches);
        return $matches[1]; // Return the URLs of the detected images
    }

    public function deleteUnusedImages(array $uploadedImageUrls, array $detectedImageUrls)
    {
        // Get the URLs that are in uploadedImageUrls but not in detectedImageUrls
        $unusedImageUrls = array_diff($uploadedImageUrls, $detectedImageUrls);

        foreach ($unusedImageUrls as $url) {
            // Extract the file path from the URL
            $filePath = parse_url($url, PHP_URL_PATH);
            $fullPath = public_path($filePath);

            // Check if the file exists and delete it
            if (file_exists($fullPath)) {
                unlink($fullPath);
            }
        }
    }

    public function deleteUnusedImagesOnUnload(Request $request)
    {
        $imageUrls = $request->input('imageUrls', []);
        foreach ($imageUrls as $url) {
            // Extract the file path from the URL
            $filePath = parse_url($url, PHP_URL_PATH);
            $fullPath = public_path($filePath);

            // Check if the file exists and delete it
            if (file_exists($fullPath)) {
                unlink($fullPath);
            }
        }
        return response()->json(['status' => 'success']);
    }
}
