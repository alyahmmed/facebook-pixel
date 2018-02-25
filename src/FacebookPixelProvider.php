<?php

namespace Alyahmmed\FacebookPixel;

use Illuminate\Support\ServiceProvider;

class FacebookPixelProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        $this->publishes([__DIR__ . '/plugin' => base_path('/')]);
        // \Artisan::call('migrate', ["--force"=> true]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

}
