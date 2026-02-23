<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Centre>
 */
class CentreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'nom' => 'Centre ' . $this->faker->citySuffix(),
        'ville' => $this->faker->city(),
        'adresse' => $this->faker->address(),
        'telephone' => $this->faker->phoneNumber(),
        'capacite_jour' => $this->faker->numberBetween(30, 100),
        'email' => $this->faker->unique()->safeEmail(),
        'actif' => true,
        'heure_ouverture' => '08:00',
        'heure_fermeture' => '16:00',
    ];
}
}
