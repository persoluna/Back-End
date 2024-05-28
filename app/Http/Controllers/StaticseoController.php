<?php

namespace App\Http\Controllers;

use App\Models\Staticseo;
use Illuminate\Http\Request;

class StaticseoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staticseo = Staticseo::find(1);
        return view('staticseos.edit', compact('staticseo'));
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
    public function show(Staticseo $staticseo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staticseo $staticseo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staticseo $staticseo)
    {
        $validateData = $request->validate([
            'meta_title' => 'nullable',
            'meta_keyword' => 'nullable',
            'meta_description' => 'nullable',
            'meta_canonical' => 'nullable',
        ]);

        $staticseo->update($validateData);
        return redirect()->route('staticseos.index')->with('success', 'Static SEO updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staticseo $staticseo)
    {
        //
    }
}
