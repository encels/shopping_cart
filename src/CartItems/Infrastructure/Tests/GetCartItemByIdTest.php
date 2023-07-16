<?php

namespace Src\CartItems\Infrastructure\Tests;

use Src\CartItems\Infrastructure\Eloquent\CartItemModel;
use Src\CartItems\Infrastructure\Eloquent\Repositories\EloquentCartItemRepository;
use Src\CartItems\Infrastructure\GetCartItemById;
use Tests\TestCase;


class GetCartItemByIdTest extends TestCase
{
    public function testCanBeCreated()
    {
        $repository = new EloquentCartItemRepository();


        $cartItemId = self::createCartItem($repository);

        $object = self::getCartItemById($repository, $cartItemId);

        $this->assertEquals($cartItemId, $object->getId()->getValue());
    }

    public static function getCartItemById($repository, $id)
    {
        $productFound = new GetCartItemById($repository);
        $object = $productFound->find($id); //find the product by Id

        return $object;
    }

    public static function createCartItem($repository)
    {
        $cartItemId = CartItemModel::inRandomOrder()->first()?->id;
        $cartItemId = $cartItemId ?: CreateCartItemTest::createCartItemTest($repository)->getValue();

        return $cartItemId;
    }
}
