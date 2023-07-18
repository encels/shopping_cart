<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Src\CartItems\Infrastructure\DeleteCartItem;
use Src\CartItems\Infrastructure\UpdateQuantity;
use Src\Carts\Infrastructure\DeleteCart;
use Src\Carts\Infrastructure\EmptyCart;
use Src\Carts\Infrastructure\GetCartById;

class DeleteAllCartItemsController extends Controller

{

    private $controllerCart;

    public function __construct(
        EmptyCart $cart,
    ) {
        $this->controllerCart =$cart;
    }

    public function index(Request $request)
    {
        $error = '';
        $validator = Validator::make($request->all(), [
            'cartId' => 'int|required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->json(['message' => 'Error validating request', 'errors' => $errors], 422);
        }

        $cartId = $request->input('cartId');
        
        try {
            $cart = $this->controllerCart->emptyCart($cartId);
            $success = true;
        } catch (\Exception $e) {
            $error = $e->getMessage();
            $success = false;
        }

        if ($success) {
            return response()->json(['cart' => $cart->toArray(), 'message' => 'Item deleted succesfuly']);
        } else {
            return response()->json(['message' => 'Error deleting the item', 'error' => $error], 500);
        }
    }
}
