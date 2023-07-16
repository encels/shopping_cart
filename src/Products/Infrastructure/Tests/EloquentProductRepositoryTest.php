<?php

namespace Src\Products\Infrastructure\Tests;

use Tests\TestCase;
use Src\Products\Domain\ProductEntity;
use Src\Products\Domain\ValueObjects\Description;
use Src\Products\Domain\ValueObjects\Name;
use Src\Products\Domain\ValueObjects\Price;
use Src\Products\Domain\ValueObjects\Sku;
use Src\Products\Infrastructure\Eloquent\Repositories\EloquentProductRepository;
use Src\Shared\Domain\ValueObjects\Id;

class EloquentProductRepositoryTest extends TestCase
{

    public  function testCanGetById()
    {
        $repository = new EloquentProductRepository();
        $sku = new Sku('ABCD123456');
        $name = new Name('Product Name');
        $description = new Description('This is a product description.');
        $price = new Price(10.66);
        
        $productEntity = new ProductEntity($sku, $name, $description, $price);

        $id = $repository->save($productEntity);

        $productEntity = $repository->getById($id);

        $this->assertEquals($sku, $productEntity->getSku());
        $this->assertEquals($name, $productEntity->getName());
        $this->assertEquals($description, $productEntity->getDescription());
        $this->assertEquals($price, $productEntity->getPrice());
    }
}
