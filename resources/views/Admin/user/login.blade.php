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
                        <input type="text" name="uname" value="{{old('uname')}}" id="user" size="35" class="admin_input_style" placeholder="请输入管理员名称" /><span></span>
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="upwd" value="" id="pwd" size="35" class="admin_input_style" placeholder="请输入管理员密码" /><span></span>
                    </li>
                     <li>
                        <label for="pwd">验证码：</label>
                        <img style='float: left;' src="/login/create" onclick="this.src=this.src+'?a=1'" alt="">
                        <input style='float:right;' type="text" name="code" value="" id="code" size="20" class="admin_input_style" /><span></span>
                    </li>
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
    CODE=false;
    USER=false;
    PWD=false;
    //提示框隐藏
    $(".mws-form-message").click(function(){
        $(this).css({"display":"none"});    
    });
    //用户名正则校验
    $("#user").blur(function(){
        t=$(this).val();
        if(t.match(/^[a-zA-Z0-9_-]{4,16}$/)==null){
            $(this).next("span").css("color","red").html("用户名必须为4-16位任意的数字字母下划线");
            $(this).addClass("cur");
            USER=false;
        }else{
            $(this).next("span").css("color","green").html("");
            //清空样式
            $(this).removeClass("cur");
            //添加样式
            $(this).addClass("curs");
            USER=true;
        }
    });
    //密码正则校验
    $("#pwd").blur(function(){
        t=$(this).val();
        if(t.match(/^[a-zA-Z0-9_-]{4,16}$/)==null){
            $(this).next("span").css("color","red").html("密码必须为4-16位任意的数字字母下划线");
            $(this).addClass("cur");
            PWD=false;
        }else{
            $(this).next("span").css("color","green").html("");
            //清空样式
            $(this).removeClass("cur");
            //添加样式
            $(this).addClass("curs");
            PWD=true;
        }
    });
    //验证码校验
    $("#code").blur(function(){
        o=$(this);
        m=$(this).val();
        if(m.match(/\w{4,5}/)==null){
            o.next("span").css("color","red").html("验证码格式错误");
            CODE=false;
        }else{
            $.get('/login/store',{m:m},function(data){
                if(data==1){
                    o.next("span").css("color","green").html("");
                    CODE=true;
                }else{
                    o.next("span").css("color","red").html("验证码错误");
                    CODE=false;
                }
            }); 
        }
    });
    //给form 绑定提交事件
    $("#myform").submit(function(){
    //在每个匹配的元素上触发某类事件
        $("input").trigger("blur");
        if(CODE && USER && PWD){
            //提交表单
            return true;
        }else{
            return false;
        }
    });
</script>
</html>