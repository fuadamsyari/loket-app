<?php

namespace App\Http\Controllers;

use App\Models\Antrean;

use Illuminate\Http\Request;

class AntreanController extends Controller
{
    public function index($idLoket)
    {
        $title = "antrean";
        $antreans = Antrean::byLoketAndGroupedStatus($idLoket);
        return view('antrean', compact('title', 'antreans'));
    }
}
