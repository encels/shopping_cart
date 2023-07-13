<?php

namespace Src\Carts\Infrastructure;

use Src\Carts\Application\UpdateCartUseCase;
use Src\Carts\Infrastructure\Eloquent\Repositories\EloquentCartRepository;
use Src\Carts\Domain\CartEntity;

class UpdateCart
{
    private $repository;

    public function __construct(EloquentCartRepository $repository)
    {
        $this->repository = $repository;
    }

    public function update(CartEntity $cart): CartEntity
    {
        $updateCartUseCase = new UpdateCartUseCase($this->repository);

        return $updateCartUseCase->execute($cart);
    }
}
