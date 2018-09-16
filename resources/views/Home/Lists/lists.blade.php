@extends('Home.common.base')
@section('title','友情链接') 
@section('content')  
<script type="text/javascript" src="/admin/js/libs/jquery-1.8.3.min.js"></script>  
      <div class="center_content"> 
    <div class="left_content"> 

     <div class="">
        <h3 class="">申请友情链接</h3>
        <ul class="">
          <li class="">申请步骤：</li>
          <li>
              1.请先在贵网站做好Book Store的文字友情链接：
              <br> 链接文字：Book Store链接地址：
              <a href="//www.Book Store.com" target="_blank">www.Book Store.com</a>
          </li>
          <li>2.做好链接后，请在右侧填写申请信息。Book Store只接受申请文字友情链接。</li>
          <li>
              2.已经开通我站友情链接且内容健康，符合本站友情链接要求的网站，经Book Store管理员审核后，可以显示在此友情链接页面。
          </li>
          <li>
            
              4.请通过右侧提交申请，注明：友情链接申请。
          </li>
        </ul>
        <form method="post" action="/addlists" id="myform">
    
        <table cellpadding="0" cellspacing="0" width="309">
          <tbody><tr>
            <h1>申请信息</h1>
              <td><span id="span">
              @if(session('success'))
              {{session('success')}}
              @endif
              @if(session('error'))
              {{session('error')}}
              @endif</span></td>
          </tr>
           <tr>
            <td>
              申请人：
            </td>
            <td>
              <input name="name" reminder="请输入您的名字" type="text"><span></span>
            </td>
          </tr>
          <tr>
            <td>
              电话：
            </td>
            <td>
              <input name="tel" reminder="请输入您的联系电话" type="text"><span></span>
            </td>
          </tr>
          <tr>
            <td>
              网站名称：
            </td>
            <td>
              <input name="title" reminder="请输入网址名称" type="text"><span></span>
            </td>
          </tr>
          <tr>
            <td>
              网&nbsp;&nbsp;&nbsp;&nbsp;址：
            </td>
            <td>
              <input name="url" type="text" reminder="请输入url" value="https://"><span></span>
            </td>
          </tr>
          <tr>
            <td height="45" colspan="2" align="center">
              {{csrf_field()}}
              <input type="submit" value="提交申请" id="anniu">
            </td>
          </tr>
             
        </tbody></table>
        </form>
      </div>
  </div>
  <script type="text/javascript">
  TITLE=false;
   URL=false;
   NAME=false;
   TEL=false;
    //电话
       $("input[name='tel']").blur(function(){
          //获取电话
          p=$(this).val();
            if(p.match(/(?:^1[3456789]|^9[28])\d{9}$/)==null){
                $(this).next("span").css("color","red").html("请输入正确手机号码");
                $(this).addClass("cur");
                TEL=false;
            }else{
                $(this).next("span").css("color","green").html("手机号码正确");
                //清空样式
                $(this).removeClass("cur");
                //添加样式
                $(this).addClass("curs");
                TEL=true;
            }
       });
   //设置inputd的name里面的name只能使用使用中文。英文和数字也不能为空
   $("input[name='name']").blur(function(){
    //获取属性值
    n=$(this).val();
    //判断
    if(n.match(/^[\u4e00-\u9fa5_a-zA-Z0-9]+$/)==null){
           $(this).next('span').css('color','red').html('不能为空');
           NAME=false;
      
         }else{
            $(this).next('span').css('color','green').html('可以使用');
            NAME=true;
    }
    });
    //设置input,name的title 只能使用输入中文、英文和数字
    $("input[name='title']").blur(function(){
      //jquert里面不能使用$(this)
      o=$(this);
      m=$(this).val();
      if(m.match(/^[\u4e00-\u9fa5_a-zA-Z0-9]+$/)==null){
            $(this).next('span').css('color','red').html("不能为空");
            TITLE=false;
        
      }else{
        //检查网址名是否重复
       $.get('/repeat/{m}',{m:m},function(data){
         if(data==1){
             o.next('span').css('color','red').html("网址名已存在，不能使用");
              TITLE=false;
         }else{
              o.next('span').css('color','green').html("可以使用");
              TITLE=true;
         }
        }); 
    }
    });
    //设置input里面的url只能使用正确的url格式
    $("input[name='url']").blur(function(){
      mm=$(this).val();
      oo=$(this);
    if(mm.match(/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/)==null){
       oo.next('span').css('color','red').html('不能为空');
         URL=false;
    }else{
      $.get('/repeats/{mm}',{mm:mm},function(data){
      if(data==1){
         oo.next('span').css('color','red').html('网址已重复');
         URL=false;
      }else{
         oo.next('span').css('color','green').html('可以使用');
         URL=true;
      }
   });
}    
});
    //绑定事件
    a = $("#span").html();
    // 使用正则判断
    if(a.match(/\S/)==null){
      
    }else{
      alert(a);
    }
    //表单提交事件
    $('#myform').submit(function(){
      if(TITLE && URL && NAME && TEL){
        return true;
      }else{
        return false;
      }
    });
  </script>
@endsection