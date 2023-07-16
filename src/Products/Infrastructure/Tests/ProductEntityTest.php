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
        $productEntity =
            self::createProductEntityTest(
                'ABCD123456',
                'Product Name',
                'This is a product description.',
                10.66
            );

        $this->assertEquals('ABCD123456', $productEntity->getSku()->getValue());
        $this->assertEquals('Product Name', $productEntity->getName()->getValue());
        $this->assertEquals('This is a product description.', $productEntity->getDescription()->getValue());
        $this->assertEquals(10.66, $productEntity->getPrice()->getValue());
    }

    public function testThrowsExceptionIfSkuIsEmpty()
    {
        $this->expectException(SkuException::class);

        self::createProductEntityTest('');
    }

    public static function createProductEntityTest(
        $sku = 'ABCD123456',
        $name = 'Product Name',
        $description = 'This is a product description.',
        $price = 10.66
    ) {

        $sku = new Sku($sku);
        $name = new Name($name);
        $description = new Description($description);
        $price = new Price($price);


        return new ProductEntity($sku, $name, $description, $price);
    }
}
