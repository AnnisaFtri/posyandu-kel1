<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JamController extends Controller
{
    // Method to display the form for adding a new jam
    public function createForm()
    {
        return view('dashboard.index');
    }

    // Method to handle the form submission and store the new jam
    public function store(Request $request)
    {
        // Validate input if necessary
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'jam' => 'required|date_format:H:i' // Input format must be HH:MM
        ]);

        // Redirect to the desired page after saving the data
        return redirect()->route('newsbabies.index')->with('success', 'Jam berhasil disimpan.');
    }
}