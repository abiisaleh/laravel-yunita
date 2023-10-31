<?php

namespace Database\Factories;

use App\Models\DarahMasuk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DarahMasuk>
 */
class DarahMasukFactory extends Factory
{
    protected $model = DarahMasuk::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_selang' => $this->faker->numberBetween(),
            'tanggal' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'pendonor_id' => \App\Models\GolonganDarah::all()->random()->id,
        ];
    }
}
