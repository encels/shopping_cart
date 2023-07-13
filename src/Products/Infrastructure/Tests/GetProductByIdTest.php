<?php

namespace Src\Products\Infrastructure\Tests;

use Tests\TestCase;
use Src\Products\Infrastructure\CreateProduct;
use Src\Products\Infrastructure\Eloquent\Repositories\EloquentProductRepository;
use Src\Products\Infrastructure\GetProductById;

class GetProductByIdTest extends TestCase
{
    public function testGetById()
    {

        $repository = new EloquentProductRepository();

        $createProduct = new CreateProduct($repository);

        $id = $createProduct->save('ABCD654321', 'Product Name 2', 'This is a product description 2.', 10.66);
        
        $productFound = new GetProductById($repository);
        $object = $productFound->find($id->getValue()); //find the product by Id

        $this->assertEquals($id, $object->getId());
    }
}
