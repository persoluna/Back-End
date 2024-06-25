<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('blogs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' =>'required|max:255',
        ]);

        $blogCategory = BlogCategory::create($validatedData);

        return redirect()->route('blogcategories.index')->with('success', 'Blog category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogCategory $blogcategory)
    {
        return view('blog-categories.edit', compact('blogcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogCategory $blogcategory)
    {
        $validateData = $request->validate([
            'name' => 'nullable|max:255',
        ]);

        $blogcategory->update($validateData);

        return redirect()->route('blogs.index')->with('success', 'Blog category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogCategory $blogcategory)
    {
        $blogcategory->services()->update(['category_id' => null]);

        $blogcategory->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog category deleted successfully.');
    }
}
