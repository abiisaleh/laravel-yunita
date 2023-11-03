<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

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
        //grafik donat
        $darahMasuk = DB::table('darah_masuks')
            ->join('pendonors', 'darah_masuks.pendonor_id', '=', 'pendonors.id')
            ->join('golongan_darahs', 'pendonors.golongan_darah_id', '=', 'golongan_darahs.id', 'right outer')
            ->select('golongan_darahs.nama as golongan_darah', DB::raw('COUNT(darah_masuks.id) as jumlah'))
            ->groupBy('golongan_darahs.nama');

        $darahKeluar = DB::table('pengguna_darahs')
            ->join('darah_masuks', 'darah_masuk_id', '=', 'darah_masuks.id')
            ->join('pendonors', 'darah_masuks.pendonor_id', '=', 'pendonors.id')
            ->join('golongan_darahs', 'pendonors.golongan_darah_id', '=', 'golongan_darahs.id', 'right outer')
            ->select('golongan_darahs.nama as golongan_darah', DB::raw('COUNT(darah_masuks.id) as jumlah'))
            ->groupBy('golongan_darahs.nama');

        $stok_darah = array_map(function ($a, $b) {
            return $a - $b;
        }, $darahMasuk->pluck('jumlah')->toArray(), $darahKeluar->pluck('jumlah')->toArray());


        //grafik batang
        $golDarah = \App\Models\GolonganDarah::all()->toArray();
        $jenisDarah = \App\Models\JenisDarah::all()->pluck('nama')->toArray();

        foreach ($golDarah as $record) {
            $darahMasuk = DB::table('darah_masuks')
                ->join('pendonors', 'darah_masuks.pendonor_id', '=', 'pendonors.id')
                ->join('golongan_darahs', 'pendonors.golongan_darah_id', '=', 'golongan_darahs.id')
                ->join('jenis_darahs', 'pendonors.jenis_darah_id', '=', 'jenis_darahs.id')
                ->groupBy('golongan_darahs.nama', 'jenis_darahs.nama')
                ->select('golongan_darahs.nama as golongan_darah', 'jenis_darahs.nama as jenis_darah', DB::raw('COUNT(darah_masuks.id) as jumlah'))
                ->where('golongan_darahs.nama', '=', $record['nama'])
                ->pluck('jumlah', 'jenis_darah')
                ->toArray();

            $darahKeluar = DB::table('pengguna_darahs')
                ->join('darah_masuks', 'darah_masuk_id', '=', 'darah_masuks.id')
                ->join('pendonors', 'darah_masuks.pendonor_id', '=', 'pendonors.id')
                ->join('golongan_darahs', 'pendonors.golongan_darah_id', '=', 'golongan_darahs.id')
                ->join('jenis_darahs', 'pendonors.jenis_darah_id', '=', 'jenis_darahs.id')
                ->groupBy('golongan_darahs.nama', 'jenis_darahs.nama')
                ->select('golongan_darahs.nama as golongan_darah', 'jenis_darahs.nama as jenis_darah', DB::raw('COUNT(pengguna) as jumlah'))
                ->where('golongan_darahs.nama', '=', $record['nama'])
                ->pluck('jumlah', 'jenis_darah')
                ->toArray();

            $result = [];

            //menghitung stok darah dari darah masuk - darah keluar
            foreach ($darahMasuk as $key => $value) {
                if (array_key_exists($key, $darahKeluar)) {
                    $result[$key] = $value - $darahKeluar[$key];
                } else {
                    $result[$key] = $value;
                }
            }

            foreach ($darahKeluar as $key => $value) {
                if (!array_key_exists($key, $darahMasuk)) {
                    $result[$key] = -$value;
                }
            }

            $data = [];

            foreach ($jenisDarah as $value) {
                $data[] = $result[$value] ?? 0;
            }

            $dataset[] = [
                'name' => $record['nama'],
                'color' => $record['warna'],
                'data' => $data,
            ];
        }

        // dd($dataset);

        return view('pages.stok', [
            'stok_darah' => response()->json($stok_darah)->content(),
            'stok_darah_2' => $dataset,
            'jenis_darah' => $jenisDarah,
            'jumlah_pendonor' => \App\Models\Pendonor::all()->count(),
        ]);
    }
}
