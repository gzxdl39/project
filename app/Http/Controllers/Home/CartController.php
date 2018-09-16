<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session('name')!=null){
           //获取session数组数据id
            $res=session('cart');
            $data=[];
            $total=0;
            if(session('cart')!=null){
               //遍历.
                $oid=date('YmdHis').mt_rand(100,999);
                session(['pay'=>$oid]);
                $a=0;
                foreach($res as $key=>$value){
                      //获取商品数据
                    $ss=DB::table("shop_goods")->where("gid",'=',$value['id'])->first();
                    $row['name']=$ss->gname;//名字
                    $row['pic']=$ss->gpic;//图片
                    $row['price']=$ss->price;//单价
                    $row['id']=$value['id'];//获取商品id
                    $row['num']=$value['num'];
                    $row['total']=$ss->price*$value['num'];//总计  
                    $row['oid']=$oid; 
                    $total += $row['total'];
                    $data[]=$row; 
                    session(['cart'=>$data]);   
                } 
               session(['total'=>$total]);
            }
            // dd($data);
            //获取头部数据
            // $cate=UserController::getCatesBypid(0);
            $movie=movie();
            return view("Home.cart.cart",['data'=>$data,'total'=>$total,'movie'=>$movie]); 
        }else{
            return redirect('/homelogin/create')->with('error','请先登录,再进行购物');
        }
        
    }
       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //商品减
    public function updatee($id)
    {
       
        //session数据
        $data=session('cart');
        //遍历
        foreach ($data as $key =>$value) {
            if($value['id']==$id){
                $s=$value['num']-1;
                $data[$key]['num']=$s;
                //判断不能小于一
                if($data[$key]['num']<1){
                    $data[$key]['num']=1;
                }
            }
        }
        //重新赋值给session
        session(['cart'=>$data]);
        //跳转到购物车页面
        return redirect("/cart");
    }

    //商品加
    //获取session数据
    public function updates($id){
       
        $data=session('cart');
        // dd($data);
        foreach ($data as $key => $value) {
            if($value['id']==$id){
                $a=$value['num']+1;
                $data[$key]['num']=$a;
                //获取商品数量
                $info=DB::table("shop_goods")->where("gid",'=',$id)->first();
               if ($data[$key]['num']>$info->stock){
                 $data[$key]['num']=$info->stock;
               }  
            }
        }
        // dd($data);
        //重新给session赋值
        session(['cart'=>$data]);
        //跳转到购物车
        return redirect("/cart");
    }
    //商品删除
    public function del($id){
        //获取session里面的数据
        $data=session('cart');
        foreach ($data as $key => $value) {
            if($value['id']==$id){
                unset($data[$key]);
            }
        }
        //重新赋值
        session(['cart'=>$data]);
        return redirect("/cart");
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
    public function checkExists($id){
        //获取session
        $goods=session('cart');
        if(empty($goods)) return false;
        //遍历
        foreach ($goods as $key=>$value){
            if($value['id']==$id){
                return true;
            }
        }
    }
    public function store(Request $request)
    {
        //除了_token外
         $data=$request->except('_token'); 
         // 去重操作
        if(!$this->checkExists($data['id'])){
            // 把商品数据写入到数组里
            $request->session()->push('cart',$data);
        }
        return redirect("/cart");
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
