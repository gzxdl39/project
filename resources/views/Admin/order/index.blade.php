@extends('Admin.common.default') 
@section('content')
  <div class="main-wrap"> 
   <div class="crumb-wrap"> 
    <div class="crumb-list">
     <i class="icon-font"></i>
     <a href="/index">首页</a>
     <span class="crumb-step">&gt;</span>
     <span class="crumb-name">订单管理</span>
    </div> 
   </div> 
   <div class="search-wrap"> 
    <div class="search-content"> 
     <form action="" method="get"> 
      <table class="search-tab"> 
       <tbody>
        <tr> 
         <th width="120">选择分类:</th> 
         <td> 
          <select name="status" id="cate_id" class="required"> 
            <option value="">
              请选择
            </option> 
            <option value="1">已下单</option> 
            <option value="2">已发货</option> 
            <option value="3">已收货</option> 
          </select> 
        </td> 
         <th width="70">收货人:</th> 
         <td><input class="common-text" placeholder="收货人" name="rec" value="{{$k}}{{$request['keywords'] or ''}}" id="rec" type="text" /></td> 
         <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit" /></td> 
        </tr> 
       </tbody>
      </table> 
     </form> 
    </div> 
   </div> 
   <div class="result-wrap"> 
    <form name="myform" id="myform" method="post"> 
     <div class="result-title"> 
     </div> 
     <div class="result-content"> 
      <table class="result-tab" width="100%"> 
       <tbody>
        <tr> 
         <th>订单号</th> 
         <th>总金额</th> 
         <th>下单时间</th> 
         <th>收货人</th> 
         <th>收货地址</th> 
         <th>总数量</th> 
         <th>状态</th> 
         <th>支付状态</th>
         <th>操作</th> 
        </tr> 
        @foreach($order as $row)
        <tr> 
         <td>{{$row->oid}}</td> 
         <td>{{$row->total}}</td> 
         <td>{{$row->create_at}}</td> 
         <td>{{$row->rec}}</td> 
         <td>{{$row->addr}}</td> 
         <td>{{$row->num}}</td> 
         <td>
           @if($row->status==1)
           已下单
           @endif
           @if($row->status==2)
           已发货
           @endif
           @if($row->status==3)
           已收货
           @endif
         </td> 
         <td>
           @if($row->ctime==null)
           未支付
           @endif
           @if($row->ctime!=null)
           已支付
           @endif
         </td> 
         <td> 
            <form action="/order/{{$row->oid}}" method="post">
                {{csrf_field()}}
                {{method_field("DELETE")}}
                <a class="btn btn-danger" href="/order/{{$row->oid}}/edit">修改</a> 
                <a class="btn btn-primary" href="/order/show/{{$row->oid}}">订单详情</a> 
                <a class="btn btn-warning" href="/order/{{$row->oid}}">发货</a> 
                <button class="btn btn-success del" onclick="return confirm('确定要删除吗？');" >删除</button>
            </form>
        </td> 
        </tr> 
        @endforeach
       </tbody>
      </table> 
      <div class="list-page"> 
      </div> 
     </div> 
    </form> 
   </div> 
   <div class="list-page">
   </div> 
  </div>
    <!-- /main -->
@endsection