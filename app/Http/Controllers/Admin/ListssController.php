<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ListssController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取数据表所有数据
        $listss=DB::table("home_lists")->get();
        //跳转到友情链接列表
		return view('Admin.list.index',['listss'=>$listss,'request'=>$request->all()]);
    }
        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        // 获取需要修改的home_lists表id数据
        $lists=DB::table("home_lists")->where('id','=',$id)->update(['status'=>2]);
        if($lists){
            return redirect("/listss")->with('success',"同意链接成功");
        }else{
           return redirect("/listss")->with('error',"链接失败"); 
        }
        
        
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
      $res=DB::table("home_lists")->where('id','=',$id)->delete();
        if($res){
                return redirect("/listss")->with('success','删除成功');
        }else{
            return redirect("/listss")->with('error','删除失败');
        }
    }
    

}
