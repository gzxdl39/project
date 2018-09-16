@extends('Admin.common.default') 
@section('content')
 <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/index">首页</a><span class="crumb-step">&gt;</span><span>订单详情</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            
                            <table class="result-tab" width="100%">
                        <tr>
                            <th style='width:300px;'>商品名称</th>
                            <th>商品图片</th>
                            <th>购买单价</th>
                            <th>购买数量</th>
                            <th>小计</th>
                        </tr>
                        @foreach($order as $row)
                        <tr>
                            <td>{{$row->gname}}</td>
                            <td><img style='width:50px;' src="{{$row->gpic}}" alt=""></td>
                            <td>{{$row->price}}</td>
                            <td>{{$row->num}}</td>
                            <td>{{$row->price * $row->num}}</td>
                        <tr>
                         @endforeach
                            <tr>
                                <th></th>
                                <td colspan="5">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
@endsection