@extends('Home.common.base')
@section('title','书籍列表') 
@section('content')    
    <div class="center_content"> 
    <div class="left_content"> 
     <div class="title">
      <span class="title_icon"><img src="/static/images/bullet1.gif" alt="" title="" /></span>书籍列表
     </div> 
      @foreach($shop as $res)
     <div class="feat_prod_box"> 
      <div class="prod_img">
       <a href="/details/{{$res->gid}}"><img src="{{$res->gpic}}" width="98px" height="150px" alt="" title="" border="0" /></a>
      </div> 
      <div class="prod_det_box"> 
       <span class="special_icon"><img src="/static/images/special_icon.gif" alt="" title="" /></span> 
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
      <div class="pagination" id="content"> 

      {{$shop->appends($request)->render()}}
     </div> 
     
     <script>
      window.onload = function(){
     var content=document.getElementById("content"); 
      var items=content.getElementsByTagName("ul"); 
      var v=items[0].getElementsByTagName("li"); 
      content.style.marginLeft = '20%';
      for(var i = 0; i < v.length; i++){
        v[i].style.float = 'left'; 
      }
      
      } 
     </script>
     <div class="clear"></div> 
    </div>  
@endsection