<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\PemesananKamar;
use App\Models\Kamar;

class AdminGuestController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('searchTerm', '');
        $filter = $request->input('filter', '');

        $users = PemesananKamar::with(['user', 'kamar', 'transaksi'])
            ->when($filter, function ($query, $filter) {
                if ($filter === 'Check In') {
                    $query->whereNotNull('TanggalCheckIn');
                } elseif ($filter === 'Check Out') {
                    $query->whereNotNull('TanggalCheckOut');
                }
            })
            ->when($searchTerm, function ($query, $searchTerm) {
                $query->where('NoTransaksi', 'LIKE', "%{$searchTerm}%")
              ->orWhere('IDPesanan', 'LIKE', "%{$searchTerm}%")
              ->orWhere('NoKamar', 'LIKE', "%{$searchTerm}%");
            })
            ->get();

        $transaksis = Transaksi::all();
        $kamar = Kamar::all();

        return view('admin_guest', [
            'users' => $users,
            'searchTerm' => $searchTerm,
            'filter' => $filter,
            'kamar' => $kamar,
            'transaksis' => $transaksis
        ]);
    }

    public function showForm()
    {
        $kamar = Kamar::all();
        return view('admin_guest', compact('kamar'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'NoKamar' => 'required|exists:kamar,NoKamar',
            'TanggalPesan' => 'required|date',
            'JumlahDewasa' => 'required|integer',
            'JumlahAnak' => 'required|integer',
            'PermintaanKhusus' => 'nullable|string',
            'TanggalCheckIn' => 'nullable|date',
            'TanggalCheckOut' => 'nullable|date',
        ]);

        PemesananKamar::create($validated);
        return redirect()->route('admin_guest')->with('success', 'Reservation added successfully.');
    }

    public function update(Request $request, $id)
    {
        $user = PemesananKamar::findOrFail($id);

        $user->NoKamar = $request->input('NoKamar');
        $user->NoTransaksi = $request->input('NoTransaksi');
        $user->TanggalPesan = $request->input('TanggalPesan');
        $user->JumlahDewasa = $request->input('JumlahDewasa');
        $user->JumlahAnak = $request->input('JumlahAnak');
        $user->PermintaanKhusus = $request->input('PermintaanKhusus');
        $user->TanggalCheckIn = $request->input('TanggalCheckIn');
        $user->TanggalCheckOut = $request->input('TanggalCheckOut');

        $user->save();

        return redirect()->route('admin_guest')->with('success', 'Data updated successfully');
    }

    public function destroy($id)
    {
        $reservation = PemesananKamar::findOrFail($id);
        $reservation->delete();
        return redirect()->route('admin_guest')->with('success', 'Reservation deleted successfully.');
    }




}
