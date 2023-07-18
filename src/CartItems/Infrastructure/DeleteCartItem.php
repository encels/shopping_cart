<?php

namespace Src\CartItems\Infrastructure;

use Src\CartItems\Application\DeleteCartItemUseCase;
use Src\CartItems\Infrastructure\Eloquent\Repositories\EloquentCartItemRepository;
use Src\Shared\Domain\ValueObjects\Id;

class DeleteCartItem
{
    private $deleteCartItemUseCase;

    public function __construct(EloquentCartItemRepository $repository)
    {
        $this->deleteCartItemUseCase = new DeleteCartItemUseCase($repository);
    }

    public function delete(int $id): void
    {
        $this->deleteCartItemUseCase->execute(new Id($id));
    }
}
