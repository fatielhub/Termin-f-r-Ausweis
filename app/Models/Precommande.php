<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Precommande extends Model
{
    protected $fillable = [
        'code_suivi',
        'type_demande',
        'nom',
        'prenom',
        'date_naissance',
        'lieu_naissance',
        'cin',
        'nom_pere',
        'nom_mere',
        'adresse',
        'ville',
        'telephone',
        'email',
        'centre_id',
        'creneau_id',
        'statut',
        'commentaire'
    ];

    protected $casts = [
        'date_naissance' => 'date',
        'statut' => 'string'
    ];

    public function centre(): BelongsTo
    {
        return $this->belongsTo(Centre::class);
    }

    public function creneau(): BelongsTo
    {
        return $this->belongsTo(Creneau::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($precommande) {
            if (empty($precommande->code_suivi)) {
                $precommande->code_suivi = strtoupper(substr(md5(uniqid()), 0, 8));
            }
        });
    }
} 