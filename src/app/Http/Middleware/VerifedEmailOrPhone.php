<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class VerifedEmailOrPhone
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // print_r($guard);die();/
        if (Auth::guard("customer")->check()) {
            if (User::isVerifiedRegistration()) {
                return redirect('/');
            }
        }

        return $next($request);
    }
}
