<?php

Route::resource('introduction-types', 'IntroductionTypeController')->except(['destroy']);
Route::delete('introduction-types', 'IntroductionTypeController@delete')->name('introduction-types.delete');
