<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
use App\Models\PemesananKamar;
use Illuminate\Support\Facades\Log;

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
    public function accommodation()
    {
        $rooms = Kamar::all();
        return view('accomodation', compact('rooms'));
    }



    public function showAvailableRooms()
    {
        $rooms = Kamar::all();
        return view('available_room', compact('rooms'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'TipeKamar' => 'required',
            'HargaKamar' => 'required|numeric',
            'Kapasitas' => 'required|numeric',
            'JumlahKamar' => 'required|numeric',
            'Desc' => 'required',
            'Facility' => 'required',
            'Status' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('uploads', 'public');
        }

        Kamar::create([
            'TipeKamar' => $validated['TipeKamar'],
            'HargaKamar' => $validated['HargaKamar'],
            'Kapasitas' => $validated['Kapasitas'],
            'JumlahKamar' => $validated['JumlahKamar'],
            'Desc' => $validated['Desc'],
            'Facility' => $validated['Facility'],
            'Status' => $validated['Status'],
            'photo' => $validated['photo'],
        ]);


        return redirect()->route('admin_rooms')->with('success', 'Room added successfully!');
    }


    public function update(Request $request, $NoKamar)
    {
        $validated = $request->validate([
            'TipeKamar' => 'required',
            'HargaKamar' => 'required|numeric',
            'Kapasitas' => 'required|numeric',
            'JumlahKamar' => 'required|numeric',
            'Desc' => 'required',
            'Facility' => 'required',
            'Status' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $room = Kamar::findOrFail($NoKamar);

        if ($request->hasFile('photo')) {
            if ($room->photo && file_exists(storage_path('app/public/' . $room->photo))) {
                @unlink(storage_path('app/public/' . $room->photo));
            }

            $validated['photo'] = $request->file('photo')->store('uploads', 'public');
        }

        $room->update([
            'TipeKamar' => $validated['TipeKamar'],
            'HargaKamar' => $validated['HargaKamar'],
            'Kapasitas' => $validated['Kapasitas'],
            'JumlahKamar' => $validated['JumlahKamar'],
            'Desc' => $validated['Desc'],
            'Facility' => $validated['Facility'],
            'Status' => $validated['Status'],
            'photo' => $validated['photo'] ?? $room->photo,
        ]);

        return redirect()->route('admin_rooms')->with('success', 'Room updated successfully!');
    }


    public function destroy($NoKamar)
    {
        $room = Kamar::where('NoKamar', $NoKamar)->firstOrFail();

        $room->delete();

        return redirect()->route('admin_rooms')->with('success', 'Room deleted successfully!');
    }


    public function checkAvailableRooms(Request $request)
    {
        $request->validate([
            'TanggalCheckIn' => 'required|date',
            'TanggalCheckOut' => 'required|date|after:TanggalCheckIn',
            'JumlahDewasa' => 'required|integer|min:1',
        ]);

        $checkin = $request->TanggalCheckIn;
        $checkout = $request->TanggalCheckOut;
        $person = $request->JumlahDewasa;

        $availableRooms = Kamar::whereDoesntHave('reservations', function ($query) use ($checkin, $checkout) {
            $query->where('TanggalCheckIn', '<', $checkout)
                  ->where('TanggalCheckOut', '>', $checkin);
        })->where('Kapasitas', '>=', $person)->get();

        return view('available_room', compact('availableRooms', 'checkin', 'checkout', 'person'));
    }

    public function show($NoKamar)
    {
        $room = Kamar::find($NoKamar);

        if (!$room) {
            abort(404, "Room not found");
        }

        $roomImages = $this->getRoomImages($room->TipeKamar);

        $facilities = !is_null($room->Facility) ? explode(',', $room->Facility) : [];

        $roomDetails = [
            'NoKamar' => $room->NoKamar,
            'name' => $room->TipeKamar,
            'description' => $room->Desc,
            'price' => 'Rp. ' . number_format($room->HargaKamar, 0, ',', '.'),
            'facilities' => !is_null($room->Facility) ? explode(',', $room->Facility) : [],
            'images' => $this->getRoomImages($room->TipeKamar),
        ];

        return view('room_detail', compact('roomDetails'));
    }

    private function getRoomImages($type)
    {
        $images = [
            'Standard' => [
                asset('img/standar1.jpg'),
                asset('img/standar2.jpg'),
                asset('img/standar3.jpg')

            ],
            'Deluxe' => [
                asset('img/Deluxe1.jpg'),
                asset('img/Deluxe2.jpg'),
                asset('img/Deluxe3.jpg')
            ],
            'Superior' => [
                asset('img/Superior1.jpg'),
                asset('img/Superior2.jpg'),
                asset('img/Superior3.jpg')
            ],
            'Junior Suite' => [
                asset('img/Junior1.jpg'),
                asset('img/Junior2.jpg'),
                asset('img/Junior3.jpg'),
                asset('img/Junior.jpg')
            ],
            'Suite' => [
                asset('img/Suite1.jpg'),
                asset('img/Suite2.jpg'),
                asset('img/Suite3.jpg'),
                asset('img/Suite4.jpg')
            ]
        ];

        return $images[$type] ?? [];
    }
}
