<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Active
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
        $path = explode('/',$request->path());

        Session::put('active', 1);

	    if(in_array('dashboard',$path)){
		    Session::put('active', 2);
	    }

        if(in_array('blog',$path)){
		    Session::put('active', 3);
	    }

        if(in_array('contact',$path)){
		    Session::put('active', 4);
	    }


        return $next($request);
    }
}
