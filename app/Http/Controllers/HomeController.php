<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {

        $title = 'home';
        $versiAplikasi = '1.0';
        $sambutan  = 'Aplikasi ini membantu Anda mengelola antrian dan loket dengan mudah dan efisien.';


        // var_dump(compact('home'));
        // die;
        return view('home.index', compact('title', 'versiAplikasi', 'sambutan'));
    }
}
