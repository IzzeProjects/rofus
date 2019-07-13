<?php

namespace App\Http\Facades;

use Illuminate\Support\Facades\Facade;

class Form extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Http\Services\Form::class;
    }

}
