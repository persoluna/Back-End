<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::latest()->get();
        return view('menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'page_name' => 'required|max:255',
            'slug' => 'required|unique:menus|max:255',
            'banner_image' => 'required',
            'alt_tag' => 'required|max:255',
            'meta_title' => 'required|max:255',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'meta_canonical' => 'required|url',
        ]);

        $menuImagePath = $request->file('banner_image')->store('public/menu_banners');
        $validatedData['banner_image'] = basename($menuImagePath);

        $menu = Menu::create($validatedData);

        return redirect()->route('menus.index')->with('success', 'Menu created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $validatedData = $request->validate([
            'page_name' => 'nullable|max:255',
            'slug' => 'nullable',
            'banner_image' => 'nullable',
            'alt_tag' => 'nullable|max:255',
            'meta_title' => 'nullable|max:255',
            'meta_keywords' => 'nullable',
            'meta_description' => 'nullable',
            'meta_canonical' => 'nullable|url',
        ]);

        // Check if a new banner image is uploaded
        if ($request->hasFile('banner_image')) {
            // Delete the old banner image from the 'public/menu_banners/' directory
            Storage::delete('public/menu_banners/' . $menu->banner_image);

            // Store the new banner image in the 'public/menu_banners' directory
            $manuImagePath = $request->file('banner_image')->store('public/menu_banners');
            $validatedData['banner_image'] = basename($manuImagePath);
        }

        $menu->update($validatedData);

        return redirect()->route('menus.index')->with('success', 'Menu updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        // Delete the banner image from the 'public/menu_banners/' directory
        Storage::delete('public/menu_banners/' . $menu->banner_image);

        $menu->delete();

        return redirect()->route('menus.index')->with('success', 'Menu deleted successfully.');
    }
}
