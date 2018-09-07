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
  <!-- bootstrap css -->
  <!-- 登录样式 -->
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
<body>
  <div class="row-fluid" id="header"> 
    <div class="span8 offset2">       
      <h1 class="font">bootstrap免费模板</h1>
      <p class="lead">Bootstrap，来自 Twitter，是目前很受欢迎的前端框架。</p>        
    </div>      
  </div>
  <div class="row-fluid" id="login">
    <div class="span8 offset2">   
      <form class="form-horizontal" action="/homelogin" method="post">
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
        <h3>登陆</h3>
        <div class="control-group">
          <label class="control-label" for="inputName">用户名</label>
          <div class="controls">
           <input type="text" name="name" id="inputName" placeholder="Name"value="{{old('name')}}">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="Password">密码</label>
          <div class="controls">
            <input type="password" name="password" id="Password" placeholder="Password" value="{{old('password')}}">
          </div>
        </div> 
        <div class="control-group">
          <div class="controls">
            <label class="checkbox">&nbsp;</label>
             {{csrf_field()}}
            <button type="submit" class="btn btn-large btn-primary form-submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;登陆&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button> 
          </div>
        </div>
        <div class="otherLink">
          <a href="/forget" target="_self" class="newUserReg" style="margin">忘记密码</a>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;
          <a href="/homeregister" target="_self" class="newUserReg" style="margin">新用户注册</a>
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
</html>