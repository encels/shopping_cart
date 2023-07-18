<?php

namespace Src\Orders\Infrastructure\Tests;

use Src\Orders\Domain\OrderEntity;
use Tests\TestCase;
use Src\Shared\Domain\ValueObjects\Id;

class OrderEntityTest extends TestCase
{
    public function testCanBeCreated()
    {
        $id = new Id(123);
        $orderEntity = new OrderEntity();
        $orderEntity->setId($id);

        // Verify that the ID set Order matches the ID of the created Orderentity
        $this->assertEquals($id, $orderEntity->getId());
    }
}
