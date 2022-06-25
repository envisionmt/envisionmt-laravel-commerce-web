<?php

Route::get('user/profile', 'UserController@profile')->name('user.profile');
Route::put('user/profile', 'UserController@putProfile')->name('user.putProfile');



