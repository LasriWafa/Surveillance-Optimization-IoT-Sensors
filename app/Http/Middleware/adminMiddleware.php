<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminMiddleware
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
         // if user is authenticated
         if(Auth::check()) {
            // and is users role = 1 (as in admin)
            if(Auth::user()->role == '1') {

                return $next($request);
            } // else if users role = 0 (as in normal user)
            else {
                return redirect('/captors')->with('message', 'Accesss Denied, you arent an admin');

            }
        }
        else {
            // if user is not authenticated
            return redirect('/login')->with('message', 'Login to have access');
        }
    }
}
