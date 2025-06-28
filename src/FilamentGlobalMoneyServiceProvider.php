<?php

namespace Bagongd3\FilamentGlobalMoney;

use Illuminate\Support\ServiceProvider;

class FilamentGlobalMoneyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/filament-global-money.php', 'filament-global-money');
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/filament-global-money.php' => config_path('filament-global-money.php'),
        ], 'filament-global-money-config');
    }
}
