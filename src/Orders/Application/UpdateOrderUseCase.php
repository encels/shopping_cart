<?php

namespace Src\Orders\Application;

use Src\Orders\Domain\OrderEntity;
use Src\Orders\Domain\Contracts\OrderRepositoryInterface;

class UpdateOrderUseCase
{
    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function execute(OrderEntity $order): OrderEntity
    {
        return $this->orderRepository->update($order);
    }
}
