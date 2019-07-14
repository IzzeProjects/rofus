<?php

namespace App\Http\Controllers;

use GrahamCampbell\Throttle\Facades\Throttle;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param Request $request
     * @param int $count
     * @param int $time
     * @return bool
     */
    public function throttleCheck($request, $count, $time)
    {
        $throttler = Throttle::get($request->instance(), $count, $time);

        return $throttler->attempt($request);
    }
}
