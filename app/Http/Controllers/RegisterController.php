<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Loket;
use Illuminate\support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index()
    {
        $title = 'Register';
        return view('register', compact('title'));
    }

    public function store(Request $request)
    {
        // Validasi data inputan
        $validatedData = $request->validate([
            'name' => ['required',  'string', 'max:255'],
            'email' => ['required', 'string', 'email:dns', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nama_loket' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string', 'max:255']
        ]);

        // // Membuat user baru
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password'],),
        ]);

        // generate kode_loket
        $kodeLoket = Loket::generateKodeLoket();

        // Membuat data loket baru
        $loket = Loket::create([
            'user_id' => $user->id,  // id user yang baru dibuat
            'kode_loket' => $kodeLoket,
            'nama_loket' => $validatedData['nama_loket'],
            'deskripsi' => $validatedData['deskripsi']
        ]);


        // // Login user baru
        // Auth::login($user);

        // Redirect ke halaman utama
        return redirect()->route('login')->with('success', 'Registration successful, please login');
    }
}
