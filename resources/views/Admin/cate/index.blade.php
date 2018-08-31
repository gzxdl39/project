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
        <tr class="eb" onclick="q({{$v->cid}})"> 
         <td>{{$v->cid}}</td> 
         <td>{{$v->cname}}</td> 
         <td>{{$v->pid}}</td> 
         <td>{{$v->path}}</td> 
         <td> 
            <form action="/cate/{{$v->cid}}" method="post">
                <a class="btn btn-danger" href="/cate/{{$v->cid}}/edit">修改</a> 
                <a class="btn btn-danger" href="/class/{{$v->cid}}">添加子类</a>
                {{csrf_field()}}
                {{method_field("DELETE")}}
                <button class="btn btn-success del" onclick="return confirm('确定要删除吗？');" >删除</button>
             </form>
        </tr> 
        @foreach($v->sub as $b)
        <tr class="{{$b->pid}}" style="display: none" onclick="w({{$b->cid}})"> 
         <td>{{$b->cid}}</td> 
         <td>--|{{$b->cname}}</td> 
         <td>{{$b->pid}}</td> 
         <td>{{$b->path}}</td> 
         <td> 
            <form action="/cate/{{$b->cid}}" method="post">
                <a class="btn btn-danger" href="/cate/{{$b->cid}}/edit">修改</a> 
                <a class="btn btn-danger" href="/class/{{$b->cid}}">添加子类</a>
                {{csrf_field()}}
                {{method_field("DELETE")}}
                <button class="btn btn-success del" onclick="return confirm('确定要删除吗？');" >删除</button>
             </form>
        </tr> 
        @foreach($b->sub as $c)
        <tr class="{{$c->pid}}" style="display: none"> 
         <td>{{$c->cid}}</td> 
         <td>--|--|{{$c->cname}}</td> 
         <td>{{$c->pid}}</td> 
         <td>{{$c->path}}</td> 
         <td> 
            <form action="/cate/{{$c->cid}}" method="post">
                <a class="btn btn-danger" href="/cate/{{$c->cid}}/edit">修改</a> 
                {{csrf_field()}}
                {{method_field("DELETE")}}
                <button class="btn btn-success del" onclick="return confirm('确定要删除吗？');" >删除</button>
             </form>
        </tr> 
        @endforeach
        @endforeach
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
    function w(b){
        $("."+b).toggle(1000);
    }
  </script>
  @endsection
