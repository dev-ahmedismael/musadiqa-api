<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleFromHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->header('Accept-Language');

         $available_locales = ['ar', 'en'];

         if ($locale) {
            $locale = substr($locale, 0, 2);
            if (in_array($locale, $available_locales)) {
                App::setLocale($locale);
            }
        }

        return $next($request);
    }
}
