<?php

namespace Src\OrderItems\Infrastructure;

use Src\OrderItems\Application\CreateOrderItemUseCase;
use Src\OrderItems\Infrastructure\Eloquent\Repositories\EloquentOrderItemRepository;

class CreateOrderItem
{
    private $createOrderItemUseCase;

    public function __construct(EloquentOrderItemRepository $repository)
    {
        $this->createOrderItemUseCase = new CreateOrderItemUseCase($repository);
    }

    public function save(int $orderId, int $productId, int $quantity)
    {
        return $this->createOrderItemUseCase->execute($orderId, $productId, $quantity);
    }
}
