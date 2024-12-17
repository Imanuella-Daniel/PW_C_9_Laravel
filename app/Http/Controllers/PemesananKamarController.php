<?php

namespace App\Http\Controllers;

use App\Models\PemesananKamar;
use Illuminate\Http\Request;

class PemesananKamarController extends Controller
{
    // Menampilkan semua data pemesanan kamar
    public function index()
    {
        $pemesanans = PemesananKamar::with(['user', 'transaksi', 'kamar'])->get();
        return response()->json($pemesanans, 200);
    }

    // Menampilkan detail pemesanan kamar berdasarkan ID
    public function show($id)
    {
        $pemesanan = PemesananKamar::with(['user', 'transaksi', 'kamar'])->find($id);
        
        if (!$pemesanan) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        return response()->json($pemesanan, 200);
    }

    // Menambahkan data pemesanan kamar
    public function store(Request $request)
    {
        $validated = $request->validate([
            'NoTransaksi' => 'required|exists:transaksis,NoTransaksi',
            'NoKamar' => 'required|exists:kamars,NoKamar',
            'TanggalPesan' => 'required|date',
            'JumlahTamu' => 'required|integer',
            'PermintaanKhusus' => 'nullable|string',
            'TanggalCheckIn' => 'required|date|after_or_equal:TanggalPesan',
            'TanggalCheckOut' => 'required|date|after:TanggalCheckIn',
        ]);

        $pemesanan = PemesananKamar::create($validated);

        return response()->json($pemesanan, 201);
    }

    // Mengupdate data pemesanan kamar
    public function update(Request $request, $id)
    {
        $pemesanan = PemesananKamar::find($id);

        if (!$pemesanan) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $validated = $request->validate([
            'NoTransaksi' => 'nullable|exists:transaksis,NoTransaksi',
            'NoKamar' => 'nullable|exists:kamars,NoKamar',
            'TanggalPesan' => 'nullable|date',
            'JumlahTamu' => 'nullable|integer',
            'PermintaanKhusus' => 'nullable|string',
            'TanggalCheckIn' => 'nullable|date|after_or_equal:TanggalPesan',
            'TanggalCheckOut' => 'nullable|date|after:TanggalCheckIn',
        ]);

        $pemesanan->update($validated);

        return response()->json($pemesanan, 200);
    }

    // Menghapus data pemesanan kamar
    public function destroy($id)
    {
        $pemesanan = PemesananKamar::find($id);

        if (!$pemesanan) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $pemesanan->delete();

        return response()->json(['message' => 'Data deleted successfully'], 200);
    }
}
