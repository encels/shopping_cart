<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Src\Carts\Infrastructure\GetCartById;

class GetCartItemsController extends Controller

{

    private $controllerCart;

    public function __construct(
        GetCartById $cart,
    ) {
        $this->controllerCart = $cart;
    }

    public function index(Request $request)
    {

        //segment validation for identify "count items"
        $lastSegment = $request->segment(count($request->segments()));
        $count = $lastSegment === 'count';
         
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
            $cart = $this->controllerCart->getById($cartId);
            $success = true;
        } catch (\Exception $e) {
            $error = $e->getMessage();
            $success = false;
        }


        if ($success) {
            if($count){
                return response()->json(['itemCount' => $cart->getItemsCount(), 'message' => 'Items count']);
            }
            return response()->json(['cart' => $cart->toArray(), 'message' => 'Cart Found']);
        } else {
            return response()->json(['message' => 'Error finding The Cart', 'error' => $error], 500);
        }
    }
}
