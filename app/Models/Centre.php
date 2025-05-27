<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Centre extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'adresse',
        'ville',
        'telephone',
        'email',
        'actif',
        'heure_ouverture',
        'heure_fermeture'
    ];

    protected $casts = [
        'actif' => 'boolean',
        'heure_ouverture' => 'datetime',
        'heure_fermeture' => 'datetime'
    ];

    public function creneaux(): HasMany
    {
        return $this->hasMany(Creneau::class);
    }

    public function precommandes(): HasMany
    {
        return $this->hasMany(Precommande::class);
    }

    public function rendezVous()
    {
        return $this->hasMany(RendezVous::class);
    }
}
