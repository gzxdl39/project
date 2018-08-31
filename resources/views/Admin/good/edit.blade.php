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
                                    <input class="common-text required" id="gname" name="gname" size="50" value="{{$shop->gname}}" type="text"><span></span>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>定价：</th>
                                <td>
                                    <input class="common-text required" id="price" name="price" size="50" value="{{$shop->price}}" type="number"><span></span>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>库存量：</th>
                                <td>
                                    <input class="common-text required" id="stock" name="stock" size="50" value="{{$shop->stock}}" type="number"><span></span>
                                </td>
                            </tr>
                             <tr>
                                <th><i class="require-red">*</i>缩略图</th>
                                <td>
                                    <input type='file' name='gpic' value="{{$shop->gpic}}"><span></span>
                                    <!--/static/uploads/images/20171111.jpg -->
                                    <img style="width:100px;" src="{{$shop->gpic}}" alt="">
                                </td>
                            </tr>

                             <tr>
                                <th><i class="require-red">*</i>内容</th>
                                <td>
                                    <textarea name="gdesc" id="gdesc" cols="70" rows="10">{{$shop->gdesc}}</textarea><span></span>
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
    <script type="text/javascript">
        SHOP=false;
        PRICE=false;
        STOCK=false; 
        GPIC=false;
        GDESC=false;
        //商品名称
        $('#gname').blur(function(){
            //$(this)在Ajax里解析不了
            o=$(this);
            //获取商品名
            m=$(this).val();
            if(m.match(/^[\u4e00-\u9fa5_a-zA-Z0-9]+$/)==null){
                $(this).next("span").css("color","red").html("请不要输入特殊字符");
                $(this).addClass("cur");
                SHOP=false;
            }else{
                o.next("span").css("color","green").html("");
                //清空样式
                o.removeClass("cur");
                //添加样式
                o.addClass("curs");
                SHOP=true;
            }
        });
        $('#price').blur(function(){
            c=$(this).val();
            if(c==0){
                $(this).next("span").css("color","red").html("请填写商品单价");
                PRICE=false;
            }else{
                $(this).next("span").css("color","green").html("");
                PRICE=true;
            }
        });
        $("#stock").blur(function(){ 
            if($(this).val()==0){
               $(this).next("span").css("color","red").html("请填写库商品存量");
               STOCK=false; 
            }else{
                $(this).next("span").css("color","green").html("");
                STOCK=true;
            }
        });
        $("#gdesc").blur(function(){ 
            if($(this).val()==''){
               $(this).next("span").css("color","red").html("请填写库商品内容");
               GDESC=false; 
            }else{
                $(this).next("span").css("color","green").html("");
               GDESC=true;
            }
        });
        $("#myform").submit(function(){
            //在每个匹配的元素上触发某类事件
            $("input").trigger("blur");
            $("#gdesc").trigger("blur");
            $("#cate_id").trigger("change");
            if(SHOP && PRICE && STOCK && GDESC){
                //提交表单
                return true;
            }else{
                return false;
            }
       });
    </script>
@endsection