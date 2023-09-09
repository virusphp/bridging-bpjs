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
            __DIR__.'../../../config/vclaim.php' => config_path('vclaim.php'),
            __DIR__.'../../../config/icare.php' => config_path('icare.php'),
            __DIR__.'../../../config/antrol.php' => config_path('antrol.php'),
            __DIR__.'../../../config/kemkes.php' => config_path('kemkes.php'),
        ], 'config');
    }
}
