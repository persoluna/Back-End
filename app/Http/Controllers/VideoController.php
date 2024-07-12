<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\VideoCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::all();
        return view('videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = VideoCategory::all();
        return view('videos.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'video' => 'required|file|mimetypes:video/mp4,video/x-msvideo,video/x-matroska|max:204800', // 200MB max
            'category_id' => 'required|exists:video_categories,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Handle the video file upload
        if ($request->hasFile('video')) {
            $videoFile = $request->file('video');
            $path = $videoFile->store('videos', 'public'); // store in 'public/videos' directory
        } else {
            return response()->json(['error' => 'No video file uploaded'], 400);
        }

        // Create a new Video instance and save it
        $video = Video::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'url' => $path,
            'category_id' => $request->input('category_id'),
        ]);

        // Return a JSON response
        return redirect()->route('videos.index')->with('success', 'Video created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        $categories = VideoCategory::all(); // Fetch categories
        return view('videos.edit', ['video' => $video, 'categories' => $categories]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:video_categories,id',
            'video' => 'nullable|file|mimes:mp4,mov,avi|max:20480', // Limit to 20MB
        ]);

        // Update the video details
        $video->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'category_id' => $validatedData['category_id'],
        ]);

        // If a new video file is uploaded, handle the file upload
        if ($request->hasFile('video')) {
            // Delete the old video file
            Storage::disk('public')->delete($video->url);

            // Store the new video file
            $videoPath = $request->file('video')->store('videos', 'public');

            // Update the video URL in the database
            $video->update(['url' => $videoPath]);
        }

        // Redirect back with a success message
        return redirect()->route('videos.index')->with('success', 'Video updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        // Check if the video URL is set
        if (!empty($video->url)) {
            // The video URL is stored as 'videos/filename.mp4', which is correct for public disk
            // We don't need to prepend 'public/' because it's already in the correct format for the public disk
            if (Storage::disk('public')->exists($video->url)) {
                // Delete the video file from the public disk
                Storage::disk('public')->delete($video->url);
            }
        }

        // Delete the video record from the database
        $video->delete();

        // Redirect to the videos index page with a success message
        return redirect()->route('videos.index')->with('success', 'Video deleted successfully.');
    }
}
