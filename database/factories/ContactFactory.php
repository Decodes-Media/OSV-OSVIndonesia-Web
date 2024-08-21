<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'email' => $this->faker->unique()->companyEmail(),
            'message' => $this->faker->paragraph(),
            'internal_note' => null,
            'metadata' => [
                'from_user_agent' => $this->faker->userAgent(),
                'from_ip_address' => $this->faker->ipv4(),
            ],
        ];
    }
}
