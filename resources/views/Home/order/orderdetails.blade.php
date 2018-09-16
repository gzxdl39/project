@extends('Home.common.base')
@section('title','订单详情管理') 
@section('content')
<style type="text/css">
  .goods {
    border: 1px #bcd9fa solid;
    border-left: none;
    background-color: #d8e9fc;
    line-height: 30px;
}
.boosT {
    border: 1px #bcd9fa solid;
    border-top: none;
    background-color: #FFF;
    padding-left: 5px;
    text-align: left;
    line-height: 25px;
    color: #333;
}
.moneyT {
    border: 1px #bcd9fa solid;
    border-left: none;
    border-top: none;
    background-color: #FFF;
    padding-left: 5px;
    color: #666666;
}
</style>

<script type="text/javascript" src="/admin/js/libs/jquery-1.8.3.min.js"></script>    
     <div class="center_content">
       	<div class="left_content">         
        	<div class="feat_prod_box_details">
            <form action="/orderdetails/{{$data->oid}}" method="post" id="myform" name="myform" enctype="multipart/form-data">                        
          </div>

    <table style="border: 1px #bcd9fa solid;" width="480" cellspacing="0" cellpadding="0" align="center"> 
   <tbody>
    <tr> 
     <td height="30" bgcolor="#d8e9fc" align="left"> <font class="Num">订单号：{{$data->oid}} </font> </td> 
    </tr> 
    <tr> 
     <td align="left"> 
      <table width="100%" cellspacing="0" cellpadding="0" border="0"> 
       <tbody>
        <tr> 
         <td valign="bottom" height="50"> <a href="javascript:openDiv(0)" class="titbig">订单处理状态</a>&nbsp; <font color="#333333">  @if($data->status==1)
           已下单
           @endif
           @if($data->status==2)
           已发货
           @endif
           @if($data->status==3)
           已收货
           @endif</font> 
           </td> 
        </tr> 
       </tbody>
       <tbody id="0"> 
        <tr> 
         <td class="DL" height="20">订购时间： {{$data->create_at}} </td> 
        </tr> 
        <tr> 
         <td class="DL" height="20">支付时间： {{$data->ctime}} </td> 
        </tr> 
       </tbody> 
      </table> </td> 
    </tr> 
    <tr> 
     <td align="center"> 
      <table width="93%" cellspacing="0" cellpadding="0" border="0"> 
       <tbody>
        <tr> 
         <td class="borderline">&nbsp; </td> 
        </tr> 
       </tbody>
      </table> </td> 
    </tr> 
    <tr> 
     <td align="left"> 
      <table width="100%" cellspacing="0" cellpadding="0" border="0"> 
       <tbody>
        <tr> 
         <td style="padding-top: 7px;" valign="bottom" height="30"> <input id="hiddenaddressvalue" value="0" type="hidden" /> <a href="javascript:opendivone()" class="titbig">收货人信息</a> 
           </td> 
        </tr> 
       </tbody>
       <tbody id="1" style=""> 
        <tr> 
         <td class="DL" height="20">收 货 人：{{$data->rec}} </td> 
        </tr> 
        <tr> 
         <td class="DL" height="20">收货地址：{{$data->addr}} </td> 
        </tr> 
        <tr> 
         <td class="DL" height="20">联系电话：{{$data->tel}} </td> 
        </tr> 
        <tr> 
         <td class="DL" height="20">留言：{{$data->umsg}} </td> 
        </tr> 
       </tbody> 
       
      </table> </td> 
    </tr> 
    <tr> 
     <td align="center"> 
      <table width="93%" cellspacing="0" cellpadding="0" border="0"> 
       <tbody>
        <tr> 
         <td class="borderline">&nbsp; </td> 
        </tr> 
       </tbody>
      </table> </td> 
    </tr> 

    <tr> 
     <td align="center"> 
      <table width="93%" cellspacing="0" cellpadding="0" border="0"> 
       <tbody>
        <tr> 
         <td class="borderline">&nbsp; </td> 
        </tr> 
       </tbody>
      </table> </td> 
    </tr> 
    <tr> 
     <td style="padding-top: 7px;" valign="bottom" height="30" align="left"> <a href="javascript:openDiv(3)" class="titbig">订购清单</a>&nbsp;
       </td> 
    </tr> 
   </tbody>
   <tbody id="3"> 
    <tr> 
     <td height="10">&nbsp; </td> 
    </tr> 
    <tr> 
     <td> 
      <table style="color: #000;font-size:12px;" cellspacing="0" cellpadding="0" border="0" align="center"> 
       <tbody>
        <tr style="padding: 5px 0; height: 20px;"> 
         <td width="1%">&nbsp;</td> 
         <td class="goods" width="30%" align="left">&nbsp;商品名称 </td> 
         <td class="goods" width="30%" align="center">图片 </td> 
         <td class="goods" width="20%" align="center">售价 </td> 
         <td class="goods" width="20%" align="center">订购数量 </td> 
         <td class="goods" style="display:none" width="16%" align="center">入库数量 </td> 
         
         <td>&nbsp; </td> 
        </tr> 
        <tr style="padding: 5px 0; height: 20px;"> 
         <td>&nbsp; </td> 
         <td class="boosT" align="center"> <a href="" target="_blank">{{$data->gname}}</a> </td> 
         <td class="moneyT" align="center"><img src="{{$data->gpic}}" width="98px" height="150px" alt="" title="" border="0" /> </td> 
         <td class="moneyT" align="center"> {{$data->price}}元 </td> 
         <td class="moneyT" align="center"> {{$data->num}} </td> 
         
         
         <td>&nbsp; </td> 
        </tr> 
       </tbody>
      </table> </td> 
    </tr> 
    <tr> 
     <td> 
      <table style="text-align: right;" width="100%" cellspacing="0" cellpadding="0" border="0">
       <tbody>
        
        <!-- <tr>
         <td height="20">配送费：</td>
         <td align="left">￥6.0</td>
        </tr> -->
        <tr style="float:left;margin-right:45px;">
         <td class="titleM" height="20">应收金额<font style="font-weight: normal">：</font></td>
         <td align="left"><font style="font-size: 12px; color: #FF6600; font-weight: bold;"><font style="font-weight: normal">￥</font>{{$data->price}}</font></td>
        </tr>
       </tbody>
      </table> </td> 
    </tr> 
    <tr> 
     <td align="center"> 
      <table width="93%" cellspacing="0" cellpadding="0" border="0"> 
       <tbody>
        <tr> 
         <td style="border-top: dashed #bcd9fa 1px;">&nbsp; </td> 
        </tr> 
       </tbody>
      </table> </td> 
    </tr> 
   </tbody> 
   
  </table>
  
  
 </form> 
        <div class="clear"></div>
        </div>
@endsection