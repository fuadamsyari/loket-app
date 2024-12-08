<?php

namespace App\Http\Controllers;

use App\Models\Antrean;
use App\Models\Loket;

use Illuminate\Http\Request;

class AntreanController extends Controller
{
    public function index($idLoket)
    {
        $title = "antrean";
        $loket = Loket::where('id', $idLoket)->first();

        // $user = $loket->user;
        $antreans = Antrean::byLoketAndGroupedStatus($idLoket);

        return view('antrean', compact('title', 'antreans', 'loket'));
    }
}
