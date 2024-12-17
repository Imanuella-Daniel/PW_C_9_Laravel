<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function accomodationPage()
    {
        $kamar = Kamar::all(); // Ambil semua data dari tabel kamar
        return view('accomodation', compact('kamar'));
    }

    public function availableRoomsPage()
    {
        $kamar = Kamar::all(); // Ambil semua data dari tabel kamar
        return view('available_room', compact('kamar'));
    }

    public function showBookingPage($id) {
        $kamar = Kamar::find($id); // Gunakan $id, bukan $NoKamar
        if (!$kamar) {
            // Tambahkan handling jika data tidak ditemukan
            return redirect()->back()->with('error', 'Room not found');
        }
        return view('room_booking', compact('kamar'));
    }
    
//belum kepake
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        // Return the form for creating a new room
        return view('kamar.create');
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
            'NoKamar' => 'required|unique:kamar,NoKamar',
            'TipeKamar' => 'required|string',
            'HargaKamar' => 'required|numeric',
            'Kapasitas' => 'required|integer',
            'JumlahKamar' => 'required|integer',
            'Floor' => 'required|integer',
            'Facility' => 'required|string',
            'Status' => 'required|string',
            'Rating' => 'required|float',
            'Deskripsi' => 'required|string'
        ]);

        // Create a new room record
        Kamar::create($request->all());

        // Redirect with success message
        return redirect()->route('kamar.index')->with('success', 'Room added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Kamar $kamar)
    {
        // Return the form for editing a specific room
        return view('kamar.edit', compact('kamar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Kamar $kamar)
    {
        // Validate the request
        $request->validate([
            'TipeKamar' => 'required|string',
            'HargaKamar' => 'required|numeric',
            'Kapasitas' => 'required|integer',
            'JumlahKamar' => 'required|integer',
            'Floor' => 'required|integer',
            'Facility' => 'required|string',
            'Status' => 'required|string',
            'Rating' => 'required|float',
            'Deskripsi' => 'required|string'
        ]);

        // Update the room record
        $kamar->update($request->all());

        // Redirect with success message
        return redirect()->route('kamar.index')->with('success', 'Room updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Kamar $kamar)
    {
        // Delete the room record
        $kamar->delete();

        // Redirect with success message
        return redirect()->route('kamar.index')->with('success', 'Room deleted successfully.');
    }
    
}
