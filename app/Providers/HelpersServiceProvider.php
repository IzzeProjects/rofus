<?php

namespace App\Providers;

use App\Http\Services\Form;
use App\Http\Services\Logout;
use Illuminate\Support\ServiceProvider;

class HelpersServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Form::class, function ($app) {
            return new Form();
        });

        $this->app->singleton(Logout::class, function ($app) {
            return new Logout();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
