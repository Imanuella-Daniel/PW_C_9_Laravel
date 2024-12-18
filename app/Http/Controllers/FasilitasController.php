<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resources.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function accomodationPage()
    {
        $fasilitas = Fasilitas::all(); // Get all data from fasilitas table
        return view('accomodation', compact('fasilitas'));
    }

    public function availableFacilitiesPage()
    {
        $fasilitas = Fasilitas::all(); // Get all data from fasilitas table
        return view('available_facility', compact('fasilitas'));
    }

    public function showBookingPage($id) {
        $fasilitas = Fasilitas::find($id); // Use $id to find the facility
        if (!$fasilitas) {
            // Add handling if the facility is not found
            return redirect()->back()->with('error', 'Facility not found');
        }
        return view('facility_booking', compact('fasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        // Return the form for creating a new facility
        return view('fasilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'IDFasilitas' => 'required|unique:fasilitas,IDFasilitas',
            'NamaFasilitas' => 'required|string',
            'HargaFasilitas' => 'required|numeric',
            'Deskripsi' => 'required|string',
            'Fasilitas' => 'required|string',
            'Status' => 'required|string',
            'Rating' => 'required|float',
            'Gambar' => 'required|image'
        ]);

        // Store the new facility record
        Fasilitas::create($request->all());

        // Redirect with success message
        return redirect()->route('fasilitas.index')->with('success', 'Facility added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Fasilitas $fasilitas)
    {
        // Return the form for editing a specific facility
        return view('fasilitas.edit', compact('fasilitas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Fasilitas $fasilitas)
    {
        // Validate the request
        $request->validate([
            'NamaFasilitas' => 'required|string',
            'HargaFasilitas' => 'required|numeric',
            'Deskripsi' => 'required|string',
            'Fasilitas' => 'required|string',
            'Status' => 'required|string',
            'Rating' => 'required|float',
            'Gambar' => 'nullable|image'
        ]);

        // Update the facility record
        $fasilitas->update($request->all());

        // Redirect with success message
        return redirect()->route('fasilitas.index')->with('success', 'Facility updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Fasilitas $fasilitas)
    {
        // Delete the facility record
        $fasilitas->delete();

        // Redirect with success message
        return redirect()->route('fasilitas.index')->with('success', 'Facility deleted successfully.');
    }
}
