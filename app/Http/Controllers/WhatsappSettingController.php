<?php

namespace App\Http\Controllers;

use App\Models\WhatsappSetting;
use Illuminate\Http\Request;

class WhatsappSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $whatsappsetting = WhatsappSetting::first();
        return view('whatsappsettings.edit', compact('whatsappsetting'));
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
    public function show(WhatsappSetting $whatsappSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WhatsappSetting $whatsappSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WhatsappSetting $whatsappsetting)
    {
        $validatedData = $request->validate([
            'otp_message' => 'nullable',
            'api_key' => 'nullable',
            'instance_id' => 'nullable',
            'status' => 'boolean',
        ]);

        $whatsappsetting->update($validatedData);

        return redirect()->route('whatsappsettings.index')->with('success','Setting updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WhatsappSetting $whatsappSetting)
    {
        //
    }
}
