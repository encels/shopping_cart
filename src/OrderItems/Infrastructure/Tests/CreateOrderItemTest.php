<?php

namespace Src\OrderItems\Infrastructure\Tests;

use Src\OrderItems\Infrastructure\CreateOrderItem;
use Src\OrderItems\Infrastructure\Eloquent\Repositories\EloquentOrderItemRepository;
use Tests\TestCase;


class CreateOrderItemTest extends TestCase
{
    public function testCanBeCreated()
    {
        $repository = new EloquentOrderItemRepository();

        $id = self::createOrderItemTest($repository);

        $orderItemEntitySaved = $repository->getById($id);

        $this->assertEquals($id, $orderItemEntitySaved->getId());
    }

    public static function createOrderItemTest($repository)
    {
        $qty = 10;
        $orderProductIds = EloquentOrderItemRepositoryTest::getOrderAndProductIds();
        $orderId = $orderProductIds['OrderId'];
        $productId = $orderProductIds['productId'];

        $createOrderItem = new CreateOrderItem($repository);

        return $createOrderItem->save($orderId, $productId, $qty);
    }
    
}
