@extends('Home.common.base')
@section('title','我的账户') 
@section('content')    
      <div class="center_content"> 
    <div class="left_content"> 
     <div class="title">
      <span class="title_icon"><img src="/public/static/Home/images/bullet1.gif" alt="" title="" /></span>我的账户
     </div> 
     <div class="feat_prod_box_details"> 
      <p class="details">描述</p> 
      <div class="contact_form"> 
       <div class="form_subtitle">
        登录到您的账户
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
         <div class="terms"> 
          <input type="checkbox" name="terms" /> 记住密码 
         </div> 
        </div> 
        <div class="form_row"> 
         <input type="submit" class="register" value="login" /> 
        </div> 
       </form> 
      </div> 
     </div> 
     <div class="clear"></div> 
    </div>
@section('script')   
@endsection