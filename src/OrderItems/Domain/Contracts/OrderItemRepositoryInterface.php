<?php

namespace Src\OrderItems\Domain\Contracts;

use Src\OrderItems\Domain\OrderItemEntity;
use  Src\Shared\Domain\ValueObjects\Quantity;
use Src\Shared\Domain\ValueObjects\Id;

interface OrderItemRepositoryInterface
{
    /**
     * Saves a OrderItem in the repository.
     *
     * @param OrderItemEntity $orderItem The OrderItem to save.
     */
    public function save(OrderItemEntity $orderItem): Id;

    /**
     * Finds a OrderItem by its ID in the repository.
     *
     * @param Id $orderItemId The ID of the OrderItem to find.
     * @return OrderItemEntity|null The OrderItem found, or null if not found.
     */
    public function getById(Id $orderItemId): ?OrderItemEntity;

    /**
     * Deletes a OrderItem from the repository.
     *
     * @param OrderItemEntity $orderItem The OrderItem to delete.
     */
    public function delete(Id $id): void;

    /**
     * Update the Quantity in the repository.
     *
     * @param Id $orderItemId The ID of the OrderItem to update
     * @param Quantity $qty The Quantity to update.
     */
    public function updateQuantity(Id $id, Quantity $qty): OrderItemEntity;
}
