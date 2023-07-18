<?php

namespace Src\Orders\Application;

use Src\Orders\Domain\OrderEntity;
use Src\Orders\Domain\Contracts\OrderRepositoryInterface;
use Src\Shared\Domain\ValueObjects\Id;

class CreateOrderUseCase
{
    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function execute(OrderEntity $order): Id
    {
        return $this->orderRepository->save($order);
    }
}
