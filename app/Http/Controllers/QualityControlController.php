<?php

namespace App\Http\Controllers;

use App\Models\QualityControl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QualityControlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $qualitycontrols = QualityControl::latest()->get();
        return view('qualitycontrols.index', compact('qualitycontrols'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('qualitycontrols.create');
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

        $qualitycontrolImagePath = $request->file('image')->store('public/qualitycontrols');
        $validatedData['image'] = basename($qualitycontrolImagePath);

        $qualitycontrol = QualityControl::create($validatedData);

        return redirect()->route('qualitycontrols.index')->with('success', 'Qualitycontrol created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(QualityControl $qualitycontrol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QualityControl $qualitycontrol)
    {
        return view('qualitycontrols.edit', compact('qualitycontrol'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QualityControl $qualitycontrol)
    {
        $validatedData = $request->validate([
            'image' => 'nullable',
            'title' => 'nullable',
            'sub_title' => 'nullable',
            'description' => 'nullable',
        ]);

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old qualitycontrol image from the 'public/qualitycontrols/' directory
            Storage::delete('public/qualitycontrols/' . $qualitycontrol->image);

            // Store the new qualitycontrols image in the 'public/qualitycontrols' directory
            $qualitycontrolImagePath = $request->file('image')->store('public/qualitycontrols');
            $validatedData['image'] = basename($qualitycontrolImagePath);
        }

        $qualitycontrol->update($validatedData);

        return redirect()->route('qualitycontrols.index')->with('success', 'Qualitycontrol updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QualityControl $qualitycontrol)
    {
        // Delete the qualityControl image from the 'public/qualitycontrols' directory
        Storage::delete('public/qualitycontrols/' . $qualitycontrol->image);

        $qualityControl->delete();

        return redirect()->route('qualitycontrols.index')->with('success', 'QualityControl deleted successfully.');
    }
}
