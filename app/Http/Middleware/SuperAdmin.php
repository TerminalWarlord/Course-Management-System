<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if(!Session::has('role') || Session::has('role')=='teacher'||Session::has('role')=='student'||Session::has('role')=='department_admin'){
        //     return redirect('/login');
        // }
        if(Session::has('role')!='super_admin'){
            return redirect('/dashboard');
        }
        return $next($request);
    }
}