<?php
namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 导入数据库
use DB;
class PersonalController extends Controller
{
   
   public function index(Request $request){
    //获取name
    $name=session('name');
    // 获取数据
    $data=DB::table('home_user')->where('name','=',$name)->first();
     //视图
   	return view('Home.personal',['data'=>$data]);
   }

   public function update(Request $request,$id)
   {
    //添加数据
    $data=$request->except(['code','_token']);
    $date=DB::table('home_user')->where('id','=',$id)->update($data);
    return redirect("/personal");
   }
}
