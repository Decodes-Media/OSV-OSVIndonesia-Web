<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class WithDatabaseTransaction
{
    /*
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (App::runningUnitTests()) {
            return $next($request);
        }

        DB::beginTransaction();

        return $next($request);
    }

    /**
     * Handle tasks after the response has been sent to the browser.
     */
    public function terminate(Request $request, Response $response): void
    {
        if (App::runningUnitTests()) {
            return;
        }

        $shouldRollback = in_array($response->getStatusCode(), [
            Response::HTTP_INTERNAL_SERVER_ERROR,
            Response::HTTP_SERVICE_UNAVAILABLE,
            Response::HTTP_BAD_GATEWAY,
            Response::HTTP_BAD_REQUEST,
            Response::HTTP_REQUEST_TIMEOUT,
            Response::HTTP_GATEWAY_TIMEOUT,
        ]);

        $shouldRollback ? DB::rollBack() : DB::commit();
    }
}
