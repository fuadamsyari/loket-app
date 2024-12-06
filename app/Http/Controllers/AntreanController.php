<?php

namespace App\Http\Controllers;

use App\Models\Antrean;
use Illuminate\Http\Request;

class AntreanController extends Controller
{
    //menampilkan antrean yang ada
    public function index()
    {
        $antreanMenunggu = $antreans = Antrean::where('status', 'menunggu')->get();
        $antreanDiproses = $antreans = Antrean::where('status', 'diproses')->get();
        $antreanSelesai = $antreans = Antrean::where('status', 'selesai')->get();


        return view('antrean.index', compact('antreanMenunggu', 'antreanDiproses', 'antreanSelesai'));
    }
}
