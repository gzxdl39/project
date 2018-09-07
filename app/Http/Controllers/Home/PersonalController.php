<?php
namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 导入数据库
use DB;
class PersonalController extends Controller
{
   
   public function index(Request $request){
     //视图
   	return view('Home.personal');
   }
   // 加载模板数据
   public function create(Request $request){
   	//获取upid
	$upid=$_GET['upid'];
	// 封装数据
	$data=$request->only(['name','level','upid']);
	// 获取数据
	$data=DB::table('home_csjl')->where('upid','=',$upid)->get();
	//返回数据
    return $data;
   }
}
