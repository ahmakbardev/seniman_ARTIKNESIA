<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocales
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1); // Ambil segment pertama dari URL

        if (in_array($locale, ['en', 'id'])) {
            App::SetLocale($locale); // Set locale aplikasi
        } else {
            App::SetLocale(config('app.locale')); // Set locale default jika tidak valid
        }

        return $next($request);
    }
}
