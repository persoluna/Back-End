<?php

namespace App\Http\Controllers;

use App\Models\AboutPoint;
use Illuminate\Http\Request;

class AboutPointController extends Controller
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
        return view('aboutpoints.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'point' => 'required|max:255',
        ]);

        $aboutpoint = AboutPoint::create($validatedData);

        return redirect()->route('abouts.index')->with('success', 'Point created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutPoint $aboutpoint)
    {
        return view('aboutpoints.edit', compact('aboutpoint'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AboutPoint $aboutpoint)
    {
        $validatedData = $request->validate([
            'point' => 'nullable',
        ]);

        $aboutpoint->update($validatedData);

        return redirect()->route('abouts.index')->with('success', 'About Point updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutPoint $aboutpoint)
    {
        $aboutpoint->delete();

        return redirect()->route('abouts.index')->with('success', 'AboutPoint deleted successfully.');
    }
}
