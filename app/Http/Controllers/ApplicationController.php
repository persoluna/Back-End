<?php

namespace App\Http\Controllers;

use App\Exports\ApplicationsExport;
use App\Imports\ApplicationsImport;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = Application::latest()->get();
        return view('applications.index', compact('applications'));
    }

    /**
     */
    public function export()
    {
        return Excel::download(new ApplicationsExport, 'applications.xlsx');
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

        Excel::import(new ApplicationsImport, $request->file('file'));

        return back()->with('success', 'Applications imported successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('applications.create');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle the file upload
        $file = $request->file('upload');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/applications', $filename);

        $url = asset('storage/applications/' . $filename);

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
            'application_title' => 'required|max:255',
            'application_description' => 'required|max:255',
            'application_image' => 'required|image|max:2048',
            'alt_tag' => 'required|max:255',
        ]);

        // Retrieve the list of uploaded image URLs
        $uploadedImageUrls = json_decode($request->input('uploadedImages'), true);

        // Detect image URLs in long_description
        $imageUrls = $this->detectImages($validatedData['application_description']);

        // Delete unused images
        $this->deleteUnusedImages($uploadedImageUrls, $imageUrls);

        if ($request->hasFile('application_image')) {
            $ApplicationImage = $request->file('application_image');
            $filename = time() . '.' . $ApplicationImage->getClientOriginalExtension();

            // Store the original image in the 'public/applications' directory
            $ApplicationImage->storeAs('public/applications', $filename);

            $validatedData['application_image'] = $filename;
        }

        $application = Application::create($validatedData);

        return redirect()->route('applications.index')->with('success', 'Application created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        return view('applications.show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        $detectedImageUrls = $this->detectImages($application->application_description);

        return view('applications.edit', compact('application', 'detectedImageUrls'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'application_title' => 'required|max:255',
            'application_description' => 'required|max:255',
            'application_image' => 'nullable|image|max:2048',
            'alt_tag' => 'required|max:255',
        ]);

        $application = Application::findOrFail($id);

        // Retrieve the list of uploaded image URLs
        $uploadedImageUrls = json_decode($request->input('uploadedImages'), true) ?? [];

        // Detect image URLs in long_description
        $imageUrls = $this->detectImages($validatedData['application_description']);

        // Delete unused images
        if (!empty($uploadedImageUrls)) {
            $this->deleteUnusedImages($uploadedImageUrls, $imageUrls);
        }

        // Check if a new image is uploaded
        if ($request->hasFile('application_image')) {
            // Delete the old image from the "applications" folder
            Storage::delete('public/applications/' . $application->application_image);

            // Store the new image in the "applications" folder
            $ApplicationImage = $request->file('application_image');
            $filename = time() . '.' . $ApplicationImage->getClientOriginalExtension();
            $ApplicationImage->storeAs('public/applications', $filename);

            // Update the application_image field with the new image filename
            $validatedData['application_image'] = $filename;
        }

        $application->update($validatedData);

        return redirect()->route('applications.index')->with('success', 'Application updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        // Delete the associated image file from the "applications" folder
        Storage::delete('public/applications/' . $application->application_image);

        // Detect and delete images in the description
        $this->deleteImagesFromDescription($application->application_description);

        $application->delete();

        return redirect()->route('applications.index')->with('success', 'Application deleted successfully.');
    }

    private function deleteImagesFromDescription($application_description)
    {
        $imageUrls = $this->detectImages($application_description);
        $this->deleteUnusedImages($imageUrls, []);
    }

    // Helper method to detect image URLs in the description
    private function detectImages($application_description)
    {
        preg_match_all('/<img[^>]+src="([^">]+)"/', $application_description, $matches);
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
