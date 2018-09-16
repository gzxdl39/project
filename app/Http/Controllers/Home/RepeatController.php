<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class RepeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $m=$_GET['mm'];
        $is=DB::table('home_lists')->where('url','=',$m)->first();
        if($is){
            return '1';
        }else{
            return '2';
        }

    }
    public function create(Request $request)
    {
        $m=$_GET['m'];
        $is=DB::table('home_lists')->where('title','=',$m)->first();
        if($is){
            return '1';
        }else{
            return '2';
        }

    }
   
}
