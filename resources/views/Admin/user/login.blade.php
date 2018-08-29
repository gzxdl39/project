<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台登录</title>
    <link href="/admin/css/admin_login.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/admin/js/libs/jquery-1.8.3.min.js"></script>
</head>
<style type="text/css">
    .mws-form-message {
        font-size: 12px;
        cursor: pointer;
        border: 1px solid #d2d2d2;
        padding: 15px 8px 15px 45px;
        position: relative;
        vertical-align: middle;
        background-color: #f8f8f8;
        background-position: 12px 12px;
        background-repeat: no-repeat;
        margin-bottom: 12px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        display: block;
    }
    .error {
        background-color: #ffcbca;
        background-image: url(/admin/images/message-error.png); 
        border-color: #eb979b;
        color: #9b4449;
    }
</style>
<body>
<div class="admin_login_wrap">
    <h1>后台登录</h1>
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="/login/store" method="post" id="myform" name="myform" enctype="multipart/form-data">
                @if(session('error'))    
                <div class="mws-form-message error">
                        {{session('error')}}
                </div>
                @endif
                <ul class="admin_items">
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text" name="uname" value="{{old('uname')}}" id="user" size="30" class="admin_input_style" placeholder="请输入管理员名称" />
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="upwd" value="" id="pwd" size="30" class="admin_input_style" placeholder="请输入管理员密码" />
                    </li>

                    <!--  <li>
                        <label for="pwd">验证码：</label>
                        <input style='float:left' type="text" name="code" value="" id="code" size="15" class="admin_input_style" />
                        <img style='margin-left:30px;width:100px;height:40px;float: left;' src="/admin/code" onclick="this.src='/admin/code?'+Math.random()" alt="">
                    </li> -->
                    <li>
                        {{csrf_field()}}
                        <input type="submit" tabindex="3" value="提交" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    $(".mws-form-message").click(function(){
        $(this).css({"display":"none"});    
    });
</script>
</html>