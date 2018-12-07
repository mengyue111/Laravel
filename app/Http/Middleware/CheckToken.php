<?php

namespace App\Http\Middleware;

use Closure;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        //必须带值为mengyue的token参数才能继续访问,否则重定向到laravel官网。
        if($request->input('token')!='mengyue'){
            return redirect()->to('http://laravelacademy.org');
        }
        return $next($request);
    }
}
