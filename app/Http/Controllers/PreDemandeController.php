<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreDemandeController extends Controller
{
    /**
     * Afficher le formulaire de création de pré-demande.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pre_demande'); // Assurez-vous d'avoir une vue 'pre_demande.blade.php'
    }
}

