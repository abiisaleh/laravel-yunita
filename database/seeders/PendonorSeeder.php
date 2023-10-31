<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendonorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $tanggal_lahir = fake()->dateTimeBetween('-40 years', '15 years');

            $user = \App\Models\User::factory()->create([
                'name' => fake()->name('male'),
                'password' => $tanggal_lahir->format('dmY')
            ]);

            $pendonor = \App\Models\Pendonor::factory()
                ->create([
                    'nama' => $user->name,
                    'tanggal_lahir' => $tanggal_lahir,
                    'jenis_kelamin' => 'laki-laki',
                    'user_id' => $user->id
                ]);

            $darahMasuk = \App\Models\DarahMasuk::factory()
                ->create([
                    'pendonor_id' => $pendonor->id
                ]);

            \App\Models\PenggunaDarah::factory()
                ->create([
                    'darah_masuk_id' => $darahMasuk->id,
                ]);
        }

        \App\Models\DarahMasuk::factory(rand(1, 5))
            ->create([
                'pendonor_id' => $pendonor->id
            ]);
    }
}
