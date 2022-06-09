<?php

Route::resource('pages', 'PageController')->except(['destroy']);
Route::delete('pages', 'PageController@delete')->name('pages.delete');
