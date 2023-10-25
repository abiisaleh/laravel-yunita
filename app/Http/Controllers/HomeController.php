<?php

namespace App\Http\Controllers;

use App\Mail\DarahkuNoReply;
use App\Models\JadwalKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public static function index()
    {
        $data['donor'] = JadwalKegiatan::all()->take(2);

        return view('welcome', $data);
    }
}
