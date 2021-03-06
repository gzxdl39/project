<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取搜索关键词
        $k=$request->input('name');
        //获取列表数据
        $user=DB::table("home_user")->where("name",'like',"%".$k."%")->paginate(5);
        //加载模板
        return view('Admin.member.index',['user'=>$user,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
        $user=DB::table("home_user")->where("id",'=',$id)->first();
        //加载修改页面
        return view("Admin.member.edit",['user'=>$user]);
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
        $data=$request->except(['_token','_method','reupwd','field list']);
        //密码加密
        $data['password']=Hash::make($data['password']);
        // 判断是否修改成功
        if(DB::table("home_user")->where("id","=",$id)->update($data)){
            return redirect("/member")->with('success',"修改成功");
        }else{
            return redirect("/member/$id",'数据修改失败');
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
        if(DB::table("home_user")->where("id",'=',$id)->delete()){
            return redirect("/member")->with('success','数据删除成功');
        }else{
            return redirect("/member")->with('error','数据删除失败');
        }
    }
}
