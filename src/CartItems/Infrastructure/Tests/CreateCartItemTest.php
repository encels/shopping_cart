<?php

namespace Src\CartItems\Infrastructure\Tests;

use Src\CartItems\Infrastructure\CreateCartItem;
use Src\CartItems\Infrastructure\Eloquent\Repositories\EloquentCartItemRepository;
use Tests\TestCase;


class CreateCartItemTest extends TestCase
{
    public function testCanBeCreated()
    {
        $repository = new EloquentCartItemRepository();

        $id = self::createCartItemTest($repository);

        $cartItemEntitySaved = $repository->getById($id);

        $this->assertEquals($id, $cartItemEntitySaved->getId());
    }

    public static function createCartItemTest($repository)
    {
        $qty = 10;
        $cartProductIds = EloquentCartItemRepositoryTest::getCartAndProductIds();
        $cartId = $cartProductIds['cartId'];
        $productId = $cartProductIds['productId'];

        $createCartItem = new CreateCartItem($repository);

        return $createCartItem->save($cartId, $productId, $qty);
    }
    
}
