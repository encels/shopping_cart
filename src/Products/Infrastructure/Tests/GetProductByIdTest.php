<?php

namespace Src\Products\Infrastructure\Tests;

use Tests\TestCase;
use Src\Products\Application\CreateProductUseCase;
use Src\Products\Domain\ProductEntity;
use Src\Products\Infrastructure\CreateProduct;
use Src\Products\Domain\ValueObjects\Description;
use Src\Products\Domain\ValueObjects\Name;
use Src\Products\Domain\ValueObjects\Price;
use Src\Products\Domain\ValueObjects\Sku;
use Src\Products\Infrastructure\Eloquent\Repositories\EloquentProductRepository;
use Src\Shared\Domain\ValueObjects\Id;

class GetProductByIdTest extends TestCase
{
    public function testGetById()
    {

        $repository = new EloquentProductRepository();
    
        $createProduct = new CreateProduct($repository);

        $id = $createProduct->save('ABCD654321', 'Product Name 2', 'This is a product description 2.', 10.66);
        
        $productFound = $repository->getById($id); //get the current product saved
        
        $this->assertEquals($id, $productFound->getId());

    }
}
