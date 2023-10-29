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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $data = ['A', 'B', 'AB', 'O'];
        foreach ($data as $value) {
            \App\Models\GolonganDarah::create(['nama' => $value]);
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
            "RS Provita Jayapura",
            "RS Umum Daerah Yowari Sentani",
            "RS Bhayangkara Jayapura",
            "RS Dian Harapan Jayapura",
            "RS Jiwa Abepura"
        ];

        foreach ($data as $value) {
            \App\Models\RumahSakit::create(['nama' => $value]);
        }

        // \App\Models\Pendonor::factory()
        //     ->count(100)
        //     ->create();
    }
}
