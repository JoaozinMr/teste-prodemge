<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\citizen>
 */
class CitizenFactory extends Factory
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
            'social_name' => $this->faker->name(),
            'cpf' => $this->faker->unique()->cpf(),
            'email' => $this->faker->unique()->email(),
            'phone' => $this->faker->phoneNumber(),
            'father_name' => $this->faker->name(),
            'mother_name' => $this->faker->name(),
        ];
    }
}
