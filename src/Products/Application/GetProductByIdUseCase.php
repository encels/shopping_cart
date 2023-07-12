<?php

namespace Src\Products\Application;

use Src\Products\Domain\Contracts\ProductRepositoryInterface;
use Src\Products\Domain\ProductEntity;
use Src\Shared\Domain\ValueObjects\Id;

class GetProductByIdUseCase
{
    private ProductRepositoryInterface $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(Id $id): ?ProductEntity
    {
        return $this->repository->getById($id);
    }
}
