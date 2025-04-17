<?php

namespace Xefi\Faker\Currencies;

use Xefi\Faker\Currencies\Extensions\CurrenciesExtension;
use Xefi\Faker\Providers\Provider;

class CurrenciesServiceProvider extends Provider
{
    public function boot(): void
    {
        $this->extensions([
            CurrenciesExtension::class
        ]);
    }
}