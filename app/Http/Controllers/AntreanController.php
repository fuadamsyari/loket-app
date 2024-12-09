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

    public function nextAntrean($loket_id)
    {
        $antrean = Antrean::where('loket_id', $loket_id)
            ->where('status', 'menunggu')
            ->orderBy('created_at', 'asc')
            ->first();

        if ($antrean) {
            $antrean->status = 'diproses';
            $antrean->save();
        }

        return redirect()->route('antrean.index')->with('message', 'Antrean berikutnya diproses.');
    }

    public function prevAntrean($loket_id)
    {
        $antrean = Antrean::where('loket_id', $loket_id)
            ->where('status', 'diproses')
            ->orderBy('created_at', 'desc')
            ->first();

        if ($antrean) {
            $antrean->status = 'menunggu';
            $antrean->save();
        }

        return redirect()->route('antrean.index')->with('message', 'Antrean sebelumnya dikembalikan ke status menunggu.');
    }
}
