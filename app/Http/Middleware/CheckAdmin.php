<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class CheckAdmin
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
        if (Session::has('level') && session('level') == 1) {
            return $next($request);
        }
        // session(['level' => 1]);
        // dd("aa");
        // dd(session()->all());

        return redirect()->route('login.login');
    }
}
