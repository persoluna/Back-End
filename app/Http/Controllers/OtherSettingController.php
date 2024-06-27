<?php

namespace App\Http\Controllers;

use App\Models\OtherSetting;
use Illuminate\Http\Request;

class OtherSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $othersetting = OtherSetting::first();
        return view('othersettings.edit', compact('othersetting'));
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
    public function show(OtherSetting $otherSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OtherSetting $othersetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OtherSetting $othersetting)
    {
        $validatedData = $request->validate([
            'analytics_code' => 'nullable',
            'facebook_code' => 'nullable',
            'status' => 'boolean',
        ]);

        $othersetting->update($validatedData);

        return redirect()->route('othersettings.index')->with('success','Setting updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OtherSetting $otherSetting)
    {
        //
    }
}
