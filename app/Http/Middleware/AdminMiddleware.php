<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AdminMiddleware
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
        if (Auth::user()->type == 'admin')
        {
            return $next($request);

        }
        elseif(Auth::user()->type == 'user')
        {
            return redirect('/');
        }
        else
        {
            return redirect('/login')->with('status','Access Denied. As you are not Admin ');
        }

      //  return $next($request);

/*        if (Auth::user()->type==='admin')
        {
            return $next($request);
        }
        else
        {
            session()->flush();
            return redirect('/login')->with('status','get burdan');
return redirect('/login')->with('status','Access Denied. As you are not Admin ');
        }*/
    }
}
