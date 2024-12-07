<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }


    public function editProfile()
    {
        $user = Auth::user();
        return view('editProfile', compact('user'));
    }
    public function updateProfile(Request $request)
    {
        $user = Auth::user();


        Log::info($request->all());

        $validated = $request->validate([
            'NamaDepan' => 'required|string|max:255',
            'NamaBelakang' => 'required|string|max:255',
            'Email' => 'required|email|max:255',
            'NoTelepon' => 'nullable|string|max:15',
            'Negara' => 'nullable|string|max:100',
            'Alamat' => 'nullable|string|max:500',
            'Username' => 'nullable|string|max:255',
            'Password' => 'nullable|string|min:6',
        ]);

        if ($request->filled('Password')) {
            $validated['Password'] = bcrypt($request->Password);
        }


        //$user->update($validated);

        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }




    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }
        return view('users.show', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);  // Mencari user berdasarkan ID
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        $user->update($request->all());  // Memperbarui user dengan data dari request

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }
}
