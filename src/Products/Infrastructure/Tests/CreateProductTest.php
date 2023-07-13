<?php

namespace Src\Products\Infrastructure\Tests;

use Tests\TestCase;
use Src\Products\Domain\ProductEntity;
use Src\Products\Infrastructure\CreateProduct;
use Src\Products\Domain\ValueObjects\Description;
use Src\Products\Domain\ValueObjects\Name;
use Src\Products\Domain\ValueObjects\Price;
use Src\Products\Domain\ValueObjects\Sku;
use Src\Products\Infrastructure\Eloquent\Repositories\EloquentProductRepository;
use Src\Shared\Domain\ValueObjects\Id;

class CreateProductTest extends TestCase
{
    public function testCanBeSave()
    {

        $repository = new EloquentProductRepository();
        $id = new Id(1);
        $sku = new Sku('ABCD123456');
        $name = new Name('Product Name');
        $description = new Description('This is a product description.');
        $price = new Price(10.66);
        $createdAt = new \DateTimeImmutable();
        $updatedAt = new \DateTimeImmutable();

        $productEntity = new ProductEntity($id, $sku, $name, $description, $price, $createdAt, $updatedAt);

        $createProduct = new CreateProduct($repository);

        $id = $createProduct->save($sku->getValue(), $name->getValue(), $description->getValue(), $price->getValue());

        $productCreated = $repository->getById($id); //get the current product saved

        $this->assertEquals($productEntity->getSku()->getValue(), $productCreated->getSku()->getValue());
        $this->assertEquals($productEntity->getName()->getValue(), $productCreated->getName()->getValue());
        $this->assertEquals($productEntity->getDescription()->getValue(), $productCreated->getDescription()->getValue());
        $this->assertEquals($productEntity->getPrice()->getValue(), $productCreated->getPrice()->getValue());
    }
}
