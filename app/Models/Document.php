<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    protected $fillable = [
        'precommande_id',
        'type_document',
        'chemin_fichier',
        'nom_original',
        'mime_type',
        'taille'
    ];

    public function precommande(): BelongsTo
    {
        return $this->belongsTo(Precommande::class);
    }
} 