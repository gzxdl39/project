@extends('Home.common.base')
@section('title','我的账户') 
@section('content')  

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
    .error {
        background-color: #ffcbca;
        background-image: url(/admin/images/message-error.png); 
        border-color: #eb979b;
        color: #9b4449;
    }
</style>  
      <div class="center_content"> 
    <div class="left_content"> 
     <div class="title">
      <span class="title_icon"><img src="/static/images/bullet1.gif" alt="" title="" /></span>我的账户
     </div> 
     <div class="feat_prod_box_details"> 
      <p class="details">描述</p> 
      <div class="contact_form"> 
       <div class="form_subtitle">
        登录到您的账户
       </div> 
       <form action="/homelogin" method="post" id="myform" name="myform" enctype="multipart/form-data">
        @if(session('error'))    
                <div class="mws-form-message error">
                        {{session('error')}}
                </div>
                @endif
        <div class="form_row"> 
         <label class="contact"><strong>用户名:</strong></label> 
         <input type="text" class="contact_input" name="name" value="{{old('name')}}" /> <span></span>
        </div> 
        <div class="form_row"> 
         <label class="contact"><strong>密码:</strong></label> 
         <input type="password" class="contact_input" name="password" /> <span></span>
        </div>
        <div class="form_row"> 
          <label class="contact"><strong>验证码:</strong></label> 
         <input type="text" class="contact_input" name="code" id="code" /> <span></span>
        </div>
        <img style='float: left;margin-top: 20px' src="/login/create" onclick="this.src=this.src+'?a=1'" alt="">
        <div class="form_row"> 
         <!-- <div class="terms"> 
          <input type="checkbox" name="terms" /> 记住密码 
         </div>  -->
        </div> 
        <div class="form_row"> 
          {{csrf_field()}}
         <input type="submit" class=" btn btn-success" value="login" /> 
         <span><a href="/forget" class=" btn btn-danger">忘记密码</a></span>
         <span><a href="/homeregister" class=" btn btn-primary">立即注册</a></span>
        </div>  
       </form> 
      </div> 
     </div> 
     <div class="clear"></div> 
    </div>
   <script type="text/javascript">
    CODE=false;
    USER=false;
    PWD=false;
    //用户名正则校验
    $("input[name='name']").blur(function(){
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
    $("input[name='password']").blur(function(){
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
@endsection