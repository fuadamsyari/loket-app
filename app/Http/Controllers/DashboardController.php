<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function redirectToAntrean()
    {
        $user = Auth::user();
        // Pastikan user memiliki loket
        if ($user && $user->loket) {
            $loketId = $user->loket->id;
            return redirect()->route('antrean', ['loket_id' => $loketId]);
        }
        return redirect()->route('home')->with('error', 'Anda belum memiliki loket.');
    }
}
