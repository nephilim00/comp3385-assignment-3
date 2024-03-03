<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    // Method to show the form for adding a new client
    public function create()
    {
        return view('clients.create');
    }

    // Method to process the form submission
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:clients',
            'telephone' => 'required|max:255',
            'address' => 'required|max:255',
            'company_logo' => 'required|image|max:2048', // 2MB Max
        ]);

        // Handle the file upload
        if ($request->hasFile('company_logo')) {
            $filename = $request->file('company_logo')->store('company_logos', 'public');
            $validatedData['company_logo'] = $filename;
        }

        // Create the client record
        Client::create($validatedData);

        // Redirect to the dashboard with a success message
        return redirect()->route('dashboard')->with('success', 'Client added successfully.');
    }
}
