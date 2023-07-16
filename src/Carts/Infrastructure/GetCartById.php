<?php

namespace Src\Carts\Infrastructure;

use Src\Carts\Application\GetCartByIdUseCase;
use Src\Carts\Infrastructure\Eloquent\Repositories\EloquentCartRepository;
use Src\Carts\Domain\CartEntity;
use Src\Shared\Domain\ValueObjects\Id;

class GetCartById
{
    private $getCartByIdUseCase;

    public function __construct(EloquentCartRepository $repository)
    {
        $this->getCartByIdUseCase = new GetCartByIdUseCase($repository);
    }

    public function getById(int $id): ?CartEntity
    {
        return $this->getCartByIdUseCase->execute(new Id($id));
    }
}
