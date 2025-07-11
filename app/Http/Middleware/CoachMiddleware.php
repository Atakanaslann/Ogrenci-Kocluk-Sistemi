<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoachMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role !== 'coach') {
            return redirect()->route('account.dashboard')->with('error', 'Bu sayfaya erişim yetkiniz yok.');
        }

        return $next($request);
    }
} 