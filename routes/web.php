<?php

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

$router->get('/user/{name}', ['as' => 'example-hello', 'uses' => 'ExampleController@index']);

$router->group(['prefix' => 'api'], function () use ($router) {
    //Singers
    $router->get('singers', ['uses' => 'SingerController@index']);
    $router->get('singers/{id}', ['uses' => 'SingerController@show']);
    $router->post('singers', ['uses' => 'SingerController@store']);
    $router->put('singers/{id}', ['uses' => 'SingerController@update']);
    $router->delete('singers/{id}', ['uses' => 'SingerController@destroy']);
});
