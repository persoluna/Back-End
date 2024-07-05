<?php

namespace App\Http\Controllers;

use App\Models\Script;
use Illuminate\Http\Request;

class ScriptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $script = Script::firstOrCreate(['id' => 1]);
        return view('scripts.edit', compact('script'));
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
    public function show(Script $script)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Script $script)
    {
        $script = Script::firstOrCreate(['id' => 1]);
        return view('scripts.edit', compact('script'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Script $script)
    {
        $validateData = $request->validate([
            'script_1' => 'nullable',
            'script_2' => 'nullable',
            'script_3' => 'nullable',
        ]);

        $script = Script::firstOrCreate(['id' => 1]);
        $script->update($validateData);

        return redirect()->route('scripts.edit', $script->id)->with('success', 'Script updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Script $script)
    {
        //
    }
}
