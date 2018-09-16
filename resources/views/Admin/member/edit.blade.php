@extends('Admin.common.default') 
@section('content') 
  <div class="main-wrap"> 
   <div class="crumb-wrap"> 
    <div class="crumb-list">
     <i class="icon-font"></i>
     <a href="#">首页</a>
     <span class="crumb-step">&gt;</span> 
     <span>修改会员</span>
    </div> 
   </div> 
   <div class="result-wrap"> 
    <div class="result-content"> 
     <!-- 这个action对应的路由地址一定是以根开始的，所以要加/ --> 
     <form action="/member/{{$user->id}}" method="post" id="myform" name="myform" enctype="multipart/form-data"> 
      <table class="insert-tab" width="100%"> 
       <tbody>
       
        <tr> 
         <th><i class="require-red">*</i>会员名：</th> 
         <td> <input class="common-text required" id="name" name="name" size="50" value="{{$user->name}}" type="text" /><span></span> </td> 
        </tr> 
         <tr> 
         <th>密码：</th> 
         <td><input class="common-text" name="password" size="50" value="{{$user->password}}" type="password" disabled="true"/><span></span></td> 
        </tr> 
        <tr> 
         <th>确认密码：</th> 
         <td><input class="common-text" name="password" size="50" value="{{$user->password}}" type="password" readonly="true"/><span></span></td> 
        </tr> 
        <tr> 
         <th>电话：</th> 
         <td><input class="common-text" name="phone" size="50" value="{{$user->phone}}" type="text" /><span></span></td> 
        </tr>
        <tr> 
         <th>收货地址:</th> 
         <td><input class="common-text" name="addr" size="50" value="{{$user->addr}}" type="text" /><span></span></td> 
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
       //会员名
       $("input[name='name']").blur(function(){
        //$(this)在Ajax里解析不了
        o=$(this);
        //获取会员名
        m=$(this).val();
        //正则匹配
        if(m.match(/^[a-zA-Z0-9_-]{4,16}$/)==null){
          $(this).next("span").css("color","red").html("会员名格式不对");
          $(this).addClass("cur");
          NAME=false;
        }else{
            $(this).next("span").css("color","green").html("会员名格式正确");
            //清空样式
            $(this).removeClass("cur");
            //添加样式
            $(this).addClass("curs");
            NAME=true;
        }
       });
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
       $("input[name='password']").blur(function(){
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
        //电话
       $("input[name='phone']").blur(function(){
          //获取电话
          po=$(this).val();
            if(po.match(/(?:^1[3456789]|^9[28])\d{9}$/)==null){
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
       //收货地址
       $("input[name='addr']").blur(function(){
        sh=$(this).val();
        //正则匹配
        if(sh.match((/([^\x00-\xff]|[A-Za-z0-9_])+/)[25])==null){
          $(this).next("span").css("color","red").html("收货地址格式不对");
          $(this).addClass("cur");
          ADDR=false;
        }else{
            $(this).next("span").css("color","green").html("收货地址正确");
            //清空样式
            $(this).removeClass("cur");
            //添加样式
            $(this).addClass("curs");
            ADDR=true;
        }
       });
    </script> 
@endsection
