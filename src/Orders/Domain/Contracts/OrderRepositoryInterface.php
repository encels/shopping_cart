<?php

namespace Src\Orders\Domain\Contracts;

use Src\Orders\Domain\OrderEntity;
use Src\Shared\Domain\ValueObjects\Id;

/**
 * Interface OrderRepository.
 *
 * Defines the methods that a repository for the OrderEntityEntity class must implement.
 */
interface OrderRepositoryInterface
{
    /**
     * Gets a Order by its id.
     *
     * @param int The id of the Order to get.
     *
     * @return OrderEntity|null The Order, or null if the Order does not exist.
     */
    public function getById(Id $id): ?OrderEntity;

    /**
     * Creates a new Order.
     *
     * @param OrderEntity $order The Order to save.
     *
     * @return int The created Order id.
     */
    public function save(OrderEntity $order): Id;

    /**
     * Updates a Order.
     *
     * @param OrderEntity $order The Order to update.
     *
     * @return OrderEntity The updated Order.
     */
    public function update(OrderEntity $order): OrderEntity;

    /**
     * Deletes a Order.
     *
     * @param int The id of the Order to delete.
     *
     * @return void 
     */
    public function delete(Id $id): void;


    /**
     * Creates all Order Items.
     *
     * @param int The id of the Cart to create the items.
     *
     * @return void 
     */
    public function createItems(Id $cartId): OrderEntity;

}
