<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if($request->route()->named('admin.*')) {
                // if(Route::currentRouteName() !== 'admin.login') {
                    return route('admin.login');
                // } else {
                //     return $next($request);
                // }
            }
            return route('login');
        }
    }
}
