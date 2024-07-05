<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $benefits = Benefit::latest()->get();
        return view('benefits.index', compact('benefits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('benefits.create');
    }

    public function demo($id)
    {
        $benefit = Benefit::find($id);

        if (!$benefit) {
            return response()->json(['message' => 'Benefit not found'], 404);
        }

        return response()->json($benefit, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable',
        ]);

        $benefitImagePath = $request->file('image')->store('public/benefit_images');
        $validatedData['image'] = basename($benefitImagePath);

        $benefit = Benefit::create($validatedData);

        return redirect()->route('benefits.index')->with('success', 'benefit created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Benefit $benefit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Benefit $benefit)
    {
        return view('benefits.edit', compact('benefit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Benefit $benefit)
    {
        $validateData = $request->validate([
            'title' => 'nullable|max:255',
            'description' => 'required',
            'image' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            Storage::delete('public/benefit_images/' . $benefit->image);

            // Store new image
            $benefitImagePath = $request->file('image')->store('public/benefit_images');
            $validateData['image'] = basename($benefitImagePath);

        }

        $benefit->update($validateData);

        return redirect()->route('benefits.index')->with('success', 'Benefit updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Benefit $benefit)
    {
        // Retrieve all products that have the benefit ID in their benefit_ids field
        $products = Product::where('benefit_ids', 'like', '%' . $benefit->id . '%')->get();

        foreach ($products as $product) {
            // Decode the JSON array of benefit IDs
            $benefitIds = json_decode($product->benefit_ids, true);

            // Remove the benefit ID from the array
            $benefitIds = array_filter($benefitIds, function($id) use ($benefit) {
                return $id != $benefit->id;
            });

            // Encode the array back to JSON and update the product
            $product->benefit_ids = json_encode(array_values($benefitIds));
            $product->save();
        }

        // Delete the image from the 'public/benefit_images/' directory
        Storage::delete('public/benefit_images/' . $benefit->image);

        $benefit->delete();

        return redirect()->route('benefits.index')->with('success', 'Benefit deleted successfully.');
    }
}
