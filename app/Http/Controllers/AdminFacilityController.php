<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;

class AdminFacilityController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('searchTerm', '');
        $filter = $request->input('filter', 'All');

        $query = Fasilitas::query();

        if ($searchTerm) {
            $query->where('NamaFasilitas', 'LIKE', '%' . $searchTerm . '%');
        }

        if ($filter !== 'All') {
            $query->where('Status', $filter);
        }

        $filteredFacilities = $query->get();

        return view('admin_facilities.index', [
            'filteredFacilities' => $filteredFacilities,
            'searchTerm' => $searchTerm,
            'filter' => $filter,
        ]);
    }

    public function show($IDFasilitas)
    {
        // Menampilkan detail fasilitas berdasarkan IDFasilitas
        $fasilitas = Fasilitas::find($IDFasilitas);

        if (!$fasilitas) {
            abort(404, 'Fasilitas not found');
        }

        // Using an object instead of an array
        $facilityDetails = (object)[
            'IDFasilitas' => $fasilitas->IDFasilitas,
            'name' => $fasilitas->NamaFasilitas,
            'status' => $fasilitas->Status,
            'description' => $fasilitas->Deskripsi,
            'price' => 'Rp. ' . number_format((float) $fasilitas->Biaya, 0, ',', '.'),
            'facilities' => !is_null($fasilitas->Facility) ? explode(',', $fasilitas->Facility) : [],
            'image' => asset($fasilitas->Gambar),
        ];        

        return view('facility_detail', compact('facilityDetails'));
    }

    public function store(Request $request)
    {
        // Validasi input dan simpan fasilitas baru 
        $validated = $request->validate([
            'NamaFasilitas' => 'required',
            'Deskripsi' => 'required',
            'Biaya' => 'required|numeric',
            'Status' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('uploads', 'public');
        }

        Fasilitas::create([
            'NamaFasilitas' => $validated['NamaFasilitas'],
            'Deskripsi' => $validated['Deskripsi'],
            'Biaya' => $validated['Biaya'],
            'Status' => $validated['Status'],
            'photo' => $validated['photo'] ?? null,
        ]);

        return redirect()->route('admin_facilities')->with('success', 'Fasilitas added successfully!');
    }

    public function update(Request $request, $IDFasilitas)
    {
        // Validasi input dan update fasilitas yang ada
        $validated = $request->validate([
            'NamaFasilitas' => 'required',
            'Deskripsi' => 'required',
            'Biaya' => 'required|numeric',
            'Status' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $fasilitas = Fasilitas::findOrFail($IDFasilitas);

        if ($request->hasFile('photo')) {
            if ($fasilitas->photo && file_exists(storage_path('app/public/' . $fasilitas->photo))) {
                @unlink(storage_path('app/public/' . $fasilitas->photo));
            }

            $validated['photo'] = $request->file('photo')->store('uploads', 'public');
        }

        $fasilitas->update([
            'NamaFasilitas' => $validated['NamaFasilitas'],
            'Deskripsi' => $validated['Deskripsi'],
            'Biaya' => $validated['Biaya'],
            'Status' => $validated['Status'],
            'photo' => $validated['photo'] ?? $fasilitas->photo,
        ]);

        return redirect()->route('admin_facilities')->with('success', 'Fasilitas updated successfully!');
    }

    public function destroy($IDFasilitas)
    {
        $fasilitas = Fasilitas::findOrFail($IDFasilitas);

        // Menghapus fasilitas
        $fasilitas->delete();

        return redirect()->route('admin_facilities')->with('success', 'Fasilitas deleted successfully!');
    }
}
