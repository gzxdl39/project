@extends('Admin.common.default') 
@section('content') 
  <div class="main-wrap"> 
   <div class="crumb-wrap"> 
    <div class="crumb-list">
     <i class="icon-font"></i>
     <a href="#">首页</a>
     <span class="crumb-step">&gt;</span>
     <span class="crumb-name">留言管理</span>
    </div> 
   </div> 
   <div class="search-wrap"> 
    <div class="search-content"> 
     <form action="/contacts" method="get"> 
      <table class="search-tab"> 
       <tbody>
        <tr> 
         <th width="70">用户名:</th> 
         <td><input class="common-text" placeholder="关键字" name="name" value="{{$request['keywords'] or ''}}" id="name" type="text" /></td> 
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
         <th>用户名</th> 
         <th>电话</th> 
         <th>留言内容</th>
         <th>留言时间</th>  
         <th>操作</th> 
        </tr>
        @foreach($user as $row)
        <tr> 
         <td>{{$row->id}}</td> 
         <td>{{$row->name}}</td>
         <td>{{$row->phone}}</td>
         <td>{{$row->content}}</td> 
         <td>{{$row->create_at}}</td> 
         <td> 
            <form action="/contacts/{{$row->id}}" method="post">  
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