@extends('Home.common.base')
@section('title','注册') 
@section('content')    
<script type="text/javascript" src="/admin/js/libs/jquery-1.8.3.min.js"></script>
     <div class="center_content"> 
    <div class="left_content"> 
     <div class="title">
      <span class="title_icon"><img src="/public/static/Home/images/bullet1.gif" alt="" title="" /></span>注册
     </div> 
     <div class="feat_prod_box_details"> 
      <p class="details"> 描述 </p> 
      <div class="contact_form"> 
       <div class="form_subtitle">
        创建新账号
       </div> 
       <form action="/homeregister/create" method="post" id="myform" name="myform" enctype="multipart/form-data">
        <div class="form_row"> 
         <label class="contact"><strong>用户名:</strong></label> 
         <input type="text" class="contact_input" name="name" /> <span></span>
        </div> 
        <div class="form_row"> 
         <label class="contact"><strong>密码:</strong></label> 
         <input type="password" class="contact_input" name="password" /> <span></span>
        </div> 
        <div class="form_row"> 
         <label class="contact"><strong>重复密码:</strong></label> 
         <input type="password" class="contact_input" name="repassword"/> <span></span>
        </div>
        <div class="form_row"> 
         <label class="contact"><strong>收货地址:</strong></label> 
         <input type="text" class="contact_input" name="addr" /> <span></span>
        </div> 
        <div class="form_row"> 
         <label class="contact"><strong>电话:</strong></label> 
         <input type="text" class="contact_input" name="phone" /> <span></span><div><span id="ss">
                {{csrf_field()}}
                <a href="javascript:void(0)"  class="btn btn-success" id="bb">单击发送</a>
        </span></div>     
        </div style="margin-top: 20px;"> 
        <div class="form_row"> 
         <label class="contact"><strong>验证码:</strong></label> 
         <input type="text" class="contact_input" name="code" /> <span></span>
        </div>
        <div class="form_row"> 
         <div class="terms"> 
          <input type="checkbox" name="terms" checked /> 我同意
          <a href="#">条款 &amp; 条件</a> 
         </div> 
        </div> 
        <div class="form_row"> 
            {{csrf_field()}} 
         <input type="submit" class="btn btn-primary" value="注册" /> 
        </div> 
       </form> 
      </div> 
     </div> 
     <div class="clear"></div> 
    </div>
    <script type="text/javascript">
        NAME=false;
        PASS=false;
        REPASS=false;
        TEL=false;
        ADDR=false;
        flag=false;
       //用户名
       $("input[name='name']").blur(function(){
        //$(this)在Ajax里解析不了
        o=$(this);
        //获取用户名
        m=$(this).val();
        //正则匹配
        if(m.match(/^[a-zA-Z0-9_-]{4,16}$/)==null){
          $(this).next("span").css("color","red").html("用户名必须为4-16位任意的数字字母下划线");
          $(this).addClass("cur");
          NAME=false;
        }else{
          //Ajax检测用户名是否已经注册
          $.get("/homeregister/names/{m}",{m:m},function(data){
            if(data==1){
             o.next("span").css("color","red").html("用户名已经注册");
             NAME=false;
            }else{
            o.next("span").css("color","green").html("用户名可用");
            //清空样式
            o.removeClass("cur");
            //添加样式
            o.addClass("curs");
            NAME=true;
            }
          });
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
       $("input[name='repassword']").blur(function(){
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
          o=$(this);
          //获取电话
          p=$(this).val();
            if(p.match(/(?:^1[3456789]|^9[28])\d{9}$/)==null){
                $(this).next("span").css("color","red").html("请输入正确手机号码");
                $(this).addClass("cur");
                TEL=false;
            }else{
                //Ajax检测用户名是否已经注册
              $.get("/homeregister/register/{p}",{p:p},function(data){
                if(data==1){
                 o.next("span").css("color","red").html("电话号码已经存在");
                 TEL=false;
                }else{
                o.next("span").css("color","green").html("电话号码可用");
                //清空样式
                o.removeClass("cur");
                //添加样式
                o.addClass("curs");
                TEL=true;
            }
       });
        //地址
       $("input[name='addr']").blur(function(){
          //获取地址
          p=$(this).val();
            if(p.match(/^[\u4e00-\u9fa5_a-zA-Z0-9]+$/)==null){
                $(this).next("span").css("color","red").html("请输入正确收货地址");
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
       // 获取按钮 绑定单击事件
                $("#bb").click(function(){
                    o=$(this);
                    p=$("input[name='phone']").val();
                    //Ajax
                    $.get("/sms/create/{p}",{p:p},function(data){
                        // alert(data.code);
                        // alert(data);
                        //判断状态值是否为000000
                        if(data.code==000000){
                            //按钮倒倒计时
                            m=60;
                            //定时器
                            mytime=setInterval(function(){
                                m--;
                                //赋值给按钮
                                o.html(m+"秒后重新发送");
                                //按钮禁用
                                o.attr('disabled',true);
                                //判断
                                if(m==0){
                                    //清除定时器
                                    clearInterval(mytime);
                                    //重新给按钮赋值
                                    o.html("重新发送");
                                    //激活按钮
                                    o.attr("disabled",false);
                                }
                            },1000);
                        }
                    },'json');
                });
                }
              });
        //输入校验码
        $("input[name='code']").blur(function(){
            oo=$(this);
            //获取输入的校验码
            code=$(this).val();
            if(code.match(/\w{4}/)==null){
                oo.next("span").css("color","red").html("校验码有误");
                flag=false;
            }else{
              //Ajax
              $.get("/sms/store/{code}",{code:code},function(data){
                  // alert(data);
                  if(data==1){
                      oo.next("span").css("color","green").html("校验码正确");
                      flag=true;
                  }else if(data==2){
                      oo.next("span").css("color","red").html("校验码有误");
                      flag=false;
                  }
              });
            }
        });
        //给form 绑定提交事件
        $("#myform").submit(function(){
        //在每个匹配的元素上触发某类事件
            $("input").trigger("blur");
            if(NAME && PASS && REPASS && TEL && ADDR && flag){
                //提交表单
                return true;
            }else{
                return false;
            }
       });
    </script> 
@endsection