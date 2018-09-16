<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getCatesbypid($pid){
        $s=DB::table("shop_cate")->where('pid','=',$pid)->get();
        $data=[];
        //遍历
        foreach($s as $key=>$value){
            $value->sub=self::getCatesbypid($value->cid);
            $data[]=$value;
        }
        return $data;
    }

    public function index(Request $request)
    {
        //获取搜索关键词
        $k=$request->input('gname');
        $v=Redis::get('user_key');
        if($v!=null){
            $user=json_decode($v);
        }else{
            $user=self::getCatesbypid(0);
            $r=json_encode($user);
            Redis::set('user_key',$r);
        }
        //获取前2条数据
        $data=DB::table("shop_goods")->where("gname",'like',"%".$k."%")->paginate(2);
        $movie=movie();
        //首页方法
        return view("Home.index",['user'=>$user,'data'=>$data,'movie'=>$movie,'request'=>$request->all()]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($gid)
    {
        $crea=self::getCatesBypid(0);
        //获取商品某一级下的列表数据
         $shoper=DB::select("select * from shop_goods as sg,shop_cate as sc where sg.cate_id=sc.cid and sc.cid=".$gid);
         $movie=movie();
        //加载模板 分配数据
        return view("Home.specials",['shoper'=>$shoper,'crea'=>$crea,'movie'=>$movie]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取商品列表 
        $v=Redis::get('list_key');
        $shop=DB::table('shop_goods')->select()->paginate(6);
        $movie=movie();
        return view("Home.special",['shop'=>$shop,'movie'=>$movie,'request'=>$request->all()]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //详情页
    public function show($gid)
    {
        //获取商品数据
        $descr=DB::table("shop_goods")->where("gid",'=',$gid)->first();
        //获取商品在同一级下的
        $cate=DB::table("shop_goods")->where("cate_id","=",$descr->cate_id)->get();
        $movie=movie();
        //加载模板 分配数据
        return view("Home.details",['descr'=>$descr,'cate'=>$cate,'movie'=>$movie]);
       
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
