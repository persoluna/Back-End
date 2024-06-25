<?php

namespace App\Http\Controllers;

use App\Models\CareerInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CareerInquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $careerinquiries = CareerInquiry::latest()->get();
        return view('careerinquiries.index');
    }

    // Method to download the resume file
    public function downloadResume($id)
    {
        $careerinquiry = CareerInquiry::findOrFail($id);
        $fileName = $careerinquiry->resume;
        $filePath = 'public/careerinquiries/' . $fileName;

        if (!Storage::exists($filePath)) {
            abort(404, 'File not found.');
        }

        return Storage::download($filePath, $fileName);
    }

     // Method to view the resume file
    public function viewResume($id)
    {
        $careerinquiry = CareerInquiry::findOrFail($id);
        $fileName = $careerinquiry->resume;
        $filePath = 'public/careerinquiries/' . $fileName;

        if (!Storage::exists($filePath)) {
            abort(404, 'File not found.');
        }

        return response()->file(storage_path('app/public/careerinquiries/' . $fileName));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CareerInquiry $careerinquiry)
    {
        return view('careerinquiries.show', compact('careerinquiry'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CareerInquiry $careerInquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CareerInquiry $careerInquiry)
    {
        //
    }

 // Method to delete a career inquiry and its associated file
    public function destroy(CareerInquiry $careerinquiry)
    {
        // Delete the file from storage
        $filePath = 'public/careerinquiries/' . $careerinquiry->resume;

        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }

        // Delete the career inquiry record from database
        $careerinquiry->delete();

        return redirect()->route('careerinquiries.index')
            ->with('success', 'Career inquiry deleted successfully.');
    }
}
