<?php

namespace Src\Orders\Infrastructure;

use Src\Orders\Application\DeleteOrderUseCase;
use Src\Orders\Infrastructure\Eloquent\Repositories\EloquentOrderRepository;
use Src\Shared\Domain\ValueObjects\Id;

class DeleteOrder
{
    private $deleteOrderUseCase;

    public function __construct(EloquentOrderRepository $repository)
    {
        $this->deleteOrderUseCase = new DeleteOrderUseCase($repository);
    }

    public function delete(int $id): void
    {
        $this->deleteOrderUseCase->execute(new Id($id));
    }
}
