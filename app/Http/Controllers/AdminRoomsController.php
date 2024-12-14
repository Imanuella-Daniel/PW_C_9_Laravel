<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class AdminRoomsController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('searchTerm', '');
        $filter = $request->input('filter', 'All');

        $query = Kamar::query();

        if ($searchTerm) {
            $query->where('NoKamar', 'LIKE', '%' . $searchTerm . '%');
        }

        if ($filter !== 'All') {
            $query->where('Status', $filter);
        }

        $filteredRooms = $query->get();

        return view('admin_rooms', [
            'filteredRooms' => $filteredRooms,
            'searchTerm' => $searchTerm,
            'filter' => $filter,
        ]);
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'TipeKamar' => 'required',
            'HargaKamar' => 'required|numeric',
            'Kapasitas' => 'required|numeric',
            'JumlahKamar' => 'required|numeric',
            'Floor' => 'required|numeric',
            'Facility' => 'required',
            'Status' => 'required',
        ]);

        Kamar::create($validated);

        return redirect()->route('admin_rooms')->with('success', 'Room added successfully!');
    }


    public function update(Request $request, $NoKamar)
    {
        $validated = $request->validate([
            'TipeKamar' => 'required',
            'HargaKamar' => 'required|numeric',
            'Kapasitas' => 'required|numeric',
            'JumlahKamar' => 'required|numeric',
            'Floor' => 'required|numeric',
            'Facility' => 'required',
            'Status' => 'required',
        ]);

        $room = Kamar::findOrFail($NoKamar);
        $room->update($validated);

        return redirect()->route('admin_rooms')->with('success', 'Room updated successfully!');
    }


    public function destroy($NoKamar)
    {
        $room = Kamar::where('NoKamar', $NoKamar)->firstOrFail();

        $room->delete();

        return redirect()->route('admin_rooms')->with('success', 'Room deleted successfully!');
    }


}
