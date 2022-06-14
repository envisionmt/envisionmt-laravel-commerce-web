<?php

Route::resource('products', 'ProductController')->except(['destroy']);
Route::delete('products', 'ProductController@delete')->name('products.delete');
