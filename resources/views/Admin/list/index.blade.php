@extends('Admin.common.default') 
@section('content') 
 <div class="main-wrap"> 
   <div class="crumb-wrap"> 
    <div class="crumb-list">
     <i class="icon-font"></i>
     <a href="#">首页</a>
     <span class="crumb-step">&gt;</span>
     <span class="crumb-name">友情管理</span>
    </div> 
   </div> 
   <div class="search-wrap"> 
   <form action="/listss" method="get"> 
   </div> 
   <div class="result-wrap"> 
    <form name="myfor" id="myform" method="post"> 
     <div class="result-title"> 
      <div class="result-list"> 

      </div> 
     </div> 
     <div class="result-content"> 
      <table class="result-tab" width="100%"> 
       <tbody>
        <tr> 
         <th>ID</th> 
         <th>申请人</th>
         <th>网址名</th> 
         <th>网址</th> 
         <th>状态</th>
         <th>申请时间</th>
         <th>操作</th> 
        </tr> 
        @foreach($listss as $row)
        <tr> 
         <td>{{$row->id}}</td> 
         <td>{{$row->name}}</td>
         <td>{{$row->title}}</td> 
         <td>{{$row->url}}</td> 
         <td>
           @if($row->status == 1)
           审核
           @endif
           @if($row->status == 2)
           通过
           @endif
         </td>
         <td>{{$row->atime}}</td>
         <td> 
         <form></form>
           <form action="/listss/{{$row->id}}" method="post" > 
                {{csrf_field()}}
                {{method_field('PUT')}}
              <button class="btn btn-success PUT" >同意</button>
             </form>
          <form action="/listss/{{$row->id}}" method="post" > 
                {{csrf_field()}}
                {{method_field('DELETE')}}
              <button class="btn btn-danger del" onclick="return confirm('确定要删除吗？');" >删除</button>
             </form>
          </td> 
        </tr> 
        @endforeach
       </tbody> 
      </table> 
      <div class="list-page">
      </div> 
     </div> 
    </form> 
   </div> 
  </div>
@endsection