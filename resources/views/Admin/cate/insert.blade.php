@extends('Admin.common.default') 
@section('content') 
  <!--/sidebar--> 
  <div class="main-wrap"> 
   <div class="crumb-wrap"> 
    <div class="crumb-list">
     <i class="icon-font"></i>
     <a href="#">首页</a>
     <span class="crumb-step">&gt;</span>
     <span>分类添加</span>
    </div> 
   </div> 
   <div class="result-wrap"> 
    <div class="result-content"> 
     <form action="/cate" method="post" id="myform" name="myform" enctype="multipart/form-data"> 
      <table class="insert-tab" width="100%"> 
       <tbody>
        <tr> 
         <th width="120"><i class="require-red">*</i>父级分类：</th> 
         <td> 
            <select name="pid" id="pid" class="required"> 
                <option value="0">请选择</option> 
                @foreach($cate as $row) 
                <option value="{{$row->cid}}"> 
                @if($row->pid == 0) {{$row->cname}} 
                 @endif 
                </option> 
                @endforeach 
            </select> 
        </td> 
        </tr> 
        <tr> 
         <th><i class="require-red">*</i>分类名称：</th> 
         <td> <input class="common-text required" id="cname" name="cname" size="50" value="" type="text" /> </td> 
        </tr> 
        <tr> 
         <th></th> 
         {{csrf_field()}} 
         <td> <input class="btn btn-primary btn6 mr10" value="提交" type="submit" /> <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button" /> </td> 
        </tr> 
       </tbody>
      </table> 
     </form> 
    </div> 
   </div> 
  </div> 
  <!--/main--> 
@endsection
