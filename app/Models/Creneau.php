<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Creneau extends Model
{
    protected $table = 'creneau';

    protected $fillable = [
        'centre_id',
        'date',
        'heure_debut',
        'heure_fin',
        'capacite',
        'places_occupees',
        'actif'
    ];

    protected $casts = [
        'date' => 'date',
        'heure_debut' => 'datetime',
        'heure_fin' => 'datetime',
        'actif' => 'boolean'
    ];

    public function centre(): BelongsTo
    {
        return $this->belongsTo(Centre::class);
    }

    public function precommandes(): HasMany
    {
        return $this->hasMany(Precommande::class);
    }

    public function getPlacesDisponiblesAttribute(): int
    {
        return $this->capacite - $this->places_occupees;
    }
} 