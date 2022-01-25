<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class ApiRequestLogging
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $data = [
            'request' => $request,
            'route_parameters' => $request->route()->parameters(),
        ];

        $log = Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/request.log'),
        ]);

        $log->info('Incoming request:');

        $log->info(json_encode($data));

        return $next($request);
    }

    public function terminate(Request $request, Response $response)
    {
        //add response when we need
    }
}
