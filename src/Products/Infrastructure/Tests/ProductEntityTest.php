<?php

namespace Src\Products\Infrastructure\Tests;

use Src\Products\Domain\Exceptions\SkuException;
use Tests\TestCase;
use Src\Products\Domain\ProductEntity;
use Src\Products\Domain\ValueObjects\Description;
use Src\Products\Domain\ValueObjects\Name;
use Src\Products\Domain\ValueObjects\Price;
use Src\Products\Domain\ValueObjects\Sku;
use Src\Shared\Domain\ValueObjects\Id;

class ProductEntityTest extends TestCase
{
    public function testCanBeCreated()
    {
        $id = new Id(1);
        $sku = new Sku('ABCD123456');
        $name = new Name('Product Name');
        $description = new Description('This is a product description.');
        $price = new Price(10.66);
        $createdAt = new \DateTimeImmutable('2023-01-01');
        $updatedAt = new \DateTimeImmutable('2023-01-02');

        $productEntity = new ProductEntity($id, $sku, $name, $description, $price, $createdAt, $updatedAt);

        $this->assertEquals($sku, $productEntity->getSku());
        $this->assertEquals($name, $productEntity->getName());
        $this->assertEquals($description, $productEntity->getDescription());
        $this->assertEquals($price, $productEntity->getPrice());
        $this->assertEquals($createdAt, $productEntity->getCreatedAt());
        $this->assertEquals($updatedAt, $productEntity->getUpdatedAt());
    }

    public function testThrowsExceptionIfSkuIsEmpty()
    {
        $this->expectException(SkuException::class);

        $id = new Id(123);
        $sku = new Sku('');
        $name = new Name('Product Name');
        $description = new Description('This is a product description.');
        $price = new Price(10.66);
        $createdAt = new \DateTimeImmutable('2023-01-01');
        $updatedAt = new \DateTimeImmutable('2023-01-02');

        new ProductEntity($id, $sku, $name, $description, $price, $createdAt, $updatedAt);
    }
}
