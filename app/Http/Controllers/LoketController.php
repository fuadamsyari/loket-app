<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class LoketController extends Controller
{
    // tampilan utama
    public function index()
    {
        return view('loket.index');
    }
    // ketika user memilih loket masuk sini
    public function pilihLoket(Request $request)
    {
        $loket = $request->input('loket');  // Mendapatkan nilai dari tombol yang dipilih

        // Proses sesuai dengan loket yang dipilih
        if ($loket == 'loket1') {
            // Proses Loket 1
        } elseif ($loket == 'loket2') {
            // Proses Loket 2
        } elseif ($loket == 'loket3') {
            // Proses Loket 3
        }

        return redirect()->route('home');  // Kembali ke halaman beranda setelah memilih loket
    }
}
