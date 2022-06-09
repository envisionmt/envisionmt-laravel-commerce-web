<?php

Route::get('', 'SiteController@index')->name('sites.index');
Route::get('/change-language/{language}', 'SiteController@changeLanguage')->name('sites.change-language');
Route::get('/track-now', 'SiteController@viewTrackNow')->name('sites.view-track-now');
Route::post('/track-now', 'SiteController@postTrackNow')->name('sites.post-track-now');
Route::post('/contact-us', 'SiteController@contactUs')->name('sites.contact-us');
Route::get('/{slug}', 'SiteController@page')->name('sites.page');
