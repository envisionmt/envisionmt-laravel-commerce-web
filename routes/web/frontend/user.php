<?php

Route::get('user/profile', 'UserController@profile')->name('user.profile');
Route::get('user/invoice', 'UserController@invoice')->name('user.invoice');
Route::get('user/invoice/{id}', 'UserController@invoiceDetail')->name('user.invoiceDetail');
Route::put('user/profile', 'UserController@putProfile')->name('user.putProfile');



