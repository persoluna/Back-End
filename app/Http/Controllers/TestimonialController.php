<?php
namespace App\Http\Controllers;

use App\Exports\TestimonialsExport;
use App\Imports\TestimonialsImport;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('testimonials.index', compact('testimonials'));
    }

    /**
     */
    public function export()
    {
        return Excel::download(new TestimonialsExport, 'testimonials.xlsx');
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

        Excel::import(new TestimonialsImport, $request->file('file'));

        return back()->with('success', 'Testimonials imported successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('testimonials.create');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle the file upload
        $file = $request->file('upload');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/testimonials', $filename);

        $url = asset('storage/testimonials/' . $filename);

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
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'profile_image' => 'required|image|max:2048',
            'alt_tag' => 'required|max:255',
        ]);

        // Retrieve the list of uploaded image URLs
        $uploadedImageUrls = json_decode($request->input('uploadedImages'), true);

        // Detect image URLs in description
        $imageUrls = $this->detectImages($validatedData['description']);

        // Delete unused images
        $this->deleteUnusedImages($uploadedImageUrls, $imageUrls);

        if ($request->hasFile('profile_image')) {
            $profileImage = $request->file('profile_image');
            $filename = time() . '.' . $profileImage->getClientOriginalExtension();

            // Store the original image in the 'public/testimonials' directory
            $profileImage->storeAs('public/testimonials', $filename);

            $validatedData['profile_image'] = $filename;
        }

        $testimonial = Testimonial::create($validatedData);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        return view('testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        $detectedImageUrls = $this->detectImages($testimonial->description);

        return view('testimonials.edit', compact('testimonial', 'detectedImageUrls'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'profile_image' => 'nullable|image|max:2048',
            'alt_tag' => 'required|max:255',
        ]);

        $testimonial = Testimonial::findOrFail($id);

        // Retrieve the list of uploaded image URLs
        $uploadedImageUrls = json_decode($request->input('uploadedImages'), true) ?? [];

        // Detect image URLs in long_description
        $imageUrls = $this->detectImages($validatedData['description']);

        // Delete unused images
        if (!empty($uploadedImageUrls)) {
            $this->deleteUnusedImages($uploadedImageUrls, $imageUrls);
        }

        // Check if a new image is uploaded
        if ($request->hasFile('profile_image')) {
            // Delete the old image from the "testimonials" folder
            Storage::delete('public/testimonials/' . $testimonial->profile_image);

            // Store the new image in the "testimonials" folder
            $profileImage = $request->file('profile_image');
            $filename = time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->storeAs('public/testimonials', $filename);

            // Update the profile_image field with the new image filename
            $validatedData['profile_image'] = $filename;
        }

        $testimonial->update($validatedData);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        // Delete the associated image file from the "testimonials" folder
        Storage::delete('public/testimonials/' . $testimonial->profile_image);

        // Detect and delete images in the description
        $this->deleteImagesFromDescription($testimonial->description);

        $testimonial->delete();

        return redirect()->route('testimonials.index')->with('success', 'Testimonial deleted successfully.');
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
