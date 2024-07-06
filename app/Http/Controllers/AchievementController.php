<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $achievements = Achievement::latest()->get();
        return view('achievements.index', compact('achievements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('achievements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image',
            'title' => 'required|max:255',
        ]);

        $achievementImagePath = $request->file('image')->store('public/achievements');
        $validatedData['image'] = basename($achievementImagePath);

        $achievement = Achievement::create($validatedData);

        return redirect()->route('certificates.index')->with('success', 'Certificate created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Achievement $achievement)
     {
        $achievements = Achievement::latest()->get();
        return view('achievements.index', compact('achievements'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Achievement $certificate)
    {
        return view('achievements.edit', compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Achievement $certificate)
    {
        $validatedData = $request->validate([
            'title' => 'nullable',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            Storage::delete('public/achievements/' . $achievement->image);

            $achievementImagePath = $request->file('image')->store('public/achievements');
            $validatedData['image'] = basename($achievementImagePath);
        }

        $certificate->update($validatedData);

        return redirect()->route('certificates.index')->with('success', 'Certificate updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Achievement $certificate)
    {
        Storage::delete('public/achievements/' . $certificate->image);

        $certificate->delete();

        return redirect()->route('certificates.index')->with('success', 'Certificate deleted successfully.');
    }
}
