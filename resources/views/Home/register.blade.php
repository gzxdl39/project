@extends('Home.common.base')
@section('title','注册') 
@section('content')    
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
       <form name="register" action="#"> 
        <div class="form_row"> 
         <label class="contact"><strong>用户名:</strong></label> 
         <input type="text" class="contact_input" /> 
        </div> 
        <div class="form_row"> 
         <label class="contact"><strong>密码:</strong></label> 
         <input type="text" class="contact_input" /> 
        </div> 
        <div class="form_row"> 
         <label class="contact"><strong>Email:</strong></label> 
         <input type="text" class="contact_input" /> 
        </div> 
        <div class="form_row"> 
         <label class="contact"><strong>电话:</strong></label> 
         <input type="text" class="contact_input" /> 
        </div> 
        <div class="form_row"> 
         <label class="contact"><strong>地址:</strong></label> 
         <input type="text" class="contact_input" /> 
        </div> 
        <div class="form_row"> 
         <label class="contact"><strong>收货地址:</strong></label> 
         <input type="text" class="contact_input" /> 
        </div> 
        <div class="form_row"> 
         <div class="terms"> 
          <input type="checkbox" name="terms" /> 我同意
          <a href="#">条款 &amp; 条件</a> 
         </div> 
        </div> 
        <div class="form_row"> 
         <input type="submit" class="register" value="注册" /> 
        </div> 
       </form> 
      </div> 
     </div> 
     <div class="clear"></div> 
    </div>
  
@endsection