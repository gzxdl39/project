@extends('Home.common.base')
@section('title','首页')
@section('content')  
    <!-- 代码部分begin -->
<div class="hc_lnav jslist">
  <div class="allbtn">
    <h2><a href="#"><strong>&nbsp;</strong>图书分类<i>&nbsp;</i></a></h2>
    <ul style="width:190px" class="jspop box">
      @foreach($user as $row)
      <li class=a1>
        <div class=tx><a href="#"><i>&nbsp;</i>{{$row->cname}}</a> </div>
        <div class=pop>
          <h3><a href="#"></a></h3>
          <dl>
            @foreach($row->sub as $ro)
            <dl>
              <dt style="color: red"><a href=""><span style="font-size: 15px;color: green;">{{$ro->cname}}</span></a></dt>
              <dd>
                @foreach($ro->sub as $r)
                <a class="ui-link" href="#">{{$r->cname}}</a>
                @endforeach 
              </dd>
            </dl>
            @endforeach
          <div class=clr></div>
          <div class=act><a href=""></a> </div>
        </div>
      </li>
      @endforeach
    </ul>
  </div>
</div>
<!-- 代码部分end -->
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