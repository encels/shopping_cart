<?php

namespace Src\Carts\Application;

use Src\Carts\Domain\CartEntity;
use Src\Carts\Domain\Contracts\CartRepositoryInterface;

class UpdateCartUseCase
{
    private $cartRepository;

    public function __construct(CartRepositoryInterface $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function execute(CartEntity $cart): CartEntity
    {
        return $this->cartRepository->update($cart);
    }
}
