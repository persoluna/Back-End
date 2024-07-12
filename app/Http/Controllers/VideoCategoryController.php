<?php

namespace App\Http\Controllers;

use App\Models\VideoCategory;
use Illuminate\Http\Request;
use App\Models\Video;

class VideoCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videoCategories = VideoCategory::latest()->get();
        return view('video-categories.index', compact('videoCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('video-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' =>'required|max:255',
        ]);

        $videoCategory = VideoCategory::create($validatedData);

        return redirect()->route('videocategories.index')->with('success', 'Video category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(VideoCategory $videoCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VideoCategory $videocategory)
    {
        return view('video-categories.edit', compact('videocategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VideoCategory $videocategory)
    {
        $validateData = $request->validate([
            'name' => 'nullable|max:255',
        ]);

        $videocategory->update($validateData);

        return redirect()->route('videocategories.index')->with('success', 'video category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VideoCategory $videocategory)
    {
        // Update associated videos to have a null video category value
        $videocategory->videos()->update(['category_id' => null]);

        $videocategory->delete();

        return redirect()->route('videocategories.index')->with('success', 'Video category deleted successfully.');
    }
}
