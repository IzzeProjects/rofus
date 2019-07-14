<?php

namespace App\Http\Facades;

use Illuminate\Support\Facades\Facade;

class Logout extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Http\Services\Logout::class;
    }

}
