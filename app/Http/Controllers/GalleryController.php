<?php

namespace App\Http\Controllers;

use App\Models\GalleryCategory;
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
        $galleryCategories = GalleryCategory::all();
        return view('galleries.create', compact('galleryCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image',
            'alt_tag' => 'required|max:255',
        ]);

        if ($request->hasFile('image')) {
            $filename = time() . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/galleries', $filename);
            $validatedData['image'] = $filename;
        }

        Gallery::create($validatedData);

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
        $galleryCategories = GalleryCategory::get();
        return view('galleries.edit', compact('gallery', 'galleryCategories'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Gallery $gallery)
    {
        $validatedData = $request->validate([
            'category_id' => 'nullable',
            'image' => 'image',
            'alt_tag' => 'required|max:255',
        ]);

        if ($request->hasFile('image')) {
            // Delete the previous image if it exists
            if ($gallery->image) {
                Storage::delete('public/galleries/' . $gallery->image);
            }

            $filename = time() . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/galleries', $filename);
            $validatedData['image'] = $filename;
        }

        $gallery->update($validatedData);

        return redirect()->route('galleries.index')->with('success', 'Gallery updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) {
            Storage::delete('public/galleries/' . $gallery->image);
        }

        $gallery->delete();

        return redirect()->route('galleries.index')->with('success', 'Gallery deleted successfully.');
    }

}
