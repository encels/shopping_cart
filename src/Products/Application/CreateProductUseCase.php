<?php

namespace Src\Products\Application;

use Src\Products\Domain\Contracts\ProductRepositoryInterface;
use  Src\Products\Domain\ProductEntity;
use  Src\Products\Domain\ValueObjects\Description;
use  Src\Products\Domain\ValueObjects\Name;
use  Src\Products\Domain\ValueObjects\Price;
use  Src\Products\Domain\ValueObjects\Sku;
use  Src\Shared\Domain\ValueObjects\Id;

class CreateProductUseCase
{
    private ProductRepositoryInterface $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(
        string $sku,
        string $name,
        ?string $description,
        float $price
    ): Id {
        $product = new ProductEntity(
            new Sku($sku),
            new Name($name),
            new Description($description),
            new Price($price),
            new \DateTimeImmutable(),
            new \DateTimeImmutable()
        );

       return $this->repository->save($product);
    }
}
