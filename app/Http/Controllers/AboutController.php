<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::find(1);
        return view('abouts.show', compact('about'));
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
    public function show(About $about)
    {
        return view('abouts.show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('abouts.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $validatedData = $request->validate([
            'title' => 'nullable',
            'sub_title' => 'nullable',
            'description' => 'nullable',
            'image1' => 'nullable',
            'alt_tag1' => 'nullable',
            'image2' => 'nullable',
            'alt_tag2' => 'nullable',
            'owner_name' => 'nullable',
            'owner_designation' => 'nullable',
            'owner_signature' => 'nullable',
            'alt_tag3' => 'nullable',
        ]);

        // Delete old images if new images are uploaded
        if ($request->hasFile('image1')) {
            if ($about->image1) {
                Storage::delete('public/abouts/' . $about->image1);
            }
            $filename = time() . '.' . $request->file('image1')->getClientOriginalExtension();
            $request->file('image1')->storeAs('public/abouts', $filename);
            $validatedData['image1'] = $filename;
        }

        if ($request->hasFile('image2')) {
            if ($about->image2) {
                Storage::delete('public/abouts/' . $about->image2);
            }
            $filename = time() . '.' . $request->file('image2')->getClientOriginalExtension();
            $request->file('image2')->storeAs('public/abouts', $filename);
            $validatedData['image2'] = $filename;
        }

        if ($request->hasFile('owner_signature')) {
            if ($about->owner_signature) {
                Storage::delete('public/abouts/' . $about->owner_signature);
            }
            $filename = time() . '.' . $request->file('owner_signature')->getClientOriginalExtension();
            $request->file('owner_signature')->storeAs('public/abouts', $filename);
            $validatedData['owner_signature'] = $filename;
        }

        // Update the about us record
        $about->update($validatedData);

        return redirect()->route('abouts.show', $about->id)->with('success', 'About us updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
    }
}
