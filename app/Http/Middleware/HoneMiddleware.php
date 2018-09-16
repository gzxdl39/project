<?php

namespace App\Http\Middleware;

use Closure;

class HoneMiddleware
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
        //检测当前用户是否登录
        if($request->session()->has('name')){
        //执行正确的访问操作
            return $next($request);
        }else{
            //跳转登录的界面
            return redirect('/homelogin/create');
        }
    }
}
