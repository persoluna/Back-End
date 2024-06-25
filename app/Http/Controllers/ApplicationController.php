<?php

namespace App\Http\Controllers;

use App\Exports\ApplicationsExport;
use App\Imports\ApplicationsImport;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = Application::latest()->get();
        return view('applications.index', compact('applications'));
    }

    /**
     */
    public function export()
    {
        return Excel::download(new ApplicationsExport, 'applications.xlsx');
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

        Excel::import(new ApplicationsImport, $request->file('file'));

        return back()->with('success', 'Applications imported successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('applications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'application_title' => 'required|max:255',
            'application_description' => 'required|max:255',
            'application_image' => 'required|image|max:2048',
            'alt_tag' => 'required|max:255',
        ]);

        if ($request->hasFile('application_image')) {
            $ApplicationImage = $request->file('application_image');
            $filename = time() . '.' . $ApplicationImage->getClientOriginalExtension();

            // Store the original image in the 'public/applications' directory
            $ApplicationImage->storeAs('public/applications', $filename);

            $validatedData['application_image'] = $filename;
        }

        $application = Application::create($validatedData);

        return redirect()->route('applications.index')->with('success', 'Application created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        return view('applications.show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        return view('applications.edit', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        $validatedData = $request->validate([
            'application_title' => 'required|max:255',
            'application_description' => 'required|max:255',
            'application_image' => 'nullable|image|max:2048',
            'alt_tag' => 'required|max:255',
        ]);

        // Check if a new image is uploaded
        if ($request->hasFile('application_image')) {
            // Delete the old image from the "applications" folder
            Storage::delete('public/applications/' . $application->application_image);

            // Store the new image in the "applications" folder
            $ApplicationImage = $request->file('application_image');
            $filename = time() . '.' . $ApplicationImage->getClientOriginalExtension();
            $ApplicationImage->storeAs('public/applications', $filename);

            // Update the application_image field with the new image filename
            $validatedData['application_image'] = $filename;
        }

        $application->update($validatedData);

        return redirect()->route('applications.index')->with('success', 'Application updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        // Delete the associated image file from the "applications" folder
        Storage::delete('public/applications/' . $application->application_image);

        $application->delete();

        return redirect()->route('applications.index')->with('success', 'Application deleted successfully.');
    }
}
