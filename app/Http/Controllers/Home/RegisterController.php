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
      return view('Home.Register.register');
    }

       //注册页面行为
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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        //获取输入的校验码
        $code=$request->input("code");
        // 把闪存的参数写入到
        $request->flash();
        //获取系统的校验码
        $vcode=session('vcode');
         // 判断校验码的值是否一致
        if($code!=$vcode){
            return back()->with('error','输入的校验码有误');
        }else{
            //封装需要注册的数据
            $data=$request->only(['phone','password','name','atime']);
            // 哈希值
            $data['password']=Hash::make($request->input('password'));
            // 数据库
            $id=DB::table("home_user")->insertGetId($data);
            //执行插入
            if($id){
            // 跳转
            return redirect("/homelogin")->with('success','成功');
            }
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
