<?php

namespace Src\Carts\Infrastructure;

use Src\Carts\Application\CreateCartUseCase;
use Src\Carts\Infrastructure\Eloquent\Repositories\EloquentCartRepository;
use Src\Carts\Domain\CartEntity;
use Src\Shared\Domain\ValueObjects\Id;

class CreateCart
{
    private $repository;

    public function __construct(EloquentCartRepository $repository)
    {
        $this->repository = $repository;
    }

    public function save(): Id
    {
        $createCartUseCase = new CreateCartUseCase($this->repository);
        $cart = new CartEntity(new Id(1), new \DateTimeImmutable(), new \DateTimeImmutable());
        return $createCartUseCase->execute($cart);
    }
}
