<?php

namespace Src\Products\Infrastructure;

use Src\Products\Application\GetProductByIdUseCase;
use Src\Products\Domain\ProductEntity;
use Src\Products\Infrastructure\Eloquent\Repositories\EloquentProductRepository;
use Src\Shared\Domain\ValueObjects\Id;

class GetProductById
{
    protected $repository;

    public function __construct(EloquentProductRepository $repository)
    {
        $this->repository   = $repository;
    }

    public function find(int $id): ?ProductEntity
    {
        $getProductByIdUseCase = new GetProductByIdUseCase($this->repository);

        return  $getProductByIdUseCase->execute(new Id($id));
    }
}
