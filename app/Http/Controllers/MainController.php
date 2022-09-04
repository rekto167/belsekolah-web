<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function hari()
    {
        return view('hari');
    }

    public function aktifitas()
    {
        return view('aktifitas');
    }
}
