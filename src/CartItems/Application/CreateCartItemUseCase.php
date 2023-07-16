<?php

namespace Src\CartItems\Application;

use Src\CartItems\Domain\CartItemEntity;
use Src\CartItems\Domain\Contracts\CartItemRepositoryInterface;
use Src\CartItems\Domain\ValueObjects\Quantity;
use Src\Shared\Domain\ValueObjects\Id;

class CreateCartItemUseCase
{
    private $repository;

    public function __construct(CartItemRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $cartId, int $productId, int $quantity): Id
    {
        $cartItem = new CartItemEntity(
            new Id($cartId),
            new Id($productId),
            new Quantity($quantity)
        );
        return $this->repository->save($cartItem);
    }
}
