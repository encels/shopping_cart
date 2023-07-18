<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Src\Orders\Infrastructure\CreateOrderItems;

class SaveOrderController extends Controller

{

    private $controllerOrder;

    public function __construct(
        CreateOrderItems $order,
    ) {
        $this->controllerOrder =$order;
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
            $order = $this->controllerOrder->createItems($cartId);
            $success = true;
        } catch (\Exception $e) {
            $error = $e->getMessage();
            $success = false;
        }

        if ($success) {
            return response()->json(['order' => $order->toArray(), 'message' => 'Order created']);
        } else {
            return response()->json(['message' => 'Error creating the order', 'error' => $error], 500);
        }
    }
}
