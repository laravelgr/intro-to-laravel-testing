<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Routing\ResponseFactory;

Route::post('/fruit', function () {
    $responseFactory = app(ResponseFactory::class);
    return $responseFactory->redirectToRoute('get-fruit', 1, 201);
});

Route::get('/fruit/{id}', ['as' => 'get-fruit', function () {
    $responseFactory = app(ResponseFactory::class);
    return $responseFactory->json([
        'id'   => 1,
        'name' => 'Orange'
    ]);
}]);
