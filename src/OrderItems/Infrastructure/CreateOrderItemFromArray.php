<?php

namespace Src\OrderItems\Infrastructure;

use Src\OrderItems\Application\CreateOrderItemFromArrayUseCase;
use Src\OrderItems\Application\CreateOrderItemUseCase;
use Src\OrderItems\Infrastructure\Eloquent\Repositories\EloquentOrderItemRepository;

class CreateOrderItemFromArray
{
    private $createOrderItemFromArrayUseCase;

    public function __construct(EloquentOrderItemRepository $repository)
    {
        $this->createOrderItemFromArrayUseCase = new CreateOrderItemFromArrayUseCase(new CreateOrderItemUseCase($repository));
    }

    public function saveFromArray(array $items, $orderId)
    {
        return $this->createOrderItemFromArrayUseCase->execute($items, $orderId);
    }
}
