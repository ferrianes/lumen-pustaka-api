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

$router->group(['prefix' => 'kategori', 'middleware' => 'app'], function () use ($router) {
    $router->get('/', 'KategoriController@index');
    $router->get('{id}', 'KategoriController@show');
    $router->post('/', 'KategoriController@store');
    $router->put('/', function () { 
        return response()->json(['message' => 'Masukkan id kategori'], 400); 
    });
    $router->put('{id}', 'KategoriController@update');
    $router->delete('/', function () { 
        return response()->json(['message' => 'Masukkan id kategori'], 400); 
    });
    $router->delete('{id}', 'KategoriController@destroy');
});
