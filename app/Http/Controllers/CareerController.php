<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $careers = Career::latest()->get();
        return view('careers.index', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('careers.create');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle the file upload
        $file = $request->file('upload');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/careers', $filename);

        $url = asset('storage/careers/' . $filename);

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
            'title' => 'required',
            'image' => 'required|image',
            'requirement' => 'nullable',
            'brief_description' => 'nullable',
            'description' => 'nullable',
        ]);

        // Retrieve the list of uploaded image URLs
        $uploadedImageUrls = json_decode($request->input('uploadedImages'), true);

        // Detect image URLs in description
        $imageUrls = $this->detectImages($validatedData['description']);

        // Delete unused images
        $this->deleteUnusedImages($uploadedImageUrls, $imageUrls);

        // Store the career image in the 'public/careers' directory
        $careerImagePath = $request->file('image')->store('public/careers');
        $validatedData['image'] = basename($careerImagePath);

        $career = Career::create($validatedData);

        return redirect()->route('careers.index')->with('success', 'Career created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Career $career)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Career $career)
    {
        $detectedImageUrls = $this->detectImages($career->description);

        return view('careers.edit', compact('career', 'detectedImageUrls'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'nullable',
            'image' => 'nullable',
            'requirement' => 'nullable',
            'brief_description' => 'nullable',
            'description' => 'nullable',
        ]);

        $career = Career::findOrFail($id);

        // Retrieve the list of uploaded image URLs
        $uploadedImageUrls = json_decode($request->input('uploadedImages'), true) ?? [];

        // Detect image URLs in long_description
        $imageUrls = $this->detectImages($validatedData['description']);

        // Delete unused images
        if (!empty($uploadedImageUrls)) {
            $this->deleteUnusedImages($uploadedImageUrls, $imageUrls);
        }

        // Check if a new career image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old career image from the 'public/careers/' directory
            Storage::delete('public/careers/' . $career->image);

            // Store the new career image in the 'public/careers' directory
            $careerImagePath = $request->file('image')->store('public/careers');
            $validatedData['image'] = basename($careerImagePath);
        }

        $career->update($validatedData);

        return redirect()->route('careers.index')->with('success', 'Career updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Career $career)
    {
        // Delete the career image from the 'public/careers' directory
        Storage::delete('public/careers/' . $career->image);

        // Detect and delete images in the description
        $this->deleteImagesFromDescription($career->description);

        $career->delete();

        return redirect()->route('careers.index')->with('success', 'Career deleted successfully.');
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
