@extends('Home.common.base')
@section('title','收货地址') 
@section('content')    
<script type="text/javascript" src="/admin/js/libs/jquery-1.8.3.min.js"></script>
     <div class="center_content"> 
    <div class="left_content"> 
     <div class="title">
      <span class="title_icon"><img src="/public/static/Home/images/bullet1.gif" alt="" title="" /></span>收货地址
     </div> 
     <div class="feat_prod_box_details"> 
      <p class="details"> 描述 </p> 
      <div class="contact_form"> 
       <div class="form_subtitle">
        收货地址
       </div> 
       <form action="/desktop" method="post" id="myform" name="myform" enctype="multipart/form-data">
        <div class="form_row"> 
         <label class="contact"><strong>收货人:</strong></label> 
         <input type="text" class="contact_input" name="rec" value="{{$order->name}}" /><span></span>
        </div> 
        <div class="form_row"> 
         <label class="contact"><strong>电话:</strong></label> 
         <input type="text" class="contact_input" name="tel" value="{{$order->phone}}" /><span></span>
        </div>
        <div class="form_row"> 
         <label class="contact"><strong>留言:</strong></label> 
         <input type="text" class="contact_input" name="umsg" value="" /><span></span>
        </div>
        <div class="form_row"> 
         <label class="contact"><strong>收货地址:</strong></label> 
         <input type="text" class="contact_input" name="addr" value="{{$order->addr}}" /><span></span>
        </div> 
        <div class="form_row"> 
            {{csrf_field()}} 
         <input type="submit" class="btn btn-primary" value="确认付款" /> 
        </div> 
       </form> 
      </div> 
     </div> 
     <div class="clear"></div> 
    </div>
    <script type="text/javascript">
        NAME=false;
        TEL=false;
        ADDR=false;
       //收货人
       $("input[name='rec']").blur(function(){
        //获取收货人
        m=$(this).val();
        //正则匹配
        if(m.match(/^[\u4e00-\u9fa5_a-zA-Z0-9]+$/)==null){
          $(this).next("span").css("color","red").html("请不要输入特殊符号");
          $(this).addClass("cur");
          NAME=false;
        }else{
          NAME=true;
        }
       });
        //电话
       $("input[name='tel']").blur(function(){
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
        //给form 绑定提交事件
        $("#myform").submit(function(){
        //在每个匹配的元素上触发某类事件
            $("input").trigger("blur");
            if(NAME && TEL && ADDR){
                //提交表单
                return true;
            }else{
                return false;
            }
       });
    </script> 
@endsection