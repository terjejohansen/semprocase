<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'Videocontroller@all');
/**
 * Routes to all the category pages
 */



/**
 * Routes to a single video
 */
Route::get('video/{video}', 'Videocontroller@showSingle');


/* 
 * Handles the admin category sides of the page
 */

Route::auth();

Route::get('admin/login', 'HomeController@index');
Route::get('admin/hjem', 'HomeController@index');

/*
 * Admin kategori handler:
 */
Route::get('admin/kategori', 'HomeController@category');
Route::get('admin/kategori/ny', 'HomeController@create');
Route::get('admin/kategori/{category}', 'HomeController@edit');
Route::get('admin/kategori/{category}/nykategori', 'HomeController@newCategory');


Route::post('admin/kategori', 'HomeController@storeCategory');
Route::put('admin/kategori/{category}', 'HomeController@updateCategory');
Route::delete('admin/kategori/{category}/nykategori{newCategory}', 'HomeController@deleteCategory');
Route::delete('admin/kategori/{category}', 'HomeController@deleteCategory');

Route::get('/{slug}', array('as' => 'page.show', 'uses' => 'Videocontroller@listByCategory'));

/*
 * Admin video handler:
 */
Route::get('admin/video', 'HomeController@video');
Route::get('admin/video/ny', 'HomeController@createVideo');
Route::get('admin/video/{youtube}', 'HomeController@editVideo');


Route::post('admin/video', 'HomeController@storeVideo');
Route::put('admin/video/{youtube}', 'HomeController@updateVideo');
Route::delete('admin/video/{youtube}', 'HomeController@deleteVideo');






