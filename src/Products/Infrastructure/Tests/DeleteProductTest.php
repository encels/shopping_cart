<?php

namespace Src\Products\Infrastructure\Tests;

use Tests\TestCase;
use Src\Products\Infrastructure\DeleteProduct;
use Src\Products\Infrastructure\Eloquent\Repositories\EloquentProductRepository;

class DeleteProductTest extends TestCase
{
    public function testCanCreateFindAndDelete()
    {

        $repository = new EloquentProductRepository();

        $id = CreateProductTest::createProductTest($repository);

        $object = GetProductByIdTest::getProductById($repository,$id); //found

        $this->assertIsObject($object);

        $deleteProduct = new DeleteProduct($repository);
        $deleteProduct->delete($id->getValue());

        $object = GetProductByIdTest::getProductById($repository, $id); // not found

        $this->assertNull($object);
    }
}
