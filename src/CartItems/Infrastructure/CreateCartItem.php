<?php

namespace Src\CartItems\Infrastructure;

use Src\CartItems\Application\CreateCartItemUseCase;
use Src\CartItems\Infrastructure\Eloquent\Repositories\EloquentCartItemRepository;

class CreateCartItem
{
    private $createCartItemUseCase;

    public function __construct(EloquentCartItemRepository $repository)
    {
        $this->createCartItemUseCase = new CreateCartItemUseCase($repository);
    }

    public function save(int $cartId, int $productId, int $quantity)
    {
        return $this->createCartItemUseCase->execute($cartId, $productId, $quantity);
    }
}
