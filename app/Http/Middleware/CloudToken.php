<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class CloudToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->headers->get('token');

        $setting = DB::connection('hms')->table('co_settings')->where('name', 'CLOUD_CONSOLE_TOKEN')->first();

        if ($token !== $setting->value) {
            abort(401, 'Auth failure');
        }

        return $next($request);
    }
}
