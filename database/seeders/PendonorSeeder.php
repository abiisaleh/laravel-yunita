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

            $gender = fake()->randomElement(['laki-laki', 'perempuan']);

            if ($gender == 'perempuan') {
                $name = fake()->name('female');
            } else {
                $name = fake()->name('male');
            }

            $user = \App\Models\User::factory()->create([
                'name' => $name,
                'password' => $tanggal_lahir->format('dmY')
            ]);

            $pendonor = \App\Models\Pendonor::factory()
                ->create([
                    'nama' => $user->name,
                    'tanggal_lahir' => $tanggal_lahir,
                    'jenis_kelamin' => $gender,
                    'user_id' => $user->id
                ]);

            $darahMasuk = \App\Models\DarahMasuk::factory()
                ->create([
                    'pendonor_id' => $pendonor->id
                ]);

            if (rand(0, 1)) {
                \App\Models\PenggunaDarah::factory()
                    ->create([
                        'darah_masuk_id' => $darahMasuk->id,
                        'jenis_kelamin' => $gender,
                    ]);
            }
        }

        \App\Models\DarahMasuk::factory(rand(1, 5))
            ->create([
                'pendonor_id' => $pendonor->id
            ]);
    }
}
