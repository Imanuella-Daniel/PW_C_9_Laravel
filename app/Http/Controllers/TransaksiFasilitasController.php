<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\PemesananFasilitas;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class TransaksiFasilitasController extends Controller
{
    public function index()
    {
        $facilityDetails = session('facilityDetails');

        if (!$facilityDetails) {
            abort(404, "Facility details not found");
        }

        dd($facilityDetails);

        return view('facility_booking', compact('facilityDetails'));
    }

    public function show($IDFasilitas)
    {
        $facility = Fasilitas::find($IDFasilitas);

        if (!$facility) {
            abort(404, "Facility not found");
        }

        // Menyiapkan data fasilitas
        $facilityDetails = [
            'IDFasilitas' => $facility->IDFasilitas,
            'name' => $facility->NamaFasilitas,
            'description' => $facility->Deskripsi ?? 'No description available',
            'price' => $facility->Biaya,
            'formattedPrice' => 'Rp. ' . number_format($facility->Biaya, 0, ',', '.'),
            'facilities' => $facility->Facility,
            'images' => $facility->Gambar,
            'TanggalBooking' => session('TanggalBooking', ''),
        ];

        // Menyimpan data fasilitas dalam sesi
        session(['facilityDetails' => $facilityDetails]);

        // Mengembalikan data fasilitas ke view
        return view('facility_booking', ['facilityDetails' => $facilityDetails]);
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
                'phone' => 'required|string|max:15',
                'bookingDate' => 'required|date',
                'payment_option' => 'required|string|in:bank_transfer,e_money',
                'NoKartu' => 'required|string',
            ]);

            $facilityDetails = session('facilityDetails');
            if (!$facilityDetails) {
                Log::warning('Facility details not found in session.');
                return redirect()->back()->withErrors(['message' => 'Facility details not found in session']);
            }

            $bookingDate = new \DateTime($validated['bookingDate']);
            $totalPrice = (float)$facilityDetails['price']; // Assuming a one-time payment for the facility

            // Create the transaction
            $transaction = Transaksi::create([
                'IDUser' => $validated['IDUser'],
                'TanggalPembayaran' => now(),
                'MetodePembayaran' => $validated['payment_option'],
                'NoKartu' => $request->input('NoKartu'),
                'BiayaFasilitas' => $totalPrice,
                'Status' => 'Berhasil',
            ]);
            Log::info('Transaksi fasilitas berhasil disimpan.', ['transaction' => $transaction]);

            PemesananFasilitas::create([
                'NoTransaksi' => $transaction->NoTransaksi,
                'IDFasilitas' => $facilityDetails['IDFasilitas'],
                'TanggalPesan' => now(),
                'TanggalBooking' => $validated['bookingDate'],
                'PermintaanKhusus' => $request->input('PermintaanKhusus', ''),
            ]);

            Log::info('Pemesanan fasilitas berhasil disimpan.', [
                'facility_booking' => [
                    'IDFasilitas' => $facilityDetails['IDFasilitas'],
                    'TanggalBooking' => $validated['bookingDate'],
                ]
            ]);

            return redirect()->route('profile')->with('success', 'Transaksi fasilitas berhasil dibuat.');

        } catch (\Exception $e) {
            Log::error('Terjadi error saat createTransaction fasilitas.', [
                'error_message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()
                ->withErrors(['message' => 'Terjadi kesalahan. Silakan coba lagi.'])
                ->withInput();
        }
    }
}
