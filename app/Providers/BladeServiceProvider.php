<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('input', function ($expression) {
            return "<?php echo Form::input($expression); ?>";
        });
        Blade::directive('textarea', function ($expression) {
            return "<?php echo Form::textarea($expression); ?>";
        });
        Blade::directive('select', function ($expression) {
            return "<?php echo Form::select($expression); ?>";
        });
        Blade::directive('selectSearch', function ($expression) {
            return "<?php echo Form::selectSearch($expression); ?>";
        });
        Blade::directive('selectMulti', function ($expression) {
            return "<?php echo Form::selectMulti($expression); ?>";
        });
        Blade::directive('file', function ($expression) {
            return "<?php echo Form::file($expression); ?>";
        });
        Blade::directive('imageIterator', function ($expression) {
            return "<?php echo Form::imageIterator($expression); ?>";
        });
        Blade::directive('errors', function ($expression) {
            return "<?php echo Form::errors(); ?>";
        });
        Blade::directive('links', function ($expression) {
            return "<?php echo Form::links($expression); ?>";
        });
        Blade::directive('delete', function ($expression) {
            return "<?php echo Form::delete($expression); ?>";
        });
    }
}
