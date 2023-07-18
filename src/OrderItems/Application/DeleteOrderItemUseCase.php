<?php

namespace Src\OrderItems\Application;

use Src\OrderItems\Domain\Contracts\OrderItemRepositoryInterface;
use Src\Shared\Domain\ValueObjects\Id;

class DeleteOrderItemUseCase
{
    private $orderItemRepository;

    public function __construct(OrderItemRepositoryInterface $orderItemRepository)
    {
        $this->orderItemRepository = $orderItemRepository;
    }

    public function execute(Id $id): void
    {
        $this->orderItemRepository->delete($id);
    }
}
