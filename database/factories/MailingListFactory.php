<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MailingList>
 */
class MailingListFactory extends Factory
{
    public function definition(): array
    {
        return [
            'email' => $this->faker->unique()->companyEmail(),
        ];
    }
}
