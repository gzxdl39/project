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
//首页路由
Route::get('/','Home\UserController@index');
//管理员模块
Route::resource("/user","Admin\UserController");

// Route::get('/user','Admin\UserController@index');
// Route::get('/user/create','Admin\UserController@create');
// Route::post('/user/store','Admin\UserController@store');
//Ajax
Route::get('/ajax/{m}','Admin\AjaxController@index');