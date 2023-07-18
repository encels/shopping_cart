<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// ADD ITEMS TO CART (POST)
$router->post('/carts/items/fromArray', 'CartAddItemsController@index'); //from array
$router->get('/carts/items/count', 'GetCartItemsController@index'); // all items


// CREATE (POST)
$router->post('/carts/items', 'CreateItemController@index'); // individual

// READ (GET)
$router->get('/carts/items', 'GetCartItemsController@index'); // all items
$router->get('/carts/items/{id}', 'GetCartItemController@index'); // specific item


// UPDATE (PUT)
$router->put('/carts/items/{id}', 'UpdateCartItemController@index');

// DELETE (DELETE)
$router->delete('/carts/items/{id}', 'DeleteCartItemController@index');
$router->delete('/carts/items', 'DeleteAllCartItemsController@index');
