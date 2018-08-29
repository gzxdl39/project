@extends('Admin.common.default') 
@section('content') 
 <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="#">首页</a><span class="crumb-step">&gt;</span><span>商品修改</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="/shop/{{$shop->gid}}" method="post" id="myform" name="myform" enctype="multipart/form-data"> 
                    <table class="insert-tab" width="100%">
                        <tbody><tr> 
                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>商品名称：</th>
                                <td>
                                    <input class="common-text required" id="gname" name="gname" size="50" value="{{$shop->gname}}" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>定价：</th>
                                <td>
                                    <input class="common-text required" id="price" name="price" size="50" value="{{$shop->price}}" type="number">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>库存量：</th>
                                <td>
                                    <input class="common-text required" id="stock" name="stock" size="50" value="{{$shop->stock}}" type="number">
                                </td>
                            </tr>
                             <tr>
                                <th><i class="require-red">*</i>缩略图</th>
                                <td>
                                    <input type='file' name='gpic' value="{{$shop->gpic}}">
                                    <!--/static/uploads/images/20171111.jpg -->
                                    <img style="width:100px;" src="{{$shop->gpic}}" alt="">
                                </td>
                            </tr>

                             <tr>
                                <th><i class="require-red">*</i>内容</th>
                                <td>
                                    <textarea name="gdesc" id="gdesc" cols="70" rows="10">{{$shop->gdesc}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>状态：</th>
                                <td>
                                    <input type="radio" name="status" value='1' @if($shop->status==1) checked @endif>新品
                                   <input type="radio" name="status" value='2' @if($shop->status==2) checked @endif>上架
                                    <input type="radio" name="status" value='3' @if($shop->status==3) checked  @endif>下架
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    {{csrf_field()}} 
                                    {{method_field("PUT")}}
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>
    </div>
    <!--/main-->
@endsection