<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Src\Carts\Infrastructure\CreateCart;
use Illuminate\Support\Facades\Validator;
use Src\CartItems\Infrastructure\CreateCartItemFromArray;

class CartAddItemsController extends Controller

{

    private $controllerCart, $controllerCartItemArray;

    public function __construct(
        CreateCart $cart,
        CreateCartItemFromArray $cartItemArray,
    ) {
        $this->controllerCart = $cart;
        $this->controllerCartItemArray = $cartItemArray;
    }

    public function index(Request $request)
    {
        $error = '';
        $validator = Validator::make($request->all(), [
            'cartId' => 'int',
            'items' => 'required|array',
            'items.*.productId' => 'required|int',
            'items.*.quantity' => 'required|int'

        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->json(['message' => 'Error validating request', 'errors' => $errors], 422);
        }
        $cartId = $request->input('cartId') ?: $this->controllerCart->save()->getValue();


        $items = $request->input('items');
        $success = false;
        try {
            $success = $this->controllerCartItemArray->saveFromArray($items, $cartId);
        } catch (\Exception $e) {
            $error = $e->getMessage();
        }


        if ($success) {
            return response()->json(['cartId' => $cartId, 'message' => 'Items added to cart']);
        } else {
            return response()->json(['message' => 'Error adding items to cart', 'error' => $error], 500);
        }
    }

    public function createCartItem(Request $request)
    {
        $error = '';
        $validator = Validator::make($request->all(), [
            'cartId' => 'int|required',
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
            $itemId = $this->controllerCartItem->save($cartId,$productId,$quantity);
            $success = true;
        } catch (\Exception $e) {
            $error = $e->getMessage();
            $success = false;
        }


        if ($success) {
            return response()->json(['itemId' => $itemId->getValue(), 'message' => 'Items added to cart']);
        } else {
            return response()->json(['message' => 'Error adding items to cart', 'error' => $error], 500);
        }
    }
}
