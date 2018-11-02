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

    $router->get('tags', 'TagController@index');
    $router->get('tags/create', 'TagController@create');
    $router->post('tags' , 'TagController@store');
    $router->get('tags/{id}/edit', 'TagController@edit');
    $router->put('tags/{id}', 'TagController@update');
    $router->delete('tags/{id}' , 'TagController@destroy');

    $router->get('navs', 'NavController@index');
    $router->get('navs/create', 'NavController@create');
    $router->post('navs' , 'NavController@store');
    $router->get('navs/{id}/edit', 'NavController@edit');
    $router->put('navs/{id}', 'NavController@update');
    $router->delete('navs/{id}' , 'NavController@destroy');

    $router->get('replies', 'ReplyController@index');
    $router->get('replies/create', 'ReplyController@create');
    $router->post('replies' , 'ReplyController@store');
    $router->get('replies/{id}/edit', 'ReplyController@edit');
    $router->put('replies/{id}', 'ReplyController@update');
    $router->delete('replies/{id}' , 'ReplyController@destroy');

    $router->post('/upload_image', 'ArticleController@uploadImage')->name('upload_image');
});
