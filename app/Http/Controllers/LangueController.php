<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangueController extends Controller
{
    public function change($locale)
    {
        // Vérifier si la langue est supportée
        if (!in_array($locale, ['fr', 'ar'])) {
            $locale = 'fr';
        }

        // Stocker la langue dans la session
        session()->put('locale', $locale);
        
        // Changer la langue de l'application
        app()->setLocale($locale);

        // Rediriger vers la page précédente
        return redirect()->back();
    }
} 