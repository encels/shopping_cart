<?php

namespace Src\CartItems\Infrastructure\Tests;

use Src\CartItems\Domain\CartItemEntity;
use  Src\Shared\Domain\ValueObjects\Quantity;
use Src\CartItems\Infrastructure\Eloquent\Repositories\EloquentCartItemRepository;
use Src\Carts\Infrastructure\Eloquent\CartModel;
use Src\Carts\Infrastructure\Eloquent\Repositories\EloquentCartRepository;
use Src\Carts\Infrastructure\Tests\GetCartByIdTest;
use Src\Products\Infrastructure\Eloquent\ProductModel;
use Src\Products\Infrastructure\Eloquent\Repositories\EloquentProductRepository;
use Src\Products\Infrastructure\Tests\CreateProductTest;
use Src\Shared\Domain\ValueObjects\Id;
use Tests\TestCase;


class EloquentCartItemRepositoryTest extends TestCase
{
    public function testCanBeCreated()
    {
        $repository = new EloquentCartItemRepository();

        $qty = 10;
        $cartProductIds = self::getCartAndProductIds();
        $cartId = $cartProductIds['cartId'];
        $productId = $cartProductIds['productId'];

        $cartItemEntity = new CartItemEntity(new Id($cartId), new Id($productId), new Quantity($qty));

        $id = $repository->save($cartItemEntity);

        $cartItemEntitySaved = $repository->getById($id);

        $this->assertEquals(
            $cartItemEntity->getQuantity()->getValue(),
            $cartItemEntitySaved->getQuantity()->getValue()
        );
        $this->assertEquals(
            $cartItemEntity->getCartId()->getValue(),
            $cartItemEntitySaved->getCartId()->getValue()
        );
        $this->assertEquals(
            $cartItemEntity->getProductId()->getValue(),
            $cartItemEntitySaved->getProductId()->getValue()
        );
    }

    public static function getCartAndProductIds()
    {

        $repositoryCart = new EloquentCartRepository();
        $repositoryProduct = new EloquentProductRepository();

        $cartId = CartModel::inRandomOrder()->first()?->id;
        $productId = ProductModel::inRandomOrder()->first()?->id;

        $cartId = $cartId ?: GetCartByIdTest::CreateCart($repositoryCart)->getValue();
        $productId = $productId ?: CreateProductTest::createProductTest($repositoryProduct)->getValue();

        return array('cartId' => $cartId, 'productId' => $productId);
    }
}
