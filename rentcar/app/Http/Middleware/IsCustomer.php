<?php

namespace App\Http\Middleware;

use Closure;

class IsCustomer
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
        if($request->session()->has("user") && session('user')->name == 'Customer')
            return $next($request);
        else
            return redirect()->back()->with("message", "You  must be logged in as customer!");

    }
}
