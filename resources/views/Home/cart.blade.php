@extends('Home.common.base')
@section('title','我的手推车') 
@section('content')    
    <div class="center_content"> 
    <div class="left_content"> 
     <div class="title">
      <span class="title_icon"><img src="/public/static/Home/images/bullet1.gif" alt="" title="" /></span>我的手推车
     </div> 
     <div class="feat_prod_box_details"> 
      <table class="cart_table"> 
       <tbody>
        <tr class="cart_title"> 
         <td>书籍图</td> 
         <td>书名</td> 
         <td>单价</td> 
         <td>数量</td> 
         <td>Total</td> 
        </tr> 
        <tr> 
         <td><a href="details.html"><img src="/public/static/Home/images/cart_thumb.gif" alt="" title="" border="0" class="cart_thumb" /></a></td> 
         <td>书名</td> 
         <td>价格</td> 
         <td>数量</td> 
         <td>总价</td> 
        </tr> 
        <tr> 
         <td><a href="details.html"><img src="/public/static/Home/images/cart_thumb.gif" alt="" title="" border="0" class="cart_thumb" /></a></td> 
         <td>Books</td> 
         <td>100$</td> 
         <td>1</td> 
         <td>100$</td> 
        </tr> 
        <tr> 
         <td><a href="details.html"><img src="/public/static/Home/images/cart_thumb.gif" alt="" title="" border="0" class="cart_thumb" /></a></td> 
         <td>Books</td> 
         <td>100$</td> 
         <td>1</td> 
         <td>100$</td> 
        </tr> 
        <tr> 
         <td colspan="4" class="cart_total"><span class="red">TOTAL SHIPPING:</span></td> 
         <td> 250$</td> 
        </tr> 
        <tr> 
         <td colspan="4" class="cart_total"><span class="red">TOTAL:</span></td> 
         <td> 325$</td> 
        </tr> 
       </tbody>
      </table> 
      <a href="#" class="continue">&lt; 继续购买</a> 
      <a href="#" class="checkout">结账 &gt;</a> 
     </div> 
     <div class="clear"></div> 
    </div>
   
@endsection