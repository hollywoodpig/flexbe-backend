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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('items', 'ItemController@index');
    $router->post('items', 'ItemController@store');
    $router->put('items/{id}', 'ItemController@update');
    $router->delete('items/{id}', 'ItemController@delete');
    $router->put('items/acquire/{id}', 'ItemController@acquire');
    $router->get('items/archive', 'ItemController@archived');
    $router->put('items/archive/{id}', 'ItemController@archive');
    $router->put('items/unarchive/{id}', 'ItemController@unarchive');
});
