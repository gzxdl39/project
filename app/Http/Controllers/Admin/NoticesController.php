<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class NoticesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取搜索关键词
        $k=$request->input('title');
        //获取列表数据
        $user=DB::table("home_notices")->where("title",'like',"%".$k."%")->paginate(5);
        //加载模板
        return view('Admin.notice.index',['user'=>$user,'request'=>$request->all()]);
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         //加载添加页面
        return view('Admin.notice.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //添加数据
        $data=$request->except(['terms','_token','code']);
         if(DB::table("home_notices")->insert($data)){
            return redirect("/notices")->with('success','添加公告成功');
        }else{
            return redirect("/notices/create")->with('error','添加公告失败');
        }
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
          //获取需要修改的数据
        $user=DB::table("home_notices")->where("nid",'=',$id)->first();
        // dd($user);exit;
        //加载修改页面
        return view("Admin.notice.edit",['user'=>$user]);
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
        //修改数据
        $data=$request->except(['_token','_method','field list']);
        // 判断是否修改成功
        if(DB::table("home_notices")->where("nid","=",$id)->update($data)){
            return redirect("/notices")->with('success',"修改成功");
        }else{
            return redirect("/notices/$id",'数据修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除数据
        if(DB::table("home_notices")->where("nid",'=',$id)->delete()){
            return redirect("/notices")->with('success','数据删除成功');
        }else{
            return redirect("/notices")->with('error','数据删除失败');
        }
    }
}
