<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Facades\Filament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class SetDefaultAuthForActivityLog
{
    public function handle(Request $request, Closure $next): Response
    {
        Config::set('activitylog.default_auth_driver', Filament::getAuthGuard());
        Config::set('auth.defaults.guard', Filament::getAuthGuard());

        return $next($request);
    }
}
