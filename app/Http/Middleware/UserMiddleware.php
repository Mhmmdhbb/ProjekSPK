<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isUser()) {
            return $next($request);
        }

        if (Auth::check() && Auth::user()->isAdmin()) {
            return redirect()->route('admin.dashboard')
                ->with('error', 'Anda login sebagai Admin.');
        }

        return redirect()->route('login');
    }
}
