<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mission = Mission::find(1);
        return view('missions.show', compact('mission'));
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
    public function show(Mission $mission)
    {
        $mission = Mission::find(1);
        return view('missions.show', compact('mission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mission $mission)
    {
        return view('missions.edit', compact('mission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mission $mission)
    {
        $validatedData = $request->validate([
            'Mission_title' => 'nullable|string|max:255',
            'Mission_description' => 'nullable|string',
            'Mission_alt_tag' => 'nullable|string|max:255',
            'Mission_image' => 'nullable|image|max:2048',
            'vision_title' => 'nullable|string|max:255',
            'vision_description' => 'nullable|string',
            'vision_alt_tag' => 'nullable|string|max:255',
            'vision_image' => 'nullable|image|max:2048',
        ]);

        // Delete old images if new images are uploaded
        if ($request->hasFile('Mission_image')) {
            if ($mission->Mission_image) {
                Storage::delete('public/mission/' . $mission->Mission_image);
            }
            $filename = time() . '_mission.' . $request->file('Mission_image')->getClientOriginalExtension();
            $request->file('Mission_image')->storeAs('public/mission', $filename);
            $validatedData['Mission_image'] = $filename;
        }

        if ($request->hasFile('vision_image')) {
            if ($mission->vision_image) {
                Storage::delete('public/vision/' . $mission->vision_image);
            }
            $filename = time() . '_vision.' . $request->file('vision_image')->getClientOriginalExtension();
            $request->file('vision_image')->storeAs('public/vision', $filename);
            $validatedData['vision_image'] = $filename;
        }

        // Update the mission record
        $mission->update($validatedData);

        return redirect()->route('missions.index')->with('success', 'Mission, Vision, and Core data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mission $mission)
    {
        //
    }
}
