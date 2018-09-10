<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Mail;
class HomeLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //退出清除session
        $request->session()->pull('name');
        return redirect("/");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //前台登录加载模板
    public function create()
    {
        if(session('name')){
            return redirect('/personal');
        }else{
            // 视图模块
            return view('Home.myaccount');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //前台登录
    public function store(Request $request)
    {
        // 获取闪存的参数数据
        $request->flash();
        // 获取数据
        $user=DB::table('home_user')->where('name','=',$request->input('name'))->first();
        // 检测用户名
        if($user){
            //检测密码
            if(Hash::check($request->input('password'),$user->password)){
                //把登录用户名写入session
                session(['name'=>$user->name]);
                //跳转到后台首页
                return redirect("/")->with("success","登录成功");
            }else{
                return redirect("/homelogin/create")->with("error","账号或密码错误");
            }
        }else{
            return redirect("/homelogin/create")->with("error","账号或密码错误");
        }
    } 

    // 加载忘记密码
     public function forget(){
        //加载模板
        return view("Home.forge");
    }

    //找回密码
    public function doforget(Request $request){
        $phone=$request->input('phone');
        //获取数据库的数据
        $info=DB::table("home_user")->where("phone",'=',$phone)->first();
        session(['phone'=>$phone]);
        if($info){
            return redirect("/reset");
        }else{
            return redirect("/forget")->with('error','该手机号未被注册使用');
        }
    }
    //加载密码重置模板
    public function reset(Request $request){
        return view("Home.reset");
    }

    // 执行密码重置操作
    public function doreset(Request $request){
        //修改密码
        $phone=session('phone');
        $data['password']=Hash::make($request->input('password'));
        DB::table("home_user")->where("phone",'=',$phone)->update($data);
        return redirect("/homelogin");
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
    public function destroy($id)
    {
        //
    }
     //测试邮件发送
    // public function send(){
    //     //邮件消息生成器
    //     Mail::raw('this is test', function ($message) {
    //         //发送主题
    //         $message->subject('o2o27');
    //         //接收方
    //         $message->to("2419081385@qq.com");
            
    //     });
    //     echo "ok";
    // }
}
