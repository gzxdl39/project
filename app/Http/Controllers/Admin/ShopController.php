<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Config;


class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //调整类别顺序 加分割符
    public static function getCates(){
        $cate=DB::table("shop_cate")->select(DB::raw('*,concat(path,cid)as paths'))->orderBy('paths')->get();
        //添加分隔符
        foreach($cate as $key=>$value){
            //获取path
            $path=$value->path;
            //转换为数组
            $arr=explode(",",$path);
            //获取逗号个数
            $len=count($arr)-1;
            //加分隔符 str_repeat 重复字符串函数
            // $cate[$key]->cname=str_repeat("--|",$len).$value->cname;
        }
        return $cate;
    }

    public function index(Request $request)
    {
        //获取搜索框的值 多条件查询
        $k=$request->input('cname');
        $l=$request->input('sgname');
        //连表查询
        $shop=DB::table('shop_goods')->join('shop_cate','shop_goods.cate_id','=','shop_cate.cid')->select(DB::raw('shop_cate.cname,shop_goods.gid as sgid,shop_goods.gname as sgname,shop_goods.price,shop_goods.stock,shop_goods.salecnt,shop_goods.status,shop_goods.gpic'))->where('gname','like',"%".$l."%")->where('cname','like',"%".$k."%")->paginate(10);
        //获取所有类别
        $cate=self::getCates();
        //加载模板
        return view("Admin.good.index",['shop'=>$shop,'cate'=>$cate,'k'=>$k,'l'=>$l,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        //加载添加模板
        $cate=self::getCates();
        return view("Admin.good.insert",['cate'=>$cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except('_token');
        //随机上传图片名字
        $name=time()+rand(1,10000);
        //获取后缀
        $ext=$request->file('gpic')->getClientOriginalExtension();
        //移动
        $request->file('gpic')->move(Config::get('app.app_upload'),$name.'.'.$ext);
        //封装data
        $data['gpic']=trim(Config::get('app.app_upload')."/".$name.".".$ext,".");
        //执行添加
        if(DB::table("shop_goods")->insert($data)){
            return redirect("/shop")->with("success","添加商品成功");
        }else{
            return redirect("/shop/create")->with("error","添加商品失败");
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
        //查询需要修改的数据
        $shop=DB::table('shop_goods')->where("gid",'=',$id)->first();
        //加载视图并分配数据
        return view("Admin.good.edit",['shop'=>$shop]);
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
        //去除不需要的数据
        $data=$request->except(['_token','_method']);
        //随机上传图片名字
        $name=time()+rand(1,10000);
        //获取后缀
        $ext=$request->file('gpic')->getClientOriginalExtension();
        //移动
        $request->file('gpic')->move(Config::get('app.app_upload'),$name.'.'.$ext);
        //封装data
        $data['gpic']=trim(Config::get('app.app_upload')."/".$name.".".$ext,".");
        //执行修改
        if(DB::table("shop_goods")->where("gid","=",$id)->update($data)){
            return redirect("/shop")->with('success',"商品修改成功");
        }else{
            return redirect("/shop/$id",'商品修改失败');
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
        if(DB::table("shop_goods")->where("gid",'=',$id)->delete()){
            return redirect("/shop")->with('success','商品删除成功');
        }else{
            return redirect("/shop")->with('error','商品删除失败');
        }
    }
}
