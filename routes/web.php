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
// Route::get('/','Home\UserController@index');
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
//测试短信验证
Route::get('/sms','Admin\SmsController@index');
Route::get('/sms/create/{p}','Admin\SmsController@create');
Route::get('/sms/store/{code}','Admin\SmsController@store');


// # 用户点击登录按钮时请求的地址
// Route::get('/auth/oauth', 'Auth\AuthController@oauth');

// # 接口回调地址
// Route::get('/auth/callback', 'Auth\AuthController@callback');


// //首页路由
Route::get('/','Home\UserController@index');
//商品某一级下的列表页
Route::get('/specials/{cid}','Home\UserController@create');
//商品详情页
Route::get('/details/{gid}','Home\UserController@show');
//商品列表页
Route::get('/list','Home\UserController@store');
//前台的注册页面
Route::get('/homeregister','Home\RegisterController@index');
//Ajax电话检测
Route::get('/homeregister/register/{p}','Home\RegisterController@register');
//ajax用户名检测
Route::get('/homeregister/names/{m}','Home\RegisterController@names');
//前台注册添加
Route::post('/homeregister/create','Home\RegisterController@create');
//加载手机号码验证模板
Route::get("/forget","Home\HomeLoginController@forget");
//验证是否存在该号码
Route::post("/doforget","Home\HomeLoginController@doforget");	
//加载修改密码模板							
Route::get("/reset","Home\HomeLoginController@reset");	
//执行密码修改操作
Route::post("/doreset","Home\HomeLoginController@doreset");	
//前台登录
Route::resource('/homelogin','Home\HomeLoginController');
//退出登录
Route::resource('/homelogin','Home\HomeLoginController');
//前台的个人中心 
Route::get('/personal','Home\PersonalController@index');
//修改个人信息
Route::post('/city/{id}','Home\PersonalController@update');

//联系我们
Route::get('/contact','Home\ContactController@index');
// // 我的账号Myaccount
// Route::get('/myaccount','Home\MyaccountController@index');
// //前台注册register已选书籍
// Route::get('/register','Home\RegisterController@index');

// //前台下单地址页面
// Route::get('/homexiadan','Home\XiadanController@index');
// // 前台的友情链接
// Route::get('/lists','Home\ListsController@index');
// // 前台的友情链接添加
// Route::get('/addlists','Home\ListsController@store');

// //前台的友情链接
// Route::get('/lists','Home\ListsController@create');
// //前台的使用Ajax检查网址名是否重复、
// Route::get('/repeat/{m}','Home\RepeatController@create');
// //前台检查网址是否重复
// Route::get('/repeats/{mm}','Home\RepeatsController@index');
// // 前台的添加信息
// Route::get('/information','Home\InformationController@index');
// Route::get('/information','Home\InformationController@create');








// 后台模板
//管理员模块
// Route::resource("/user","Admin\UserController");
// Route::resource("/cate","Admin\CateController");

// //Ajax
// Route::get('/ajax/{m}','Admin\AjaxController@index');
// //后台友情链接
// Route::resource('/listss','Admin\ListssController');
