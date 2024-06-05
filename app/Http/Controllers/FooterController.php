<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $footer = Footer::find(1);
        return view('footers.edit', compact('footer'));
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
    public function show(Footer $footer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Footer $footer)
    {
        $footer = Footer::find(1);
        return view('footers.edit', compact('footer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Footer $footer)
    {
        $validateData = $request->validate([
            'news_letter' => 'nullable',
            'instagram_link' => 'nullable',
            'facebook_link' => 'nullable',
            'google_link' => 'nullable',
            'location' => 'nullable',
            'phone' => 'nullable',
            'phone2' => 'nullable',
            'email' => 'nullable',
            'email2' => 'nullable',
            'address' => 'nullable',
            'logo' => 'nullable',
            'alt_tag' => 'nullable',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
            'meta_keyword' => 'nullable',
            'meta_canonical' => 'nullable',
        ]);

        if ($request->hasFile('logo')) {
            if ($footer->logo) {
                Storage::delete('public/footer_logos/' . $footer->logo);
            }
            $filename = time() . '.' . $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->storeAs('public/footer_logos', $filename);
            $validateData['logo'] = $filename;
        }

        $footer->update($validateData);

        return redirect()->route('footers.index')->with('success', 'Footer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Footer $footer)
    {
        //
    }
}
