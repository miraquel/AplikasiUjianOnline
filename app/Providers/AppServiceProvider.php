<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('fa', function($font) {
          $iniloh = "<span class='fa fa-".$font."' aria-hidden='true'></span>";
            return $iniloh;
        });

        Schema::DefaultStringLength('191');
        $this->publishes([
            'vendor/twbs/bootstrap' => public_path('vendor/bootstrap'),
          ], 'public');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
