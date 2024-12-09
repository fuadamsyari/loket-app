<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use App\Models\Loket;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
        $title = 'Login';
        return view('login', compact('title'));
    }

    public function authenticate(Request $request)
    {
        $credenetials = $request->validate([
            "email" => ['required', 'email:dns'],
            "password" => ['required', 'string'],
        ]);

        if (Auth::attempt($credenetials)) {
            $request->session()->regenerate();
            // Ambil Loket yang terkait dengan user
            $loket = Loket::where('user_id', Auth::id())->first();
            if ($loket) {
                return redirect()->route('antrean');
            }
            // Jika user tidak memiliki loket
            return redirect()->route('login')->with('error', 'Loket tidak ditemukan.');
        }
        return back()->with('loginError', 'Invalid credentials');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('home'));
    }
}
