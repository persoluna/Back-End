<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'blog_title' => 'required|max:255',
            'blog_slug' => 'required|unique:blogs|max:255',
            'short_description' => 'required',
            'long_description' => 'required',
            'blog_image' => 'required|image|max:2048',
            'alt_tag' => 'required|max:255',
            'banner_image' => 'required|image|max:2048',
            'banner_alt_tag' => 'required|max:255',
            'posted_by' => 'required|max:255',
            'meta_title' => 'required|max:255',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'meta_canonical' => 'required|url',
        ]);

        // Store the blog image in the 'public/blogs' directory
        $blogImagePath = $request->file('blog_image')->store('public/blogs');
        $validatedData['blog_image'] = basename($blogImagePath);

        // Store the banner image in the 'public/blog_banners' directory
        $bannerImagePath = $request->file('banner_image')->store('public/blog_banners');
        $validatedData['banner_image'] = basename($bannerImagePath);

        $blog = Blog::create($validatedData);

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
    public function edit(blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validatedData = $request->validate([
            'blog_title' => 'nullable|max:255',
            'blog_slug' => 'nullable',
            'short_description' => 'nullable',
            'long_description' => 'nullable',
            'blog_image' => 'nullable|image|max:2048',
            'alt_tag' => 'nullable|max:255',
            'banner_image' => 'nullable|image|max:2048',
            'banner_alt_tag' => 'nullable|max:255',
            'posted_by' => 'nullable|max:255',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
        ]);

        // Check if a new blog image is uploaded
        if ($request->hasFile('blog_image')) {
            // Delete the old blog image from the 'public/blogs/' directory
            Storage::delete('public/blogs/' . $blog->blog_image);

            // Store the new blog image in the 'public/blogs' directory
            $blogImagePath = $request->file('blog_image')->store('public/blogs');
            $validatedData['blog_image'] = basename($blogImagePath);
        }

        // Check if a new banner image is uploaded
        if ($request->hasFile('banner_image')) {
            // Delete the old banner image from the 'public/blog_banners/' directory
            Storage::delete('public/blog_banners/' . $blog->banner_image);

            // Store the new banner image in the 'public/blogs/banners' directory
            $bannerImagePath = $request->file('banner_image')->store('public/blog_banners');
            $validatedData['banner_image'] = basename($bannerImagePath);
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

        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
