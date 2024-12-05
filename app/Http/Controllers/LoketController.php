<?php

namespace App\Http\Controllers;

use App\Models\Loket;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class LoketController extends Controller
{
    // tampilan utama
    public function index()
    {
        $lokets = Loket::all();
        return view('loket.index', compact('lokets'));
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

        // cetak print
        session()->flash('message', 'Antrean Tercetak ' . ucfirst($loket) . '.');

        return redirect()->route('loket');  // Kembali ke halaman beranda setelah memilih loket
    }
}
