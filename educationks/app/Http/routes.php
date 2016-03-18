<?php

use App\Enum;

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

// Administrator
//Admin Panel
//$environment = "/".env('APP_ENV');
// Detect language
//if (Session::get('language') !== null) {
//    App::setLocale(Enum::ENGLISH_PREFIX);
//} else {
//    App::setLocale(Session::get('language'));
//}
$environment = "";

//
//Route::get('/post', 'HomeController@getPost');
//Route::get('/category', 'HomeController@getCategory');



Route::group(['middleware' => 'language', 'bootable', 'prefix' => 'admin'], function() {
    Route::controller('/auth', 'AdminPanel\AuthController');
    Route::controller('/dashboard', 'AdminPanel\DashboardController');
    Route::controller('/options', 'AdminPanel\OptionsController');
    Route::controller('/advertising', 'AdminPanel\AdvertisingController');
    Route::controller('/users', 'AdminPanel\UsersController');
    Route::controller('/category', 'AdminPanel\CategoryController');
    Route::controller('/posts', 'AdminPanel\PostsController');
    Route::controller('/attachment', 'AdminPanel\AttachmentController');
    Route::controller('/gallery', 'AdminPanel\GalleryController');
    Route::controller('/dev', 'AdminPanel\DevelopmentController');
});

//Route::controller($environment . '/auth', 'AdminPanel\AuthController');

Route::group(['middleware' => 'language', 'bootable'], function() {
    Route::get('/gallery', 'HomeController@getGallery');
    Route::get('/gallery-album', 'HomeController@getGalleryAlbum');
    Route::get('/gallery-single', 'HomeController@getGallerySingle');
    Route::get('/{category?}/{post?}/', 'HomeController@getIndex');
});
