<?php

namespace Src\CartItems\Infrastructure;

use Src\CartItems\Application\UpdateQuantityUseCase;
use Src\CartItems\Infrastructure\Eloquent\Repositories\EloquentCartItemRepository;

class UpdateQuantity
{
    private $updateQuantityUseCaseUseCase;

    public function __construct(EloquentCartItemRepository $repository)
    {
        $this->updateQuantityUseCaseUseCase = new UpdateQuantityUseCase($repository);
    }

    public function updateQuantity(int $id,  int $quantity)
    {
        return $this->updateQuantityUseCaseUseCase->execute($id, $quantity);
    }
}
