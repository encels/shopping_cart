<?php

namespace Src\Products\Infrastructure\Tests;

use Src\Products\Domain\Exceptions\SkuException;
use Tests\TestCase;
use Src\Products\Domain\ProductEntity;
use Src\Products\Domain\ValueObjects\Description;
use Src\Products\Domain\ValueObjects\Name;
use Src\Products\Domain\ValueObjects\Price;
use Src\Products\Domain\ValueObjects\Sku;

class ProductEntityTest extends TestCase
{
    public function testCanBeCreated()
    {
        $sku = new Sku('ABCD123456');
        $name = new Name('Product Name');
        $description = new Description('This is a product description.');
        $price = new Price(10.66);
     

        $productEntity = new ProductEntity($sku, $name, $description, $price);

        $this->assertEquals($sku, $productEntity->getSku());
        $this->assertEquals($name, $productEntity->getName());
        $this->assertEquals($description, $productEntity->getDescription());
        $this->assertEquals($price, $productEntity->getPrice());
     
    }

    public function testThrowsExceptionIfSkuIsEmpty()
    {
        $this->expectException(SkuException::class);

        $sku = new Sku('');
        $name = new Name('Product Name');
        $description = new Description('This is a product description.');
        $price = new Price(10.66);

        new ProductEntity( $sku, $name, $description, $price);
    }
}
