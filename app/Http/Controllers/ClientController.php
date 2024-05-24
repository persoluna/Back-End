<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::latest()->get();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_image' => 'required|image|max:2048',
            'alt_tag' => 'required|max:255',
        ]);

        if ($request->hasFile('client_image')) {
            $ClientImage = $request->file('client_image');
            $filename = time() . '.' . $ClientImage->getClientOriginalExtension();

            // Store the original image in the 'public/clients' directory
            $ClientImage->storeAs('public/clients', $filename);

            $validatedData['client_image'] = $filename;
        }

        $client = Client::create($validatedData);

        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $validatedData = $request->validate([
            'client_image' => 'nullable|image|max:2048',
            'alt_tag' => 'required|max:255',
        ]);

        // Check if a new image is uploaded
        if ($request->hasFile('client_image')) {
            // Delete the old image from the "client" folder
            Storage::delete('public/clients/' . $client->client_image);

            $ClientImage = $request->file('client_image');
            $filename = time() . '.' . $ClientImage->getClientOriginalExtension();

            // Store the original image in the 'public/clients' directory
            $ClientImage->storeAs('public/clients', $filename);

            $validatedData['client_image'] = $filename;
        }

        $client->update($validatedData);

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        // Delete the associated image file from the "clients" folder
        Storage::delete('public/clients/' . $client->client_image);

        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}
