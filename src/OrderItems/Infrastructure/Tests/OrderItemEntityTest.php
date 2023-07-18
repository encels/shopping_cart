<?php

namespace Src\OrderItems\Infrastructure\Tests;

use Src\OrderItems\Domain\OrderItemEntity;
use  Src\Shared\Domain\ValueObjects\Quantity;
use Src\Shared\Domain\ValueObjects\Id;
use Tests\TestCase;


class OrderItemEntityTest extends TestCase
{
    public function testCanBeCreated()
    {
        $qty = 10;
        $orderId = 1;
        $productId = 1;

        $orderItemEntity = new OrderItemEntity(new Id($orderId), new Id($productId), new Quantity($qty));

        $this->assertEquals($qty, $orderItemEntity->getQuantity()->getValue());
        $this->assertEquals($orderId, $orderItemEntity->getOrderId()->getValue());
        $this->assertEquals($productId, $orderItemEntity->getProductId()->getValue());


    }
}
