<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Centre extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'ville', 'adresse', 'telephone', 'capacite_jour'];

    public function rendezVous()
    {
        return $this->hasMany(RendezVous::class);
    }
}
