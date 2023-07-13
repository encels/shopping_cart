<?php

namespace Src\Products\Infrastructure;

use Src\Products\Application\CreateProductUseCase;
use Src\Products\Infrastructure\Eloquent\Repositories\EloquentProductRepository;
use Src\Shared\Domain\ValueObjects\Id;

class CreateProduct
{
    private $repository;

    public function __construct(EloquentProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function save(

        string $sku,
        string $name,
        ?string $description,
        float $price
    ): Id {

        $createProductUseCase = new CreateProductUseCase($this->repository);


        return $createProductUseCase->execute($sku, $name, $description, $price);
    }
}
