<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use DB;
// 加载模板
class OrderController extends Controller
{
	public function index(){
		   //跳转
		 if(session('name')!=null){
		 	$order=DB::table('home_user')->where('name','=',session('name'))->first();
		 	$movie=movie();
		 	return view('Home.cart.order',['movie'=>$movie,'order'=>$order]);
		}else{
			return redirect('/homelogin/create')->with('error','请先登录再购买');

		}
		
    
	}

 
}
