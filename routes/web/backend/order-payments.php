<?php

Route::get('order-payments', 'OrderPaymentController@index')->name('order-payments.index');
Route::get('order-payments/{id}', 'OrderPaymentController@show')->name('order-payments.show');
