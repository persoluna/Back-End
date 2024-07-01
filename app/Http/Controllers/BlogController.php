<?php

namespace App\Http\Controllers;

use App\Exports\BlogsExport;
use App\Imports\BlogsImport;
use App\Models\blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = blog::latest()->get();
        return view('blogs.index', compact('blogs'));
    }

    /**
     */
    public function export()
    {
        return Excel::download(new BlogsExport, 'blogs.xlsx');
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

        Excel::import(new BlogsImport, $request->file('file'));

        return back()->with('success', 'Blogs imported successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogcategories = BlogCategory::all();
        return view('blogs.create', compact('blogcategories'));
    }


    public function upload(Request $request): JsonResponse
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('media'), $fileName);
            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }

        return response()->json(['uploaded' => 0], 400);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'blog_title' => 'required|max:255',
            'blog_slug' => 'required|unique:blogs|max:255',
            'short_description' => 'required',
            'long_description' => 'required',
            'blog_image' => 'required|image',
            'alt_tag' => 'required|max:255',
            'banner_image' => 'required|image',
            'banner_alt_tag' => 'required|max:255',
            'posted_by' => 'required|max:255',
            'meta_title' => 'required|max:255',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'meta_canonical' => 'required|url',
        ]);

        // Retrieve the list of uploaded image URLs
        $uploadedImageUrls = json_decode($request->input('uploadedImages'), true);

        // Detect image URLs in long_description
        $imageUrls = $this->detectImages($validatedData['long_description']);

        // Delete unused images
        $this->deleteUnusedImages($uploadedImageUrls, $imageUrls);

        // Store the blog image in the 'public/blogs' directory
        $blogImagePath = $request->file('blog_image')->store('public/blogs');
        $validatedData['blog_image'] = basename($blogImagePath);

        // Store the banner image in the 'public/blog_banners' directory
        $bannerImagePath = $request->file('banner_image')->store('public/blog_banners');
        $validatedData['banner_image'] = basename($bannerImagePath);

        $blog = Blog::create($validatedData);

        // Return JSON response with detected image URLs
        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $blogcategories = BlogCategory::all();
        $detectedImageUrls = $this->detectImages($blog->long_description);

        return view('blogs.edit', compact('blog', 'blogcategories', 'detectedImageUrls'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'blog_title' => 'required|max:255',
            'blog_slug' => 'required|unique:blogs,blog_slug,' . $id . '|max:255',
            'short_description' => 'required',
            'long_description' => 'required',
            'blog_image' => 'nullable|image',
            'alt_tag' => 'required|max:255',
            'banner_image' => 'nullable|image',
            'banner_alt_tag' => 'required|max:255',
            'posted_by' => 'required|max:255',
            'meta_title' => 'required|max:255',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'meta_canonical' => 'required|url',
        ]);

        $blog = Blog::findOrFail($id);

        // Retrieve the list of uploaded image URLs
        $uploadedImageUrls = json_decode($request->input('uploadedImages'), true);

        // Detect image URLs in long_description
        $imageUrls = $this->detectImages($validatedData['long_description']);

        // Delete unused images
        $this->deleteUnusedImages($uploadedImageUrls, $imageUrls);

        // Update the blog image if a new one was uploaded
        if ($request->hasFile('blog_image')) {
            $blogImagePath = $request->file('blog_image')->store('public/blogs');
            $validatedData['blog_image'] = basename($blogImagePath);
        } else {
            unset($validatedData['blog_image']);
        }

        // Update the banner image if a new one was uploaded
        if ($request->hasFile('banner_image')) {
            $bannerImagePath = $request->file('banner_image')->store('public/blog_banners');
            $validatedData['banner_image'] = basename($bannerImagePath);
        } else {
            unset($validatedData['banner_image']);
        }

        $blog->update($validatedData);

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(blog $blog)
    {
        // Delete the blog image from the 'public/blogs' directory
        Storage::delete('public/blogs/' . $blog->blog_image);

        // Delete the banner image from the 'public/blog_banners' directory
        Storage::delete('public/blog_banners/' . $blog->banner_image);

        // Detect and delete images in the long description
        $this->deleteImagesFromLongDescription($blog->long_description);

        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }

    private function deleteImagesFromLongDescription($longDescription)
    {
        $imageUrls = $this->detectImages($longDescription);
        $this->deleteUnusedImages($imageUrls, []);
    }

    // Helper method to detect image URLs in the long description
    private function detectImages($longDescription)
    {
        preg_match_all('/<img[^>]+src="([^">]+)"/', $longDescription, $matches);
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
