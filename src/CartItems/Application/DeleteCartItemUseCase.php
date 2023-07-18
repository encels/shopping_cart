<?php

namespace Src\CartItems\Application;

use Src\CartItems\Domain\Contracts\CartItemRepositoryInterface;
use Src\Shared\Domain\ValueObjects\Id;

class DeleteCartItemUseCase
{
    private $cartItemRepository;

    public function __construct(CartItemRepositoryInterface $cartItemRepository)
    {
        $this->cartItemRepository = $cartItemRepository;
    }

    public function execute(Id $id): void
    {
        $this->cartItemRepository->delete($id);
    }
}
