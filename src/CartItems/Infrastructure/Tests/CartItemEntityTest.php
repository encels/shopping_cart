<?php

namespace Src\CartItems\Infrastructure\Tests;

use Src\CartItems\Domain\CartItemEntity;
use  Src\Shared\Domain\ValueObjects\Quantity;
use Src\Shared\Domain\ValueObjects\Id;
use Tests\TestCase;


class CartItemEntityTest extends TestCase
{
    public function testCanBeCreated()
    {
        $qty = 10;
        $cartId = 1;
        $productId = 1;

        $cartItemEntity = new CartItemEntity(new Id($cartId), new Id($productId), new Quantity($qty));

        $this->assertEquals($qty, $cartItemEntity->getQuantity()->getValue());
        $this->assertEquals($cartId, $cartItemEntity->getCartId()->getValue());
        $this->assertEquals($productId, $cartItemEntity->getProductId()->getValue());


    }
}
