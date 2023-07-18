<?php

namespace Src\Orders\Infrastructure\Eloquent\Repositories;

use Src\Carts\Infrastructure\Eloquent\CartModel;
use Src\Carts\Infrastructure\Eloquent\Repositories\EloquentCartRepository;
use Src\OrderItems\Domain\OrderItemEntity;
use Src\OrderItems\Infrastructure\Eloquent\OrderItemModel;
use Src\Orders\Domain\Exceptions\OrderException;
use Src\Orders\Domain\OrderEntity;
use Src\Orders\Domain\Contracts\OrderRepositoryInterface;
use Src\Orders\Infrastructure\Eloquent\OrderModel;
use Src\Products\Infrastructure\Eloquent\ProductModel;
use Src\Products\Infrastructure\Eloquent\Repositories\EloquentProductRepository;
use Src\Shared\Domain\ValueObjects\Id;
use Src\Shared\Domain\ValueObjects\Price;

class EloquentOrderRepository implements OrderRepositoryInterface
{
    /**
     * The Order model instance.
     *
     * @var OrderModel
     * @var CartModel
     */
    private $orderModel;
    private $cartModel;
    private $productModel;

    /**
     * Create a new EloquentOrderRepository instance.
     *
     * 
     *
     * @return void
     */
    public function __construct()
    {
        $this->orderModel = new OrderModel;
        $this->cartModel = new EloquentCartRepository;
        $this->productModel = new EloquentProductRepository;

    }


    /**
     * Get a Order by its id.
     *
     * @param Id $id The id of the Order to get.
     *
     * @return OrderEntity|null The Order, or null if the Order does not exist.
     */
    public function getById(Id $id): ?OrderEntity
    {
        $orderModel = $this->orderModel->find($id->getValue());

        if (!$orderModel) {
            throw new OrderException('The Order ID not exist.');
            return null;
        }

        $orderEntity = new OrderEntity();
        $orderEntity->setId(new Id($orderModel->id));
        $orderEntity->setItems($orderModel->items()->get()->toArray());
        $orderEntity->setTotalAmount(new Price($orderModel->total_amount));

        return $orderEntity;
    }

    /**
     * Create a new Order.
     *
     * @param OrderEntity $order The Order to save.
     *
     * @return Id The created Order id.
     */
    public function save(OrderEntity $order): Id
    {
        $orderModel = new $this->orderModel();
        $orderModel->total_amount = 0;
        $orderModel->saveOrFail();

        return new Id($orderModel->id);
    }

    /**
     * Update a Order.
     *
     * @param OrderEntity $order The Order to update.
     *
     * @return OrderEntity The updated Order.
     */
    public function update(OrderEntity $order): OrderEntity
    {
        $orderModel = $this->orderModel->find($order->getId()->getValue());

        $orderModel->save();

        return $order;
    }

    /**
     * Creates all Order Items.
     *
     * @param int The id of the Cart to create the items.
     *
     * @return void 
     */
    public function createItems(Id $cartId): OrderEntity
    {
        $cartModel = $this->cartModel->getById($cartId);


        $items = [];
        $sum = 0;

        $this->orderModel->total_amount = $sum;
        $this->orderModel->save();

        foreach ($cartModel->getItems() as $item) {
   
            $product = $this->productModel->getById(new Id($item['product_id']));
            $productPrice = $product->getPrice()->getValue();

            $orderItem = new OrderItemModel();
            $orderItem->product_id = $item['product_id'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->unit_price = $productPrice;
            $items[] = $orderItem;

            $sum += ($productPrice * $item['quantity']);
        }
        $this->orderModel->items()->saveMany($items);
        $this->orderModel->total_amount = $sum;
        $this->orderModel->save();

   
        return $this->getById(new Id($this->orderModel->id));
    }


    /**
     * Delete a Order.
     *
     * @param Id $id The id of the Order to delete.
     *
     * @return void
     */
    public function delete(Id $id): void
    {
        $this->orderModel->destroy($id->getValue());
    }
}
