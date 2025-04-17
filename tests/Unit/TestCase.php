<?php

namespace Xefi\Faker\Currencies\Tests\Unit;

use Xefi\Faker\Currencies\CurrenciesServiceProvider;
use Xefi\Faker\Container\Container;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected Container $faker;

    protected function setUp(): void
    {
        Container::packageManifestPath('/tmp/packages.php');

        (new CurrenciesServiceProvider())->boot();

        $this->faker = new Container(false);
    }
}