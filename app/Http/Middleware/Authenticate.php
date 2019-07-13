<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{

    /**
     * @param $request
     * @param Closure $next
     * @param array ...$guards
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $status = $this->authenticate($request->route()->getName());
        if ($status != 'authenticated') {
            return redirect()->route($status);
        }
        return $next($request);
    }

    /**
     * @param string $route
     * @return string
     */
    protected function authenticate($route)
    {
        if (!Auth::check()) {
            if (strpos($route, 'admin.') === 0) {
                return 'admin.login.form';
            } else {
                return 'login';
            }
        }
        return 'authenticated';
    }
}
