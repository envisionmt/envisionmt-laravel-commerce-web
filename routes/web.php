<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth
require 'web/auth.php';
// Social networks
require 'web/facebook.php';
require 'web/google.php';

/*
*
* Backend Routes
*
* --------------------------------------------------------------------
*/

Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'backend.', 'middleware' => ['web']], function () {
    require 'web/backend/auth.php';
});
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'backend.', 'middleware' => ['auth', 'web', 'auth.admin']], function () {

    require 'web/backend/sites.php';
    require 'web/backend/profile.php';
    require 'web/backend/users.php';
    require 'web/backend/introduction-types.php';
    require 'web/backend/introductions.php';
    require 'web/backend/pages.php';
    require 'web/backend/categories.php';
    require 'web/backend/products.php';
    require 'web/backend/deliveries.php';
    require 'web/backend/order-payments.php';

    // Library
    require 'web/backend/file-upload.php';
    require 'web/backend/log.php';
});

/*
*
* Frontend Routes
*
* --------------------------------------------------------------------
*/
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {

    require 'web/frontend/products.php';
    require 'web/frontend/sites.php';
    // Auth

//    require 'web/frontend/auth.php';


    Route::group(['middleware' => ['auth.user']], function () {
        require 'web/frontend/user.php';
    });
});


