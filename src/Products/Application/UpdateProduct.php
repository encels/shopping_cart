<?php

namespace Src\Products\Application;

use Src\Products\Domain\Contracts\ProductRepositoryInterface;
use Src\Products\Domain\ProductEntity;

class UpdateProductUseCase
{
    private ProductRepositoryInterface $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(ProductEntity $product): void
    {
        $product->getUpdatedAt()->setTimestamp(time());
        $this->repository->save($product);
    }
}
