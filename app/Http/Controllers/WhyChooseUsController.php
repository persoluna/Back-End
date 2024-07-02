<?php

namespace App\Http\Controllers;

use App\Exports\WhyChooseUsExport;
use App\Imports\WhyChooseUsImport;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class WhyChooseUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $whyChooseUsItems = WhyChooseUs::latest()->get();
        return view('whychooseus.index');
    }

    /**
     */
    public function export()
    {
        return Excel::download(new WhyChooseUsExport, 'whychooseus.xlsx');
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

        Excel::import(new WhyChooseUsImport, $request->file('file'));

        return back()->with('success', 'Why choose us imported successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('whychooseus.create');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle the file upload
        $file = $request->file('upload');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/whychooseus', $filename);

        $url = asset('storage/whychooseus/' . $filename);

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
            'why_title' => 'required|max:255',
            'why_description' => 'required|max:255',
            'why_image' => 'required|image|max:2048',
            'alt_tag' => 'required|max:255',
        ]);

        // Retrieve the list of uploaded image URLs
        $uploadedImageUrls = json_decode($request->input('uploadedImages'), true);

        // Detect image URLs in description
        $imageUrls = $this->detectImages($validatedData['why_description']);

        // Delete unused images
        $this->deleteUnusedImages($uploadedImageUrls, $imageUrls);

        if ($request->hasFile('why_image')) {
            $whyChooseUsImage = $request->file('why_image');
            $filename = time() . '.' . $whyChooseUsImage->getClientOriginalExtension();
            // Store the original image in the 'public/whychooseus' directory
            $whyChooseUsImage->storeAs('public/whychooseus', $filename);
            $validatedData['why_image'] = $filename;
        }

        $whyChooseUsItem = WhyChooseUs::create($validatedData);
        return redirect()->route('whychooseus.index')->with('success', 'Why choose us created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(WhyChooseUs $whyChooseUsItem)
    {
        return view('whychooseus.show', compact('whyChooseUsItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WhyChooseUs $whychooseus)
    {
        $detectedImageUrls = $this->detectImages($whychooseus->why_description);

        return view('whychooseus.edit', compact('whychooseus', 'detectedImageUrls'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'why_title' => 'required|max:255',
            'why_description' => 'required|max:255',
            'why_image' => 'nullable|image|max:2048',
            'alt_tag' => 'required|max:255',
        ]);

        $whychooseus = WhyChooseUs::findOrFail($id);

        // Retrieve the list of uploaded image URLs
        $uploadedImageUrls = json_decode($request->input('uploadedImages'), true) ?? [];

        // Detect image URLs in long_description
        $imageUrls = $this->detectImages($validatedData['why_description']);

        // Delete unused images
        if (!empty($uploadedImageUrls)) {
            $this->deleteUnusedImages($uploadedImageUrls, $imageUrls);
        }

        // Check if a new image is uploaded
        if ($request->hasFile('why_image')) {
            // Delete the old image from the "whychooseus" folder
            Storage::delete('public/whychooseus/' . $whychooseus->why_image);

            // Store the new image in the "whychooseus" folder
            $WhychooseusImage = $request->file('why_image');
            $filename = time() . '.' . $WhychooseusImage->getClientOriginalExtension();
            $WhychooseusImage->storeAs('public/whychooseus', $filename);

            // Update the why_image field with the new image filename
            $validatedData['why_image'] = $filename;
        }

        $whychooseus->update($validatedData);

        return redirect()->route('whychooseus.index')->with('success', 'Why choose us updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WhyChooseUs $whyChooseUsItem)
    {
        // Delete the associated image file from the "why choose us" folder
        Storage::delete('public/whychooseus/' . $whyChooseUsItem->why_image);

        // Detect and delete images in the description
        $this->deleteImagesFromDescription($whyChooseUsItem->why_description);

        $whyChooseUsItem->delete();

        return redirect()->route('whychooseus.index')->with('success', 'Application deleted successfully.');
    }

    private function deleteImagesFromDescription($why_description)
    {
        $imageUrls = $this->detectImages($why_description);
        $this->deleteUnusedImages($imageUrls, []);
    }

    // Helper method to detect image URLs in the why_description
    private function detectImages($why_Description)
    {
        preg_match_all('/<img[^>]+src="([^">]+)"/', $why_Description, $matches);
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
