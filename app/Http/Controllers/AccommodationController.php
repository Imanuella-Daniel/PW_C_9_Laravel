<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Fasilitas;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    public function index()
    {
        // Fetch all rooms
        $rooms = Kamar::all();

        // Fetch all facilities (or specific ones if needed)
        $facilities = Fasilitas::all();

        // Return the view with the fetched data
        return view('accomodation', compact('rooms', 'facilities'));
    }
}
