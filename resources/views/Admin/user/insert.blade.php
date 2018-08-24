@extends('Admin.common.default') 
@section('content') 
  <div class="main-wrap"> 
   <div class="crumb-wrap"> 
    <div class="crumb-list">
     <i class="icon-font"></i>
     <a href="#">首页</a>
     &gt;</span>
     <span>添加管理员</span>
    </div> 
   </div> 
   <div class="result-wrap"> 
    <div class="result-content"> 
     <!-- 这个action对应的路由地址一定是以根开始的，所以要加/ --> 
     <form action="/user" method="post" id="myform" name="myform" enctype="multipart/form-data"> 
      <table class="insert-tab" width="100%"> 
       <tbody>
        <tr> 
         <th width="120"><i class="require-red">*</i>权限：</th> 
         <td> <select name="auth" id="auth" class="required"> <option value="0" selected="">请选择</option> <option value="1">超级管理员</option> <option value="2">后台用户</option> <option value="3">前台用户</option> </select> <span></span> </td> 
        </tr> 
        <tr> 
         <th><i class="require-red">*</i>用户名：</th> 
         <td> <input class="common-text required" id="uname" name="uname" size="50" value="" type="text" /><span></span> </td> 
        </tr> 
        <tr> 
         <th>密码：</th> 
         <td><input class="common-text" name="upwd" size="50" value="" type="password" /><span></span></td> 
        </tr> 
        <tr> 
         <th>确认密码：</th> 
         <td><input class="common-text" name="reupwd" size="50" value="" type="password" /><span></span></td> 
        </tr> 
        <tr> 
         <th>性别：</th> 
         <td> <input class="sex" type="radio" name="sex" value="m" />男 <input class="sexs" type="radio" name="sex" value="w" />女 <input class="sexss" type="radio" name="sex" value="x" />保密 <span></span> </td> 
        </tr> 
        <tr> 
         <th>电话：</th> 
         <td><input class="common-text" name="tel" size="50" value="" type="text" /><span></span></td> 
        </tr> 
        <tr> 
         <th></th> 
         <td> 
          {{csrf_field()}} 
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
        AUTH=false;
        UNAME=false;
        PASS=false;
        REPASS=false;
        TEL=false;
        SEX=false;
        //权限
        $("#auth").change(function(){
            q=$(this).val();
            if(q==0){
                $(this).next("span").css("color","red").html("请选择权限");
                $(this).addClass("cur");
                AUTH=false;
              }else{
                AUTH=true;
              }
        });
        //性别
        $("input[type='radio']").change(function(){
            if($(this).attr('checked')){
                SEX=true;
            }else{
                $(this).next("span").css("color","red").html("请选择性别");
                $(this).addClass("cur");
            }
        })
       //用户名
       $("input[name='uname']").blur(function(){
        //$(this)在Ajax里解析不了
        o=$(this);
        //获取用户名
        m=$(this).val();
        //正则匹配
        if(m.match(/^[a-zA-Z0-9_-]{4,16}$/)==null){
          $(this).next("span").css("color","red").html("用户名格式不对");
          $(this).addClass("cur");
          UNAME=false;
        }else{
          //Ajax检测用户名是否已经注册
          $.get("/ajax/{m}",{m:m},function(data){
            if(data==1){
             o.next("span").css("color","red").html("用户名已经注册");
             UNAME=false;
            }else{
            o.next("span").css("color","green").html("用户名可用");
            //清空样式
            o.removeClass("cur");
            //添加样式
            o.addClass("curs");
            UNAME=true;
            }
          });
        }
       });
        //密码
       $("input[name='upwd']").blur(function(){
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
       $("input[name='reupwd']").blur(function(){
        //获取重复密码
        pp=$(this).val();
        //获取密码
        pps=$("input[name='upwd']").val();
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
        //电话
       $("input[name='tel']").blur(function(){
          //获取电话
          p=$(this).val();
            if(p.match(/(?:^1[3456789]|^9[28])\d{9}$/)==null){
                $(this).next("span").css("color","red").html("请输入正确手机号码");
                $(this).addClass("cur");
                TEL=false;
            }else{
                $(this).next("span").css("color","green").html("手机号码正确");
                //清空样式
                $(this).removeClass("cur");
                //添加样式
                $(this).addClass("curs");
                TEL=true;
            }
       });
       //给form 绑定提交事件
        $("#myform").submit(function(){
        //在每个匹配的元素上触发某类事件
            $("input").trigger("blur");
            $("#auth").trigger("change");
            $("input[type='radio']").trigger("change");
            if(UNAME && PASS && REPASS && TEL && AUTH && SEX){
                //提交表单
                return true;
            }else{
                return false;
            }
       });
    </script> 
@endsection
