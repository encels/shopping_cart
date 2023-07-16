<?php

namespace Src\Products\Infrastructure\Tests;

use Tests\TestCase;
use Src\Products\Infrastructure\CreateProduct;
use Src\Products\Infrastructure\DeleteProduct;
use Src\Products\Infrastructure\Eloquent\Repositories\EloquentProductRepository;
use Src\Products\Infrastructure\GetProductById;

class DeleteProductTest extends TestCase
{
    public function testCanCreateFindAndDelete()
    {

        $repository = new EloquentProductRepository();

        $createProduct = new CreateProduct($repository);

        $id = $createProduct->save('ABCD654321', 'Product Name 2', 'This is a product description 2.', 10.66);

        $productFound = new GetProductById($repository);
        $productFound->find($id->getValue()); //find the product by Id

        $this->assertIsObject($productFound->find($id->getValue()));

        $deleteProduct = new DeleteProduct($repository);
        $deleteProduct->delete($id->getValue());
       
        $this->assertNull( $productFound->find($id->getValue()));
    }
}
