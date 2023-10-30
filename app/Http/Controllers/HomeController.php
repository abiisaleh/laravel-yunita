<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\Builder;
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

    public static function stok()
    {
        $darah = \Illuminate\Support\Facades\DB::table('darah_masuks')
            ->join('pendonors', 'darah_masuks.pendonor_id', '=', 'pendonors.id')
            ->join('golongan_darahs', 'pendonors.golongan_darah_id', '=', 'golongan_darahs.id', 'right outer')
            ->select('golongan_darahs.nama as golongan_darah', \Illuminate\Support\Facades\DB::raw('COUNT(darah_masuks.id) as jumlah_darah_masuk'))
            ->groupBy('golongan_darahs.nama');

        $stok_darah = $darah->get();

        return view('pages.stok', [
            'stok_darah' => $stok_darah->pluck('jumlah_darah_masuk')->toJson(),
        ]);
    }
}
