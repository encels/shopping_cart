<?php

namespace Src\CartItems\Infrastructure\Tests;

use  Src\Shared\Domain\Exceptions\QuantityException;
use  Src\Shared\Domain\ValueObjects\Quantity;
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
