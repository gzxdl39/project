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
        <div class=tx><a href="#"><i>&nbsp;</i>{{$row->cname}}</a></div>
        <div class=pop>
          <h3><a href="#"></a></h3>
          <dl>
            @foreach($row->sub as $ro)
            <dl>
              <dt style="color: red"><a href="#"><span style="font-size: 15px;color: green;">{{$ro->cname}}</span></a></dt>
              <dd>
                @foreach($ro->sub as $r)
                <a class="ui-link" href="/specials/{{$r->cid}}">{{$r->cname}}</a>
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
<form role="form" method="GET" action="">
    <div style="">
              <input type="text" id="gname" placeholder="请输入搜索内容" name="gname" value="{{$request['gname'] or ''}}"/>
              <input style="cursor:pointer" value="搜索" type ="submit" />
  </div>
</form>
<!-- 代码部分end -->
      <div class="left_content"> 
     <div class="title">
      <span class="title_icon"><img src="/static/images/bullet1.gif" alt="" title="" /></span>特价书籍
     </div> 
      @foreach($data as $res)
     <div class="feat_prod_box"> 
      <div class="prod_img">
       <a href="/details/{{$res->gid}}"><img src="{{$res->gpic}}" width="98px" height="150px" alt="" title="" border="0" /></a>
      </div> 
      <div class="prod_det_box"> 
       <div class="box_top"></div> 
       <div class="box_center"> 
        <div class="prod_title">
         {{$res->gname}}
        </div> 
        <p class="details">{{$res->gdesc}}</p> 
        <a href="/details/{{$res->gid}}" class="more">- 更多细节 -</a> 
        <div class="clear"></div> 
       </div> 
       <div class="box_bottom"></div> 
      </div> 
      <div class="clear"></div> 
     </div> 
       @endforeach
     <div class="title">
      <span class="title_icon"><img src="/static/images/bullet2.gif" alt="" title="" /></span>新书
     </div> 
     @foreach($data as $re)
     <!-- <div class="new_products">  -->
      <div class="new_prod_box"> 
       <a href="details.html">{{$re->gname}}</a> 
       <div class="new_prod_bg"> 
        <span class="new_icon"><img src="/static/images/new_icon.gif" alt="" title="" /></span> 
        <a href="/details/{{$re->gid}}"><img src="{{$re->gpic}}" width="98px" height="100px" alt="" title="" class="thumb" border="0" /></a> 
       </div> 
      </div> 
      @endforeach
     <div class="clear"></div> 
@endsection
