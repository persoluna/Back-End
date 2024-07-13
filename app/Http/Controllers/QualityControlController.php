<?php

namespace App\Http\Controllers;

use App\Models\QualityControl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QualityControlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $qualitycontrols = QualityControl::latest()->get();
        return view('qualitycontrols.index', compact('qualitycontrols'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('qualitycontrols.create');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle the file upload
        $file = $request->file('upload');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/qualitycontrols', $filename);

        $url = asset('storage/qualitycontrols/' . $filename);

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
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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

        $imageNames = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/qualitycontrols', $filename);
                $imageNames[] = $filename;
            }
        }
        $validatedData['image'] = json_encode($imageNames);

        $qualitycontrol = QualityControl::create($validatedData);

        return redirect()->route('qualitycontrols.index')->with('success', 'Qualitycontrol created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(QualityControl $qualitycontrol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QualityControl $qualitycontrol)
    {
        $detectedImageUrls = $this->detectImages($qualitycontrol->description);

        return view('qualitycontrols.edit', compact('qualitycontrol', 'detectedImageUrls'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'existing_images' => 'nullable|array',
            'title' => 'nullable',
            'sub_title' => 'nullable',
            'description' => 'nullable',
        ]);

        $qualitycontrol = QualityControl::findOrFail($id);

        // Retrieve the list of uploaded image URLs
        $uploadedImageUrls = json_decode($request->input('uploadedImages'), true) ?? [];

        // Detect image URLs in long_description
        $imageUrls = $this->detectImages($validatedData['description']);

        // Delete unused images
        if (!empty($uploadedImageUrls)) {
            $this->deleteUnusedImages($uploadedImageUrls, $imageUrls);
        }

        $oldImages = json_decode($qualitycontrol->image, true) ?: [];
        $newImageNames = $request->input('existing_images', []);

        // Delete removed images
        $imagesToDelete = array_diff($oldImages, $newImageNames);
        foreach ($imagesToDelete as $imageToDelete) {
            Storage::delete('public/qualitycontrols/' . $imageToDelete);
        }

        // Add new images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/qualitycontrols', $filename);
                $newImageNames[] = $filename;
            }
        }

        $validatedData['image'] = json_encode($newImageNames);

        $qualitycontrol->update($validatedData);

        return redirect()->route('qualitycontrols.index')->with('success', 'Qualitycontrol updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QualityControl $qualitycontrol)
    {
        // Get the list of image filenames
        $images = json_decode($qualitycontrol->image, true);

        // Delete each image file from storage
        if (is_array($images)) {
            foreach ($images as $image) {
                Storage::delete('public/qualitycontrols/' . $image);
            }
        }

        // Detect and delete images in the description
        $this->deleteImagesFromDescription($qualitycontrol->description);

        $qualitycontrol->delete();

        return redirect()->route('qualitycontrols.index')->with('success', 'QualityControl deleted successfully.');
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
