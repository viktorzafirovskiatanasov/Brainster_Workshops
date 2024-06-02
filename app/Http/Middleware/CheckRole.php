<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->user()->role->name == 'admin'){
            return to_route('admin.dashboard');
        } else if($request->user()->role->name == 'editor'){
            return to_route('editor.dashboard');
        }

        return $next($request);
    }
}