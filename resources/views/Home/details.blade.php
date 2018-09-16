@extends('Home.common.base')
@section('title','书籍详情') 
@section('content')
 <script type="text/javascript" src="/admin/js/libs/jquery-1.8.3.min.js"></script>
<form action="/cart" method="post" id="sub">     
  <div class="left_content"> 
   <div class="crumb_nav"> 
    <a href="/">首页</a> &gt;&gt; 书籍详情 
   </div> 
   <div class="title">
    <span class="title_icon"><img src="/static/images/bullet1.gif" alt="" title="" /></span>{{$descr->gname}}
   </div>
   <div class="feat_prod_box_details"> 
    <div class="prod_img">
     <a href="#"><img src="{{$descr->gpic}}" width="98px" height="150px" alt="" title="" border="0" /></a>
     <br />
     {{csrf_field()}}
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
       <span class="red">{{$descr->price}}</span><br>
       <strong>库存:</strong> 
       @if($descr->stock <=0)
        <span style="background: pink">亲！该商品已下架了喔,留下您的联系方式。有货的时候再通知你哈*-*。</span>   
       @else
      <span class="red">{{$descr->stock}}</span>
       @endif
      </div> 
      <div class="price">
       <strong>封面颜色:</strong> 
       <span class="colors"><img src="/static/images/color1.gif" alt="" title="" border="0" /></span> 
       <span class="colors"><img src="/static/images/color2.gif" alt="" title="" border="0" /></span> 
       <span class="colors"><img src="/static/images/color3.gif" alt="" title="" border="0" /></span> 
      </div> 
      <div class="price">
       <strong>数量:</strong>    
       <input type="text" style="width:30px;" name="num" value="1" id="nn"><span></span>
      </div>
       {{csrf_field()}}
      <input type="hidden" name="id" value="{{$descr->gid}}">
      @if($descr->stock <=0)
      <h4><input type="text" value="无法加入购物车" readonly="readonly" style="background: pink"></h4> 
      @else
     <h4><input type="submit" value="加入购物车"></h4>
      @endif
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
  </form>
 <script type="text/javascript">
      NUM=false;
      //绑定数量input的单击事件  
      $("#nn").blur(function(){
          o=$(this).val();
          //判断值是否购买超过库存
          if(o>{{$descr->stock}}){
             $(this).next('span').css("color","red").html('亲，购买已超该产品库存咯^-^'); 
             NUM=false;
          }else if(o=={{$descr->stock}}){
             $(this).next('span').css("color","pink").html('哇！亲好爱你哦！')
             NUM=true;
          }else{
             $(this).next('span').css("color","green").html('亲，库存丰厚还可以购买哦^-^'); 
             NUM=true;
          }
      });
      //给表单绑定提交事件
      $('#sub').submit(function(){
        $("input").trigger('blur');
        if(NUM==true){
          return true;
        }else{
          return false;
        }
      });


    var tabber1 = new Yetii({
    id: 'demo'
    });

</script>
@endsection