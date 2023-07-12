<?php

namespace Src\Products\Infrastructure\Tests;

use Tests\TestCase;
use Src\Products\Domain\ValueObjects\Price;
use InvalidArgumentException;

class PriceTest extends TestCase
{
    public function testValidPrice()
    {
        $price = new Price(10.99);

        $this->assertEquals(10.99, $price->getValue());
    }

    public function testInvalidPriceValue()
    {
        $this->expectException(InvalidArgumentException::class);

        new Price(-5.0);
    }
}