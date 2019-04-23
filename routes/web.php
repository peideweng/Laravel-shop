<?php

Route::redirect('/', '/products')->name('root');
// 产品列表
Route::get('products', 'ProductsController@index')->name('products.index');

Auth::routes(['verify' => true]);

// auth 中间件代表需要登录，verified中间件代表需要经过邮箱验证
Route::group(['middleware' => ['auth', 'verified']], function () {
    // 用户收货地址
    Route::get('user_addresses', 'UserAddressesController@index')->name('user_addresses.index');
    // 用户添加收货地址
    Route::get('user_addresses/create', 'UserAddressesController@create')->name('user_addresses.create');
    Route::post('user_addresses', 'UserAddressesController@store')->name('user_addresses.store');
    // 用户修改收货地址
    Route::get('user_addresses/{user_address}', 'UserAddressesController@edit')->name('user_addresses.edit');
    Route::put('user_addresses/{user_address}', 'UserAddressesController@update')->name('user_addresses.update');
    // 用户删除地址
    Route::delete('user_addresses/{user_address}', 'UserAddressesController@destory')->name('user_addresses.destory');

    // 用户收藏 添加、取消、列表
    Route::post('products/{product}/favorite', 'ProductsController@favor')->name('products.favor');
    Route::delete('products/{product}/favorite', 'ProductsController@disfavor')->name('products.disfavor');
    Route::get('products/favorites', 'ProductsController@favorites')->name('products.favorites');

    // 添加商品
    Route::post('cart', 'CartController@add')->name('cart.add');
    // 购物车
    Route::get('cart', 'CartController@index')->name('cart.index');
    // 购物车 移除商品
    Route::delete('cart/{sku}', 'CartController@remove')->name('cart.remove');
    // 下订单
    Route::post('orders', 'OrdersController@store')->name('orders.store');
});

//产品详情
Route::get('products/{product}', 'ProductsController@show')->name('products.show');
