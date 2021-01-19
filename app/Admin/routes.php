<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    $router->get('/api/users', 'UserController@getUser');
    $router->get('/api/cities', 'AddressController@getCity');
    $router->get('/api/methods', 'TransactionController@getMethod');

    $router->resource('users', UserController::class);
    $router->resource('products', ProductController::class);
    $router->resource('item-histories', PointsController::class);
    $router->resource('payments', PaymentController::class);
    $router->resource('orders', OrderController::class);
    $router->resource('cities', CityController::class);
    $router->resource('addresses', AddressController::class);
    $router->resource('transactions', TransactionController::class);
    // $router->resource('vouchers', VoucherController::class);
});
