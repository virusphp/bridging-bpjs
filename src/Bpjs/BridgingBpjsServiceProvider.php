<?php

namespace Bpjs\Bridging;

use Illuminate\Support\ServiceProvider;

class BridgingBpjsServiceProvider extends ServiceProvider
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
            __DIR__.'../../../../../config/bpjs.php' => config_path('bpjs.php'),
        ], 'config');
    }
}
