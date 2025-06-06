<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\PemesananKamar;
use App\Models\Transaksi;
use App\Models\User;
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

        // Menyiapkan data kamar
        $roomDetails = [
            'NoKamar' => $room->NoKamar,
            'name' => $room->TipeKamar,
            'description' => $room->Desc ?? 'No description available',
            'price' => $room->HargaKamar,
            'formattedPrice' => 'Rp. ' . number_format($room->HargaKamar, 0, ',', '.'),
            'facilities' => $room->Facility,
            'images' => $room->photo,
            'TanggalCheckIn' => session('TanggalCheckIn', ''),
            'TanggalCheckOut' => session('TanggalCheckOut', ''),
        ];

        // Menyimpan data kamar dalam sesi
        session(['roomDetails' => $roomDetails]);

        // Mengembalikan data kamar ke view
        return view('room_booking', ['roomDetails' => $roomDetails]);
    }


    public function createTransaction(Request $request)
    {
        try {
            Log::info('Memulai proses createTransaction.', ['request_data' => $request->all()]);
            $validated = $request->validate([
                'firstName' => 'required|string|max:255',
                'lastName' => 'required|string|max:255',
                'IDUser' => 'exists:user,IDUser',
                'email' => 'required|email',
                'PermintaanKhusus' => 'required|string',
                'phone' => 'required|string|max:15',
                'checkin' => 'required|date',
                'checkout' => 'required|date|after:checkin',
                'person' => 'required|integer|min:1|max:4',
                'payment_option' => 'required|string|in:bank_transfer,e_money',
                'NoKartu' => 'required|string',
            ]);


            $roomDetails = session('roomDetails');
            if (!$roomDetails) {
                Log::warning('Room details not found in session.');
                return redirect()->back()->withErrors(['message' => 'Room details not found in session']);
            }


            $checkin = new \DateTime($validated['checkin']);
            $checkout = new \DateTime($validated['checkout']);
            $days = $checkout->diff($checkin)->days;

            $totalPrice = (float)$roomDetails['price'] * $days;

            $transaction = Transaksi::create([
                'IDUser' => $validated['IDUser'],
                'TanggalPembayaran' => now(),
                'MetodePembayaran' => $validated['payment_option'],
                'NoKartu' => $request->input('NoKartu'),
                'BiayaKamar' => $totalPrice,
                'Status' => 'Berhasil'
            ]);
            Log::info('Transaksi berhasil disimpan.', ['transaction' => $transaction]);

            Log::info('User ID: ' . $request->input('IDUser'));


            PemesananKamar::create([
                'NoTransaksi' => $transaction->NoTransaksi,
                'NoKamar' => $roomDetails['NoKamar'],
                'TanggalPesan' => now(),
                'JumlahDewasa' => $validated['person'],
                'JumlahAnak' => 0,
                'PermintaanKhusus' => $request->input('PermintaanKhusus', ''),
                'TanggalCheckIn' => $validated['checkin'],
                'TanggalCheckOut' => $validated['checkout']
            ]);

            Log::info('Pemesanan kamar berhasil disimpan.', [
                'room_booking' => [
                    'NoKamar' => $roomDetails['NoKamar'],
                    'TanggalCheckIn' => $validated['checkin'],
                    'TanggalCheckOut' => $validated['checkout']
                ]
            ]);

            return redirect()->route('profile')->with('success', 'Transaksi berhasil dibuat.');

        } catch (\Exception $e) {
            Log::error('Terjadi error saat createTransaction.', [
                'error_message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()
                ->withErrors(['message' => 'Terjadi kesalahan. Silakan coba lagi.'])
                ->withInput();
        }
    }

}
