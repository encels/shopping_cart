<?php

namespace Src\Products\Infrastructure;

use Src\Products\Application\DeleteProductUseCase;
use Src\Products\Infrastructure\Eloquent\Repositories\EloquentProductRepository;
use Src\Shared\Domain\ValueObjects\Id;

class DeleteProduct
{
    protected $repository;

    public function __construct(EloquentProductRepository $repository)
    {
        $this->repository   = $repository;
    }
    public function delete(int $id): void
    {
        $deleteProductUseCase = new DeleteProductUseCase($this->repository);

        $deleteProductUseCase->execute(new Id($id));
    }
}
