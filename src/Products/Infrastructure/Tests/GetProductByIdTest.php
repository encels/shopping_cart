<?php

namespace Src\Products\Infrastructure\Tests;

use Tests\TestCase;
use Src\Products\Infrastructure\Eloquent\Repositories\EloquentProductRepository;
use Src\Products\Infrastructure\GetProductById;
use Src\Shared\Domain\Exceptions\IdException;
use Src\Shared\Domain\ValueObjects\Id;

class GetProductByIdTest extends TestCase
{
    public function testGetById()
    {

        $repository = new EloquentProductRepository();

        $id = CreateProductTest::createProductTest($repository);

        $object = self::getProductById($repository, $id);

        $this->assertEquals($id, $object->getId());
    }

    public function testInvalidId()
    {

        $this->expectException(IdException::class);

        $repository = new EloquentProductRepository();

        $id = CreateProductTest::createProductTest($repository);

        $object = self::getProductById($repository, new Id(-1));
    }


    public static function getProductById($repository, $id)
    {

        $productFound = new GetProductById($repository);
        $object = $productFound->find($id->getValue()); //find the product by Id

        return $object;
    }
}
