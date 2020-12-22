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

$router->group(['prefix' => 'admin', 'middleware' => 'app'], function () use ($router) {
    $router->get('/', 'AdminController@index');
    $router->get('{id}', 'AdminController@show');
    $router->post('/', 'AdminController@store');
    $router->put('/', function () {
        return response()->json(['message' => 'Masukkan id admin'], 400);
    });
    $router->put('{id}', 'AdminController@update');
    $router->delete('/', function () {
        return response()->json(['message' => 'Masukkan id admin'], 400);
    });
    $router->delete('{id}', 'AdminController@destroy');
});

$router->group(['prefix' => 'buku', 'middleware' => 'app'], function () use ($router) {
    $router->get('/', 'BukuController@index');
    $router->get('{id}', 'BukuController@show');
    $router->post('/', 'BukuController@store');
    $router->put('/', function () {
        return response()->json(['message' => 'Masukkan id buku'], 400);
    });
    $router->put('{id}', 'BukuController@update');
    $router->delete('/', function () {
        return response()->json(['message' => 'Masukkan id buku'], 400);
    });
    $router->delete('{id}', 'BukuController@destroy');
});

$router->group(['prefix' => 'user', 'middleware' => 'app'], function () use ($router) {
    $router->get('/', 'UserController@index');
    $router->get('{id}', 'UserController@show');
    $router->post('/', 'UserController@store');
    $router->put('/', function () {
        return response()->json(['message' => 'Masukkan id user'], 400);
    });
    $router->put('{id}', 'UserController@update');
    $router->delete('/', function () {
        return response()->json(['message' => 'Masukkan id user'], 400);
    });
    $router->delete('{id}', 'UserController@destroy');
});
