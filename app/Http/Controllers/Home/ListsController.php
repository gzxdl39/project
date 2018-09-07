<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use hash;

class ListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Home.Lists.lists");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //友情链接
        // $list=DB::table("home_lists")->get();
        $list=DB::table("home_lists")->where('status','=',2)->get();
        // dd($list);
        return view("Home.Lists.lists",['list'=>$list]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //友情链接添加方法
        $data=$request->all();
        $data=$request->except('_token');
        $data['status']=1;

        //把添加的数据插入数据库
        $add=DB::table('home_lists')->insert($data);
        //判断 匹配成功就插入数据库  失败则返回页面
        if($add){
            return redirect("\lists")->with('success','提交成功');
        }else{
            return redirect("\lists")->with('error','提交失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //获取状态，根据状态显示界面
        // $status=DB::table("home_lists")->pluck('status');
         // $status=DB::table("home_lists")->get();
         // dd($status);
         
    
            // return view("Home.Lists.lists",['status'=>$status]);
    
        

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
