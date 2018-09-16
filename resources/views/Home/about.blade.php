@extends('Home.common.base')
@section('title','公告') 
@section('content')    
    <div class="center_content"> 
    <div class="left_content"> 
     <div class="title">
      <span class="title_icon"><img src="/static/images/bullet1.gif" alt="" title="" /></span>公告
     </div> 
     @foreach($about as $row)
     <div class="feat_prod_box_details"> 
        <p>{{$row->title}}</p>
      <p class="details"> <img src="/static/images/about.gif" alt="" title="" class="right" />{{$row->content}}</p> 
     </div> 
     @endforeach
     <div class="clear"></div> 
    </div>
    </div>
  
@endsection