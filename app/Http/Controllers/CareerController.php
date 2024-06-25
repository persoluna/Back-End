<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $careers = Career::latest()->get();
        return view('careers.index', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('careers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'image' => 'required|image',
            'requirement' => 'nullable',
            'brief_description' => 'nullable',
            'description' => 'nullable',
        ]);

        // Store the career image in the 'public/careers' directory
        $careerImagePath = $request->file('image')->store('public/careers');
        $validatedData['image'] = basename($careerImagePath);

        $career = Career::create($validatedData);

        return redirect()->route('careers.index')->with('success', 'Career created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Career $career)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Career $career)
    {
        return view('careers.edit', compact('career'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Career $career)
    {
        $validatedData = $request->validate([
            'title' => 'nullable',
            'image' => 'nullable',
            'requirement' => 'nullable',
            'brief_description' => 'nullable',
            'description' => 'nullable',
        ]);

        // Check if a new career image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old career image from the 'public/careers/' directory
            Storage::delete('public/careers/' . $career->image);

            // Store the new career image in the 'public/careers' directory
            $careerImagePath = $request->file('image')->store('public/careers');
            $validatedData['image'] = basename($careerImagePath);
        }

        $career->update($validatedData);

        return redirect()->route('careers.index')->with('success', 'Career updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Career $career)
    {
        // Delete the career image from the 'public/careers' directory
        Storage::delete('public/careers/' . $career->image);

        $career->delete();

        return redirect()->route('careers.index')->with('success', 'Career deleted successfully.');
    }
}
