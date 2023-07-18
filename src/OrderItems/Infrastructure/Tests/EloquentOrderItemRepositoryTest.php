<?php

namespace Src\OrderItems\Infrastructure\Tests;

use Src\OrderItems\Domain\OrderItemEntity;
use  Src\Shared\Domain\ValueObjects\Quantity;
use Src\OrderItems\Infrastructure\Eloquent\Repositories\EloquentOrderItemRepository;
use Src\Orders\Infrastructure\Eloquent\OrderModel;
use Src\Orders\Infrastructure\Eloquent\Repositories\EloquentOrderRepository;
use Src\Orders\Infrastructure\Tests\GetOrderByIdTest;
use Src\Products\Infrastructure\Eloquent\ProductModel;
use Src\Products\Infrastructure\Eloquent\Repositories\EloquentProductRepository;
use Src\Products\Infrastructure\Tests\CreateProductTest;
use Src\Shared\Domain\ValueObjects\Id;
use Tests\TestCase;


class EloquentOrderItemRepositoryTest extends TestCase
{
    public function testCanBeCreated()
    {
        $repository = new EloquentOrderItemRepository();

        $qty = 10;
        $orderProductIds = self::getOrderAndProductIds();
        $orderId = $orderProductIds['OrderId'];
        $productId = $orderProductIds['productId'];

        $orderItemEntity = new OrderItemEntity(new Id($orderId), new Id($productId), new Quantity($qty));

        $id = $repository->save($orderItemEntity);

        $orderItemEntitySaved = $repository->getById($id);

        $this->assertEquals(
            $orderItemEntity->getQuantity()->getValue(),
            $orderItemEntitySaved->getQuantity()->getValue()
        );
        $this->assertEquals(
            $orderItemEntity->getOrderId()->getValue(),
            $orderItemEntitySaved->getOrderId()->getValue()
        );
        $this->assertEquals(
            $orderItemEntity->getProductId()->getValue(),
            $orderItemEntitySaved->getProductId()->getValue()
        );
    }

    public static function getOrderAndProductIds()
    {

        $repositoryOrder = new EloquentOrderRepository();
        $repositoryProduct = new EloquentProductRepository();

        $orderId = OrderModel::inRandomOrder()->first()?->id;
        $productId = ProductModel::inRandomOrder()->first()?->id;

        $orderId = $orderId ?: GetOrderByIdTest::CreateOrder($repositoryOrder)->getValue();
        $productId = $productId ?: CreateProductTest::createProductTest($repositoryProduct)->getValue();

        return array('OrderId' => $orderId, 'productId' => $productId);
    }
}
