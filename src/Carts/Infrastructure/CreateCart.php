<?php

namespace Src\Carts\Infrastructure;

use Src\Carts\Application\CreateCartUseCase;
use Src\Carts\Infrastructure\Eloquent\Repositories\EloquentCartRepository;
use Src\Carts\Domain\CartEntity;
use Src\Shared\Domain\ValueObjects\Id;

class CreateCart
{
    private $createCartUseCase;

    public function __construct(EloquentCartRepository $repository)
    {
        $this->createCartUseCase = new CreateCartUseCase($repository);
    }

    public function save(): Id
    {
        $cart = new CartEntity();
        return $this->createCartUseCase->execute($cart);
    }
}
