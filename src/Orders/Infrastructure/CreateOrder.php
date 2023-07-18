<?php

namespace Src\Orders\Infrastructure;

use Src\Orders\Application\CreateOrderUseCase;
use Src\Orders\Infrastructure\Eloquent\Repositories\EloquentOrderRepository;
use Src\Orders\Domain\OrderEntity;
use Src\Shared\Domain\ValueObjects\Id;

class CreateOrder
{
    private $createOrderUseCase;

    public function __construct(EloquentOrderRepository $repository)
    {
        $this->createOrderUseCase = new CreateOrderUseCase($repository);
    }

    public function save(): Id
    {
        $order = new OrderEntity();
        return $this->createOrderUseCase->execute($order);
    }
}
