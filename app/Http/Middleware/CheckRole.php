<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$this->isAdmin()) {
            return redirect()->route('index');
        }
        return $next($request);
    }

    public function isAdmin($role = 'admin')
    {
        if ($role != 'admin') {
            return false;
        }
        return true;
    }
}
