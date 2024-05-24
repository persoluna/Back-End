<?php
namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'profile_image' => 'required|image|max:2048',
            'alt_tag' => 'required|max:255',
        ]);

        if ($request->hasFile('profile_image')) {
            $profileImage = $request->file('profile_image');
            $filename = time() . '.' . $profileImage->getClientOriginalExtension();

            // Store the original image in the 'public/testimonials' directory
            $profileImage->storeAs('public/testimonials', $filename);

            $validatedData['profile_image'] = $filename;
        }

        $testimonial = Testimonial::create($validatedData);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        return view('testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'profile_image' => 'nullable|image|max:2048',
            'alt_tag' => 'required|max:255',
        ]);

        // Check if a new image is uploaded
        if ($request->hasFile('profile_image')) {
            // Delete the old image from the "testimonials" folder
            Storage::delete('public/testimonials/' . $testimonial->profile_image);

            // Store the new image in the "testimonials" folder
            $profileImage = $request->file('profile_image');
            $filename = time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->storeAs('public/testimonials', $filename);

            // Update the profile_image field with the new image filename
            $validatedData['profile_image'] = $filename;
        }

        $testimonial->update($validatedData);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        // Delete the associated image file from the "testimonials" folder
        Storage::delete('public/testimonials/' . $testimonial->profile_image);

        $testimonial->delete();

        return redirect()->route('testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}
