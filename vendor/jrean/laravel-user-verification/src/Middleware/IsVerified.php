<?php
/**
 * This file is part of Jrean\UserVerification package.
 *
 * (c) Jean Ragouin <go@askjong.com> <www.askjong.com>
 */
namespace Jrean\UserVerification\Middleware;

use Closure;
use Jrean\UserVerification\Exceptions\UserNotVerifiedException;

class IsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     * @throws Jrean\UserVerification\Exceptions\UserNotVerifiedException
     */
    public function handle($request, Closure $next)
    {
        if( ! $request->user()->verified){
            throw new UserNotVerifiedException;
        }

        // if(auth()->user()->verified==0)
        // {
        //     flash(config('messages.not_verified'), 'danger');
        //     Auth::logout();
        //     return redirect('/login');
        // }  
        return $next($request);
    }
}
