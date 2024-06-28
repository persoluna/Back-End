<?php

namespace App\Http\Controllers;

use App\Models\Heading;
use Illuminate\Http\Request;

class HeadingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Heading $heading)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $heading = Heading::find($id);
        switch ($heading->id) {
            case 1:
                $breadcrumbs = [
                    ['name' => 'Applications', 'url' => route('applications.index')],
                    ['name' => 'Update Application Title', 'url' => route('headings.edit', 1)],
                ];
                break;
            case 2:
                $breadcrumbs = [
                    ['name' => 'Why us', 'url' => route('whychooseus.index')],
                    ['name' => 'Update Why Choose Us Title', 'url' => route('headings.edit', 2)],
                ];
                break;

            case 3:
                $breadcrumbs = [
                    ['name' => 'Testimonial', 'url' => route('testimonials.index')],
                    ['name' => 'Update Testimonial Ttile', 'url' => route('headings.edit', 3)],
                ];
                break;

            case 4:
                $breadcrumbs = [
                    ['name' => 'Categories', 'url' => route('categories.index')],
                    ['name' => 'Update Category Title', 'url' => route('headings.edit', 4)],
                ];
                break;

            case 5:
                $breadcrumbs = [
                    ['name' => 'Blogs', 'url' => route('blogs.index')],
                    ['name' => 'Update Blog Title', 'url' => route('headings.edit', 5)],
                ];
                break;

            case 6:
                $breadcrumbs = [
                    ['name' => 'Achievements', 'url' => route('achievements.index')],
                    ['name' => 'Update Achievements Title', 'url' => route('headings.edit', 6)],
                ];
                break;

            case 7:
                $breadcrumbs = [
                    ['name' => 'Service Categories', 'url' => route('servicecategories.index')],
                    ['name' => 'Update service Category Title', 'url' => route('headings.edit', 7)],
                ];
                break;

            case 8:
                $breadcrumbs = [
                    ['name' => 'Infrastructures', 'url' => route('infrastructures.index')],
                    ['name' => 'Update Infrastructures Title', 'url' => route('headings.edit', 8)],
                ];
                break;

            case 9:
                $breadcrumbs = [
                    ['name' => 'Quality Controls', 'url' => route('qualitycontrols.index')],
                    ['name' => 'Update Qualitycontrols Title', 'url' => route('headings.edit', 9)],
                ];
                break;
        }
        return view('heading.edit', compact('heading', 'breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $heading = Heading::find($id);
        $validatedData = $request->validate([
            'title' => 'required|string',
            'sub_title' => 'required|string',
        ]);
        $heading->update($validatedData);
        return redirect()->route('headings.edit', $id)->with('success', 'Title updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Heading $heading)
    {
        //
    }
}
