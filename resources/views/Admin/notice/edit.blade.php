@extends('Admin.common.default') 
@section('content') 
  <div class="main-wrap"> 
   <div class="crumb-wrap"> 
    <div class="crumb-list">
     <i class="icon-font"></i>
     <a href="#">首页</a>
     <span class="crumb-step">&gt;</span> 
     <span>修改公告</span>
    </div> 
   </div> 
   <div class="result-wrap"> 
    <div class="result-content"> 
     <!-- 这个action对应的路由地址一定是以根开始的，所以要加/ --> 
     <form action="/notices/{{$user->nid}}" method="post" id="myform" name="myform" enctype="multipart/form-data"> 
      <table class="insert-tab" width="100%"> 
       <tbody>
       
        <tr> 
         <th>公告名称：</th> 
         <td> <input class="common-text required" id="title" name="title" size="50" value="{{$user->title}}" type="text" /><span></span> </td> 
        </tr>  
        <tr> 
         <th>公告内容:</th> 
         <td><textarea  cols="50px" rows="10px" id="content" name="content" value="" type="text">{{$user->content}}</textarea><span></span></td> 
        </tr>  
        <tr> 
         <th></th> 
         <td> 
          {{csrf_field()}}
          {{method_field("PUT")}}
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
      TITLE=false;
      CONTENT=false; 
        //公告标题
       $("input[name='title']").blur(function(){
        //获取公告标题名称
        m=$(this).val();
        //正则匹配
        if(m.match(/^[\u4e00-\u9fa5_a-zA-Z0-9]+$/)==null){
          $(this).next("span").css("color","red").html("请输入正确的公告名称");
          $(this).addClass("cur");
          TITLE=false;
        }else{
          TITLE=true;
        }
       });
      //公告内容
       $("textarea[name='content']").blur(function(){
          //获取公告内容
          p=$(this).val();
          if(p.match(/([^\x00-\xff]|[A-Za-z0-9_])+/)==null){
            $(this).next("span").css("color","red").html("请输入正确公告内容");
            $(this).addClass("cur");
            CONTENT=false;
          }else{
            $(this).next("span").css("color","green").html("公告内容可用");
            //清空样式
            $(this).removeClass("cur");
            //添加样式
            $(this).addClass("curs");
            CONTENT=true;
            }
        });
       //给form 绑定提交事件
        $("#myform").submit(function(){
        //在每个匹配的元素上触发某类事件
            $("input").trigger("blur");
             $("textarea").trigger("blur");
            if(TITLE && CONTENT){
                //提交表单
                return true;
            }else{
                return false;
            }
       });
    </script> 
@endsection
