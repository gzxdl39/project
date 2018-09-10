@extends('Home.common.base')
@section('title','密码找回') 
@section('content')    
<script type="text/javascript" src="/admin/js/libs/jquery-1.8.3.min.js"></script>
     <div class="center_content"> 
    <div class="left_content"> 
     <div class="title">
      <span class="title_icon"><img src="/public/static/Home/images/bullet1.gif" alt="" title="" /></span>密码找回
     </div> 
     <div class="feat_prod_box_details"> 
      <p class="details"> 描述 </p> 
      <div class="contact_form"> 
       <div class="form_subtitle">
        密码找回
       </div> 
       <form action="/doforget" method="post" id="myform" name="myform" enctype="multipart/form-data">
        @if(session('error'))    
                <div class="mws-form-message error">
                        {{session('error')}}
                </div>
                @endif
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
            {{csrf_field()}} 
         <input type="submit" class="btn btn-primary" value="密码找回" /> 
        </div> 
       </form> 
      </div> 
     </div> 
     <div class="clear"></div> 
    </div>
    <script type="text/javascript">
        flag=false;
        TEL=false;
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
                o.next("span").css("color","green").html("电话号码可用");
                //清空样式
                o.removeClass("cur");
                //添加样式
                o.addClass("curs");
                TEL=true;
            }
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
            if(TEL && flag){
                //提交表单
                return true;
            }else{
                return false;
            }
       });
    </script> 
@endsection