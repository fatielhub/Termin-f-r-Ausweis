<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Citoyen extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'prenom', 'cin', 'date_naissance', 'lieu_naissance', 'telephone', 'email', 'adresse'];

    public function rendezVous()
    {
        return $this->hasMany(RendezVous::class);
    }
}
