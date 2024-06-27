<?php

namespace App\Http\Controllers;

use App\Models\GlobalPresence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GlobalPresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $globalpresences = GlobalPresence::latest()->get();
        return view('globalpresences.index', compact('globalpresences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('globalpresences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'countryName' => 'required',
            'flag_icon' => 'required|image',
            'latitude' => 'required',
            'longitude' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('flag_icon')) {
            $flagIcon = $request->file('flag_icon');
            $filename = time() . '.' . $flagIcon->getClientOriginalExtension();

            // Store the original image in the 'public/flags' directory
            $flagIcon->storeAs('public/flags', $filename);

            $validatedData['flag_icon'] = $filename;
        }

        $globalPresence = GlobalPresence::create($validatedData);

        return redirect()->route('globalpresences.index')->with('success', 'Global presence created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(GlobalPresence $globalPresence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GlobalPresence $globalpresence)
    {
        $globalpresences = GlobalPresence::get();
        return view('globalpresences.edit', compact('globalpresence'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GlobalPresence $globalpresence)
    {
        $validatedData = $request->validate([
            'countryName' => 'nullable',
            'flag_icon' => 'nullable',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'description' => 'nullable',
        ]);

        // Check if a new image is uploaded
        if ($request->hasFile('flag_icon')) {
            // Delete the old image from the "flags" folder
            Storage::delete('public/flags/' . $globalpresence->flag_icon);

            // Store the new image in the "banners" folder
            $flagIcon = $request->file('flag_icon');
            $filename = time() . '.' . $flagIcon->getClientOriginalExtension();
            $flagIcon->storeAs('public/flags', $filename);

            // Update the flag_icon field with the new image filename
            $validatedData['flag_icon'] = $filename;
        }

        $globalpresence->update($validatedData);

        return redirect()->route('globalpresences.index')->with('success', 'Global Presence updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GlobalPresence $globalpresence)
    {
        // Delete the associated image file from the "flags" folder
        Storage::delete('public/flags/' . $globalpresence->flag_icon);

        $globalpresence->delete();

        return redirect()->route('globalpresences.index')->with('success', 'Presence deleted successfully.');
    }
}
