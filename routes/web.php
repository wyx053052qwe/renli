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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::prefix(' ')->group(function () {
    Route::get('/', 'Index\IndexController@index');
    Route::get('index/login', 'Index\IndexController@login');
    Route::post('index/dologin', 'Index\IndexController@dologin');
});
Route::prefix('pay')->middleware('checklogin')->group(function () {
    Route::get('social', 'Pay\PayController@pay');
     Route::get('socialg', 'Pay\PayController@payg');
    Route::post('socials', 'Pay\PayController@socials');
     Route::post('socialss', 'Pay\PayController@socialss');
    Route::get('cofirm', 'Pay\PayController@cofirm');
    Route::post('pays', 'Pay\PayController@pays');
    Route::get('return', 'Pay\PayController@return');
});
Route::prefix(' ')->group(function () {
    Route::get('/login', 'Login\LoginController@login');
    Route::post('login/dologin', 'Login\LoginController@dologin');
});
Route::prefix('/admin')->middleware('login')->group(function () {
    Route::get('', 'Admin\AdminController@index');
    Route::get('', 'Admin\AdminController@index');

});
Route::prefix('/shop')->middleware('login')->group(function () {
    Route::get('add', 'Shop\ShopController@add');
    Route::post('doadd', 'Shop\ShopController@doadd');
    Route::get('index', 'Shop\ShopController@index');
    Route::post('delete', 'Shop\ShopController@delete');
    Route::post('dels', 'Shop\ShopController@dels');

});
Route::prefix('/yuan')->middleware('login')->group(function () {
    Route::get('list', 'Yuan\YuanController@index');
    Route::get('add', 'Yuan\YuanController@add');
    Route::post('doadd', 'Yuan\YuanController@doadd');
    Route::post('upload', 'Yuan\YuanController@upload');
    Route::get('gong', 'Yuan\YuanController@gong');
    Route::get('addgong', 'Yuan\YuanController@addgong');
    Route::get('name', 'Yuan\YuanController@name');
    Route::post('delete', 'Yuan\YuanController@delete');
    Route::post('dels', 'Yuan\YuanController@dels');
    Route::post('dogong', 'Yuan\YuanController@dogong');
    Route::get('export', 'Yuan\YuanController@export');
    Route::get('cart', 'Yuan\YuanController@cart');
    Route::get('wage', 'Yuan\YuanController@wage');
    Route::get('addwage', 'Yuan\YuanController@addwage');
    Route::post('dowage', 'Yuan\YuanController@dowage');
});
Route::prefix('kai')->middleware('login')->group(function () {
    Route::get('index', 'Kai\KaiController@index');
    Route::get('add', 'Kai\KaiController@add');
    Route::post('upload', 'Kai\KaiController@upload');
    Route::post('delete', 'Kai\KaiController@delete');
    Route::post('dels', 'Kai\KaiController@dels');
    Route::get('export', 'Kai\KaiController@export');
});
Route::prefix('/yue')->middleware('login')->group(function () {
    Route::get('index', 'Yue\YueController@index');
    Route::get('yue', 'Yue\YueController@yue');
    Route::post('doyue', 'Yue\YueController@doyue');
    Route::post('upload', 'Yue\YueController@upload');
    Route::post('delete', 'Yue\YueController@delete');
    Route::post('dels', 'Yue\YueController@dels');
});
Route::get('/pay/index', 'Pay\PayController@index');
Route::prefix('/pay')->middleware('checklogin')->group(function () {
    Route::get('pay', 'Pay\PayController@pay');
    Route::get('order', 'Pay\PayController@order');
    Route::get('orders', 'Pay\PayController@orders');
    Route::post('del', 'Pay\PayController@del');
    Route::post('dels', 'Pay\PayController@dels');
    Route::post('delete', 'Pay\PayController@delete');
});
Route::get('/pay/return', 'Pay\PayController@return');
Route::post('/pay/notify', 'Pay\PayController@notify');
Route::get('/shebao','Index\IndexController@shebao');
Route::get('/gongjijin','Index\IndexController@gongjijin');
//app
Route::get('/app/login','Apps\AppsController@login');
Route::get('/app/index','Apps\AppsController@index');
Route::prefix('/app')->middleware('appslogin')->group(function(){
   Route::get('shebao','Apps\AppsController@shebao');
   Route::get('gongjijin','Apps\AppsController@gongjijin');
   Route::get('socials','Apps\AppsController@socials');
   Route::get('user','Apps\AppsController@user');
   Route::post('users','Apps\AppsController@users');
   Route::get('order_cofirm','Apps\AppsController@order_cofirm');
   Route::get('order','Apps\AppsController@order');
   Route::get('orders','Apps\AppsController@orders');
   Route::post('send','Apps\AppsController@send');

});
