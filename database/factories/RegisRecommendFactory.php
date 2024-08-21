<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RegisRecommend>
 */
class RegisRecommendFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->unique()->e164PhoneNumber(),
            'person_name' => $this->faker->name(),
            'person_affiliation' => Arr::random(['Perindo', 'Gerindra', 'Golkar', 'Lainnya']),
            'reason' => $this->faker->paragraph(),
            'internal_note' => null,
            'metadata' => [
                'from_user_agent' => $this->faker->userAgent(),
                'from_ip_address' => $this->faker->ipv4(),
            ],
        ];
    }
}
