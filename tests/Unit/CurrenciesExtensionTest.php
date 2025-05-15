<?php

namespace Xefi\Faker\Currencies\Tests\Unit;

use Random\Randomizer;
use Xefi\Faker\Currencies\Extensions\CurrenciesExtension;

final class CurrenciesExtensionTest extends TestCase
{
    protected array $currencies = [];
    protected array $symbols    = [];

    protected function setUp(): void
    {
        parent::setUp();

        $currenciesExtension = new CurrenciesExtension(new Randomizer());
        $this->currencies = (new \ReflectionClass($currenciesExtension))->getProperty('currencies')->getValue($currenciesExtension);
        $this->symbols = array_unique(array_column($this->currencies, 'symbol'));
    }

    public function testCurrency()
    {
        for ($i = 0; $i < count($this->currencies); $i++) {
            $currency = $this->faker->currency();

            $this->assertIsArray($currency);
            $this->assertArrayHasKey('code', $currency);
            $this->assertArrayHasKey('name', $currency);
            $this->assertArrayHasKey('symbol', $currency);
        }
    }

    public function testCurrencyCode()
    {
        for ($i = 0; $i < count($this->currencies); $i++) {
            $code = $this->faker->unique()->currencyCode();

            $this->assertIsString($code);
            $this->assertEquals(3, strlen($code));
        }
    }

    public function testCurrencyName()
    {
        for ($i = 0; $i < count($this->currencies); $i++) {
            $name = $this->faker->unique()->currencyName();

            $this->assertIsString($name);
            $this->assertNotEmpty($name);
        }
    }

    public function testCurrencySymbol()
    {
        for ($i = 0; $i < count($this->symbols); $i++) {
            $symbol = $this->faker->unique()->currencySymbol();

            $this->assertIsString($symbol);
            $this->assertNotEmpty($symbol);
        }
    }
}