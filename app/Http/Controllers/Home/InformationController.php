<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class InformationController extends Controller
{
    public function index()
    {
    	return view("Home.information");

    }
    public function create(Request $request)
    {
    	//获取home_user表中所有的数据
     	$user=DB::table("home_user")->get();
        


        
    }
}
