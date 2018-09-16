<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //ajax查询用户名是否重复
        $info=DB::table("shop_users")->where("uname",'=',$_GET['m'])->first();
        if($info){
            return '1';
        }else{
            return '2';
        }
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function name(Request $request)
    {
        //ajax查询商品名称是否重复
        $info=DB::table("shop_goods")->where("gname","=",$_GET['m'])->first();
        if($info){
            return '1';
        }else{
            return '2';
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
        //ajax查询shop_cate
        $info=DB::table("shop_cate")->where("cid","=",$_GET['m'])->first();
        // 判断pid值
        if($info->pid==0){
            return '1';
        }else{
            return '2';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$status=2)
    {
        //商品上架
        $info=DB::table("shop_goods")->where("gid","=",$id)->update(['status'=>$status]);
        if($info){
            return redirect("/shop")->with('success','商品上架成功');
        }else{
            return redirect("/shop")->with('error','商品上架失败');
        }

    }

    public function down($id,$status=3)
    {
        //商品下架
        $info=DB::table("shop_goods")->where("gid","=",$id)->update(['status'=>$status]);
        if($info){
            return redirect("/shop")->with('success','商品下架成功');
        }else{
            return redirect("/shop")->with('error','商品下架失败');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function shop(Request $request)
    {
        //ajax查询商品名称是否重复
        $info=DB::table("shop_cate")->where("cname","=",$_GET['m'])->first();
        if($info){
            return '1';
        }else{
            return '2';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //加载添加页面
        return view("Admin.cate.add");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //获取cname并添加pid和path
        $data=array_add(['cname'=>$request->input('cname')],'pid',0);
        $data['path']='0,';
        //执行添加
        if(DB::table("shop_cate")->insert($data)){
            return redirect("/cate")->with('success','添加成功');
        }else{
            return redirect("/top")->with('error','添加失败');
        }

    }
}
