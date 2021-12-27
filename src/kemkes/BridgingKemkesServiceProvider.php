<?php

namespace Kemkes\Bridging;

use Illuminate\Support\ServiceProvider;

class BridgingKemkesServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
       include __DIR__.'../../routes.php';
       
       $this->publishes([
            __DIR__.'../../../../config/kemkes.php' => config_path('kemkes.php'),
        ], 'config');
    }
}
