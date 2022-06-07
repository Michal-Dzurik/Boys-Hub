<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin{

    public function handle(Request $request, Closure $next)
    {
        if (\Auth::check()){
            if (\Auth::user()->email == 'm@m.m'){
                return $next($request);
            }

        }

        return redirect()->route('home')->withErrors("Get the fuck out of here");
    }
}
