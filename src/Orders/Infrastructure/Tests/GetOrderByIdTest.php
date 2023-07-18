<?php

namespace Src\Orders\Infrastructure\Tests;

use Tests\TestCase;
use Src\Orders\Infrastructure\CreateOrder;
use Src\Orders\Infrastructure\Eloquent\Repositories\EloquentOrderRepository;
use Src\Orders\Infrastructure\GetOrderById;

class GetOrderByIdTest extends TestCase
{
    public function testGetById()
    {
        $repository = new EloquentOrderRepository();

        $orderId = self::CreateOrder($repository);

        $order = self::GetOrderById($repository, $orderId);

        // Verify that the ID of the found Order matches the ID of the created Order
        $this->assertEquals($orderId, $order->getId());
    }

    public static function CreateOrder($repository)
    {
        // Create a Order to search for it by ID
        $createOrder = new CreateOrder($repository);
        $orderId = $createOrder->save();
        return $orderId;
    }

    public static function GetOrderById($repository, $orderId)
    {
        // Find the created Order by ID
        $getOrderById = new GetOrderById($repository);
        $order = $getOrderById->getById($orderId->getValue());
        return $order;
    }
}
