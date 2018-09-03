<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取搜索关键词
        $k=$request->input('rec');
        $l=$request->input('status');
        // 获取列表数据
        $order=DB::table('shop_orders')->where('rec','like',"%".$k."%")->where('status','like',"%".$l."%")->paginate(8);
        //加载模板
        return view('Admin.order.index',['order'=>$order,'request'=>$request->all(),'k'=>$k,'l'=>$l]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$status=2)
    {
        //订单发货
        $info=DB::table("shop_orders")->where("oid","=",$id)->update(['status'=>$status]);
        if($info){
            return redirect("/order")->with('success','订单发货成功');
        }else{
            return redirect("/order")->with('error','订单发货失败');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //获取数据
        $edit=DB::table('shop_orders')->where('oid','=',$id)->first();
        //加载模板
        return view('Admin.order.insert',['edit'=>$edit]);
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
        //去除修改不需要字段
        $data=$request->except(['_token','_method']);
        //执行修改
        if(DB::table("shop_orders")->where("oid","=",$id)->update($data)){
            return redirect("/order")->with('success',"修改成功");
        }else{
            return redirect("/order/$id",'数据修改失败');
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
        if(DB::table("shop_orders")->where("oid",'=',$id)->delete()){
            return redirect("/order")->with('success','订单删除成功');
        }else{
            return redirect("/order")->with('error','订单删除失败');
        }
    }
}
