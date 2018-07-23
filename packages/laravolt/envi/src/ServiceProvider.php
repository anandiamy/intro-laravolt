<?php
/**
 * Created by PhpStorm.
 * User: javan
 * Date: 7/20/18
 * Time: 2:51 PM
 */
namespace Laravolt\Envi;

use Laravolt\Envi\Models\Env;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // ROUTES
        $this->loadRoutes();

        // VIEW
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'envi');

        app('laravolt.menu')->add('Environment Variables', route('envi::edit'))->data('icon', 'circle');


        $envis = Env::all();
        foreach ($envis as $envi) {
            putenv($envi['key'].'='.$envi['value']);
        }

    }

    protected function loadRoutes()
    {
        $router = $this->app['router'];
        require __DIR__.'/../routes/web.php';
    }
}