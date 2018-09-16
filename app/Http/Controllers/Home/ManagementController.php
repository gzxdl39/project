<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 加载订单管理模板
    public function index(Request $request)
    {  
        $name=session('name');   
         //获取关联的订单数据,订单表关联商品表和用户表,需要获取哪个表字段在select里添加表字段即可
        $data=DB::table('shop_orders')
            ->join('shop_goods', 'shop_orders.goods_id', '=', 'shop_goods.gid')
            ->join('home_user', 'shop_orders.name', '=', 'home_user.name')
            ->where('shop_orders.name','=',$name)
            ->select('shop_orders.*', 'shop_goods.gid', 'home_user.name','shop_orders.oid','shop_goods.gpic')
            ->get();
           // dd($data);exit;
            $movie=movie();
        return view('Home.order.management',['data'=>$data,'movie'=>$movie]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($oid,$status=3){
        //确认收货
        $info=DB::table("shop_orders")->where("oid","=",$oid)->update(['status'=>$status]);
        //判断操作
        if($info){
            return redirect("/management")->with('success','确认收货成功');
        }else{
            return redirect("/management")->with('error','确认收货失败');
        }
      
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
