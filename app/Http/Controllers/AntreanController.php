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

    public function nextAntrean(Request $request)
    {
        // Get the loket_id from the session
        $loket_id = session('loket_id');

        // Find the antrean with status 'diproses' and mark it as 'selesai'
        $currentAntrean = Antrean::where('loket_id', $loket_id)
            ->where('status', 'diproses')
            ->first();

        if ($currentAntrean) {
            $currentAntrean->status = 'selesai';
            $currentAntrean->save();
        }
        // Find the next antrean with status 'menunggu'
        $antrean = Antrean::where('loket_id', $loket_id)
            ->where('status', 'menunggu')
            ->orderBy('id', 'asc')
            ->first();

        if ($antrean) {
            // Update the status to 'diproses'
            $antrean->status = 'diproses';
            $antrean->save();

            // Return a success message
            return redirect()->route('antrean')->with('message', 'Antrean ' . $antrean->nomor_antrean . ' sedang diproses.');
        }

        // If no antrean is found, return a message
        return redirect()->route('antrean')->with('message', 'Tidak ada antrean yang menunggu.');
    }

    public function prefAntrean(Request $request)
    {
        // Get the loket_id from the session
        $loket_id = session('loket_id');

        // Find the antrean with status 'diproses' and mark it as 'menunggu'
        $currentAntrean = Antrean::where('loket_id', $loket_id)
            ->where('status', 'diproses')
            ->first();

        if ($currentAntrean) {
            $currentAntrean->status = 'menunggu';
            $currentAntrean->save();
        }

        // Find the previous antrean with status 'selesai'
        $antrean = Antrean::where('loket_id', $loket_id)
            ->where('status', 'selesai')
            ->orderBy('id', 'desc')
            ->first();

        if ($antrean) {
            // Update the status to 'diproses'
            $antrean->status = 'diproses';
            $antrean->save();

            // Return a success message
            return redirect()->route('antrean')->with('message', 'Antrean ' . $antrean->nomor_antrean . ' sedang diproses.');
        }

        // If no antrean is found, return a message
        return redirect()->route('antrean')->with('message', 'Tidak ada antrean yang selesai.');
    }
}
