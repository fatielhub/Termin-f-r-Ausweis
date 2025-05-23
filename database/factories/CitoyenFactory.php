<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Citoyen>
 */
class CitoyenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
public function definition(): array
{
    return [
        'nom' => $this->faker->lastName(),
        'prenom' => $this->faker->firstName(),
        'cin' => strtoupper($this->faker->bothify('??######')),
        'date_naissance' => $this->faker->date(),
        'lieu_naissance' => $this->faker->city(),
        'telephone' => $this->faker->phoneNumber(),
        'email' => $this->faker->unique()->safeEmail(),
        'adresse' => $this->faker->address(),
    ];
}
}
