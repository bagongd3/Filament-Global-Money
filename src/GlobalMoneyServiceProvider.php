<?php

namespace Bagongd3\GlobalMoney;

use Illuminate\Support\ServiceProvider;

class GlobalMoneyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/global-money.php', 'global-money');
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/global-money.php' => config_path('global-money.php'),
        ], 'global-money-config');
    }
}
