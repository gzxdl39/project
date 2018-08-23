<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link href="/admin/css/admin_login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="admin_login_wrap">
    <h1>后台管理</h1>
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="/admin/dologin" method="post">
                <ul class="admin_items">
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text" name="uname" value="" id="user" size="30" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="upwd" value="" id="pwd" size="30" class="admin_input_style" />
                    </li>

                     <li>
                        <label for="pwd">验证码：</label>
                        <input style='float:left' type="text" name="code" value="" id="code" size="15" class="admin_input_style" />
                        <img style='margin-left:30px;width:100px;height:40px;float: left;' src="/admin/code" onclick="this.src='/admin/code?'+Math.random()" alt="">
                    </li>
                    <li>
                        <input type="submit" tabindex="3" value="提交" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
</html>