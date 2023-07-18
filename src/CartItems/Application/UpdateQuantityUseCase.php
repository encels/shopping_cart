<?php

namespace Src\CartItems\Application;

use Src\CartItems\Domain\CartItemEntity;
use Src\CartItems\Domain\Contracts\CartItemRepositoryInterface;
use  Src\Shared\Domain\ValueObjects\Quantity;
use Src\Shared\Domain\ValueObjects\Id;

class UpdateQuantityUseCase
{
    private $repository;

    public function __construct(CartItemRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id, int $quantity): CartItemEntity
    {
       return $this->repository->updateQuantity(new Id($id), new Quantity($quantity));
    }
}
