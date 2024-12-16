<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\PemesananKamar;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $roomDetails = session('roomDetails');

        if (!$roomDetails) {
            abort(404, "Room details not found");
        }

        dd($roomDetails);

        return view('room_booking', compact('roomDetails'));
    }
    public function show($NoKamar)
    {
        $room = Kamar::find($NoKamar);

        if (!$room) {
            abort(404, "Room not found");
        }

        $roomDetails = [
            'NoKamar' => $room->NoKamar,
            'name' => $room->TipeKamar,
            'description' => $room->Desc ?? 'No description available',
            'price' => $room->HargaKamar,
            'formattedPrice' => 'Rp. ' . number_format($room->HargaKamar, 0, ',', '.'), // Tambahkan versi format
            'facilities' => !is_null($room->Facility) ? explode(',', $room->Facility) : [],
            'images' => $room->photo,
            'TanggalCheckIn' => session('TanggalCheckIn', ''),
            'TanggalCheckOut' => session('TanggalCheckOut', ''),
        ];



        return view('room_booking', ['roomDetails' => $roomDetails]);
    }


    public function createTransaction(Request $request)
    {
        try {
            // Log awal proses
            Log::info('Memulai proses createTransaction.', ['request_data' => $request->all()]);

            // Validasi input
            $validated = $request->validate([
                'firstName' => 'required|string|max:255',
                'lastName' => 'required|string|max:255',
                'userId' => 'required|integer|exists:user,IDUser', // Pastikan userId ada di tabel user
                'email' => 'required|email',
                'phone' => 'required|string|max:15',
                'checkin' => 'required|date',
                'checkout' => 'required|date|after:checkin',
                'person' => 'required|integer|min:1',
                'roomNumber' => 'required|integer|min:1',
            ]);

            // Ambil data kamar dari session (atau request)
            $roomDetails = session('roomDetails');
            if (!$roomDetails) {
                Log::warning('Room details not found in session.');
                return redirect()->back()->withErrors(['message' => 'Room details not found in session']);
            }

            // Simpan data transaksi
            $transaction = Transaksi::create([
                'IDUser' => $validated['userId'],
                'TanggalPembayaran' => now(),
                'MetodePembayaran' => 'Online Payment',
                'NoKartu' => null,
                'BiayaKamar' => (float)$roomDetails['price'] * (int)$validated['roomNumber'],

                'Status' => 'Pending',
            ]);

            // Log transaksi berhasil dibuat
            Log::info('Transaksi berhasil disimpan.', ['transaction' => $transaction]);

            // Simpan data pemesanan kamar
            PemesananKamar::create([
                'NoTransaksi' => $transaction->NoTransaksi,
                'NoKamar' => $roomDetails['NoKamar'],
                'TanggalPesan' => now(),
                'JumlahDewasa' => $validated['person'],
                'JumlahAnak' => 0,
                'PermintaanKhusus' => $request->input('specialRequest', ''),
                'TanggalCheckIn' => $validated['checkin'],
                'TanggalCheckOut' => $validated['checkout'],
            ]);

            // Log pemesanan kamar berhasil disimpan
            Log::info('Pemesanan kamar berhasil disimpan.', [
                'room_booking' => [
                    'NoKamar' => $roomDetails['NoKamar'],
                    'TanggalCheckIn' => $validated['checkin'],
                    'TanggalCheckOut' => $validated['checkout'],
                ],
            ]);

            // Redirect ke halaman sukses
            return redirect()->route('transaksi.success')->with('success', 'Transaksi berhasil dibuat.');
        } catch (\Exception $e) {
            // Log error jika terjadi exception
            Log::error('Terjadi error saat createTransaction.', [
                'error_message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            // Redirect kembali dengan pesan error
            return redirect()->back()->withErrors(['message' => 'Terjadi kesalahan. Silakan coba lagi.']);
        }
    }




}
