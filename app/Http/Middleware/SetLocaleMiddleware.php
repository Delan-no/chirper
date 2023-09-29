<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Récupérer la langue de la session, ou par défaut, utiliser la langue par défaut de l'application
        $locale = session('local', config('app.locale'));
        //  Définir la langue de l'applicaiton à partir de la session
        app()->setLocale($locale);
        // continuer la requête
        return $next($request);
    }
}
