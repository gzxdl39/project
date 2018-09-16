<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class DesktopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //获取购物车
        $carts=session('cart');
        $data=[];
        $row=[];
        // 遍历,合并购物车和收货地址
        foreach ($carts as $key => $value) {
            $data['oid']=$value['oid'];
            $data['goods_id']=$value['id'];
            $data['total']=$value['total'];
            $data['num']=$value['num'];
            $data['rec']=$request->input('rec');
            $data['tel']=$request->input('tel');
            $data['addr']=$request->input('addr');
            $data['status']=1;
            if($request->input('umsg')!=null){
                $data['umsg']=$request->input('umsg');
            }
            $data['name']=session('name');
            $row[]=$data;
        }
        // 写入订单表
        $r=DB::table('shop_orders')->insert($row);
        if($r){
            $request->session()->forget('cart');
            //订单成功修改销量和库存
            foreach ($row as $key => $value) {
                $v=DB::table('shop_goods')->where('gid','=',$value['goods_id'])->first();
                $c=$v->salecnt + $value['num'];
                $b=$v->stock - $value['num'];
                $m['salecnt']=$c;
                $m['stock']=$b;
                $n=DB::table('shop_goods')->where('gid','=',$value['goods_id'])->update($m);
            }
            return redirect('/pay');
        }else{
            return redirect('/orders');
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
