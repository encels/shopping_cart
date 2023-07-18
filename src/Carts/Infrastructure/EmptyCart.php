<?php

namespace Src\Carts\Infrastructure;

use Src\Carts\Application\EmptyCartUseCase;
use Src\Carts\Infrastructure\Eloquent\Repositories\EloquentCartRepository;
use Src\Shared\Domain\ValueObjects\Id;

class EmptyCart
{
    private $emptyCartUseCase;

    public function __construct(EloquentCartRepository $repository)
    {
        $this->emptyCartUseCase = new EmptyCartUseCase($repository);
    }

    public function emptyCart(int $id)
    {
        return $this->emptyCartUseCase->execute(new Id($id));
    }
}
