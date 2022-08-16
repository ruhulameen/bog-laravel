<?php

namespace Ruhul\BOGaming;

use Illuminate\Support\ServiceProvider;

class BlueOceanGamingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/bog.php' => config_path('blueoceangaming.php'),
        ], 'bog-config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('blueoceangaming', function ($app) {
            return new BlueOceanGaming();
        });
    }
}
