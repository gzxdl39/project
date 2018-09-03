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
//后台登录页面
Route::get("/login","Admin\AdminController@create");
//验证码
Route::get("login/create","Admin\ClassController@create");
//验证码校验
Route::get("login/store","Admin\ClassController@store");
//检测登录
Route::post("/login/store","Admin\AdminController@store");
//后台登录中间件
Route::group(['middleware'=>'login'],function(){
	//退出登录
	Route::get("/login/destroy","Admin\AdminController@destroy");
	//后台首页
	Route::get("/index","Admin\AdminController@index");

	//管理员模块
	Route::resource("/user","Admin\UserController");
	//权限分配页面
	Route::get("/role/{id}","Admin\RoleController@index");
	//权限分配完成提交
	Route::post("/role/create","Admin\RoleController@create");

	//商品分类
	Route::resource("/cate","Admin\CateController");
	//加载添加顶级分类页面
	Route::get("/top","Admin\AjaxController@update");
	//添加顶级分类
	Route::post("/top/up","Admin\AjaxController@destroy");
	//添加子分类
	Route::get('/class/{id}','Admin\ClassController@index');

	//商品列表
	Route::resource("/shop","Admin\ShopController");
	//商品上架
	Route::get('/shop/up/{id}','Admin\AjaxController@show');

	// 订单管理
	Route::resource("/order","Admin\OrderController");
	//订单详情
	Route::get('/order/show/{id}','Admin\ClassController@show');
	
	//Ajax
	//判断管理员是否重复
	Route::get('/ajax/{m}','Admin\AjaxController@index');
	// 判断商品名称是否重复
	Route::get('/ajax/create/{m}','Admin\AjaxController@name');
	// 判断pid值
	Route::get('/ajax/store/{m}','Admin\AjaxController@store');
	//判断二级分类是否重复
	Route::get('/ajax/edit/{m}','Admin\AjaxController@shop');
});
// Route::get('/info','Admin\RoleController@store');
// Route::get('/sms','Admin\SmsController@index');
// Route::get('/sms/create','Admin\SmsController@create');
