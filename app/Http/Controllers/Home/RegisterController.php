<?php
namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
// 导入验证码类库
use Gregwar\Captcha\CaptchaBuilder;   
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 加载前台注册模板
    public function index(Request $request)
    {
      return view('Home.register');
    }

    //Ajax判断电话是否存在
    public function register(Request $request){     
        //获取参数p
        $p=$_GET['p'];
        // 数据库的数据
        $data=DB::table('home_user')->where('phone','=',$p)->first();
        // 判断数据
        if($data){
            return 1;
        }else{
            return 0;
        }
    }

    //Ajax判断用户名是否存在
    public function names(Request $request){     
        // 数据库的数据
        $data=DB::table('home_user')->where('name','=',$_GET['m'])->first();
        // 判断数据
        if($data){
            return 1;
        }else{
            return 0;
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
       //添加数据
        $data=$request->except(['terms','_token','repassword','code']);
        //对密码做加密
        $data['password']=Hash::make($data['password']);
        if(DB::table("home_user")->insert($data)){
            return redirect("/homelogin")->with('success','注册成功');
        }else{
            return redirect("/homeregister")->with('error','注册失败');
        }
    } 

       

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
       
    }
      // 验证码校验
    public function vcode(){
        ob_clean();//清除操作
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
        //把内容存入session
        session(['vcode'=>$phrase]);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        // 输出图片
        $builder->output();
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
