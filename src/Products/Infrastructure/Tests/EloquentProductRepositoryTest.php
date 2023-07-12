<?php

namespace Src\Products\Infrastructure\Tests;

use PHPUnit\Framework\TestCase;
use Src\Products\Domain\ProductEntity;
use Src\Products\Domain\ValueObjects\Description;
use Src\Products\Domain\ValueObjects\Name;
use Src\Products\Domain\ValueObjects\Price;
use Src\Products\Domain\ValueObjects\Sku;
use Src\Products\Infrastructure\Eloquent\Repositories\EloquentProductRepository;

class EloquentProductRepositoryTest extends TestCase
{

    public static  function testCanGetById()
    {
        $repository = new EloquentProductRepository();
        $id = 1;
        $sku = new Sku('ABCD123456');
        $name = new Name('Product Name');
        $description = new Description('This is a product description.');
        $price = new Price(10.66);
        $createdAt = new \DateTimeImmutable('2023-01-01');
        $updatedAt = new \DateTimeImmutable('2023-01-02');

        $productEntity = new ProductEntity($id, $sku, $name, $description, $price, $createdAt, $updatedAt);

        $id = $repository->save($productEntity);

        $productEntity = $repository->getById($id);

        parent::assertEquals($sku, $productEntity->getSku());
        parent::assertEquals($name, $productEntity->getName());
        parent::assertEquals($description, $productEntity->getDescription());
        parent::assertEquals($price, $productEntity->getPrice());

    }

}
