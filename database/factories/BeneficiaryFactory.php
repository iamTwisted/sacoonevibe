<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Beneficiary>
 */
class BeneficiaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'id_type' => 'National ID',
            'id_number' => $this->faker->unique()->numerify('#########'),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'share_percent' => $this->faker->numberBetween(1, 100),
            'type' => 'primary',
            'is_verified' => false,
        ];
    }
}
