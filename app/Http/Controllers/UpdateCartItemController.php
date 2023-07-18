<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Src\CartItems\Infrastructure\UpdateQuantity;

class UpdateCartItemController extends Controller

{

    private $controllerCartItem;

    public function __construct(
        UpdateQuantity $cartItem,
    ) {
        $this->controllerCartItem = $cartItem;
    }

    public function index(Request $request, $id)
    {
        $error = '';
        $itemId = (int)$id;
        $validator = Validator::make($request->all(), [
            'quantity' => 'int|required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->json(['message' => 'Error validating request', 'errors' => $errors], 422);
        }

        $qty = $request->input('quantity');

        try {
            $item = $this->controllerCartItem->updateQuantity($itemId,$qty);
            $success = true;
        } catch (\Exception $e) {
            $error = $e->getMessage();
            $success = false;
        }


        if ($success) {
            return response()->json(['item' => $item->toArray(), 'message' => 'Item quantity Updated']);
        } else {
            return response()->json(['message' => 'Error Updating the quantity', 'error' => $error], 500);
        }
    }
}
