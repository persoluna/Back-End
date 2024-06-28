<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('priority')->get();
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        $maxPriority = Menu::count();
        $priorities = range(1, $maxPriority + 1);
        return view('menus.create', compact('priorities'));
    }

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
            'priority' => 'required|integer|min:1',
        ]);

        $menuImagePath = $request->file('banner_image')->store('public/menu_banners');
        $validatedData['banner_image'] = basename($menuImagePath);

        // Adjust priorities of existing menus
        Menu::where('priority', '>=', $validatedData['priority'])->increment('priority');

        $menu = Menu::create($validatedData);

        return redirect()->route('menus.index')->with('success', 'Menu created successfully.');
    }

    public function edit(Menu $menu)
    {
        $maxPriority = Menu::count();
        $priorities = range(1, $maxPriority);
        return view('menus.edit', compact('menu', 'priorities'));
    }

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
            'priority' => 'required|integer|min:1',
        ]);

        if ($request->hasFile('banner_image')) {
            Storage::delete('public/menu_banners/' . $menu->banner_image);
            $menuImagePath = $request->file('banner_image')->store('public/menu_banners');
            $validatedData['banner_image'] = basename($menuImagePath);
        }

        // Get the old priority before updating
        $oldPriority = $menu->priority;

        // Update the menu with all validated data, including the new priority
        $menu->update($validatedData);

        // Reorder priorities if necessary
        $this->reorderPriorities($menu->id, $oldPriority, $validatedData['priority']);

        return redirect()->route('menus.index')->with('success', 'Menu updated successfully.');
    }

    public function destroy(Menu $menu)
    {
        $deletedPriority = $menu->priority;

        Storage::delete('public/menu_banners/' . $menu->banner_image);
        $menu->delete();

        // Adjust priorities of remaining menus
        Menu::where('priority', '>', $deletedPriority)->decrement('priority');

        return redirect()->route('menus.index')->with('success', 'Menu deleted successfully.');
    }

    private function reorderPriorities($updatedMenuId, $oldPriority, $newPriority)
    {
        if ($oldPriority == $newPriority) {
            return; // No need to reorder if priority hasn't changed
        }

        if ($oldPriority < $newPriority) {
            // Move other items up
            Menu::where('id', '!=', $updatedMenuId)
                ->whereBetween('priority', [$oldPriority + 1, $newPriority])
                ->decrement('priority');
        } else {
            // Move other items down
            Menu::where('id', '!=', $updatedMenuId)
                ->whereBetween('priority', [$newPriority, $oldPriority - 1])
                ->increment('priority');
        }
    }
}