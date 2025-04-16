<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class StoreLastVisitedUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() &&
            !$request->is('login') &&
            !$request->is('register') &&
            !$request->is('logout')  &&
            $request->method() === 'GET'
        ) {
            Session::put('url.intended', $request->fullUrl());
        }
        return $next($request);
    }
}
