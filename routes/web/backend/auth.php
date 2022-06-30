<?php
// Login
Route::get('login', 'AuthController@login')->name('auth.login');
Route::post('login', 'AuthController@authenticate')->name('auth.authenticate');

// Logout
Route::post('logout', 'AuthController@logout')->name('auth.logout');
