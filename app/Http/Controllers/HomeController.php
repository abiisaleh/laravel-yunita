<?php

namespace App\Http\Controllers;

use App\Models\JadwalKegiatan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public static function index()
    {
        $data['donor'] = JadwalKegiatan::all()->take(2);

        return view('welcome', $data);
    }
}
