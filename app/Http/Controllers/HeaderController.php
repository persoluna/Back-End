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
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo_alt_tag' => 'nullable',
            'fav_icon' => 'nullable|image|mimes:ico,png|max:2048',
            'icon_alt_tag' => 'nullable',
            'meta_tags' => 'nullable',
            'favicon_1' => 'nullable|image|mimes:ico,png|max:2048',
            'favicon_2' => 'nullable|image|mimes:ico,png|max:2048',
            'favicon_3' => 'nullable|image|mimes:ico,png|max:2048',
            'favicon_4' => 'nullable|image|mimes:ico,png|max:2048',
            'icon1_alt_tag' => 'nullable',
            'icon2_alt_tag' => 'nullable',
            'icon3_alt_tag' => 'nullable',
            'icon4_alt_tag' => 'nullable',
        ]);

        if ($request->hasFile('logo')) {
            if ($header->logo) {
                Storage::delete('public/logos/' . $header->logo);
            }
            $filename = time() . '_logo.' . $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->storeAs('public/logos', $filename);
            $validateData['logo'] = $filename;
        }

        if ($request->hasFile('fav_icon')) {
            if ($header->fav_icon) {
                Storage::delete('public/fav_icons/' . $header->fav_icon);
            }
            $filename = time() . '_fav_icon.' . $request->file('fav_icon')->getClientOriginalExtension();
            $request->file('fav_icon')->storeAs('public/fav_icons', $filename);
            $validateData['fav_icon'] = $filename;
        }

        // Handle new favicon uploads
        for ($i = 1; $i <= 4; $i++) {
            $field = "favicon_$i";
            if ($request->hasFile($field)) {
                if ($header->$field) {
                    Storage::delete('public/fav_icons/' . $header->$field);
                }
                $filename = time() . "_$field." . $request->file($field)->getClientOriginalExtension();
                $request->file($field)->storeAs('public/fav_icons', $filename);
                $validateData[$field] = $filename;
            }
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
