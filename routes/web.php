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
    return view('hello');
});

Route::get('hello',function(){
	return 'hello'; 
});

Route::match(['get','post'],'hello',function(){
	// return 'hello,welcome to Laravel';
	return view('hello');
});

/*Route::get('user/{mengyue}','UserController@show');*/

Route::match(['get','post'],'foo',function(){
	return 'this is a request from get or post';
});

/*Route::get('user/{name?}',function($name=null){
	return $name;
});*/

/*Route::get('user/{name?}',function($name='mengyue'){
	return $name;
});*/


/*正则约束的路由绑定*/
/*Route::get('user/{name}',function($name){
	//name必须为字母  切不能为空
})->where('name','[A-Za-z]+');*/

/*Route::get('user/{id}/{name}',function($id,$name){
	//id为数字  name为字母
})->where(['id'=>'[0-9]+','name'=>'[A-Za-z]+']);*/

/*Route::get('login/{email}/{password}',function($email,$password){
	echo 'Login Successful, welcome ' .$email;
})->where(['email'=>'^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$' ,'password'=>'^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,10}$']);*/


/*路由的全局约束*/
/*Route::get('user/{id}/{name}',function($id,$name){
	//id为数字  name为字母
	return $id . $name;
});*/

/*命名路由*/
//定义名称为profile的路由
/*Route::get('user/profile',function(){
	return 'my url:' .route('ptxt');
	//route(路由名称)  获取该路由的url
})->name('ptxt');*/

//为控制器动作指定路由名称  
Route::get('user/{name}','UserController@show')->name('ptwo');

Route::get('userRedirect',function(){
	echo route('ptwo',['name'=>'mengyue']);
	return redirect()->route('ptwo',['name'=>'mengyue']);
});


/*为命名路由生成url*/
/*$url=route('ptwo');
*/


/*路由分组
用于共享路由属性 比如中间件和命名空间
共享属性以数组形式作为参数 传递给 Route::group方法。
*/
//路由分组 共享 中间件
/*Route::middleware(['first','second'])->group(function(){
	Route::get('/',function(){
		//调用这个路由时  会用到first second中间件
	});

	Route::get('user/profile',function(){

	});
});*/

//路由分组 共享 命名空间
Route::namespace('Admin')->group(function(){

});

//路由分组 处理 子域名路由
/*Route::domain('{account}')->group(function(){
	Route::get('user/{id}',function($account,$id){
		return 'this is '.$account .'page of user' .$id;
	});
});*/

//路由分组 路由前缀
Route::prefix('admin')->group(function(){
	Route::get('user',function(){
		return route('userRoute');
	})->name('userRoute');
});

//路由分组 路由名称前缀
Route::name('name.')->group(function(){
	Route::get('users',function(){
		return route('name.users');
	})->name('users');
});


/*路由模型绑定*/
//隐式绑定
Route::get('users/{myGuests}',function(App\MyGuests $myGuests){
	return $myGuests;
});


/*频率限制*/
//1 分钟内  只能访问60次分组路由
Route::middleware('auth:api','throttle:60,1')->group(function(){
	Route::get('/user',function(){

	});
});

/*动态频率限制*/



/*Route::get('login',function(){
	return 'hello ,login Successful!';
})->middleware('token');*/


//middeleware 为路由分配中间件
Route::get('login',function(){

})->middleware('web');


/*自定义中间件组*/
/*在Kernel中 的中间件组中 自定义了一个 名为 login 的数组
该数组包含了 一个'token'的键  该键在
路由中间件中 指向token对应的 CheckToken 中间件类

*/
Route::group(['middleware'=>['login']],function(){
	Route::get('login',function(){
		return view('welcome',['website'=>'Laravel']);

	});

	Route::view('/view','welcome',['website'=>'Laravel学院']);
});


/*中间件参数*/

Route::put('post/{id}',function($id){

})->middleware('role:editor');


/*终端中间件*/



/*CSRF*/
Route::get('form_without_csrf_token',function(){
	return "<form method='post' action='/hello_form_form'>
			<button type='submit'>提交</button></form>";
});


Route::get('form_with_csrf_token',function(){
	return "<form method='post' action='/hello_form_form'>" .csrf_field() ."<button type='submit'>提交</button></form>";
});


//在post请求中 如果提交的form表单不带csrf 则默认为Session中存的token不一致 
Route::post('hello_form_form',function(){
	return 'hello laravel!';
});


Route::get('user1/{id}','UserController@show');


/*Route::get('profile1','UserController')->middleware('auth');*/


/*//为PostController注册一个路由
Route::resource('post','PostController');*/

/*命名资源路由*/
Route::resource('post','PostController',['names'=>['create'=>'welcome']
]);

/*命名资源路由参数*/
Route::resource('user2','UserController',['parameters'=>[
	'user'=>'admin_user'
]]);

/*本地化资源url*/



Route::get('user4/{id}','UserController@store');


Route::get('cookie/add', function () {
    $minutes = 24 * 60;
    // return response('欢迎来到 Laravel 学院')->cookie('name', 'zhangsan', $minutes);
    $cookie = cookie('name', '学院君X', $minutes);
    return response('欢迎来到 Laravel 学院')->cookie($cookie);
});

Route::get('cookie/get', function(\Illuminate\Http\Request $request) {
    $cookie = $request->cookie('name');
    dd($cookie);
});



/*上传文件*/
Route::post('file/upload',function(\Illuminate\Http\Request $request){
	if($request->hasFile('photo')&&$request->file('photo')->isValid()){
		//获取上传的文件
		$photo=$request->file('photo');

		//获取上传文件的后缀
		$extension=$photo->extension();

		$store_result=$photo->store('photo');


		$output=[
			'extension'=>$extension,
			'store_result'=>$store_result
		];
		print_r($output);
		exit();
	}

	exit('未获取到上传文件或上传过程出错');
});


Route::get('hello/test',function(){
	return redirect('http://www.taobao.com');
});

/*back()  返回到上一个请求的url*/

Route::post('user/profile',function(){
	return back()->withInput();
});

/*通过Eloquent模型填充参数*/

/*文件下载*/
Route::get('download/response',function(){
	return response()->download(storage_path('app/photo/LthJKjYIC61020YQT0bYuvQfdSNYdEzwbqSMt2Nt.jpeg'),'测试图片.jpeg');
});

Route::get('welcome',function(){
	return view('welcome',['name'=>'MengYue']);
});





