<?php

Route::get('/', 'PagesController@root')->name('root');

Auth::routes(['verify' => true]);

// auth 中间件代表需要登录，verified中间件代表需要经过邮箱验证
Route::group(['middleware' => ['auth', 'verified']], function () {
    // 用户收货地址
    Route::get('user_addresses', 'UserAddressesController@index')->name('user_addresses.index');
    // 用户添加收货地址
    Route::get('user_addresses/create', 'UserAddressesController@create')->name('user_addresses.create');
    // 用户添加收货地址
    Route::post('user_addresses', 'UserAddressesController@store')->name('user_addresses.store');

});