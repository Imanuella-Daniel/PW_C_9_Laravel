<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('signup');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        Log::info('Login attempt:', [
            'Username' => $request->Username,
            'ip_address' => $request->ip(),
        ]);

        $request->validate([
            'Username' => 'required',
            'password' => 'required',
        ]);

        Log::info('Login input validated.');

        // Cek untuk akses admin
        if ($request->Username === 'Admin' && $request->password === 'admin') {
            Log::info('Admin login detected. Redirecting to admin_rooms.');
            return redirect()->route('admin_guest');
        }

        $user = User::where('Username', $request->Username)->first();
        Log::info('User data retrieved from DB:', ['user' => $user]);

        if ($user) {
            Log::info('User found:', ['Username' => $user->Username]);
        } else {
            Log::warning('User not found:', ['Username' => $request->Username]);
        }

        Log::info('Login data received:', $request->all());

        if ($user && Hash::check($request->password, $user->Password)) {
            Log::info('Password matched for user:', ['Username' => $user->Username]);

            Auth::login($user);
            Log::info('User logged in successfully.', ['Username' => $user->Username]);
            return redirect()->route('home_page');
        } else {
            Log::warning('Password mismatch or invalid login attempt for Username:', ['Username' => $request->Username]);

            return back()->withErrors(['error' => 'Username atau password salah.']);
        }
    }


    public function register(Request $request)
    {
        Log::info('User Registration Request:', $request->all());

        $request->validate([
            'NamaBelakang' => 'required|string|max:255',
            'NamaDepan' => 'required|string|max:255',
            'Email' => 'required|string|email|max:255|unique:user',
            'NoTelepon' => 'required|string|max:20',
            'Negara' => 'required|string|max:255',
            'Alamat' => 'required|string|max:255',
            'Username' => 'required|string|unique:user|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);
        Log::info('Registration input validated.');

        Log::info('Password: ' . $request->input('password'));
        Log::info('Password Confirmation: ' . $request->input('password_confirmation'));

        try {
            $user = User::create([
                'NamaBelakang' => $request->NamaBelakang,
                'NamaDepan' => $request->NamaDepan,
                'Email' => $request->Email,
                'NoTelepon' => $request->NoTelepon,
                'Negara' => $request->Negara,
                'Alamat' => $request->Alamat,
                'Username' => $request->Username,
                'Password' => Hash::make($request->password),
            ]);
            Log::info('User registered successfully:', ['username' => $user->Username]);
        } catch (\Exception $e) {
            Log::error('Error during registration:', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Terjadi kesalahan saat registrasi.']);
        }

        return redirect()->route('login');
    }
}
