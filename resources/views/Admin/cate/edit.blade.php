@extends('Admin.common.default') 
@section('content') 
 <!--/sidebar-->
<div class="main-wrap"> 
   <div class="crumb-wrap"> 
    <div class="crumb-list">
     <i class="icon-font"></i>
     <a href="/jscss/admin/design/">首页</a>
     <span class="crumb-step">&gt;</span>
     <a class="crumb-name" href="#">分类修改</a>
     <span class="crumb-step"> </span>
    </div> 
    <div class="result-wrap"> 
     <div class="result-content"> 
      <form action="/cate/{{$cate->cid}}" method="post" id="myform" name="myform" enctype="multipart/form-data"> 
       <table class="insert-tab" width="100%"> 
        <tbody> 
         <tr> 
          <th><i class="require-red">*</i>分类名称：</th> 
          <td> <input class="common-text required" id="cname" name="cname" size="50" value="{{$cate->cname}}" type="text" /> </td> 
         </tr> 
         <tr> 
          <th></th> 
          {{csrf_field()}} 
          {{method_field("PUT")}}
          <td> <input class="btn btn-primary btn6 mr10" value="提交" type="submit" /> <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button" /> </td> 
         </tr> 
        </tbody>
       </table> 
      </form> 
     </div> 
    </div> 
   </div>
  </div>
    <!--/main-->
@endsection