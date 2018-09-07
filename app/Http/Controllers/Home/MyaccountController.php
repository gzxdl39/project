<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyaccountController extends Controller
{
    
    public function index(){
    	// 返回视图Home.myaccount我的账号
    	return view("Home.myaccount");
    }
    public function create(){

    }
}
