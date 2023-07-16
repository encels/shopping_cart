<?php

namespace Src\CartItems\Infrastructure;

use Src\CartItems\Application\GetCartItemByIdUseCase;
use Src\CartItems\Infrastructure\Eloquent\Repositories\EloquentCartItemRepository;

class GetCartItemById
{
    private $getCartItemByIdUseCase;

    public function __construct(EloquentCartItemRepository $repository)
    {
        $this->getCartItemByIdUseCase = new GetCartItemByIdUseCase($repository);
    }

    public function find(int $cartId)
    {
        return $this->getCartItemByIdUseCase->execute($cartId);
    }
}
