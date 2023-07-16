<?php

namespace Src\Products\Infrastructure\Tests;

use Tests\TestCase;
use Src\Products\Infrastructure\Eloquent\Repositories\EloquentProductRepository;

class EloquentProductRepositoryTest extends TestCase
{

    public  function testCanCreateAndGetById()
    {
        $repository = new EloquentProductRepository();
        
        $productEntity = ProductEntityTest::createProductEntityTest();

        $id = $repository->save($productEntity);

        $productEntitySaved = $repository->getById($id);

        $this->assertEquals($productEntity->getSku(), $productEntitySaved->getSku());
        $this->assertEquals($productEntity->getName(), $productEntitySaved->getName());
        $this->assertEquals($productEntity->getDescription(), $productEntitySaved->getDescription());
        $this->assertEquals($productEntity->getPrice(), $productEntitySaved->getPrice());
    }
}
