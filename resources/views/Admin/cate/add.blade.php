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
     <form action="/top/up" method="post" id="myform" name="myform" enctype="multipart/form-data"> 
      <table class="insert-tab" width="100%"> 
       <tbody>
        <tr> 
         <th><i class="require-red">*</i>一级分类名称：</th> 
         <td> <input class="common-text required" id="cname" name="cname" size="50" value="" type="text" /><span></span> </td> 
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
  <script type="text/javascript">
    $("#cname").blur(function(){
      o=$(this);
      m=$(this).val();
      if(m.match(/^[\u4e00-\u9fa5_a-zA-Z0-9]+$/)==null){
        $(this).next("span").css("color","red").html("请输入分类名称");
        $(this).addClass("cur");
        NAME=false;
      }else{
        // Ajax检测用户名是否已经注册
        $.get("/ajax/edit/{m}",{m:m},function(data){
          if(data==1){
            o.next("span").css("color","red").html("分类名称已经存在");
             NAME=false;
            }else{
            o.next("span").css("color","green").html("分类名称可用");
            //清空样式
            o.removeClass("cur");
            //添加样式
            o.addClass("curs");
            NAME=true;
          }
        });
      }
    });;
    $("#myform").submit(function(){
            //在每个匹配的元素上触发某类事件
            $("#cname").trigger("blur");
            if(NAME){
                //提交表单
                return true;
            }else{
                return false;
            }
       });
  </script> 
  <!--/main--> 
@endsection
