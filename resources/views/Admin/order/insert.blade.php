@extends('Admin.common.default') 
@section('content')
 <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/index">首页</a><span class="crumb-step">&gt;</span><span>订单修改</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="/order/{{$edit->oid}}" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody><tr>
                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>订单号：</th>
                                <td>
                                    <input class="common-text required" id="oid" name="oid" size="50" readonly value="{{$edit->oid}}" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>总金额：</th>
                                <td>
                                    <input class="common-text required" id="total" name="total" size="50" value="{{$edit->total}}" type="number">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>总数量：</th>
                                <td>
                                    <input class="common-text required" id="cnt" name="cnt" size="50" value="{{$edit->cnt}}" type="number">
                                </td>
                            </tr>
                             <tr>
                                <th><i class="require-red">*</i>收货人</th>
                                <td>
                                    <input class="common-text required" id="rec" name="rec" size="50" value="{{$edit->rec}}" type="text"><span></span>
                               
                                </td>
                            </tr>

                             <tr>
                                <th><i class="require-red">*</i>收货地址</th>
                                <td>
                                    <input class="common-text required" id="addr" name="addr" size="50" value="{{$edit->addr}}" type="text"><span></span>
                       
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>联系方式</th>
                                <td>
                                    <input class="common-text required" id="tel" name="tel" size="50" value="{{$edit->tel}}" type="text"><span></span>
                          
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>内容</th>
                                <td>
                                    <textarea name="umsg" id="umsg" cols="70" rows="10">{{$edit->umsg}}</textarea><span></span>
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
    <script type="text/javascript">
        REC=false;
        ADDR=false;
        TEL=false;
        UMSG=false;
        //收货人
        $('#rec').blur(function(){
            m=$(this).val();
            if(m.match(/^[\u4e00-\u9fa5_a-zA-Z0-9]+$/)==null){
                $(this).next("span").css("color","red").html("请不要输入特殊字符");
                $(this).addClass("cur");
                REC=false;
            }else{
                $(this).next("span").css("color","red").html("");
                $(this).addClass("cur");
                REC=true;
            }
        });
        // 收货地址
        $('#addr').blur(function(){
            m=$(this).val();
            if(m.match(/^[\u4e00-\u9fa5_a-zA-Z0-9]+$/)==null){
                $(this).next("span").css("color","red").html("请不要输入特殊字符");
                $(this).addClass("cur");
                ADDR=false;
            }else{
                $(this).next("span").css("color","red").html("");
                $(this).addClass("cur");
                ADDR=true;
            }
        });
        // 收货人地址
        $('#tel').blur(function(){
            m=$(this).val();
            if(m.match(/(?:^1[3456789]|^9[28])\d{9}$/)==null){
                $(this).next("span").css("color","red").html("请输入正确手机号码");
                $(this).addClass("cur");
                TEL=false;
            }else{
                $(this).next("span").css("color","red").html("");
                $(this).addClass("cur");
                TEL=true;
            }
        });
        // 留言
        $('#umsg').blur(function(){
            m=$(this).val();
            if(m.match(/^[\u4e00-\u9fa5_a-zA-Z0-9]+$/)==null){
                $(this).next("span").css("color","red").html("请不要输入特殊字符");
                $(this).addClass("cur");
                UMSG=false;
            }else{
                $(this).next("span").css("color","red").html("");
                $(this).addClass("cur");
                UMSG=true;
            }
        });
        //给form 绑定提交事件
        $("#myform").submit(function(){
        //在每个匹配的元素上触发某类事件
            $("input").trigger("blur");
            $("textarea").trigger("blur");
            if(REC && ADDR && TEL && UMSG){
                //提交表单
                return true;
            }else{
                return false;
            }
       });
    </script>
    <!--/main-->
@endsection