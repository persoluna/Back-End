<?php

namespace App\Http\Controllers;

use App\Exports\CountersExport;
use App\Imports\CountersImport;
use App\Models\Counter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $counters = Counter::latest()->get();
        return view('counters.index', compact('counters'));
    }

    /**
     */
    public function export()
    {
        return Excel::download(new CountersExport, 'counters.xlsx');
    }

    /**
     *
     */
    public function import(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'file' => 'required|max:2048',
        ]);

        Excel::import(new CountersImport, $request->file('file'));

        return back()->with('success', 'Counters imported successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('counters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'sign' => 'required',
            'number' => 'required|numeric',
            'icon' => 'nullable|max:255',
            'alt_tag' => 'nullable|max:255',
        ]);

        if ($request->hasFile('icon')) {
            $counterIcon = $request->file('icon');
            $filename = time() . '.' . $counterIcon->getClientOriginalExtension();

            // Store the original image in the 'public/counters' directory
            $counterIcon->storeAs('public/counters', $filename);

            $validatedData['icon'] = $filename;
        }

        $counter = Counter::create($validatedData);

        return redirect()->route('counters.index')->with('success', 'Counter created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Counter $counter)
    {
        return view('counters.show', compact('counter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Counter $counter)
    {
        return view('counters.edit', compact('counter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Counter $counter)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'sign' => 'required',
            'number' => 'required|numeric',
            'icon' => 'nullable|max:255',
            'alt_tag' => 'nullable|max:255',
        ]);

        if ($request->hasFile('icon')) {
            // Delete the old icon from the "counters" folder
            Storage::delete('public/counters/' . $counter->icon);

            $counterIcon = $request->file('icon');
            $filename = time() . '.' . $counterIcon->getClientOriginalExtension();

            // Store the new icon in the 'public/counters' directory
            $counterIcon->storeAs('public/counters', $filename);

            // Update the icon field with the new icon filename
            $validatedData['icon'] = $filename;
        }

        $counter->update($validatedData);

        return redirect()->route('counters.index')->with('success', 'Counter updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Counter $counter)
    {
        // Delete the associated image file from the "banners" folder
        Storage::delete('public/counters/' . $counter->icon);

        $counter->delete();

        return redirect()->route('counters.index')->with('success', 'counter deleted successfully.');
    }
}
