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
         <th style="width: 100px"><i class="require-red">*</i>管理员名称：</th> 
         <td> <h4>当前用户: <span style="color: red">{{$info->uname}}</span> 的角色信息</h4> </td> 
        </tr> 
        <tr> 
         <th>权限：</th> 
         <td><ul style="float: left;">
          <!-- 遍历 -->
          @foreach($role as $row)
          <!-- 已有权限选定 -->
          <li style="float: left;"><label><input type="checkbox" name="rids[]" value="{{$row->id}}" @if(in_array($row->id,$rids))checked @endif />{{$row->power}}</label></li>  
          @endforeach
         </ul> </td> 
        </tr> 
        <tr>
          <td></td>
          <td>
            <button class="btn btn-primary">全选</button>
            <button class="btn btn-success">全不选</button>
            <button class="btn btn-inverse">反选</button>
            </td>
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
  <script type="text/javascript">
    submit=false;
  //获取button按钮
  $("button").click(function(){
    //获取单击button按钮的文本值 $(this)代表的是事件作用的元素对象
    res=$(this).html();
    switch(res){
      case '全选':
        //获取复选框 设置为选中
        $("input[type='checkbox']").attr("checked",true);
      break;
      case '全不选':
        //获取复选框设置为不选中
        $("input[type='checkbox']").attr("checked",false);
      break;
      case '反选':
        //1.获取选中的复选框
        s=$("input:checked");
        //2.把其他没有选中的复选框设置为选中
        $("input[type='checkbox']").attr("checked",true);
        //3.取消第一次选中的复选框
        s.attr("checked",false);
      break;
    }
  });
  $("input[type='submit']").click(function(){
      submit=true;
  })
  //给form 绑定提交事件
  $("#myform").submit(function(){
      if(submit){
          //提交表单
          return true;
      }else{
          return false;
      }
  });
</script>
@endsection
