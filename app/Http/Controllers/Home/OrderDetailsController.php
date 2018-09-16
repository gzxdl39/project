<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class OrderDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 加载订单管理模板
    public function index(Request $request)
    {     
         //获取关联的订单数据
        $data=DB::table('shop_orders')
            ->join('shop_goods', 'shop_orders.goods_id', '=', 'shop_goods.gid')
            ->join('home_user', 'shop_orders.name', '=', 'home_user.name')
            ->select('shop_orders.*', 'shop_goods.gid', 'home_user.name','shop_goods.gname','shop_goods.price','shop_goods.gpic','shop_orders.oid')
            ->first();
            $movie=movie();
           // dd($data);exit;
        return view('Home.order.orderdetails',['data'=>$data,'movie'=>$movie]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

      
    } 

       

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
       
    }
      
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
    public function update(Request $request)
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
