<?php

namespace App\Http\Controllers;

use App\Models\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InfrastructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infrastructures = Infrastructure::latest()->get();
        return view('infrastructures.index', compact('infrastructures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('infrastructures.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image',
            'title' => 'nullable',
            'sub_title' => 'nullable',
            'description' => 'nullable',
        ]);

        $infrastructureImagePath = $request->file('image')->store('public/infrastructures');
        $validatedData['image'] = basename($infrastructureImagePath);

        $infrastructure = Infrastructure::create($validatedData);

        return redirect()->route('infrastructures.index')->with('success', 'Infrastructure created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Infrastructure $infrastructure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Infrastructure $infrastructure)
    {
        return view('infrastructures.edit', compact('infrastructure'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Infrastructure $infrastructure)
    {
        $validatedData = $request->validate([
            'image' => 'nullable',
            'title' => 'nullable',
            'sub_title' => 'nullable',
            'description' => 'nullable',
        ]);

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old infrastructure image from the 'public/infrastructures/' directory
            Storage::delete('public/infrastructures/' . $infrastructure->image);

            // Store the new infrastructure image in the 'public/infrastructures' directory
            $infrastructureImagePath = $request->file('image')->store('public/infrastructures');
            $validatedData['image'] = basename($infrastructureImagePath);
        }

        $infrastructure->update($validatedData);

        return redirect()->route('infrastructures.index')->with('success', 'Infrastructure updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Infrastructure $infrastructure)
    {
        // Delete the infrastructure image from the 'public/infrastructures' directory
        Storage::delete('public/infrastructures/' . $infrastructure->image);

        $infrastructure->delete();

        return redirect()->route('infrastructures.index')->with('success', 'Infrastructure deleted successfully.');
    }
}
