<?php

namespace Src\CartItems\Infrastructure;

use Src\CartItems\Application\CreateCartItemFromArrayUseCase;
use Src\CartItems\Application\CreateCartItemUseCase;
use Src\CartItems\Infrastructure\Eloquent\Repositories\EloquentCartItemRepository;

class CreateCartItemFromArray
{
    private $createCartItemFromArrayUseCase;

    public function __construct(EloquentCartItemRepository $repository)
    {
        $this->createCartItemFromArrayUseCase = new CreateCartItemFromArrayUseCase(new CreateCartItemUseCase($repository));
    }

    public function saveFromArray(array $items, $cartId)
    {
        return $this->createCartItemFromArrayUseCase->execute($items, $cartId);
    }
}
