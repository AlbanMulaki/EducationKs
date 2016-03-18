<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Config;

class SetLanguage {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (request()->session()->get('language') !== null && strlen(request()->session()->get('language')) >= 2) {
            app()->setLocale(request()->session()->get('language'));
        } else {
            app()->setLocale('en');
        }

        return $next($request);
    }

}
