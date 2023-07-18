<?php

namespace Src\Orders\Application;

use Src\Orders\Domain\OrderEntity;
use Src\Orders\Domain\Contracts\OrderRepositoryInterface;
use Src\Shared\Domain\ValueObjects\Id;

class GetOrderByIdUseCase
{
    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function execute(Id $id): ?OrderEntity
    {
        return $this->orderRepository->getById($id);
    }
}
