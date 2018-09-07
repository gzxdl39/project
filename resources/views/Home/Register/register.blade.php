<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <!--注册样式 -->
  <link rel="stylesheet" href="/static/bs/css/bootstrap.min.css">
  <script src="/static/bs/js/jquery.min.js"></script>
  <script src="/static/bs/js/bootstrap.min.js"></script>
  <script src="/static/bs/js/holder.min.js"></script>
  <script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script>

  <!-- 注册样式 -->
  <link rel="stylesheet" href="/static/login/css/bootstrap.min.css" media="screen"/> 
  <link rel="stylesheet" href="/static/login/css/style.css"/>  
  <!-- <link rel="stylesheet" type="text/css" href="/static/login/"> -->
  <!--响应式特性 css-->  
  <link href="/static/login/css/bootstrap-responsive.min.css" rel="stylesheet">
  <!-- jquery -->
  <script type="text/javascript" src="/static/login/js/jquery-1.8.3.min.js"></script>
  <!-- bootstrap.js -->
  <script type="text/javascript" src="/static/login/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
  .cur{
    border:1px solid blue;
   }
  .curs{
    border:1px solid red;
   }
    center{
        margin-top:250px;
      }
     
</style>
<body>
  <div class="row-fluid" id="header"> 
    <div class="span8 offset2">       
      <h1 class="font">bootstrap免费模板</h1>
      <p class="lead">Bootstrap，来自 Twitter，是目前很受欢迎的前端框架。</p>        
    </div>      
  </div>
  <div class="row-fluid" id="login">
    <div class="span8 offset2">   
      <form class="form-horizontal" action="/register/s" id="bb" method="post">
      @if(session('error'))
      <div class="mws-form-message warning btn btn-danger">
      {{session('error')}}
      </div>
      @endif
        <!-- 显示错误信息 -->
        <div class="alert alert-error" style="display:none">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4></h4>
        </div>
        <h3 style="color: red">注册</h3>
        <div class="control-group">
          <label class="control-label" for="inputName">用户名:</label>
          <div class="controls">
           <input type="text" id="inputName" placeholder="用户名"value="{{old('name')}}" name="name" class="cur" reminder="请输入正确的用户名"><span ></span> 
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="Password">密码:</label>
          <div class="controls">
            <input type="text"  id="Password" placeholder="密码" value="{{old('pass')}}" class="cur" name="pass" reminder="请输入正确的密码"><span></span>
          </div>
        </div> 
         <div class="control-group">
          <label class="control-label" for="Password">重复密码:</label>
          <div class="controls">
            <input type="text"  id="Password" placeholder="密码" value="{{old('repass')}}" class="curs" name="repass" reminder="确认密码"><span></span>
          </div>
        </div>
         <div class="control-group">
<!--        <label></label> -->           
          <div class="controls">
      验证码:<input type="text" name="code" value="" />
            <img src="/vcode" onclick="this.src=this.src+'?a=1'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </div> 
        </div>
         <!-- <div class="control-group">
          <label class="control-label" for="Password">输入校验码:</label>
          
        </div> -->
        <div class="control-group">
          <div class="controls">
            <label class="checkbox">&nbsp;</label>
             {{csrf_field()}}
            <button type="submit" class="btn btn-large btn-primary form-submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;注册&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button> 
          </div>
        </div>
    
      </form>
    </div>
</div>
  <div class="row-fluid" id="footer"> 
    <div class="span8 offset2">       
      <p>©2006 - 2013</p>       
    </div>      
  </div>
</body>
<script type="text/javascript">
   //获取焦点事件
  $("input").focus(function(){
    reminder=$(this).attr("reminder");
  $(this).next("span").css("color","red").html(reminder);
    //添加样式
  $(this).addClass("cur");
    //移除样式
  $(this).removeClass("curs");
   });
   //用户名用正则失去焦点
  $("input[name='name']").blur(function(){
          //获取密码
      p=$(this).val();
         // 用正则判断检测是否null
      if(p.match(/^[a-zA-Z0-9_-]{4,16}$/)==null){
        $(this).next("span").css("color","red").html("用户名必须为4-8位任意的数字字母下划线");
        // 否则
      }else{
        $(this).next("span").css("color","green").html("用户可用");
        //清空样式
        $(this).removeClass("cur");
        //添加样式
        $(this).addClass("curs");
      }
   });
   //电话失去焦点
   $("input[name='phone']").blur(function(){
    //赋值
    o=$(this);
    //获取phone
    p=$(this).val();
    //正则匹配电话
    if(p.match(/^((13[0-9])|(15[^4,\D])|(18[0-9]))\d{8}$/)==null){
      $(this).next("span").css("color","red").html("电话格式不对");
    }else{
      //利用Ajax检测电话是否已经注册
      $.get("/homeregisters",{p:p},function(data){
        // 判断数据
        if(data==1){
         o.next("span").css("color","red").html("电话已经注册");
         return false;
        }else{
        o.next("span").css("color","green").html("电话可用");
        //清空样式
        o.removeClass("cur");
        //添加样式
        o.addClass("curs");
        flag=true;
  }
      });    
    }
   });
    //密码
   $("input[name='pass']").blur(function(){
          //获取密码
      p=$(this).val();
         // 用正则判断检测是否null
      if(p.match(/\w{10,16}/)==null){
        $(this).next("span").css("color","red").html("密码必须为10-16位任意的数字字母下划线");
        // 否则
      }else{
        $(this).next("span").css("color","green").html("密码可用");
        //清空样式
        $(this).removeClass("cur");
        //添加样式
        $(this).addClass("curs");
      }
   });
     //重复密码
   $("input[name='repass']").blur(function(){
    //获取重复密码
    pp=$(this).val();
    //获取密码
    pps=$("input[name='pass']").val();
    // 判断密码和重置密码是否一致
    if(pp==pps){
      $(this).next("span").css("color","green").html("两次密码一致");
       //清空样式
        $(this).removeClass("cur");
        //添加样式
        $(this).addClass("curs");
        flag=true;
    }else{
      $(this).next("span").css("color","green").html("两次密码不一致");
        flag=false;
    }
   });
   //给注册绑定提交事件
   $("#bb").submit(function(){
    return flag;
   });
 </script>
</html>