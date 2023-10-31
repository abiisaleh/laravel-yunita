<?php

namespace Database\Factories;

use App\Models\Pendonor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pendonor>
 */
class PendonorFactory extends Factory
{
    protected $model = Pendonor::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name,
            'alamat' => $this->faker->address,
            'lat' => $this->faker->latitude(-2.594471, -2.520189),
            'lng' => $this->faker->longitude(140.688591, 140.724986),
            'jenis_kelamin' => 'laki-laki',
            'created_at' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'tanggal_lahir' => $this->faker->dateTimeBetween('-40 years', '-15 years'),
            'rh' => $this->faker->randomElement(['positive', 'negative']),
            'golongan_darah_id' => \App\Models\GolonganDarah::all()->random()->id,
            'jenis_darah_id' => \App\Models\JenisDarah::all()->random()->id,
            'pekerjaan_id' => \App\Models\Pekerjaan::all()->random()->id,
        ];
    }
}
