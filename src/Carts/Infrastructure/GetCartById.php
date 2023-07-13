<?php

namespace Src\Carts\Infrastructure;

use Src\Carts\Application\GetCartByIdUseCase;
use Src\Carts\Infrastructure\Eloquent\Repositories\EloquentCartRepository;
use Src\Carts\Domain\CartEntity;
use Src\Shared\Domain\ValueObjects\Id;

class GetCartById
{
    private $repository;

    public function __construct(EloquentCartRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getById(int $id): ?CartEntity
    {
        $getCartByIdUseCase = new GetCartByIdUseCase($this->repository);

        return $getCartByIdUseCase->execute(new Id($id));
    }
}
