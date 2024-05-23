<?php

namespace App\Http\Controllers;

use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WhyChooseUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $whyChooseUsItems = WhyChooseUs::latest()->get();
        return view('whychooseus.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('whychooseus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'why_title' => 'required|max:255',
            'why_description' => 'required|max:255',
            'why_image' => 'required|image|max:2048',
            'alt_tag' => 'required|max:255',
        ]);

        if ($request->hasFile('why_image')) {
            $whyChooseUsImage = $request->file('why_image');
            $filename = time() . '.' . $whyChooseUsImage->getClientOriginalExtension();
            // Store the original image in the 'public/whychooseus' directory
            $whyChooseUsImage->storeAs('public/whychooseus', $filename);
            $validatedData['why_image'] = $filename;
        }

        $whyChooseUsItem = WhyChooseUs::create($validatedData);
        return redirect()->route('whychooseus.index')->with('success', 'Why choose us created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(WhyChooseUs $whyChooseUsItem)
    {
        return view('whychooseus.show', compact('whyChooseUsItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WhyChooseUs $whychooseus)
    {
        return view('whychooseus.edit', compact('whychooseus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WhyChooseUs $whyChooseUsItem)
    {
        $validatedData = $request->validate([
            'why_title' => 'required|max:255',
            'why_description' => 'required|max:255',
            'why_image' => 'nullable|image|max:2048',
            'alt_tag' => 'required|max:255',
        ]);

        // Check if a new image is uploaded
        if ($request->hasFile('why_image')) {
            // Delete the old image from the "whychooseus" folder
            Storage::delete('public/whychooseus/' . $whyChooseUsItem->why_image);

            // Store the new image in the "whychooseus" folder
            $WhychooseusImage = $request->file('why_image');
            $filename = time() . '.' . $WhychooseusImage->getClientOriginalExtension();
            $WhychooseusImage->storeAs('public/whychooseus', $filename);

            // Update the why_image field with the new image filename
            $validatedData['why_image'] = $filename;
        }

        $whyChooseUsItem->update($validatedData);

        return redirect()->route('whychooseus.index')->with('success', 'Why choose us updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WhyChooseUs $whyChooseUsItem)
    {
        // Delete the associated image file from the "why choose us" folder
        Storage::delete('public/whychooseus/' . $whyChooseUsItem->why_image);

        $whyChooseUsItem->delete();

        return redirect()->route('whychooseus.index')->with('success', 'Application deleted successfully.');
    }
}
