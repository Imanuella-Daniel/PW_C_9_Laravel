<?php

namespace App\Http\Controllers;

use App\Models\Kamar;

class AdminController extends Controller
{
    public function rooms()
    {
        $rooms = Kamar::all();
        return view('admin.rooms', compact('rooms'));
    }
}
