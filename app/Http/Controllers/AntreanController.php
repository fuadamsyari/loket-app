<?php

namespace App\Http\Controllers;

use App\Models\Antrean;
use Illuminate\Http\Request;

class AntreanController extends Controller
{
    //menampilkan antrean yang ada
    public function index()
    {
        $title = 'Antrean';
        $antreanMenunggu = $antreans = Antrean::where('status', 'menunggu')->get();
        $antreanDiproses = $antreans = Antrean::where('status', 'diproses')->get();
        $antreanSelesai = $antreans = Antrean::where('status', 'selesai')->get();


        return view('antrean', compact('title', 'antreanMenunggu', 'antreanDiproses', 'antreanSelesai'));
    }
}
