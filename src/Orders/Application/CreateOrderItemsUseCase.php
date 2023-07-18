<?php

namespace Src\Orders\Application;

use Src\Orders\Domain\Contracts\OrderRepositoryInterface;
use Src\Shared\Domain\ValueObjects\Id;

class CreateOrderItemsUseCase
{
    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function execute(int $cartId)
    {
        return $this->orderRepository->createItems(new Id($cartId));
    }
}
