<?php

namespace Src\CartItems\Application;

use Src\CartItems\Domain\CartItemEntity;
use Src\CartItems\Domain\Contracts\CartItemRepositoryInterface;
use Src\Shared\Domain\ValueObjects\Id;

class GetCartItemByIdUseCase
{
    private CartItemRepositoryInterface $repository;

    public function __construct(CartItemRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id): ?CartItemEntity
    {
        return $this->repository->getById(new Id($id));
    }
}
