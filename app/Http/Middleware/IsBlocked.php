<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsBlocked
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
        if(auth()->user()->blocked == 'true')
        {
            flash(config('messages.blocked'), 'danger');
            Auth::logout();
            return redirect('/login');
        }        
        return $next($request);
    }
}
