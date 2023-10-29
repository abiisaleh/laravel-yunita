<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public static function index()
    {
        $data['donor'] = \App\Models\JadwalKegiatan::all()->sortByDesc('tanggal')->take(3);
        $data['stok']['pendonor'] = \App\Models\Pendonor::all()->count();
        $data['stok']['darah'] = \App\Models\DarahMasuk::all()->count();
        $data['stok']['pengguna'] = \App\Models\PenggunaDarah::all()->count();

        return view('pages.home', $data);
    }

    public static function send(Request $request)
    {
        $data = [
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        \App\Models\Pesan::create($data);

        return redirect()->to(
            route('contact', [
                'email' => $request->email
            ])
        );
    }

    public static function donor()
    {
        $data['donor'] = \App\Models\JadwalKegiatan::simplePaginate(6);

        return view('pages.donor', $data);
    }
}
