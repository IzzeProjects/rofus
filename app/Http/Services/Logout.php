<?php

namespace App\Http\Services;

class Logout
{

    /**
     * Logout action
     *
     * @param string $route
     * @return string
     * @throws \Throwable
     */
    public function logout($route)
    {
        return view('client.layouts.partials.logout', compact('route'))->render();
    }

}
