<?php

namespace App\Providers;

use App\Services\CurrencyConverter\CurrencyApiService;
use App\Services\CurrencyConverter\CurrencyConverterInterface;
use Illuminate\Support\ServiceProvider;

class ThirdPartyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CurrencyConverterInterface::class, CurrencyApiService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}