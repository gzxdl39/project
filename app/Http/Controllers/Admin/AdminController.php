<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //加载后台首页
        return view("Admin.user.inserts");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载login页面
        return view("Admin.user.login");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 记录闪存
        $request->flash();
        //检测用户名
        $user=DB::table("shop_users")->where("uname","=",$request->input("uname"))->first();
        //判断用户是否存在
        if($user){
            //检测密码
            if(Hash::check($request->input('upwd'),$user->upwd)){
                //把登录用户名写入session
                session(['uname'=>$user->uname]);
                //1.获取当前登录用户所有的权限信息 node表信息 控制器名字 方法名字
                $list=DB::select("select power,controller,method from point as p,node as n where p.nid=n.id and rid={$user->uid}");
                //2.权限初始化 让所有管理员具有后台首页访问权限
                $nodelist['AdminController'][]="index";
                $nodelist['AdminController'][]="destroy";
                //遍历
                foreach($list as $v){
                    //把$list 权限列表写入到$nodelist
                    $nodelist[$v->controller][]=$v->method;
                    //如果权限列表里有create 方法 添加store
                    if($v->method=="create"){
                        $nodelist[$v->controller][]="store";
                    }
                    //如果权限列表里有edit方法 添加update
                    if($v->method=="edit"){
                        $nodelist[$v->controller][]="update";
                    }
                }
                //3.把初始化的权限信息 放置在session里
                session(['nodelist'=>$nodelist]);
                //跳转到后台首页
                return redirect("/index")->with("success","登录成功");
            }else{
                return redirect("/login")->with("error","账号或密码错误");
            }
        }else{
            return redirect("/login")->with("error","账号或密码错误");
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //退出销毁session
        $request->session()->pull("uname");
        return redirect("/login");
    }
}
