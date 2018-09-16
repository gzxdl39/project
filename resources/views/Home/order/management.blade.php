@extends('Home.common.base')
@section('title','订单管理') 
@section('content')
<style type="text/css">
  .listordertit{border-top:1px solid #d0daeb;  border-bottom:1px solid #d0daeb; background-color:#ecf3ff;  padding:7px 0;text-align: center;}
.listordertit ul{height:16px;}
.listordertit ul li{ float:left; padding:0 5px; width:15%; text-align:center; line-height:16px; height:16px; vertical-align:middle; color:#666; border-right:1px solid #b8cbea; font-size: 12px;}
.listordertit ul li.noneb{border:none;}
td ul li a{font-size: 12px;}
td ul li {font-size: 12px;}
.listorder ul{border-bottom:1px solid #d0daeb; height:50px;}
.listorder ul li{ float:left; padding:0 5px; width:15%; text-align:center; line-height:30px; height:30px; vertical-align:middle; color:#666; }
.listorder ul li.borrig{border-right:solid #b8cbea 1px; color:#333; height:16px; margin:5px 0 0 0;}
.listorder ul li h1 {font-weight:normal; font-size:12px; text-align:left; margin:0 auto; padding:0 0 0 10px;}
.listorder ul li h1 a{color:#19559e; padding:0 0 0 3px; text-decoration: none;}
.listorder ul li a{text-decoration: none;}
.texter td a{text-decoration: none;}
</style>
<script type="text/javascript" src="/admin/js/libs/jquery-1.8.3.min.js"></script>    
     <div class="center_content">
       	<div class="left_content">         
        	<div class="feat_prod_box_details">
            <form action="/management" method="post" id="myform" name="myform" enctype="multipart/form-data">                        
          </div>
  <table  width="100%" cellspacing="0" border="0"> 
   <tbody>
    <tr> 
     <td colspan="7" valign="middle" height="30"> 
      <div class="listordertit"> 
       <ul> 
        <li style="width:85px;">订单号</li> 
        <li style="width:60px;">总金额(元)</li> 
        <li style="width:100px;">订购日期</li> 
        <li style="width:60px;">订单状态</li> 
        <li class="noneb" style="width:60px;">操作</li> 
       </ul> 
      </div> </td> 
    </tr> 
    @foreach($data as $row)
    <tr> 
     <td colspan="7" valign="middle" height="30"> 
      <div class="listorder"> 
       <ul> 
        <li style="width:135px;height:40px;margin-left:-30px;" ><h1><a href="orderdetails/{{$row->oid}}" target="_blank">{{$row->oid}} </a> </h1></li> 
        <li style="width:40px;">{{$row->total}}</li> 
        <li style="width:100px;">{{$row->create_at}}</li> 
        <li style="width:40px;">
         @if($row->status==1)
           已下单
           @endif
           @if($row->status==2)
           已发货
           @endif
           @if($row->status==3)
           已收货
           @endif
           @if($row->status!=3)
           <a href="/take/{{$row->oid}}">收货</a>
           @endif
         </li> 
        <li style="width:90px;margin-left:20px;">
          <a href="orderdetails/{{$row->oid}}" target="_blank">订单详情</a>
          @if($row->ctime==null)
          <a href="/payup/{{$row->oid}}">点击付款</a>
          @endif
        </li>
       </ul> 
       {{csrf_field()}}
      </div>
      </td> 
    </tr> 
    @endforeach
   </tbody>
  </table> 
 </form> 
        <div class="clear"></div>
        </div>
@endsection