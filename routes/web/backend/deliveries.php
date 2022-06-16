<?php

Route::resource('deliveries', 'DeliveryController')->except(['destroy']);
Route::delete('deliveries', 'DeliveryController@delete')->name('deliveries.delete');
