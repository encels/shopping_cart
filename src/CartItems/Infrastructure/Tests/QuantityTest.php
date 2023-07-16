<?php

namespace Src\CartItems\Infrastructure\Tests;

use Src\CartItems\Domain\Exceptions\QuantityException;
use Src\CartItems\Domain\ValueObjects\Quantity;
use Tests\TestCase;


class QuantityTest extends TestCase
{
    public function testValidQuantity()
    {
        $qty= new Quantity(10);

        $this->assertEquals(10, $qty->getValue());
    }

    public function testInvalidQtyValue()
    {
        $this->expectException(QuantityException::class);

        new Quantity(-5);
    }
}
