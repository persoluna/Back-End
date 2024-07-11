<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\MasterCatalog;

class MasterCatalogController extends Controller
{
    public function index()
    {
        return $this->edit();
    }

    public function edit()
    {
        $masterCatalog = MasterCatalog::first();
        return view('master-catalog.edit', compact('masterCatalog'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'catalog_pdf' => 'nullable|mimes:pdf|max:10240',
        ]);

        $masterCatalog = MasterCatalog::first() ?? new MasterCatalog();

        if ($request->hasFile('catalog_pdf')) {
            // Delete old file if exists
            if ($masterCatalog->catalog_pdf) {
                Storage::delete('public/master_catalog/' . $masterCatalog->catalog_pdf);
            }

            $filename = 'master_catalog_' . time() . '.pdf';
            $request->file('catalog_pdf')->storeAs('public/master_catalog', $filename);
            $masterCatalog->catalog_pdf = $filename;
        }

        $masterCatalog->save();

        return redirect()->route('master-catalog.index')->with('success', 'Master catalog updated successfully.');
    }

    public function destroy()
    {
        $masterCatalog = MasterCatalog::first();
        if ($masterCatalog) {
            if ($masterCatalog->catalog_pdf) {
                Storage::delete('public/master_catalog/' . $masterCatalog->catalog_pdf);
            }
            $masterCatalog->delete();
        }
        return redirect()->route('master-catalog.index')->with('success', 'Master catalog deleted successfully.');
    }
}