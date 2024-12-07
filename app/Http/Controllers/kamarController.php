<?php

namespace App\Http\Controllers;

use App\Models\Kamar;

class kamarController extends Controller
{
    public function index()
    {

        $kamar = Kamar::all();

        return view('home', compact('kamar'));
    }
}
