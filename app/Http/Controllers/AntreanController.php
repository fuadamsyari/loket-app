<?php

namespace App\Http\Controllers;

use App\Models\Antrean;
use App\Models\Loket;
use App\Models\User;

use Illuminate\Http\Request;

class AntreanController extends Controller
{
    public function index()
    {

        $title = "antrean";
        // cari loket id bedasarkan login
        $loket_id = session('loket_id');
        // Cari Loket berdasarkan id
        $loket = Loket::where('id', $loket_id)->first();
        // Ambil user terkait
        $user = $loket->user;
        // $user = $loket->user;
        $antreans = Antrean::byLoketAndGroupedStatus($loket_id);

        return view('antrean', compact('title', 'antreans', 'loket', 'user'));
    }
}
