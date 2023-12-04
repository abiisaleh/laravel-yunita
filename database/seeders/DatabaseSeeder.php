<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\GolonganDarah;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //admin acount
        $user = \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@demo.com',
            'password' => 'demo1234',
            'role' => 'admin',
        ]);

        //adminsuper acount
        $user = \App\Models\User::factory()->create([
            'name' => 'admin super',
            'email' => 'adminsuper@demo.com',
            'password' => 'demo1234',
            'role' => 'super',
        ]);

        $data = [
            ['nama' => 'A', 'warna' => '#FF5A5F'],
            ['nama' => 'B', 'warna' => '#ffc371'],
            ['nama' => 'AB', 'warna' => '#74b9ff'],
            ['nama' => 'O', 'warna' => '#4bc08f']
        ];
        foreach ($data as $value) {
            \App\Models\GolonganDarah::create(['nama' => $value['nama'], 'warna' => $value['warna']]);
        }

        $data = [
            "Pegawai Negeri Sipil (PNS)",
            "TNI/Polri",
            "Pengusaha",
            "Buruh",
            "Petani",
            "Nelayan",
            "Pengajar/Guru",
            "Dokter",
            "Perawat",
            "Pedagang",
            "Wiraswasta",
            "Pensiunan",
            "Mahasiswa",
            "Ibu Rumah Tangga",
            "Pengemudi",
            "Pekerja Kantoran",
            "Arsitek",
            "Pelajar",
            "Pengacara",
            "Penyanyi",
            "Seniman",
            "Polisi",
            "Pramugari/Pramugara",
            "Koki",
            "Penulis",
            "Desainer",
            "Ahli IT",
        ];
        foreach ($data as $value) {
            \App\Models\Pekerjaan::create(['nama' => $value]);
        }

        $data = [
            "Provita Jayapura",
            "Umum Daerah Yowari Sentani",
            "Bhayangkara Jayapura",
            "Dian Harapan Jayapura",
            "Jiwa Abepura"
        ];

        foreach ($data as $value) {
            \App\Models\RumahSakit::create(['nama' => $value]);
        }

        $data = [
            ["nama" => "WB", "warna" => "#fc4c4c"],
            ["nama" => "PRC", "warna" => "#fdae4b"],
            ["nama" => "LP", "warna" => "#fceb4c"],
            ["nama" => "TC", "warna" => "#fc4c91"],
        ];

        foreach ($data as $value) {
            \App\Models\JenisDarah::create(['nama' => $value['nama'], 'warna' => $value['warna']]);
        }

        $data = [
            ["kegiatan" => "Donor Darah Bersama Polri", "tanggal" => fake()->dateTimeBetween('-1 years'), "waktu" => fake()->time(), "tempat" => "Polsek Abepura", "lat" => "-2.6118959", "lng" => "140.6619409"],
            ["kegiatan" => "Donor Darah Bersama Mahasiswa USTJ", "tanggal" => fake()->dateTimeBetween('-1 years'), "waktu" => fake()->time(), "tempat" => "Aula USTJ", "lat" => "-2.604784", "lng" => "140.6576806"],
            ["kegiatan" => "Donor Darah Hari Pahlawan", "tanggal" => fake()->dateTimeBetween('-1 years'), "waktu" => fake()->time(), "tempat" => "RS Bhayangkara", "lat" => "-2.5914185", "lng" => "140.6741743"],
            ["kegiatan" => "Donor Darah Hari Kemerdekaan", "tanggal" => fake()->dateTimeBetween('-1 years'), "waktu" => fake()->time(), "tempat" => "Lapangan Trikora", "lat" => "-2.6077396", "lng" => "140.6557462"],
            ["kegiatan" => "Donor Darah Bersama Mahasiswa UNCEN", "tanggal" => fake()->dateTimeBetween('-1 years'), "waktu" => fake()->time(), "tempat" => "Auditoriun UNCEN", "lat" => "-2.6105398", "lng" => "140.659636"],
        ];

        foreach ($data as $value) {
            \App\Models\JadwalKegiatan::create($value);
        }

        //buat 5x10 pendonor 
        for ($i = 0; $i < 5; $i++) {
            //buat 10 data pendonor
            $this->call(PendonorSeeder::class);
        }
    }
}
