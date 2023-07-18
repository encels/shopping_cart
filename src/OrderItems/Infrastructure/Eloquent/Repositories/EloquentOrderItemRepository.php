<?php

namespace Src\OrderItems\Infrastructure\Eloquent\Repositories;

use Src\OrderItems\Domain\OrderItemEntity;
use Src\OrderItems\Domain\Contracts\OrderItemRepositoryInterface;
use Src\OrderItems\Domain\Exceptions\OrderItemException;
use  Src\Shared\Domain\ValueObjects\Quantity;
use Src\Shared\Domain\ValueObjects\Id;
use Src\OrderItems\Infrastructure\Eloquent\OrderItemModel;
use Src\Orders\Infrastructure\Eloquent\OrderModel;
use Src\Products\Infrastructure\Eloquent\ProductModel;

class EloquentOrderItemRepository implements OrderItemRepositoryInterface
{
    private $model;

    public function __construct()
    {
        $this->model = new OrderItemModel();
    }

    public function save(OrderItemEntity $orderItem): Id
    {
        $orderId = $orderItem->getOrderId()->getValue();
        $productId = $orderItem->getProductId()->getValue();


        $order = OrderModel::findOrFail($orderId);
        $product = ProductModel::findOrFail($productId);
        $id = $orderItem->getId()?->getValue();

        if ($order && $product) {
            $orderItem = $this->model->updateOrCreate(
                ['id' => $id],
                [
                    'order_id' => $orderId,
                    'product_id' => $productId,
                    'quantity' => $orderItem->getQuantity()->getValue()
                ]
            );
            return new Id($orderItem->id);
        } else {
            throw new OrderItemException('The Order ID or the Product Id does not exist.');
        }
    }

    public function getById(Id $orderItemId): ?OrderItemEntity
    {
        $eloquentOrderItem = $this->model->find($orderItemId->getValue());

        if (!$eloquentOrderItem) {
            throw new OrderItemException('The Order Item ID not exist.');
            return null;
        }

        $orderItemEntity = new OrderItemEntity(
            new Id($eloquentOrderItem->order_id),
            new Id($eloquentOrderItem->product_id),
            new Quantity($eloquentOrderItem->quantity)
        );

        $orderItemEntity->setId(new Id($eloquentOrderItem->id));

        return   $orderItemEntity;
    }

    public function delete(Id $id): void
    {
        $this->model->destroy($id->getValue());
    }

    public function updateQuantity(Id $orderItemId, Quantity $qty): OrderItemEntity
    {
        $orderItemEntity = $this->getById($orderItemId);
        $orderItemEntity->setQuantity($qty);

        $id = $this->save($orderItemEntity);
        return $this->getById($id);
    }
}
