<?php

namespace Src\OrderItems\Infrastructure;

use Src\OrderItems\Application\GetOrderItemByIdUseCase;
use Src\OrderItems\Infrastructure\Eloquent\Repositories\EloquentOrderItemRepository;

class GetOrderItemById
{
    private $getOrderItemByIdUseCase;

    public function __construct(EloquentOrderItemRepository $repository)
    {
        $this->getOrderItemByIdUseCase = new GetOrderItemByIdUseCase($repository);
    }

    public function find(int $orderId)
    {
        return $this->getOrderItemByIdUseCase->execute($orderId);
    }
}
