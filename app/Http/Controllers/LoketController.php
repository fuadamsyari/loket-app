<?php

namespace App\Http\Controllers;

use App\Models\Loket;
use App\Models\Antrean;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class LoketController extends Controller
{
    // tampilan utama
    public function index()
    {
        $title = 'Loket';
        $lokets = Loket::all();
        return view('loket', compact('title', 'lokets'));
    }
    // ketika user memilih loket masuk sini
    public function pilihLoket(Request $request)
    {
        // Mendapatkan id loket dari tombol yang dipilih oleh customer
        $idLoket = $request->input('loket');

        // medapatkan data loket berdasarkan id
        $loket = Loket::find($idLoket);

        // validasi ketika loket tidak di temukan dengan id loket -> menampilkan flash erornya
        if (!$loket) {
            return redirect()->route('loket')->with('message', 'Loket tidak valid.');
        }

        //generate nomor antrean
        $lastAntrean = Antrean::where('loket_id', $idLoket)->orderBy('id', 'desc')->first();

        // Jika tidak ada antrean, mulai dari antrean 1
        $newNomorAntrean = $lastAntrean ? ((int) filter_var($lastAntrean->nomor_antrean, FILTER_SANITIZE_NUMBER_INT)) + 1 : 1;

        // generate struktur nomro antrean berdasarkan kode loket dan nomor antrean
        $formattedNomorAntrean = $loket->kode_loket . str_pad($newNomorAntrean, 3, '0', STR_PAD_LEFT);

        // simpan antrean baru ke database tabel antreans
        $antrean = new Antrean();
        $antrean->nomor_antrean = $formattedNomorAntrean;
        $antrean->loket_id = $idLoket;
        $antrean->save();

        // cetak print


        // kembali halaman loket dan memberi flash data antrean tergenerate
        session()->flash('message', 'Antrean Tercetak dengan nomor ' . ucfirst($formattedNomorAntrean) . '.');
        return redirect()->route('loket');  // Kembali ke halaman beranda setelah memilih loket
    }
}
