<?php

namespace Src\OrderItems\Infrastructure\Tests;

use Src\OrderItems\Infrastructure\Eloquent\OrderItemModel;
use Src\OrderItems\Infrastructure\Eloquent\Repositories\EloquentOrderItemRepository;
use Src\OrderItems\Infrastructure\GetOrderItemById;
use Tests\TestCase;


class GetOrderItemByIdTest extends TestCase
{
    public function testCanBeCreated()
    {
        $repository = new EloquentOrderItemRepository();


        $orderItemId = self::createOrderItem($repository);

        $object = self::getOrderItemById($repository, $orderItemId);

        $this->assertEquals($orderItemId, $object->getId()->getValue());
    }

    public static function getOrderItemById($repository, $id)
    {
        $productFound = new GetOrderItemById($repository);
        $object = $productFound->find($id); //find the product by Id

        return $object;
    }

    public static function createOrderItem($repository)
    {
        $orderItemId = OrderItemModel::inRandomOrder()->first()?->id;
        $orderItemId = $orderItemId ?: CreateOrderItemTest::createOrderItemTest($repository)->getValue();

        return $orderItemId;
    }
}
