<?php
namespace Veneridze\LaravelUserActivation\Middleware;

use Closure;
use Illuminate\Http\Request;
use Redirect;
use Symfony\Component\HttpFoundation\Response;
class UserActivated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->user()->isActivated()) {
            return $next($request);
        } else {
            return Redirect::to(config('user-activation.activate-page'));
        }
    }
}