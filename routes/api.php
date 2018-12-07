<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//将数据模型通过参数 的方式 绑定在路由中
//以面向对象的思路来看  是将数据对象绑定的路由中
Route::get('users/{myGuests}',function(App\MyGuests $myGuests){
	return $myGuests;
});


//显示绑定
$router->get('aaa/{user_model}',function(App\MyGuests $myGuests){
	return $myGuests;
});

