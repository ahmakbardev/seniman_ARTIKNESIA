<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        // Check if the user is authenticated
        if (Auth::guard($guard)->check()) {
            // Get the user's preferred locale from cookie or session
            $locale = $request->cookie('locale') ?? $request->session()->get('locale');

            // Check if the locale is supported
            if (!in_array($locale, config('app.locales'))) {
                // If the locale is not supported, use the default locale
                $locale = config('app.fallback_locale');
            }

            // Set the application locale to id_id
            App::SetLocales('id_id');

            // Redirect to the user's dashboard page
            return Redirect::to(route('dashboard.seniman', ['locale' => 'id_id']));
        }

        // If the user is not authenticated, proceed with the request
        return $next($request);
    }
}
