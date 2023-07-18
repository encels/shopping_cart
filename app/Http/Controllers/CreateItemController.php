<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Src\CartItems\Infrastructure\CreateCartItem;
use Src\Carts\Infrastructure\CreateCart;
use Illuminate\Support\Facades\Validator;

class CreateItemController extends Controller

{

    private $controllerCart,  $controllerCartItem;

    public function __construct(
        CreateCart $cart,
        CreateCartItem $cartItem,
    ) {
        $this->controllerCart = $cart;
        $this->controllerCartItem = $cartItem;
    }

    public function index(Request $request)
    {
        $error = '';
        $validator = Validator::make($request->all(), [
            'cartId' => 'int',
            'productId' => 'required|int',
            'quantity' => 'required|int'

        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->json(['message' => 'Error validating request', 'errors' => $errors], 422);
        }

        $cartId = $request->input('cartId') ?: $this->controllerCart->save()->getValue();

        $productId = $request->input('productId');
        $quantity = $request->input('quantity');

        try {
            $itemId = $this->controllerCartItem->save($cartId, $productId, $quantity);
            $success = true;
        } catch (\Exception $e) {
            $error = $e->getMessage();
            $success = false;
        }


        if ($success) {
            return response()->json([
                'cartId' => $cartId,
                'itemId' => $itemId->getValue(),
                'message' => 'Items added to cart'
            ]);
        } else {
            return response()->json(['message' => 'Error adding items to cart', 'error' => $error], 500);
        }
    }
}
