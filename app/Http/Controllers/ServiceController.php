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

    public function upload(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle the file upload
        $file = $request->file('upload');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/service_images', $filename);

        $url = asset('storage/service_images/' . $filename);

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
            'category_id' => 'nullable',
            'name' => 'required|max:255',
            'slug' => 'required|unique:services|max:255',
            'description' => 'required',
            'image' => 'required',
            'alt_tag' => 'required|max:255',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_keyword' => 'nullable',
            'meta_canonical' => 'nullable|url',
            'meta_tags' => 'nullable|string',
        ]);

        // Retrieve the list of uploaded image URLs
        $uploadedImageUrls = json_decode($request->input('uploadedImages'), true);

        // Detect image URLs in description
        $imageUrls = $this->detectImages($validatedData['description']);

        // Delete unused images
        $this->deleteUnusedImages($uploadedImageUrls, $imageUrls);


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
        $detectedImageUrls = $this->detectImages($service->description);

        return view('services.edit', compact('service', 'servicecategories', 'detectedImageUrls'));
    }


    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'category_id' => 'nullable',
        'name' => 'nullable|max:255',
        'slug' => 'nullable|max:255|unique:services,slug,' . $id,
        'description' => 'nullable',
        'image' => 'nullable|image',
        'alt_tag' => 'nullable|max:255',
        'meta_title' => 'nullable|max:255',
        'meta_description' => 'nullable',
        'meta_keyword' => 'nullable',
        'meta_canonical' => 'nullable|url',
        'meta_tags' => 'nullable',
    ]);

    $service = Service::findOrFail($id);

    // Retrieve the list of uploaded image URLs
    $uploadedImageUrls = json_decode($request->input('uploadedImages'), true) ?? [];

    // Detect image URLs in description
    $imageUrls = $this->detectImages($validatedData['description']);

    // Delete unused images
    if (!empty($uploadedImageUrls)) {
        $this->deleteUnusedImages($uploadedImageUrls, $imageUrls);
    }

    if ($request->hasFile('image')) {
        // Check if the old image exists
        if ($service->image && Storage::exists('public/service_images/' . $service->image)) {
            // Delete the old image
            Storage::delete('public/service_images/' . $service->image);
        }

        // Store the new image
        $serviceImagePath = $request->file('image')->store('public/service_images');
        $validatedData['image'] = basename($serviceImagePath);
    }

    // Update the service data
    $service->update($validatedData);

    return redirect()->route('services.index')->with('success', 'Service updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        if ($service->image) {
                Storage::delete('public/service_images/' . $service->image);
        }

        // Detect and delete images in the description
        $this->deleteImagesFromDescription($service->description);

        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }

    private function deleteImagesFromDescription($description)
    {
        $imageUrls = $this->detectImages($description);
        $this->deleteUnusedImages($imageUrls, []);
    }

    // Helper method to detect image URLs in the description
    private function detectImages($description)
    {
        preg_match_all('/<img[^>]+src="([^">]+)"/', $description, $matches);
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
