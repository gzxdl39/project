@extends('Home.common.base')
@section('title','首页')
@section('content')    
        <div class="left_content"> 
     <div class="title">
      <span class="title_icon"><img src="/static/images/bullet1.gif" alt="" title="" /></span>特价书籍
     </div> 
     <div class="feat_prod_box"> 
      <div class="prod_img">
       <a href="details.html"><img src="/static/images/prod1.gif" alt="" title="" border="0" /></a>
      </div> 
      <div class="prod_det_box"> 
       <div class="box_top"></div> 
       <div class="box_center"> 
        <div class="prod_title">
         产品名称
        </div> 
        <p class="details">描述</p> 
        <a href="details.html" class="more">- 更多细节 -</a> 
        <div class="clear"></div> 
       </div> 
       <div class="box_bottom"></div> 
      </div> 
      <div class="clear"></div> 
     </div> 
     <div class="feat_prod_box"> 
      <div class="prod_img">
       <a href="details.html"><img src="/static/images/prod2.gif" alt="" title="" border="0" /></a>
      </div> 
      <div class="prod_det_box"> 
       <div class="box_top"></div> 
       <div class="box_center"> 
        <div class="prod_title">
         产品名称
        </div> 
        <p class="details">描述</p> 
        <a href="details.html" class="more">- 更多细节 -</a> 
        <div class="clear"></div> 
       </div> 
       <div class="box_bottom"></div> 
      </div> 
      <div class="clear"></div> 
     </div> 
     <div class="title">
      <span class="title_icon"><img src="/static/images/bullet2.gif" alt="" title="" /></span>新书
     </div> 
     <div class="new_products"> 
      <div class="new_prod_box"> 
       <a href="details.html">产品名称</a> 
       <div class="new_prod_bg"> 
        <span class="new_icon"><img src="/static/images/new_icon.gif" alt="" title="" /></span> 
        <a href="details.html"><img src="/static/images/thumb1.gif" alt="" title="" class="thumb" border="0" /></a> 
       </div> 
      </div> 
      <div class="new_prod_box"> 
       <a href="details.html">产品名称</a> 
       <div class="new_prod_bg"> 
        <span class="new_icon"><img src="/static/images/new_icon.gif" alt="" title="" /></span> 
        <a href="details.html"><img src="/static/images/thumb2.gif" alt="" title="" class="thumb" border="0" /></a> 
       </div> 
      </div> 
      <div class="new_prod_box"> 
       <a href="details.html">产品名称</a> 
       <div class="new_prod_bg"> 
        <span class="new_icon"><img src="/static/images/new_icon.gif" alt="" title="" /></span> 
        <a href="details.html"><img src="/static/images/thumb3.gif" alt="" title="" class="thumb" border="0" /></a> 
       </div> 
      </div> 
     </div> 
     <div class="clear"></div> 
@endsection