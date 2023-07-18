<?php

namespace Src\Orders\Application;

use Src\Orders\Domain\Contracts\OrderRepositoryInterface;
use Src\Shared\Domain\ValueObjects\Id;

class DeleteOrderUseCase
{
    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function execute(Id $id): void
    {
        $this->orderRepository->delete($id);
    }
}
