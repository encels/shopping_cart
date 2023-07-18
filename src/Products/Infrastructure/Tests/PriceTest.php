<?php

namespace Src\Products\Infrastructure\Tests;

use Tests\TestCase;
use Src\Shared\Domain\ValueObjects\Price;
use Src\Shared\Domain\Exceptions\PriceException;

class PriceTest extends TestCase
{
    public function testValidPrice()
    {
        $price = new Price(10.99);

        $this->assertEquals(10.99, $price->getValue());
    }

    public function testInvalidPriceValue()
    {
        $this->expectException(PriceException::class);

        new Price(-5.0);
    }
}
