<?php

namespace App\Http\Middleware\Role;

use Closure;
use Illuminate\Http\Request;

class ViewerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->Role->slug == 'viewer'){
            return redirect()->route('dashboard')->with('error', 'You are Not Authorization This Page!');
        }
        return $next($request);
    }
}
