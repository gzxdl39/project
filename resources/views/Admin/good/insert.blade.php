@extends('Admin.common.default') 
@section('content') 
 <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><span>添加商品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="/shop" method="post" id="myform" name="myform" enctype="multipart/form-data" >
                    <table class="insert-tab" width="100%">
                        <tbody><tr>
                            <th width="140"><i class="require-red">*</i>商品分类：</th>
                            <td>
                                <select name="cate_id" id="cate_id" class="required">
                                   <option value="0" selected="selected">请选择</option>
                                   @foreach($cate as $v)
                                     <option value="{{$v->cid}}">{{$v->cname}}</option> 
                                    @endforeach
                                </select>
                                <span></span>
                            </td>
                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>商品名称：</th>
                                <td>
                                    <input class="common-text required" id="gname" name="gname" size="50" value="" type="text">
                                    <span></span>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>作者\时间\出版社：</th>
                                <td>
                                    <input class="common-text required" id="author" name="author" size="50" value="" type="text">
                                    <span></span>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>定价：</th>
                                <td>
                                    <input class="common-text required" id="price" name="price" size="50" value="0" type="number">
                                    <span></span>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>库存量：</th>
                                <td>
                                    <input class="common-text required" id="stock" name="stock" size="50" value="0" type="number">
                                    <span></span>
                                </td>
                            </tr>
                             <tr>
                                <th><i class="require-red">*</i>缩略图</th>
                                <td>
                                    <input type='file' name='gpic' value=""><span></span>
                                </td>
                                
                            </tr>

                             <tr>
                                <th><i class="require-red">*</i>内容</th>
                                <td>
                                    <textarea name="gdesc" id="gdesc" cols="70" rows="10"></textarea><span></span>
                                </td>
                                
                            </tr>
                            <tr>
                                <th>状态：</th>
                                <td>
                                    <input type="radio" checked="" name="status" value='1'>新品
                                    <input type="radio" name="status" value='2'>上架
                                    <input type="radio" name="status" value='3'>下架
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                {{csrf_field()}} 
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        SELECT=false;
        SHOP=false;
        PRICE=false;
        STOCK=false; 
        GPIC=false;
        GDESC=false;
        //商品类别
        $("#cate_id").change(function(){
            //$(this)在Ajax里解析不了
            l=$(this);
            //获取分类cid
            m=$(this).val();
            if(m==0){
               $(this).next("span").css("color","red").html("请选择二级分类");
                $(this).addClass("cur");
                SELECT=false; 
            }else{
                //ajax 通过cid获取pid是否为第一级分类
                $.get("/ajax/store/{m}",{m:m},function(data){
                    if(data==1){
                       l.next("span").css("color","red").html("请选择二级分类");
                       SELECT=false; 
                    }else{
                       l.next("span").css("color","green").html("选择正确");
                       SELECT=true;
                    }
                });
            }
        });
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
              // Ajax检测商品名是否已经注册
              $.get("/ajax/create/{m}",{m:m},function(data){
                if(data==1){
                 o.next("span").css("color","red").html("商品名称已经存在");
                 SHOP=false;
                }else{
                o.next("span").css("color","green").html("商品名称可用");
                //清空样式
                o.removeClass("cur");
                //添加样式
                o.addClass("curs");
                SHOP=true;
                }
              });
            }
        });
        $('#price').blur(function(){
            c=$(this).val();
            if(c==0){
                $(this).next("span").css("color","red").html("请填写商品单价");
                PRICE=false;
            }else{
                $(this).next("span").css("color","green").html("选择正确");
                PRICE=true;
            }
        });
        $("#stock").blur(function(){ 
            if($(this).val()==0){
               $(this).next("span").css("color","red").html("请填写库商品存量");
               STOCK=false; 
            }else{
                $(this).next("span").css("color","green").html("选择正确");
                STOCK=true;
            }
        });
        $("#gdesc").blur(function(){ 
            if($(this).val()==''){
               $(this).next("span").css("color","red").html("请填写库商品内容");
               GDESC=false; 
            }else{
                $(this).next("span").css("color","green").html("选择正确");
               GDESC=true;
            }
        });
        $("#myform").submit(function(){
            //判断图片是否有上传
            var f =($("input[name='gpic']").val());
              if(f==''){
                    $("input[name='gpic']").next("span").css("color","red").html("请上传商品图片");
                    GPIC=false;
                }else{
                    $(this).next("span").css("color","green").html("选择正确");
                    GPIC=true;
                 }
            //在每个匹配的元素上触发某类事件
            $("input").trigger("blur");
            $("#gdesc").trigger("blur");
            $("#cate_id").trigger("change");
            if(SELECT && SHOP && PRICE && STOCK && GPIC){
                //提交表单
                return true;
            }else{
                return false;
            }
       });
    </script>
    <!--/main-->
@endsection
