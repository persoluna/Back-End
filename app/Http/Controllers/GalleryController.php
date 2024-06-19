<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image_names.*' => 'required|image', // Validate each file in the array
            'alt_tag' => 'required|max:255',
        ]);

        $imageNames = [];

        if ($request->hasFile('image_names')) {
            foreach ($request->file('image_names') as $GalleryImage) {
                $filename = time() . '_' . uniqid() . '.' . $GalleryImage->getClientOriginalExtension();
                // Store the image in the 'public/galleries' directory
                $GalleryImage->storeAs('public/galleries', $filename);
                $imageNames[] = $filename;
            }
        }

        // Convert image names array to JSON
        $validatedData['image_names'] = json_encode($imageNames);

        $gallery = Gallery::create($validatedData);

        return redirect()->route('galleries.index')->with('success', 'Gallery created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        $existingImageNames = json_decode($gallery->image_names, true);
        return view('galleries.edit', compact('gallery', 'existingImageNames'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Gallery $gallery)
{
    $validatedData = $request->validate([
        'image_names.*' => 'image',
        'alt_tag' => 'required|max:255',
    ]);

    // Get the existing image names
    $existingImageNames = json_decode($gallery->image_names, true);

    // Delete the selected existing images from the "galleries" folder
    if ($request->has('deleted_images')) {
        foreach ($request->input('deleted_images') as $imageName) {
            Storage::delete('public/galleries/' . $imageName);
            $key = array_search($imageName, $existingImageNames);
            unset($existingImageNames[$key]);
        }
    }

    $imageNames = $existingImageNames;

    // Handle new image uploads
    if ($request->hasFile('image_names')) {
        foreach ($request->file('image_names') as $galleryImage) {
            $filename = time() . '_' . uniqid() . '.' . $galleryImage->getClientOriginalExtension();
            $galleryImage->storeAs('public/galleries', $filename);
            $imageNames[] = $filename;
        }
    }

    // Convert image names array to JSON
    $validatedData['image_names'] = json_encode($imageNames);
    $gallery->update($validatedData);

    return redirect()->route('galleries.index')->with('success', 'Gallery updated successfully.');
}

    // To delete the images the user unselects
public function deleteImage(Request $request)
{
    $imageName = $request->input('imageName');

    // Find the gallery associated with the image
    $gallery = Gallery::whereJsonContains('image_names', $imageName)->first();

    if ($gallery) {
        // Delete the image from the "galleries" folder
        Storage::delete('public/galleries/' . $imageName);

        // Remove the image name from the "image_names" JSON column
        $existingImageNames = json_decode($gallery->image_names, true);
        $key = array_search($imageName, $existingImageNames);
        unset($existingImageNames[$key]);
        $gallery->image_names = json_encode(array_values($existingImageNames));
        $gallery->save();

        return response()->json([
            'message' => 'Image deleted successfully.',
            'image_names' => $gallery->image_names // Return the updated image_names JSON string
        ]);
    }

    return response()->json(['message' => 'Image not found.'], 404);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        // Decode the JSON-encoded image names
        $imageNames = json_decode($gallery->image_names, true);

        // Delete each associated image file from the "galleries" folder
        if ($imageNames) {
            foreach ($imageNames as $imageName) {
                Storage::delete('public/galleries/' . $imageName);
            }
        }

        // Delete the gallery from the database
        $gallery->delete();

        return redirect()->route('galleries.index')->with('success', 'Gallery deleted successfully.');
    }

}
