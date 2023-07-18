<?php

namespace Src\OrderItems\Infrastructure;

use Src\OrderItems\Application\DeleteOrderItemUseCase;
use Src\OrderItems\Infrastructure\Eloquent\Repositories\EloquentOrderItemRepository;
use Src\Shared\Domain\ValueObjects\Id;

class DeleteOrderItem
{
    private $deleteOrderItemUseCase;

    public function __construct(EloquentOrderItemRepository $repository)
    {
        $this->deleteOrderItemUseCase = new DeleteOrderItemUseCase($repository);
    }

    public function delete(int $id): void
    {
        $this->deleteOrderItemUseCase->execute(new Id($id));
    }
}
