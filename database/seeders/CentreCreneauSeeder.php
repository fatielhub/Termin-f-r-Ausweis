<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Centre;
use App\Models\Creneau;
use Carbon\Carbon;

class CentreCreneauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Création d'un centre
        $centre = Centre::create([
            'nom' => 'Centre National Casablanca',
            'adresse' => '123 Rue Principale',
            'ville' => 'Casablanca',
            'telephone' => '0522123456',
            'email' => 'centre@cni.ma',
            'actif' => true,
            'heure_ouverture' => '08:00',
            'heure_fermeture' => '16:00',
        ]);

        // Création de créneaux pour ce centre
        for ($i = 0; $i < 5; $i++) {
            Creneau::create([
                'centre_id' => $centre->id,
                'date' => Carbon::now()->addDays($i)->toDateString(),
                'heure_debut' => '09:00',
                'heure_fin' => '09:30',
                'capacite' => 10,
                'places_occupees' => 0,
                'actif' => true,
            ]);
        }
    }
}
