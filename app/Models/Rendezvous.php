<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;

    protected $table = 'rendez_vous';  

    protected $fillable = ['citoyen_id', 'centre_id', 'date_rdv', 'heure_rdv', 'statut'];

    public function citoyen()
    {
        return $this->belongsTo(Citoyen::class);
    }

    public function centre()
    {
        return $this->belongsTo(Centre::class);
    }
}
