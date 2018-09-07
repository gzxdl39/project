@extends('Home.common.base')
@section('title','书籍详情') 
@section('content')    
  <div class="left_content"> 
   <div class="crumb_nav"> 
    <a href="index.html">首页</a> &gt;&gt; 书籍详情 
   </div> 
   <div class="title">
    <span class="title_icon"><img src="/static/images/bullet1.gif" alt="" title="" /></span>解忧杂货店
   </div>
   <div class="feat_prod_box_details"> 
    <div class="prod_img">
     <a href="details.html"><img src="{{$descr->gpic}}" width="98px" height="150px" alt="" title="" border="0" /></a> 
     <br />
     <br /> 
     <a href="{{$descr->gpic}}" rel="lightbox"><img src="/static/images/zoom.gif" alt="" title="" border="0" /></a>
       <a href=""><img src="" alt="" title="" border="0" /></a>  
    </div> 
    <div class="prod_det_box"> 
     <div class="box_top"></div> 
    
     <div class="box_center"> 
      <div class="prod_title">
       商品简介:
      </div> 
      <p class="details">{{$descr->gdesc}}</p> 
      <div class="price">
       <strong>价格:</strong> 
       <span class="red">{{$descr->price}}</span>
      </div> 
      <div class="price">
       <strong>封面颜色:</strong> 
       <span class="colors"><img src="/static/images/color1.gif" alt="" title="" border="0" /></span> 
       <span class="colors"><img src="/static/images/color2.gif" alt="" title="" border="0" /></span> 
       <span class="colors"><img src="/static/images/color3.gif" alt="" title="" border="0" /></span> 
      </div> 
      <a href="/cart" class="more"><img src="/static/images/order_now.gif" alt="" title="" border="0" /></a> 
      <div class="clear"></div>
      <div class="clear"></div>  
     </div> 
   
     <div class="box_bottom"></div> 
    </div> 
    <div class="clear"></div> 
   </div> 
   <div id="demo" class="demolayout"> 
    <ul id="demo-nav" class="demolayout"> 
     <li><a class="active" href="#tab1">更多详细信息</a></li> 
     <li><a class="" href="#tab2">相关书籍</a></li> 
    </ul> 
  
    <div class="tabs-container"> 
     <div style="display: block;" class="tab" id="tab1"> 
      <p class="more_details">
        {{$descr->gname}} 内容简介<br>
        {{$descr->gdesc}}
      </p> 
      <ul class="list"> 
       <li><p>作者&nbsp;出版时间&nbsp;出版社&nbsp;{{$descr->author}}</p></li> 
       <li><p>库存:{{$descr->stock}}本</p></li> 
       <li><p>销量:{{$descr->salecnt}}</p></li> 
       <li><p></p></li> 
      </ul> 
      <p class="more_details">
       
      </p> 
     </div> 
     <div style="display: none;" class="tab" id="tab2"> 
      @foreach($cate as $row)
      <div class="new_prod_box"> 
       <a href="">{{$row->gname}}</a> 
       <div class="new_prod_bg"> 
        <a href="details.html"><img src="{{$row->gpic}}" width="60px" height="100px" alt="" title="" class="thumb" border="0" /></a> 
       </div> 
      </div> 
      @endforeach
      <div class="clear"></div> 
     </div> 
    </div> 
   </div> 
   <div class="clear"></div> 
  </div>
 <script type="text/javascript">

var tabber1 = new Yetii({
id: 'demo'
});

</script>
@endsection