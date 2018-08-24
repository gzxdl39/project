@extends('Admin.common.default') 
@section('content') 
  <div class="main-wrap"> 
   <div class="crumb-wrap"> 
    <div class="crumb-list">
     <i class="icon-font"></i>
     <a href="#">首页</a>
     <span class="crumb-step">&gt;</span> 
     <span>修改管理员</span>
    </div> 
   </div> 
   <div class="result-wrap"> 
    <div class="result-content"> 
     <!-- 这个action对应的路由地址一定是以根开始的，所以要加/ --> 
     <form action="/user/{{$user->uid}}" method="post" id="myform" name="myform" enctype="multipart/form-data"> 
      <table class="insert-tab" width="100%"> 
       <tbody>
        <tr> 
         <th width="120"><i class="require-red">*</i>权限：</th> 
         <td> 
            <select name="auth" id="auth" class="required"> 
                <option value="0">请选择</option> 
                <option value="1" @if($user->auth==1) selected @endif>超级管理员</option> 
                <option value="2" @if($user->auth==2) selected @endif>后台用户</option> 
                <option value="3" @if($user->auth==3) selected @endif>前台用户</option> 
            </select> 
            <span></span> 
        </td> 
        </tr> 
        <tr> 
         <th><i class="require-red">*</i>用户名：</th> 
         <td> <input class="common-text required" id="uname" name="uname" size="50" value="{{$user->uname}}" type="text" /><span></span> </td> 
        </tr> 
        <tr> 
         <th>密码：</th> 
         <td><input class="common-text" name="upwd" size="50" value="{{$user->upwd}}" type="password" /><span></span></td> 
        </tr> 
        <tr> 
         <th>确认密码：</th> 
         <td><input class="common-text" name="reupwd" size="50" value="{{$user->upwd}}" type="password" /><span></span></td> 
        </tr> 
        <tr> 
         <th>性别：</th> 
         <td> 
            <input class="sex" type="radio" name="sex" value="m" @if($user->sex=='m') checked @endif />男 
            <input class="sex" type="radio" name="sex" value="w" @if($user->sex=='w') checked @endif />女 
            <input class="sex" type="radio" name="sex" value="x" @if($user->sex=='x') checked @endif />保密 
            <span></span> 
        </td>   
        </tr> 
        <tr> 
         <th>电话：</th> 
         <td><input class="common-text" name="tel" size="50" value="{{$user->tel}}" type="text" /><span></span></td> 
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
            $(this).next("span").css("color","green").html("用户名格式正确");
            //清空样式
            $(this).removeClass("cur");
            //添加样式
            $(this).addClass("curs");
            PASS=true;
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
    </script> 
@endsection
