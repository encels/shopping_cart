<?php

namespace App\Http\Controllers;

use Src\CartItems\Infrastructure\GetCartItemById;

class GetCartItemController extends Controller

{

    private  $controllerCartItem;

    public function __construct(
        GetCartItemById $cartItem,
    ) {
        $this->controllerCartItem = $cartItem;
    }

    public function index($id)
    {
        
        $itemId = (int)$id;

        try {
            $item = $this->controllerCartItem->find($itemId);
            $success = true;
        } catch (\Exception $e) {
            $error = $e->getMessage();
            $success = false;
        }


        if ($success) {
            return response()->json(['item' => $item->toArray(), 'message' => 'Item found']);
        } else {
            return response()->json(['message' => 'Error finding the Item', 'error' => $error], 500);
        }
    }
}
