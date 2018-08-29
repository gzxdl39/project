@extends('Admin.common.default') 
@section('content') 
<div class="main-wrap"> 
   <div class="crumb-wrap"> 
    <div class="crumb-list">
     <i class="icon-font"></i>
     <a href="#">首页</a>
     &gt;</span>
     <span>分配权限</span>
    </div> 
   </div> 
   <div class="result-wrap"> 
    <div class="result-content"> 
     <!-- 这个action对应的路由地址一定是以根开始的，所以要加/ --> 
     <form action="/role/create" method="post" id="myform" name="myform" enctype="multipart/form-data"> 
      <table class="insert-tab" width="100%"> 
       <tbody>
        <tr> 
         <th><i class="require-red">*</i>管理员名称：</th> 
         <td> <h4>当前用户: <span style="color: red">{{$info->uname}}</span> 的角色信息</h4> </td> 
        </tr> 
        <tr> 
         <th>权限：</th> 
         <td><ul style="float: left;" class="mws-form-list inline">
          <!-- 遍历 -->
          @foreach($role as $row)
          <!-- 已有权限选定 -->
          <li><input type="checkbox" name="rids[]" value="{{$row->id}}" @if(in_array($row->id,$rids))checked @endif />{{$row->power}}<label></label></li>
          @endforeach
         </ul> </td> 
        </tr> 
        <tr> 
         <th></th> 
         <td> 
          {{csrf_field()}} 
          <input type="hidden" name="rid" value="{{$info->uid}}">
          <input class="btn btn-primary btn6 mr10" value="提交" type="submit" /> 
          <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button" /> </td> 
        </tr> 
       </tbody>
      </table> 
     </form> 
    </div> 
   </div> 
  </div> 
@endsection
