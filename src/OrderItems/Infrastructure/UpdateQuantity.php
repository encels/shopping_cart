<?php

namespace Src\OrderItems\Infrastructure;

use Src\OrderItems\Application\UpdateQuantityUseCase;
use Src\OrderItems\Infrastructure\Eloquent\Repositories\EloquentOrderItemRepository;

class UpdateQuantity
{
    private $updateQuantityUseCaseUseCase;

    public function __construct(EloquentOrderItemRepository $repository)
    {
        $this->updateQuantityUseCaseUseCase = new UpdateQuantityUseCase($repository);
    }

    public function updateQuantity(int $id,  int $quantity)
    {
        return $this->updateQuantityUseCaseUseCase->execute($id, $quantity);
    }
}
