<?php

Route::get('user/profile', 'UserController@profile')->name('user.profile');
Route::get('user/invoice', 'UserController@invoice')->name('user.invoice');
Route::put('user/profile', 'UserController@putProfile')->name('user.putProfile');



