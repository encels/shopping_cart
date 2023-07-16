<?php

namespace Src\Carts\Infrastructure\Tests;

use Src\Carts\Domain\CartEntity;
use Tests\TestCase;
use Src\Shared\Domain\ValueObjects\Id;

class CartEntityTest extends TestCase
{
    public function testCanBeCreated()
    {
        $id = new Id(123);
        $cartEntity = new CartEntity();
        $cartEntity->setId($id);

        // Verify that the ID set cart matches the ID of the created cartentity
        $this->assertEquals($id, $cartEntity->getId());
    }
}
