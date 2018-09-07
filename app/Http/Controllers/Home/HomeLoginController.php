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
        $request->session()->pull('id');
        $request->session()->pull('name');
        return view('Home.Login.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //前台登录加载模板
    public function create()
    {
        // 视图模块
        return redirect('/homelogin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //前台执行语句
    public function store(Request $request)
    {
        // 获取闪存的参数数据
        $request->flash();
        // 获取数据
        $user=DB::table('home_user')->where('name','=',$request->input('name'))->first();
        // 检测用户名
        if($user){
             session(['id'=>$user->id]);
             session(['name'=>$user->name]);
            return redirect('/')->with('success','登录成功'); 
        }else{
            return back()->with('error','用户名有误');
        }
}       
        // 加载忘记密码
     public function forget(){
        //加载模板
        return view("Home.Login.forget");
    }

    public function doforget(Request $request){
        $email=$request->input('email');
        // var_dump($request);
        // exit;
        //获取数据库的数据
        $info=DB::table("home_user")->where("email",'=',$email)->first();
        
        if($info!==null){
        $this->sendMail($email,$info->id,$info->token);
          echo "找回密码邮件已经发送,请登录邮箱找回密码";

        }else{
            return back()->with('error','邮箱格式错误');
        }
         
    }

    //发送纯文本 视图和数据 $email 接收方 $id注册用户id $token 校验参数
    public function sendMail($email,$id,$token){
        //在闭包函数内部使用闭包函数外部的变量 必须use 导入
        Mail::send('Home.Login.reset',['id'=>$id,'token'=>$token], function($message)use($email){
             //发送主题
            $message->subject('密码找回');
            //接收方
            $message->to($email);
        });
    }
    //加载密码重置模板
    public function reset(Request $request){
        $id=$request->input("id");
        //获取数据表数据
        $info=DB::table("home_user")->where("id",'=',$id)->first();
        $token=$request->input('token');
        // echo $id.":".$token;
        //校验token
        if($token==$info->token){
            return view("Home.Login.reset1",['id'=>$id]);
        }
    }

    // 执行密码重置操作
    public function doreset(Request $request){
        //修改密码
        // echo "1";
        $id=$request->input('id');
        // echo $id;
        $data['password']=Hash::make($request->input('password'));
        //重新生成一份token
        $data['token']=str_random(50);
        DB::table("home_user")->where("id",'=',$id)->update($data);
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
