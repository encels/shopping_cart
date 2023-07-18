<?php

namespace Src\CartItems\Infrastructure\Tests;

use Src\CartItems\Domain\ValueObjects\Quantity;
use Src\CartItems\Infrastructure\Eloquent\Repositories\EloquentCartItemRepository;
use Src\CartItems\Infrastructure\UpdateQuantity;
use Tests\TestCase;


class UpdateQuantityTest extends TestCase
{
    public function testChangeQuantity()
    {
        $repository = new EloquentCartItemRepository();

        $newQty = random_int(100,1000); // original value 10

        $id = GetCartItemByIdTest::createCartItem($repository);

        $object = GetCartItemByIdTest::getCartItemById($repository, $id);

        $qtyOld = $object->getQuantity();
        $updateQuantity = new UpdateQuantity($repository);

        $updateQuantity->updateQuantity($id, $newQty);

        $this->assertNotEquals($qtyOld, new Quantity($newQty));
    }
}
