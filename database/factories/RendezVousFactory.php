<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RendezVous>
 */
class RendezVousFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'citoyen_id' => \App\Models\Citoyen::inRandomOrder()->first()->id ?? 1,
        'centre_id' => \App\Models\Centre::inRandomOrder()->first()->id ?? 1,
        'date_rdv' => $this->faker->dateTimeBetween('+1 days', '+30 days')->format('Y-m-d'),
        'heure_rdv' => $this->faker->time('H:i'),
        'statut' => $this->faker->randomElement(['en_attente', 'confirmé', 'annulé']),
    ];
}
}
