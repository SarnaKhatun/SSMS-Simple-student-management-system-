<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StudentTeacherMiddleware
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
        if (Auth()->user()->access_label == 0 || Auth()->user()->access_label == 1)
        {
            return $next($request);
        }
        return redirect('/dashboard')->with('error', 'u dont have to permission this page');
    }
}
