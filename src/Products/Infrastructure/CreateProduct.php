<?php

namespace Src\Products\Infrastructure;

use Src\Products\Application\CreateProductUseCase;
use Src\Products\Domain\ProductEntity;

class CreateProduct
{
    protected  $createProduct;

    public function __construct(CreateProductUseCase $createProduct)
    {
        $this->createProduct = $createProduct;
    }

    public function save(
        int $id,
         string $sku,
          string $name,
           ?string $description,
            float $price
            ): ProductEntity
    {

        return $this->createProduct->execute($id, $sku, $name, $description, $price);
    }
}
