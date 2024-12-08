<?php

namespace App\Http\Controllers;

use App\Models\Antrean;

use Illuminate\Http\Request;

class AntreanController extends Controller
{
    public function index($idLoket)
    {
        $antreans = Antrean::byLoketAndGroupedStatus($idLoket);
        return view('antrean', [
            "title" => "antrean",
            "antreans" => $antreans
        ]);
    }
}
