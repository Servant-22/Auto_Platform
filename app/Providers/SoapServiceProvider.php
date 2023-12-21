<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\VehicleInfoService;
use Artisaninweb\SoapWrapper\SoapWrapper;

class SoapServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(VehicleInfoService::class, function ($app) {
            return new VehicleInfoService(new SoapWrapper());
        });
    }

    public function boot()
    {
        // Boot methoden kunnen hier worden toegevoegd indien nodig
    }
}


