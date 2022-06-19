<?php
// Login
Route::get('login', 'AuthController@login')->name('auth.login');
Route::post('login', 'AuthController@authenticate')->name('auth.authenticate');

// Register
Route::get('register', 'AuthController@register')->name('auth.register');
Route::post('register', 'AuthController@handleRegister')->name('auth.handle-register');

// Logout
Route::post('logout', 'AuthController@logout')->name('auth.logout');
