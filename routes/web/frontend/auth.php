<?php
// Login
Route::get('user/login', 'AuthController@login')->name('auth.login');
Route::post('user/login', 'AuthController@authenticate')->name('auth.authenticate');

// Register
Route::get('register', 'AuthController@register')->name('auth.register');
Route::post('register', 'AuthController@handleRegister')->name('auth.handle-register');

// Logout
Route::post('user/logout', 'AuthController@logout')->name('auth.logout');
