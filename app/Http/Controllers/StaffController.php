<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = Staff::latest()->get();
        return view('staffs.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staffs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'staff_id' => 'required|numeric',
            'name' => 'nullable',
            'job_title' => 'nullable',
            'photo' => 'nullable',
        ]);


        if ($request->hasFile('photo')) {
            $staffPhoto = $request->file('photo');
            $filename = time() . '.' . $staffPhoto->getClientOriginalExtension();

            // Store the original image in the 'public/staffs' directory
            $staffPhoto->storeAs('public/staffs', $filename);

            $validatedData['photo'] = $filename;
        }

        $staff = Staff::create($validatedData);

        return redirect()->route('staffs.index')->with('success', 'Staff created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        return view('staffs.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        return view('staffs.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        $validatedData = $request->validate([
            'staff_id' => 'required',
            'name' => 'nullable',
            'job_title' => 'nullable',
            'photo' => 'nullable',
        ]);

        if ($request->hasFile('photo')) {
            // Delete the old image from the 'staff' fodler
            Storage::delete('public/staffs/' . $staff->photo);

            $staffPhoto = $request->file('photo');
            $filename = time() . '.' . $staffPhoto->getClientOriginalExtension();

            // Store the new photo in the staffs folder
            $staffPhoto->storeAs('public/staffs', $filename);

            // update the photo field with the new photo filename
            $validatedData['photo'] = $filename;
        }

        $staff->update($validatedData);

        return redirect()->route('staffs.index')->with('success', 'Staff update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        // Delete the associated image file from the "staffs" folder
        Storage::delete('public/staffs/' . $staff->photo);

        $staff->delete();

        return redirect()->route('staffs.index')->with('success', 'Staff deleted successfully.');
    }
}
