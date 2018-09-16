<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
// 加载模板
class CityController extends Controller
{
	public function index(){
		//获取upid
		$upid=isset($_GET['upid'])?$_GET['upid']:'0';
		//获取数据库city表中upid的数据
		$city=DB::table("city")->where('upid','=',$upid)->get();
		//进行json编码
		echo json_encode($city);
	}

 
}
