<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;
use Illuminate\Contracts\Foundation\Application;
use Symfony\Component\HttpFoundation\IpUtils;
use Illuminate\Foundation\Http\Exceptions\MaintenanceModeException;

class CheckForMaintenanceMode extends Middleware
{
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    public function handle($request, Closure $next)
    {
        if ($this->app->isDownForMaintenance() && $request->path() !== '/') {
            $data = json_decode(file_get_contents($this->app->storagePath().'/framework/down'), true);

            if (isset($data['allowed']) && IpUtils::checkIp($request->ip(), (array) $data['allowed'])) {
                return $next($request);
            }

            if ($this->inExceptArray($request)) {
                return $next($request);
            }

            throw new MaintenanceModeException($data['time'], $data['retry'], $data['message']);
        }

        return $next($request);
    }
}
