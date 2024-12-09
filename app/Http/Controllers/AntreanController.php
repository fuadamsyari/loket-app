<?php

namespace App\Http\Controllers;

use App\Models\Antrean;
use App\Models\Loket;

use Illuminate\Http\Request;

class AntreanController extends Controller
{
    public function index()
    {
        $loket_id = session('loket_id');
        $title = "antrean";
        $loket = Loket::where('id', $loket_id)->first();

        // $user = $loket->user;
        $antreans = Antrean::byLoketAndGroupedStatus($loket_id);

        return view('antrean', compact('title', 'antreans', 'loket'));
    }
}
