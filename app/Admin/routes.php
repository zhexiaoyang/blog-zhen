<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->get('categories', 'CategoryController@index');
    $router->get('categories/create', 'CategoryController@create');
    $router->post('categories' , 'CategoryController@store');
    $router->get('categories/{id}/edit', 'CategoryController@edit');
    $router->put('categories/{id}', 'CategoryController@update');
    $router->delete('categories/{id}' , 'CategoryController@destroy');

    $router->get('articles', 'ArticleController@index');
    $router->get('articles/create', 'ArticleController@create');
    $router->post('articles' , 'ArticleController@store');
    $router->get('articles/{id}/edit', 'ArticleController@edit');
    $router->put('articles/{id}', 'ArticleController@update');
    $router->delete('articles/{id}' , 'ArticleController@destroy');

});
