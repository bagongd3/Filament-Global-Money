<?php

namespace Bagongd3\FilamentGlobalMoney\Infolists\Components;

use Filament\Infolists\Components\TextEntry;
use Illuminate\Support\Facades\Config;

class MoneyEntry extends TextEntry
{
    protected function setUp(): void
    {
        parent::setUp();

        $prefix = Config::get('filament-global-money.prefix', 'Rp');
        $suffix = Config::get('filament-global-money.suffix', '');
        $decimal = Config::get('filament-global-money.decimal_separator', ',');
        $thousands = Config::get('filament-global-money.thousands_separator', '.');
        $decimals = Config::get('filament-global-money.decimals', 2);

        $this
            ->formatStateUsing(function ($state) use ($prefix, $suffix, $decimal, $thousands, $decimals) {
                if ($state === null) return '-';
                $formatted = number_format($state, $decimals, $decimal, $thousands);
                $formatted = preg_replace('/' . preg_quote($decimal) + '0+$/', '', $formatted);
                return $prefix . ' ' . $formatted . $suffix;
            });
    }
}