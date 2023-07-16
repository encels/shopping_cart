<?php

namespace Src\CartItems\Infrastructure\Eloquent\Repositories;

use Src\CartItems\Domain\CartItemEntity;
use Src\CartItems\Domain\Contracts\CartItemRepositoryInterface;
use Src\CartItems\Domain\Exceptions\CartItemException;
use Src\CartItems\Domain\ValueObjects\Quantity;
use Src\Shared\Domain\ValueObjects\Id;
use Src\CartItems\Infrastructure\Eloquent\CartItemModel;
use Src\Carts\Infrastructure\Eloquent\CartModel;
use Src\Products\Infrastructure\Eloquent\ProductModel;

class EloquentCartItemRepository implements CartItemRepositoryInterface
{
    private $model;

    public function __construct()
    {
        $this->model = new CartItemModel();
    }

    public function save(CartItemEntity $cartItem): Id
    {
        $cartId = $cartItem->getCartId()->getValue();
        $productId = $cartItem->getProductId()->getValue();

      
        $cart = CartModel::findOrFail($cartId);
        $product = ProductModel::findOrFail($productId);

        if ($cart && $product) {
            
            $eloquentCartItem = $this->model;
            $eloquentCartItem->cart_id = $cartId;
            $eloquentCartItem->product_id = $productId;
            $eloquentCartItem->quantity = $cartItem->getQuantity()->getValue();
            $eloquentCartItem->saveOrFail();

            return new Id($eloquentCartItem->id);
        } else {
            throw new CartItemException('The Cart ID or the Product Id not exist.');
        }
    }

    public function getById(Id $cartItemId): ?CartItemEntity
    {
        $eloquentCartItem = $this->model->find($cartItemId->getValue());

        if (!$eloquentCartItem) {
            throw new CartItemException('The Cart ID not exist.');
            return null;
        }

        $cartItemEntity = new CartItemEntity(
            new Id($eloquentCartItem->cart_id),
            new Id($eloquentCartItem->product_id),
            new Quantity($eloquentCartItem->quantity)
        );

        $cartItemEntity->setId(new Id($eloquentCartItem->id));

        return   $cartItemEntity;
    }

    public function delete(Id $id): void
    {
        $this->model->destroy($id->getValue());
    }

    public function updateQuantity(Id $cartItemId, Quantity $qty): void
    {
        $cartItemEntity = $this->getById($cartItemId);
        $cartItemEntity->setQuantity($qty);

        $this->save($cartItemEntity);
    }
}
