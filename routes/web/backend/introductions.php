<?php

Route::resource('introductions', 'IntroductionController')->except(['destroy']);
Route::delete('introductions', 'IntroductionController@delete')->name('introductions.delete');
