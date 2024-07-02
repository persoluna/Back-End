<?php

namespace App\Http\Controllers;

use App\Models\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InfrastructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infrastructures = Infrastructure::latest()->get();
        return view('infrastructures.index', compact('infrastructures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('infrastructures.create');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle the file upload
        $file = $request->file('upload');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/infrastructures', $filename);

        $url = asset('storage/infrastructures/' . $filename);

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
            'image' => 'required|image',
            'title' => 'nullable',
            'sub_title' => 'nullable',
            'description' => 'nullable',
        ]);

        // Retrieve the list of uploaded image URLs
        $uploadedImageUrls = json_decode($request->input('uploadedImages'), true);

        // Detect image URLs in description
        $imageUrls = $this->detectImages($validatedData['description']);

        // Delete unused images
        $this->deleteUnusedImages($uploadedImageUrls, $imageUrls);

        $infrastructureImagePath = $request->file('image')->store('public/infrastructures');
        $validatedData['image'] = basename($infrastructureImagePath);

        $infrastructure = Infrastructure::create($validatedData);

        return redirect()->route('infrastructures.index')->with('success', 'Infrastructure created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Infrastructure $infrastructure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Infrastructure $infrastructure)
    {
        $detectedImageUrls = $this->detectImages($infrastructure->description);

        return view('infrastructures.edit', compact('infrastructure', 'detectedImageUrls'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'image' => 'nullable',
            'title' => 'nullable',
            'sub_title' => 'nullable',
            'description' => 'nullable',
        ]);

        $infrastructure = Infrastructure::findOrFail($id);

        // Retrieve the list of uploaded image URLs
        $uploadedImageUrls = json_decode($request->input('uploadedImages'), true) ?? [];

        // Detect image URLs in long_description
        $imageUrls = $this->detectImages($validatedData['description']);

        // Delete unused images
        if (!empty($uploadedImageUrls)) {
            $this->deleteUnusedImages($uploadedImageUrls, $imageUrls);
        }

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old infrastructure image from the 'public/infrastructures/' directory
            Storage::delete('public/infrastructures/' . $infrastructure->image);

            // Store the new infrastructure image in the 'public/infrastructures' directory
            $infrastructureImagePath = $request->file('image')->store('public/infrastructures');
            $validatedData['image'] = basename($infrastructureImagePath);
        }

        $infrastructure->update($validatedData);

        return redirect()->route('infrastructures.index')->with('success', 'Infrastructure updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Infrastructure $infrastructure)
    {
        // Delete the infrastructure image from the 'public/infrastructures' directory
        Storage::delete('public/infrastructures/' . $infrastructure->image);

        // Detect and delete images in the description
        $this->deleteImagesFromDescription($infrastructure->description);

        $infrastructure->delete();

        return redirect()->route('infrastructures.index')->with('success', 'Infrastructure deleted successfully.');
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
