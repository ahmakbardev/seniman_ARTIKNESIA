<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddLocaleToRoute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Get the current locale from the request or use the fallback locale
        $locale = $request->segment(1) ?: config('app.fallback_locale');

        // Set the locale for the request
        app()->SetLocales($locale);

        // Add the locale parameter to all routes
        $request->route()->forgetParameter('locale');
        $request->route()->setParameter('locale_id', $locale . '_id'); // Menambahkan "_id" setelah $locale

        return $next($request);
    }
}
