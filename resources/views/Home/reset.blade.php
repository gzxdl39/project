@extends('Home.common.base')
@section('title','修改密码') 
@section('content')    
<script type="text/javascript" src="/admin/js/libs/jquery-1.8.3.min.js"></script>
     <div class="center_content"> 
    <div class="left_content"> 
     <div class="title">
      <span class="title_icon"><img src="/public/static/Home/images/bullet1.gif" alt="" title="" /></span>修改密码
     </div> 
     <div class="feat_prod_box_details"> 
      <p class="details"> 描述 </p> 
      <div class="contact_form"> 
       <div class="form_subtitle">
        修改密码
       </div> 
       <form action="/doreset" method="post" id="myform" name="myform" enctype="multipart/form-data">
        <div class="form_row"> 
         <label class="contact"><strong>密码:</strong></label> 
         <input type="password" class="contact_input" name="password" /> <span></span>
        </div> 
        <div class="form_row"> 
         <label class="contact"><strong>重复密码:</strong></label> 
         <input type="password" class="contact_input" name="repassword"/> <span></span>
        </div>
        <div class="form_row"> 
            {{csrf_field()}} 
         <input type="submit" class="btn btn-primary" value="修改密码" /> 
        </div> 
       </form> 
      </div> 
     </div> 
     <div class="clear"></div> 
    </div>
    <script type="text/javascript">
        PASS=false;
        REPASS=false;
        //密码
       $("input[name='password']").blur(function(){
          //获取密码
          p=$(this).val();
          if(p.match(/\w{4,8}/)==null){
            $(this).next("span").css("color","red").html("密码必须为4-8位任意的数字字母下划线");
            $(this).addClass("cur");
            PASS=false;
          }else{
            $(this).next("span").css("color","green").html("密码可用");
            //清空样式
            $(this).removeClass("cur");
            //添加样式
            $(this).addClass("curs");
            PASS=true;
          }
       });
       //重复密码
       $("input[name='repassword']").blur(function(){
        //获取重复密码
        pp=$(this).val();
        //获取密码
        pps=$("input[name='password']").val();
        if(pp==pps){
          $(this).next("span").css("color","green").html("两次密码一致");
           //清空样式
            $(this).removeClass("cur");
            //添加样式
            $(this).addClass("curs");
            REPASS=true;
        }else{
          $(this).next("span").css("color","red").html("两次密码不一致");
          REPASS=false;
        }
       });
        //给form 绑定提交事件
        $("#myform").submit(function(){
        //在每个匹配的元素上触发某类事件
            $("input").trigger("blur");
            if(PASS && REPASS){
                //提交表单
                return true;
            }else{
                return false;
            }
       });
    </script> 
@endsection