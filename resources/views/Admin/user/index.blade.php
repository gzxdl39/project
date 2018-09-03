@extends('Admin.common.default') 
@section('content') 
  <div class="main-wrap"> 
   <div class="crumb-wrap"> 
    <div class="crumb-list">
     <i class="icon-font"></i>
     <a href="#">首页</a>
     <span class="crumb-step">&gt;</span>
     <span class="crumb-name">用户管理</span>
    </div> 
   </div> 
   <div class="search-wrap"> 
    <div class="search-content"> 
     <form action="/user" method="get"> 
      <table class="search-tab"> 
       <tbody>
        <tr> 
         <th>管理员名称:</th> 
         <td><input class="common-text" placeholder="关键字" name="uname" value="{{$k}}{{$request['keywords'] or ''}}" id="uname" type="text" /></td> 
         <td><input class="btn btn-primary btn2" value="查询" type="submit" /></td> 
        </tr> 
       </tbody>
      </table> 
     </form> 
    </div> 
   </div> 
   <div class="result-wrap"> 
    <form name="myform" id="myform" method="post"> 
     <div class="result-title"> 
      <div class="result-list"> 

      </div> 
     </div> 
     <div class="result-content"> 
      <table class="result-tab" width="100%"> 
       <tbody>
        <tr> 
         <th>ID</th> 
         <th>管路员名称</th> 
         <th>类别</th> 
         <th>性别</th> 
         <th>电话</th> 
         <th>创建时间</th> 
         <th>操作</th> 
        </tr>
        @foreach($user as $row)
        <tr> 
         <td>{{$row->uid}}</td> 
         <td>{{$row->uname}}</td> 
         <td>
             @if($row->auth == '1')
             超级管理员
             @elseif($row->auth == '2')
             后台用户
             @elseif($row->auth == '3')
             前台用户
             @endif
         </td> 
         <td>
             @if($row->sex == 'w')
             女
             @elseif($row->sex == 'm')
             男
             @elseif($row->sex == 'x')
             保密
             @endif
         </td> 
         <td>{{$row->tel}}</td> 
         <td>{{$row->create_at}}</td> 
         <td> 
            <form action="/user/{{$row->uid}}" method="post">
                <a class="btn btn-primary" href="/role/{{$row->uid}}">权限</a> 
                <a class="btn btn-danger" href="/user/{{$row->uid}}/edit">修改</a> 
                {{csrf_field()}}
                {{method_field("DELETE")}}
                <button class="btn btn-success del" onclick="return confirm('确定要删除吗？');" >删除</button>
             </form>
        </td> 
        </tr> 
         @endforeach
       </tbody> 
      </table> 
      <div class="list-page">
       {{$user->appends($request)->render()}}
      </div> 
     </div> 
    </form> 
   </div> 
  </div>
@endsection