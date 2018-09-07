<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 加载模板
class XiadanController extends Controller
{
	public function index(){
		   //跳转
    return view('Home.xiadan');
	}
 
}
