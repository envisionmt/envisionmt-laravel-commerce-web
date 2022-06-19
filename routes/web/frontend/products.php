<?php

Route::get('products', 'ProductController@index')->name('products.index');
Route::get('products/{id}', 'ProductController@show')->name('products.show');
Route::post('products/add-car', 'ProductController@addCart')->name('products.addCart');
