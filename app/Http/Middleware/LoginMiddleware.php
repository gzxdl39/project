<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
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
        //检测用户是否登录(检测是否具有session信息)
        if($request->session()->has('name')){
            //获取访问的控制器和方法
            $action=$request->route()->getActionMethod();
            $actions=explode('\\', \Route::current()->getActionName());
            //或$actions=explode('\\', \Route::currentRouteAction());
            $modelName=$actions[count($actions)-2]=='Controllers'?null:$actions[count($actions)-2];
            $func=explode('@', $actions[count($actions)-1]);
            //获取的控制器名字
            $controller=$func[0];
            $actionName=$func[1];
            //获取当前登录用户的权限列表
            $nodelist=session('nodelist');
            // echo $controller.":".$action;
            //对比
            if(empty($nodelist[$controller]) ||!in_array($action,$nodelist[$controller])){
                return redirect("/index")->with('error','抱歉,你没有权限访问该模块,请联系管理员');
            }
            //执行下个请求
            return $next($request);
        }else{
            //跳转到登录界面
            return redirect("/login");
        }
    }
}
