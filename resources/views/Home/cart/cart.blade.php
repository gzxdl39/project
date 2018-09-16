@extends('Home.common.base')
@section('title','我的手推车') 
@section('content') 
<script type="text/javascript" src="/admin/js/libs/jquery-1.8.3.min.js"></script>
 <style type="text/css">
  .jian,.jia{
      display: block;
      height: 23px;
      width:23px;
      line-height: 20px;
      text-align: center;
      border: 0px solid #6F605A;
      background: pink;
      position: relative;
  }  
  .jian{
    top:25px;
    left: -25px;
  }
  .jia{
    top: -40px;
    left: 35px;
  }
  input[name='num']{
    display: block;
    width: 20px;
    height: 20px;
    text-align: center;

  }  
  a:active{
    color:pink;
    background:pink;
    text-decoration:none;
  }
</style>
    <div class="center_content"> 
    <div class="left_content"> 
     <div class="title">

      <span class="title_icon"><img src="/public/static/Home/images/bullet1.gif" alt="" title="" /></span>我的手推车
      @if(session('cart')==null)
          <h2>购物车空空如也,快去购物吧^-^</h2>
          <a href="/" class="continue" title="" style="background-color: pink">首页</a>
      @endif
      @if(session('cart')!=null)
     </div> 
     <div class="feat_prod_box_details"> 
      <table class="cart_table"> 
       <tbody>
        <tr class="cart_title"> 
         <td style="width: 100px">书名</td>
         <td>书籍图</td>  
         <td>数量</td>
         <td>单价</td>  
         <td>合计</td>
         <td>操作</td> 
        </tr> 
        @foreach($data as $row)
        <tr> 
          <td><input type="checkbox" onclick="checkboxOnclick(this)">{{$row['name']}}</td>
          <td><a href=""><img src="{{$row['pic']}}" style="display:block;width:60px;height:50px;" alt="" title="" border="0" class="cart_thumb" /></a></td> 
         <td>
          <a href="/upda/{{$row['id']}}" class="jian">-</a>
          <input type="text" name="num"  value="{{$row['num']}}" readonly="readonly">
          <a href="/updates/{{$row['id']}}" class="jia">+</a>
        </td> 
         <td>{{$row['price']}}元</td> 
         <td>{{$row['price']*$row['num']}}元</td> 
         <td><a href="/cartdel/{{$row['id']}}">删除</a></td>
        </tr> 
        @endforeach
        <tr> 
         <td colspan="4" class="cart_total"><span class="red">总计:{{$total}}</span></td> 
        </tr> 
       </tbody>
      </table> 
      <a href="/" class="continue">&lt; 继续购买</a> 
      <a href="/orders" class="checkout">结账 &gt;</a> 
  
     </div> 
      @endif
     <div class="clear"></div> 
    </div>
  </table>
@endsection