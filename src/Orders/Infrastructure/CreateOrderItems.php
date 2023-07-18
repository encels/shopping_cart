<?php

namespace Src\Orders\Infrastructure;

use Src\Orders\Application\CreateOrderItemsUseCase;
use Src\Orders\Infrastructure\Eloquent\Repositories\EloquentOrderRepository;

class CreateOrderItems
{
    private $createOrderItemsUseCase;

    public function __construct(EloquentOrderRepository $repository)
    {
        $this->createOrderItemsUseCase = new CreateOrderItemsUseCase($repository);
    }

    public function createItems(int $cartId)
    {
        return $this->createOrderItemsUseCase->execute($cartId);
    }
}
