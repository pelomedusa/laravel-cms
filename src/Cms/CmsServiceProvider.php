<?php
namespace Pelomedusa\Cms;

use Illuminate\Auth\Events\Authenticated;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Pelomedusa\Cms\Commands\Cms;
/**
 * Class TwoFAProvider
 *
 * @package Whyounes\TFAuth
 */
class CmsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');

        $this->loadRoutesFrom(__DIR__.'/../routes/cms.php');

        $this->publishes([
            __DIR__.'/../public/' => public_path('cms'),
        ], 'public');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'cms');

/*        if ($this->app->runningInConsole()) {
            $this->commands([
                Cms::class,
            ]);
        }*/


        $this->publishes([
            __DIR__.'/../config/cms.php' => config_path('cms.php'),
        ]);

    }

    public function register()
    {
/*        $this->registerBindings();
        $this->registerEvents();
        $this->registerRoutes();*/
    }

    public function registerBindings()
    {

    }

    public function registerEvents()
    {

    }

    public function registerRoutes()
    {

    }
}