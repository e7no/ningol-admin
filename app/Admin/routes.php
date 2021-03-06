<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('/demo/category', 'DemoCatController');
    $router->resource('/demo/list', 'DemoListController');
    $router->resource('/demo/detail', 'DemoDetailController');

});
