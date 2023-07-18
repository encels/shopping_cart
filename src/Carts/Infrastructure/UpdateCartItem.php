<?php

namespace Src\Carts\Infrastructure;

use Src\Carts\Application\UpdateCartItemUseCase;
use Src\Carts\Application\UpdateCartUseCase;
use Src\Carts\Infrastructure\Eloquent\Repositories\EloquentCartRepository;
use Src\Carts\Domain\CartEntity;
use Src\Shared\Domain\ValueObjects\Id;

class UpdateCartItem
{
    private $updateCartItemUseCase;

    public function __construct(EloquentCartRepository $repository)
    {
        $this->updateCartItemUseCase = new UpdateCartItemUseCase($repository);
    }

    public function updateItems(int $id, array $items): void
    {

       $this->updateCartItemUseCase->execute(new Id($id),$items);
    }
}
