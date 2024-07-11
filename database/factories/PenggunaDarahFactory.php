<?php

namespace Database\Factories;

use App\Models\PenggunaDarah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PenggunaDarah>
 */
class PenggunaDarahFactory extends Factory
{
    protected $model = PenggunaDarah::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pengguna' => $this->faker->name('male'),
            'jenis_kelamin' => 'laki-laki',
            'jumlah_kolf' => 1,
            'tanggal' => $this->faker->dateTimeBetween('-10 month'),
            'rumah_sakit_id' => \App\Models\RumahSakit::all()->random()->id,
        ];
    }
}
