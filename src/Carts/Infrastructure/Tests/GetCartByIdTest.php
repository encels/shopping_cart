<?php

namespace Src\Carts\Infrastructure\Tests;

use Tests\TestCase;
use Src\Carts\Infrastructure\CreateCart;
use Src\Carts\Infrastructure\Eloquent\Repositories\EloquentCartRepository;
use Src\Carts\Infrastructure\GetCartById;

class GetCartByIdTest extends TestCase
{
    public function testGetById()
    {
        $repository = new EloquentCartRepository();

        // Create a cart to search for it by ID
        $createCart = new CreateCart($repository);
        $cartId = $createCart->save();

        // Find the created cart by ID
        $getCartById = new GetCartById($repository);
        $cart = $getCartById->getById($cartId->getValue());

        // Verify that the ID of the found cart matches the ID of the created cart
        $this->assertEquals($cartId, $cart->getId());
    }
}
