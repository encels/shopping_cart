<?php

namespace Src\Products\Application;

use Src\Products\Domain\Contracts\ProductRepositoryInterface;
use Src\Products\Domain\ProductEntity;

class GetProductByIdUseCase
{
    private ProductRepositoryInterface $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id): ?ProductEntity
    {
        return $this->repository->getById($id);
    }
}
