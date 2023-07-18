<?php

namespace Src\OrderItems\Infrastructure\Tests;

use  Src\Shared\Domain\ValueObjects\Quantity;
use Src\OrderItems\Infrastructure\Eloquent\Repositories\EloquentOrderItemRepository;
use Src\OrderItems\Infrastructure\UpdateQuantity;
use Tests\TestCase;


class UpdateQuantityTest extends TestCase
{
    public function testChangeQuantity()
    {
        $repository = new EloquentOrderItemRepository();

        $newQty = random_int(100,1000); // original value 10

        $id = GetOrderItemByIdTest::createOrderItem($repository);

        $object = GetOrderItemByIdTest::getOrderItemById($repository, $id);

        $qtyOld = $object->getQuantity();
        $updateQuantity = new UpdateQuantity($repository);

        $updateQuantity->updateQuantity($id, $newQty);

        $this->assertNotEquals($qtyOld, new Quantity($newQty));
    }
}
