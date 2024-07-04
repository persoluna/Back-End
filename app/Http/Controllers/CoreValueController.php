<?php

namespace App\Http\Controllers;

use App\Models\CoreValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoreValueController extends Controller
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
        return view('corevalues.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Core_title' => 'required',
            'Core_description' => 'required',
            'Core_image' => 'required',
            'Core_alt_tag' => 'required',
        ]);


        if ($request->hasFile('Core_image')) {
            $corevalueImage = $request->file('Core_image');
            $filename = time() . '.' . $corevalueImage->getClientOriginalExtension();

            // Store the original image in the 'public/corevalues' directory
            $corevalueImage->storeAs('public/corevalues', $filename);

            $validatedData['Core_image'] = $filename;
        }

        $corevalue = CoreValue::create($validatedData);

        return redirect()->route('missions.index')->with('success', 'corevalue created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CoreValue $corevalue)
    {
        return view('corevalues.show', compact('corevalue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CoreValue $corevalue)
    {
        return view('corevalues.edit', compact('corevalue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CoreValue $corevalue)
    {
        $validatedData = $request->validate([
            'Core_title' => 'nullable',
            'Core_description' => 'nullable',
            'Core_image' => 'nullable',
            'Core_alt_tag' => 'nullable',
        ]);

        if ($request->hasFile('Core_image')) {
            // Delete the old image from the 'corevalue' fodler
            Storage::delete('public/corevalues/' . $corevalue->Core_image);

            $coreImage = $request->file('Core_image');
            $filename = time() . '.' . $coreImage->getClientOriginalExtension();

            // Store the new Core_image in the corevalues folder
            $coreImage->storeAs('public/corevalues', $filename);

            // update the Core_image field with the new Core_image filename
            $validatedData['Core_image'] = $filename;
        }

        $corevalue->update($validatedData);

        return redirect()->route('missions.index')->with('success', 'Core values update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CoreValue $corevalue)
    {
        // Delete the associated image file from the "corevalues" folder
        Storage::delete('public/corevalues/' . $corevalue->Core_image);

        $corevalue->delete();

        return redirect()->route('missions.index')->with('success', 'Core value deleted successfully.');
    }
}
