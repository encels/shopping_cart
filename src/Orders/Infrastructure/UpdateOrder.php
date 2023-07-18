<?php

namespace Src\Orders\Infrastructure;

use Src\Orders\Application\UpdateOrderUseCase;
use Src\Orders\Infrastructure\Eloquent\Repositories\EloquentOrderRepository;
use Src\Orders\Domain\OrderEntity;

class UpdateOrder
{
    private $updateOrderUseCase;

    public function __construct(EloquentOrderRepository $repository)
    {
        $this->updateOrderUseCase = new UpdateOrderUseCase($repository);
    }

    public function update(OrderEntity $order): OrderEntity
    {

        return $this->updateOrderUseCase->execute($order);
    }
}
