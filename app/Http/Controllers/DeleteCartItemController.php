<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Src\CartItems\Infrastructure\DeleteCartItem;
use Src\CartItems\Infrastructure\UpdateQuantity;
use Src\Carts\Infrastructure\GetCartById;

class DeleteCartItemController extends Controller

{

    private $controllerCartItem;

    public function __construct(
        DeleteCartItem $cartItem,
    ) {
        $this->controllerCartItem = $cartItem;
    }

    public function index($id)
    {
        $error = '';
        $itemId = (int)$id;

        try {
            $this->controllerCartItem->delete($itemId);
            $success = true;
        } catch (\Exception $e) {
            $error = $e->getMessage();
            $success = false;
        }


        if ($success) {
            return response()->json(['message' => 'Item deleted succesfuly']);
        } else {
            return response()->json(['message' => 'Error deleting the item', 'error' => $error], 500);
        }
    }
}
