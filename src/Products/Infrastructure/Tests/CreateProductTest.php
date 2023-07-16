<?php

namespace Src\Products\Infrastructure\Tests;

use Tests\TestCase;
use Src\Products\Infrastructure\CreateProduct;
use Src\Products\Infrastructure\Eloquent\Repositories\EloquentProductRepository;

class CreateProductTest extends TestCase
{
    public function testCanBeSave()
    {

        $repository = new EloquentProductRepository();

        $id = self::createProductTest($repository);

        $productCreated = $repository->getById($id); //get the current product saved

        $this->assertEquals('ABCD123456', $productCreated->getSku()->getValue());
        $this->assertEquals('Product Name', $productCreated->getName()->getValue());
        $this->assertEquals(
            'This is a product description.',
            $productCreated->getDescription()->getValue()
        );
        $this->assertEquals(10.66, $productCreated->getPrice()->getValue());
    }

    public static function createProductTest(
        EloquentProductRepository $repository,
        $sku = 'ABCD123456',
        $name = 'Product Name',
        $description = 'This is a product description.',
        $price = 10.66
    ) {
        $createProduct = new CreateProduct($repository);

        return $createProduct->save($sku, $name, $description, $price);
    }
}
