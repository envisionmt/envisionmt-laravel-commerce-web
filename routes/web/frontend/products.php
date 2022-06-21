<?php

Route::get('products', 'ProductController@index')->name('products.index');
Route::get('products/cart', 'ProductController@cart')->name('products.cart');
Route::get('products/checkout', 'ProductController@checkout')->name('products.checkout')->middleware('auth.user');
Route::get('products/return', 'ProductController@returnData')->name('products.returnData');
Route::post('products/callback', 'ProductController@callbackData')->name('products.callbackData');
Route::post('products/checkout', 'ProductController@postCheckout')->name('products.postCheckout')->middleware('auth.user');
Route::get('products/{id}', 'ProductController@show')->name('products.show');
Route::post('products/add-cart', 'ProductController@addCart')->name('products.addCart');


