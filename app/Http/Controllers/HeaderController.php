<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $header = Header::find(1);
        return view('headers.edit', compact('header'));
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
    public function show(Header $header)
    {
        $header = Header::find(1);
        return view('headers.edit', compact('header'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Header $header)
    {
        $header = Header::find(1);
        return view('headers.edit', compact('header'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Header $header)
    {
        $validateData = $request->validate([
            'phone' => 'nullable',
            'email' => 'nullable',
            'logo' => 'nullable',
            'logo_alt_tag' => 'nullable',
            'fav_icon' => 'nullable',
            'icon_alt_tag' => 'nullable',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
            'meta_keyword' => 'nullable',
            'meta_canonical' => 'nullable',
        ]);

        if ($request->hasFile('logo')) {
            if ($header->logo) {
                Storage::delete('public/logos/' . $header->logo);
            }
            $filename = time() . '.' . $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->storeAs('public/logos', $filename);
            $validateData['logo'] = $filename;
        }

        if ($request->hasFile('fav_icon')) {
            if ($header->fav_icon) {
                Storage::delete('public/fav_icons/' . $header->fav_icon);
            }
            $filename = time() . '.' . $request->file('fav_icon')->getClientOriginalExtension();
            $request->file('fav_icon')->storeAs('public/fav_icons', $filename);
            $validateData['fav_icon'] = $filename;
        }

        $header->update($validateData);

        return redirect()->route('headers.index')->with('success', 'Header updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Header $header)
    {
        //
    }
}
