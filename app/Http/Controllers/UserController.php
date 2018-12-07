<?php
/**
 * 
 * @authors ${author} (${email})
 * @date    2018-12-06
 * @version $Id$
 */

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\MyGuests;
use Illuminate\Http\Request;


class UserController extends Controller {


	//加载构造函数的时候 就声明要使用的中间件
	/*public function __construct(){
		//分配token的中间件
		// $this->middleware('token');
		//分配token中间件 不过滤show方法
		$this->middleware('token')->except('show');

		//定义匿名中间件  即没有具体名称 但有规则的中间件
		//如果id的值 不为数值 那么抛出异常 否则通过访问
		$this->middleware(function($request,$next){
			if(!is_numeric($request->input('id'))){
				return 'no this method!';
			}
			return $next($request);
		});
	}*/

	/*控制器依赖注入*/
	/*构造器注入*/
	protected $users;

	/*public function __construct(MyGuests $user){
		$this->user=$user;
		return $user;
	}*/


	/*方法注入*/
	//在方法中注入Request实例
	public function store(Request $request,$id){
		$name=$request->input('name');
		// echo $request->path() .'<br>';
		// if($request->is('user4/*')){
		// 	echo "haha" .'<br>';
		// }

		//fullUrl 返回带参数的url   Url返回不带参数的url
		// return $request->fullUrl();

		//使用all方法 获取所有输入请求
		// return $request->all();

		//处理表单数组输入
		// $input=$request->input('products.0.name');
		// $names=$request->input('products.*.name');
		// return $names;

		/* query 从查询字符串中 获取输入*/
		/*query 方法用于获取get请求
		  input 方法用于所有请求
		  post方法用于获取post请求*/
		// $name=$request->query('name');
		// return $request;


		/*通过动态属性 获取输入*/
		// $name=$request->name;
		// reurn $name;


		/*判断请求参数是否存在*/
		// if($request->has('name')){
		// 	return 'has name';
		// }

		// if($request->has('name','password')){
		// 	return 'has name and password';
		// }

		// if($request->filled('name')){
		// 	return 'paramters exeist';
		// }

		/*将输入存储到session*/
		//将输入存放到一次性session
		// $request->flash();

		// $name=$request->old('name');
		// return $name;


		/*将输入存储到session然后重定向*/
		// return redirect('form')->withInput();
		// return redirect('form')->withInput($request->except('password'));


		/*Cookie */

		/*将cookie添加到响应*/
		// return response('欢迎来到 Laravel 学院')->cookie(
		// 				    'name', 'mengyue', 1
		// 				);

		/*从请求中 取出cookie*/
		// $value=$request->cookie('name');
		// return $value;



		/*文件上传*/
	}


	/**/
    
    public function show($id){
         /*return view('user.profile',['user'=>User::findOrFail($id)]);*/
         return $id;
        
    }
}
