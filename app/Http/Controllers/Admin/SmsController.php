<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use iscms\Alisms\SendsmsPusher as Sms;
use Config;

class SmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Sms $sms)
    {
        //
        $this->sms=$sms;
        // return view('SMS.sms');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //第一步：引入配置文件，得到需要的预先设置好的参数
        $smsconf = config('alisms');

        $mobile = '15992069599'; // 用户手机号，接收验证码

        $name = $smsconf['sign_name'];  // 短信签名,可以在阿里大鱼的管理中心看到
        $num = rand(1000, 9999); // 生成随机验证码 **键值和之前设定的短信模板变量保持一致
        $smsParams = [
            'verify_code' => "$num"
        ];
        $content = json_encode($smsParams); // 转换成json格式的
        $code = $smsconf['template']['verify'];   // 阿里大于(鱼)短信模板ID
        $interval = 300;

        Redis::set($mobile, json_encode([
            'captcha' => $code,
            'expire' => time() + $interval
        ]));

        $result = $this->sms->send($mobile, $name, $content, $code);

        //property_exists — 检查对象或类是否具有该属性
        if (property_exists($result, "code") && $result->code > 0) {
            return response()->json(['status'=>201, 'error'=>$result->msg]);
        }else{
            return response()->json(['status'=>200, 'error'=>'短信发送成功']);

        }

        }
         //第一步：引入配置文件，得到需要的预先设置好的参数
        $smsconf = config('alisms');

        $mobile = '18335108888'; // 用户手机号，接收验证码

        $name = $smsconf['sign_name'];  // 短信签名,可以在阿里大鱼的管理中心看到
        $num = rand(100000, 999999); // 生成随机验证码 **键值和之前设定的短信模板变量保持一致
        $smsParams = [
            'verify_code' => "$num"
        ];
        $content = json_encode($smsParams); // 转换成json格式的
        $code = $smsconf['template']['verify'];   // 阿里大于(鱼)短信模板ID
        $interval = 300;

        Redis::set($mobile, json_encode([
            'captcha' => $code,
            'expire' => time() + $interval
        ]));

        $result = $this->sms->send($mobile, $name, $content, $code);

        //property_exists — 检查对象或类是否具有该属性
        if (property_exists($result, "code") && $result->code > 0) {
            return response()->json(['status'=>201, 'error'=>$result->msg]);
        }else{
            return response()->json(['status'=>200, 'error'=>'短信发送成功']);

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
