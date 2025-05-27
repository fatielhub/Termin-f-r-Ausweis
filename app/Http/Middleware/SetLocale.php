<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Récupérer la langue de la session ou utiliser la langue par défaut
        $locale = session('locale', 'fr');
        
        // Changer la langue de l'application
        app()->setLocale($locale);

        return $next($request);
    }
}
