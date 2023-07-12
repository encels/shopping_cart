<?php

namespace Src\Products\Application;

use Src\Products\Domain\Contracts\ProductRepositoryInterface;
use  Src\Products\Domain\ProductEntity;
use  Src\Products\Domain\ValueObjects\Description;
use  Src\Products\Domain\ValueObjects\Name;
use  Src\Products\Domain\ValueObjects\Price;
use  Src\Products\Domain\ValueObjects\Sku;

class CreateProductUseCase
{
    private ProductRepositoryInterface $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(
        int $id,
        string $sku,
        string $name,
        ?string $description,
        float $price
    ): ProductEntity {
        $product = new ProductEntity(
            $id,
            new Sku($sku),
            new Name($name),
            new Description($description),
            new Price($price),
            new \DateTimeImmutable(),
            new \DateTimeImmutable()
        );

        $this->repository->save($product);

        return $product;
    }
}
