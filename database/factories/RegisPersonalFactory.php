<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RegisPersonal>
 */
class RegisPersonalFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->unique()->e164PhoneNumber(),
            'occupancy' => Arr::random(['Politisi', 'Pengacara', 'Notaris', 'Lainnya']),
            'affiliation' => Arr::random(['Perindo', 'Gerindra', 'Golkar', 'Lainnya']),
            'dapil_dprd' => strtoupper($this->faker->word()),
            'question_1' => $this->faker->paragraph(),
            'question_2' => $this->faker->paragraph(),
            'question_3' => $this->faker->paragraph(),
            'internal_note' => null,
            'metadata' => [
                'from_user_agent' => $this->faker->userAgent(),
                'from_ip_address' => $this->faker->ipv4(),
            ],
        ];
    }
}
