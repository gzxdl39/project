<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取列表数据
        $k=$request->input('cname');
        $user=DB::table("shop_cate")->select(DB::raw('*,concat(path,cid)as paths'))->orderBy('paths')->where('cname','like',"%".$k."%")->get();
         foreach($user as $key=>$value){
            //获取path
            $path=$value->path;
            // echo $path."<br>";
            //转换为数组
            $arr=explode(",",$path);
            //获取逗号个数
            $len=count($arr)-1;
            //加分隔符 str_repeat 重复字符串函数
            $user[$key]->cname=str_repeat("--|",$len).$value->cname;
        }
        //加载页面
        return view('Admin.cate.index',['user'=>$user,'request'=>$request->all()]);
    }

    //调整类别顺序 加分割符
    public static function getCates(){
        $cate=DB::table("shop_cate")->select(DB::raw('*,concat(path,",",cid)as paths'))->orderBy('paths')->get();
        //添加分隔符
        foreach($cate as $key=>$value){
            //获取path
            $path=$value->path;
            //转换为数组
            $arr=explode(",",$path);
            //获取逗号个数
            $len=count($arr)-1;
            //加分隔符 str_repeat 重复字符串函数
            $cate[$key]->cname=str_repeat("--|",$len).$value->cname;
        }
        return $cate;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //获取所有类别
        $cate=self::getCates(); 
        //加载添加模板
        return view("Admin.cate.insert",['cate'=>$cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //执行添加
        $data=$request->only(['cname','pid']);
        //获取pid
        $pid=$request->input("pid");
        if($pid==0){
            //添加的是顶级分类信息
            //拼接path
            $data['path']='0';
        }else{
            //添加的是子类信息
            //获取父类信息
            $info=DB::table("shop_cate")->where("cid","=",$pid)->first();
            //拼接path 父类path和父类id
            $data['path']=$info->path.$info->cid.",";
        }
        //执行添加
        if(DB::table("shop_cate")->insert($data)){
            return redirect("/cate")->with('success','添加成功');
        }else{
            return redirect("/cate/create")->with('error','添加失败');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //加载修改页面
        $cate=DB::table('shop_cate')->where('cid','=',$id)->first();
        return view("Admin.cate.edit",['cate'=>$cate]);
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
        if(DB::table("shop_cate")->where("cid","=",$id)->update($data)){
            return redirect("/cate")->with('success',"修改成功");
        }else{
            return redirect("/cate/$id",'数据修改失败');
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
        //判断是否有子类
        if(DB::table("shop_cate")->where('pid','=',$id)->first()){
            return redirect("/cate")->with('error','当前类有子类，不能删除');
        }
        //删除数据
        if(DB::table("shop_cate")->where("cid",'=',$id)->delete()){
            return redirect("/cate")->with('success','数据删除成功');
        }else{
            return redirect("/cate")->with('error','数据删除失败');
        }
    }
}
