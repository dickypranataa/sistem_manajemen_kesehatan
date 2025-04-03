<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeriksaPasienController extends Controller
{
//
    public function index()
    {
        return view('pasien/periksa.index');
    }
}
