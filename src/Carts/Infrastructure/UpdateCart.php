<?php

namespace Src\Carts\Infrastructure;

use Src\Carts\Application\UpdateCartUseCase;
use Src\Carts\Infrastructure\Eloquent\Repositories\EloquentCartRepository;
use Src\Carts\Domain\CartEntity;

class UpdateCart
{
    private $updateCartUseCase;

    public function __construct(EloquentCartRepository $repository)
    {
        $this->updateCartUseCase = new UpdateCartUseCase($repository);
    }

    public function update(CartEntity $cart): CartEntity
    {

        return $this->updateCartUseCase->execute($cart);
    }
}
