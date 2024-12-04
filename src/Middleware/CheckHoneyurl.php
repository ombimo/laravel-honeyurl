<?php

namespace Ombimo\LaravelHoneyurl\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckHoneyurl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // https://aureola.codes/en/blog/2021/how-stop-vulnaribility-scanners-laravel-fail2ban
        // Load the array of honeypot paths from the configuration.
        $honeypot_paths_array = config('honeyurl.urls', []);

        if (empty($honeypot_paths_array)) {
            return $next($request);
        }

        // Turn the path array into a regex pattern.
        $honeypot_paths = '/^('.str_replace(['.', '/'], ['\.', '\/'], implode('|', $honeypot_paths_array)).')/i';

        // If the user tries to access a honeypot path, fail with the teapot code.
        if (preg_match($honeypot_paths, $request->path())) {
            abort(Response::HTTP_I_AM_A_TEAPOT);
        }

        return $next($request);
    }
}
