<?php
namespace Pelomedusa\Cms;


use Illuminate\Support\ServiceProvider;
use Pelomedusa\Cms\Commands\CmsMigrate;
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
            __DIR__.'/Controllers' => public_path('cms'),
        ], 'public');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'cms');

        if ($this->app->runningInConsole()) {
            $this->commands([
                CmsMigrate::class,
            ]);
        }


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