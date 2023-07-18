<?php

namespace Src\CartItems\Domain\Contracts;

use Src\CartItems\Domain\CartItemEntity;
use  Src\Shared\Domain\ValueObjects\Quantity;
use Src\Shared\Domain\ValueObjects\Id;

interface CartItemRepositoryInterface
{
    /**
     * Saves a CartItem in the repository.
     *
     * @param CartItemEntity $cartItem The CartItem to save.
     */
    public function save(CartItemEntity $cartItem): Id;

    /**
     * Finds a CartItem by its ID in the repository.
     *
     * @param Id $cartItemId The ID of the CartItem to find.
     * @return CartItemEntity|null The CartItem found, or null if not found.
     */
    public function getById(Id $cartItemId): ?CartItemEntity;

    /**
     * Deletes a CartItem from the repository.
     *
     * @param CartItemEntity $cartItem The CartItem to delete.
     */
    public function delete(Id $id): void;

    /**
     * Update the Quantity in the repository.
     *
     * @param Id $cartItemId The ID of the CartItem to update
     * @param Quantity $qty The Quantity to update.
     */
    public function updateQuantity(Id $id, Quantity $qty): CartItemEntity;
}
