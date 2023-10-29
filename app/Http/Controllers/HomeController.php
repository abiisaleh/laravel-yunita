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
        $data['donor'] = JadwalKegiatan::all()->sortByDesc('tanggal')->take(3);
        $data['stok']['pendonor'] = \App\Models\Pendonor::all()->count();
        $data['stok']['darah'] = \App\Models\DarahMasuk::all()->count();
        $data['stok']['pengguna'] = \App\Models\PenggunaDarah::all()->count();

        return view('pages.home', $data);
    }
}
