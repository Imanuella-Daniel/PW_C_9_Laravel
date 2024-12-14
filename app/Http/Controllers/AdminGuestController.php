<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PemesananKamar;
use App\Models\Transaksi;

class AdminGuestController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('searchTerm', '');
        $filter = $request->input('filter', '');

        $users = User::when($searchTerm, function ($query, $searchTerm) {
            return $query->where('NamaDepan', 'like', '%' . $searchTerm . '%')
                         ->orWhere('NamaBelakang', 'like', '%' . $searchTerm . '%');
        })
        ->when($filter, function ($query, $filter) {
            return $query->whereHas('transaksi', function ($q) use ($filter) {
                if ($filter === 'Check In') {
                    $q->where('status', 'Check In');
                } elseif ($filter === 'Check Out') {
                    $q->where('status', 'Check Out');
                }
            });
        })
        ->get();

        return view('admin_guest', compact('users', 'searchTerm', 'filter'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'NamaDepan' => 'required',
            'NamaBelakang' => 'required',
            'Email' => 'required|email',
            'NoTelepon' => 'required',
            'Negara' => 'required',
            'Alamat' => 'required',
            'Username' => 'required|unique:user',
            'Password' => 'required',
        ]);

        User::create($data);

        return redirect()->route('admin_guest')->with('success', 'Guest added successfully');
    }

}
