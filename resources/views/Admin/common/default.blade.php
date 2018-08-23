<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/admin/css/main.css"/>
    <!-- <link rel="stylesheet" type="text/css" href="/admin/bootstrap/css/bootstrap.min.css" media="screen"> -->
    <!-- <link rel="stylesheet" type="text/css" href="/admin/css/bootstrap.min.css"/> -->
    <script type="text/javascript" src="/admin/js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src="/admin/js/libs/jquery-1.8.3.min.js"></script>
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
        .success {
            background-color: #e1f1c0;
            background-image: url(/admin/images/message-success.png);
            border-color: #b5d56d;
            color: #62a426;
        }
        .error {
            background-color: #ffcbca;
            background-image: url(/admin/images/message-error.png); 
            border-color: #eb979b;
            color: #9b4449;
        }
    </style>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.html">首页</a></li>
                <li><a href="http://www.mycodes.net/" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#">欢迎：{:session('adminUser.uname')}</a></li>
                <li><a href="/admin/logout">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>用户模块</a>
                    <ul class="sub-menu">
                        <li><a href="/user/create"><i class="icon-font">&#xe008;</i>添加用户</a></li>
                        <li><a href="/user/index"><i class="icon-font">&#xe005;</i>用户列表</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>分类模块</a>
                    <ul class="sub-menu">
                        <li><a href="/cate/create"><i class="icon-font">&#xe008;</i>添加分类</a></li>
                        <li><a href="/cate/index"><i class="icon-font">&#xe005;</i>分类列表</a></li>
                      
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>商品模块</a>
                    <ul class="sub-menu">
                        <li><a href="/good/create"><i class="icon-font">&#xe008;</i>添加商品</a></li>
                        <li><a href="/good/index"><i class="icon-font">&#xe005;</i>商品列表</a></li>
                      
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>订单模块</a>
                    <ul class="sub-menu">
                        <li><a href="/order/index"><i class="icon-font">&#xe005;</i>订单列表</a></li>
                      
                    </ul>
                </li>
            </ul>
        </div>
    </div>
             @if(session('success'))
                <div class="mws-form-message success"">
                    {{session('success')}}
                </div>
            @endif
            @if(session('error'))    
                <div class="mws-form-message warning">
                        {{session('error')}}
                </div>
            @endif
    <script type="text/javascript">
        $(".mws-form-message").click(function(){
            $(this).css({"display":"none"});
        });
    </script>
    <!--/sidebar 需要重写的部分，不是公共的部分 ，需要覆盖的部分-->
    @yield('content')
</div>
</body>
</html>