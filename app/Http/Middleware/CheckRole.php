<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        if (!$this->roleAdmin()) {
            $this->errorMessage();
            return redirect()->route('index');
        }
        return $next($request);
    }

    private function roleAdmin()
    {
        if (Auth::user()::isAdmin()) {
            return true;
        }
        return false;
    }

    private function errorMessage()
    {
        Session::flash('denied', 'Access denied!');
    }
}
