<?php

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

Route::get('/', function () {
    return view('welcome');
});

//前台
Route::group([],function(){
	Route::resource('home/news','home\NewsController');
});




//后台
Route::group([],function(){
	Route::resource('admin/adver','admin\AdverController');
});
