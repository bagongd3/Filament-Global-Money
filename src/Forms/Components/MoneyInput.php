<?php

namespace Bagongd3\GlobalMoney\Forms\Components;

use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Config;

class MoneyInput extends TextInput
{
    protected function setUp(): void
    {
        parent::setUp();

        $prefix = Config::get('global-money.prefix', 'Rp');
        $suffix = Config::get('global-money.suffix', '');
        $decimal = Config::get('global-money.decimal_separator', ',');
        $thousands = Config::get('global-money.thousands_separator', '.');
        $decimals = Config::get('global-money.decimals', 2);

        $this
            ->prefix($prefix)
            ->suffix($suffix)
            ->numeric()
            ->formatStateUsing(function ($state) use ($decimal, $thousands, $decimals) {
                if ($state === null) return null;
                $formatted = number_format($state, $decimals, $decimal, $thousands);
                return preg_replace('/' . preg_quote($decimal) + '0+$/', '', $formatted);
            })
            ->dehydrateStateUsing(function ($state) use ($decimal, $thousands) {
                return (float) str_replace([$thousands, $decimal], ['', '.'], $state);
            })
            ->extraAttributes(['inputmode' => 'decimal']);
    }
}