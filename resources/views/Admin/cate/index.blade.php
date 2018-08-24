@extends('Admin.common.default') 
@section('content') 
  <!--/sidebar--> 
  <div class="main-wrap"> 
   <div class="crumb-wrap"> 
    <div class="crumb-list">
     <i class="icon-font"></i>
     <a href="index.html">首页</a>
     <span class="crumb-step">&gt;</span>
     <span class="crumb-name">分类列表</span>
    </div> 
   </div> 
   <div class="result-wrap"> 
    <form name="myform" id="myform" method="post"> 
     <div class="result-title"> 
     </div> 
     <div class="result-content"> 
        <form action="/cate" method="get"> 
      <table class="search-tab"> 
       <tbody>
        <tr> 
         <th width="70">用户名:</th> 
         <td><input class="common-text" placeholder="关键字" name="cname" value="{{$request['keywords'] or ''}}" id="cname" type="text" /></td> 
         <td><input class="btn btn-primary btn2" value="查询" type="submit" /></td> 
        </tr> 
       </tbody>
      </table> 
     </form> 
      <table class="result-tab" width="100%"> 
       <tbody>
        <tr> 
         <th>ID</th> 
         <th>分类名称</th> 
         <th>分类父ID</th> 
         <th>分类的路径</th> 
         <th>操作</th> 
        </tr> 
        @foreach($user as $v)
        @if($v->pid == 0)
        <tr class="eb" onclick="q({{$v->cid}})"> 
         <td>{{$v->cid}}</td> 
         <td>{{$v->cname}}</td> 
         <td>{{$v->pid}}</td> 
         <td>{{$v->path}}</td> 
         <td> 
            <form action="/cate/{{$v->cid}}" method="post">
                <a class="btn btn-danger" href="/cate/{{$v->cid}}/edit">修改</a> 
                {{csrf_field()}}
                {{method_field("DELETE")}}
                <button class="btn btn-success del" onclick="return confirm('确定要删除吗？');" >删除</button>
             </form>
        </tr> 
        @endif
        @if($v->pid != 0)
        <tr class="{{$v->pid}}" style="display: none"> 
         <td>{{$v->cid}}</td> 
         <td>{{$v->cname}}</td> 
         <td>{{$v->pid}}</td> 
         <td>{{$v->path}}</td> 
         <td> 
            <form action="/cate/{{$v->cid}}" method="post">
                <a class="btn btn-danger" href="/cate/{{$v->cid}}/edit">修改</a> 
                {{csrf_field()}}
                {{method_field("DELETE")}}
                <button class="btn btn-success del" onclick="return confirm('确定要删除吗？');" >删除</button>
             </form>
        </tr> 
        @endif
        @endforeach
      </table> 
      <div class="list-page"> 
      </div> 
     </div> 
    </form> 
   </div> 
  </div> 
  <script type="text/javascript">
    function q(v){
        $("."+v).toggle(1000);
    }
  </script>
  @endsection
