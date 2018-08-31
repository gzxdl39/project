<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //查询管理员
        $info=DB::table('shop_users')->where('uid','=',$id)->first();
        //查询权限表
        $role=DB::table('node')->select()->get();
        //查询权限分配表
        $data=DB::table('point')->where('rid','=',$id)->get();
        //判断是否有其他权限已分配
        if(count($data)){
            foreach($data as $v){
                $rids[]=$v->nid;
            }
            return view("Admin.user.rolelist",['info'=>$info,'role'=>$role,'rids'=>$rids]);
        }else{
            return view("Admin.user.rolelist",['info'=>$info,'role'=>$role,'rids'=>array()]);
        }
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //保存角色权限
    public function create(Request $request)
    {
        if($request->input('rids')==null){
            //获取用户id
            $rid=$request->input('rid');
            //把用户已有角色信息删除
            $info=DB::table("point")->where("rid",'=',$rid)->delete();
        }else{
            //获取新权限id
            $role=$_POST['rids'];
            //获取用户id
            $rid=$request->input('rid');
            //把用户已有角色信息删除
            DB::table("point")->where("rid",'=',$rid)->delete();
            //遍历
            foreach($role as $v){
                //封装需要插入user_role 数据表数据
                $data['rid']=$rid;//用户id
                $data['nid']=$v;
                $info=DB::table("point")->insert($data);
            } 
        }
        if($info){
            return redirect("/user")->with("success","权限分配成功");
        }else{
            return redirect("/role/$rid")->with("error","权限分配失败");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $info=DB::table("shop_cate")->where('pid','=',0)->get();
        $cate=[];
        //遍历
        foreach($info as $key=>$value){
            $value->sub=self::getcatesbypid($value->cid);
            $cate[]=$value;
        }
        dd($cate);
        //加载前台首页模板
        // return view("Home.Index.index",['cate'=>$cate]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
