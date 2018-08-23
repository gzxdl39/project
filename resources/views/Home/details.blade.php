@extends('Home.common.base')
@section('title','书籍详情') 
@section('content')    
      <div class="center_content"> 
    <div class="left_content"> 
     <div class="crumb_nav"> 
      <a href="index.html">首页</a> &gt;&gt; 详情 
     </div> 
     <div class="title">
      <span class="title_icon"><img src="/public/static/Home/images/bullet1.gif" alt="" title="" /></span>产品名称
     </div> 
     <div class="feat_prod_box_details"> 
      <div class="prod_img">
       <a href="details.html"><img src="/public/static/Home/images/prod1.gif" alt="" title="" border="0" /></a> 
       <br />
       <br /> 
       <a href="/public/static/Home/images/big_pic.jpg" rel="lightbox"><img src="/public/static/Home/images/zoom.gif" alt="" title="" border="0" /></a> 
      </div> 
      <div class="prod_det_box"> 
       <div class="box_top"></div> 
       <div class="box_center"> 
        <div class="prod_title">
         细节
        </div> 
        <p class="details">描述 </p> 
        <div class="price">
         <strong>价格:</strong> 
         <span class="red">100 $</span>
        </div> 
        <div class="price">
         <strong>颜色:</strong> 
         <span class="colors"><img src="/public/static/Home/images/color1.gif" alt="" title="" border="0" /></span> 
         <span class="colors"><img src="/public/static/Home/images/color2.gif" alt="" title="" border="0" /></span> 
         <span class="colors"><img src="/public/static/Home/images/color3.gif" alt="" title="" border="0" /></span> 
        </div> 
        <a href="details.html" class="more"><img src="/public/static/Home/images/order_now.gif" alt="" title="" border="0" /></a> 
        <div class="clear"></div> 
       </div> 
       <div class="box_bottom"></div> 
      </div> 
      <div class="clear"></div> 
     </div> 
     <div id="demo" class="demolayout"> 
      <ul id="demo-nav" class="demolayout"> 
       <li><a class="active" href="#tab1">更多细节</a></li> 
       <li><a class="" href="#tab2">相关书籍</a></li> 
      </ul> 
      <div class="tabs-container"> 
       <div style="display: block;" class="tab" id="tab1"> 
        <p class="more_details">描述 </p> 
       <div style="display: none;" class="tab" id="tab2"> 
        <div class="new_prod_box"> 
         <a href="details.html">产品名称</a> 
         <div class="new_prod_bg"> 
          <a href="details.html"><img src="/public/static/Home/images/thumb1.gif" alt="" title="" class="thumb" border="0" /></a> 
         </div> 
        </div> 
        <div class="new_prod_box"> 
         <a href="details.html">product name</a> 
         <div class="new_prod_bg"> 
          <a href="details.html"><img src="/public/static/Home/images/thumb2.gif" alt="" title="" class="thumb" border="0" /></a> 
         </div> 
        </div> 
        <div class="new_prod_box"> 
         <a href="details.html">product name</a> 
         <div class="new_prod_bg"> 
          <a href="details.html"><img src="/public/static/Home/images/thumb3.gif" alt="" title="" class="thumb" border="0" /></a> 
         </div> 
        </div> 
        <div class="new_prod_box"> 
         <a href="details.html">product name</a> 
         <div class="new_prod_bg"> 
          <a href="details.html"><img src="/public/static/Home/images/thumb1.gif" alt="" title="" class="thumb" border="0" /></a> 
         </div> 
        </div> 
        <div class="new_prod_box"> 
         <a href="details.html">product name</a> 
         <div class="new_prod_bg"> 
          <a href="details.html"><img src="/public/static/Home/images/thumb2.gif" alt="" title="" class="thumb" border="0" /></a> 
         </div> 
        </div> 
        <div class="new_prod_box"> 
         <a href="details.html">product name</a> 
         <div class="new_prod_bg"> 
          <a href="details.html"><img src="/public/static/Home/images/thumb3.gif" alt="" title="" class="thumb" border="0" /></a> 
         </div> 
        </div> 
        <div class="clear"></div> 
       </div> 
      </div> 
     </div> 
     <div class="clear"></div> 
    </div>
@section('script')   
@endsection