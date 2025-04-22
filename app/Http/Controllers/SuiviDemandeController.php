<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuiviDemandeController extends Controller
{
    /**
     * Afficher le formulaire de suivi ou de complétion de la demande.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('suivi_demande'); // Assurez-vous d'avoir une vue 'suivi_demande.blade.php'
    }
}

