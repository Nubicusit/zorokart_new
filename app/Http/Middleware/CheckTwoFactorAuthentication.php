<?php
namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;

class CheckTwoFactorAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('2fa')) {
            return redirect()->route('check2fa.index');
        }
        return $next($request);
    }
};