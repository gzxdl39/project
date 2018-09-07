    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta charset="utf-8"><title>
        订单结算
    </title>
    <link type="text/css" rel="stylesheet" href="/static/xiadan/simplepop.css"><link type="text/css" rel="stylesheet" href="/static/xiadan/common.css"><link type="text/css" rel="stylesheet" href="/static/xiadan/headfoot.css">
    <link type="text/css" rel="stylesheet" href="/static/xiadan/CheckOut.css">
    <link type="text/css" rel="stylesheet" href="/static/xiadan/car.css">
    <script type="text/javascript" async="async" charset="utf-8" src="/static/xiadan/userinfo.php"></script>
    <script type="text/javascript" async="async" charset="utf-8" src="/static/xiadan/zh_cn.js.下载" data-requiremodule="lang"></script>
    <script type="text/javascript" async="async" charset="utf-8" src="/static/xiadan/chat.in.js.下载" data-requiremodule="chatManage"></script>
    <script type="text/javascript" async="async" charset="utf-8" src="/static/xiadan/mqtt31.js.下载" data-requiremodule="MQTT"></script>
    <script type="text/javascript" async="async" charset="utf-8" src="/static/xiadan/mqtt.chat.js.下载" data-requiremodule="Connection"></script>
    </head>

    <body>
    <div id="nTalk_post_hiddenElement" style="left: -10px; top: -10px; visibility: hidden; display: none; width: 1px; height: 1px;"></div>
        <input type="text" style="display: none;">
        <input type="password" style="display: none;">
        <div class="content">
            <div class="contentInner">
                <div class="shoppingProcedure">
                    <span>我的购物车 </span>
                    <span class="current">填写核对订单信息</span>
                    <!-- <span>成功提交订单</span> -->
                </div>
                <div class="shoppingTip">
                    <strong>填写核对订单信息</strong>  
                </div>
                <div class="orderBox">
                    <div class="orderInfo">
                        <div class="consigneeBox">
                            <!--新用户添加地址-->
                            <div class="newUserAddr addr hide"><div class="stepTit clearfix"><strong>收货人信息</strong></div><div class="addressForm"><form class="form"><div class="listInfo consigneeName_box clearfix"><label class="label_w80"><strong>*</strong>收&nbsp;&nbsp;货&nbsp;&nbsp;人：</label><input class="inputW198" type="text" name="consignee" id="consignee_name" onblur="confirmOrder.check_Consignee(&#39;name_div&#39;)"><span class="hide error-msg" id="name_div_error"></span></div><div class="listInfo consigneeAddr_box clearfix" id="area_div"><label class="label_w80"><strong>*</strong>收货地区：</label><select onchange="confirmOrder.Nationchange()" id="J_country" name="country"><option selected="selected" value="中国">中国</option><option value="其他国家">其他国家</option></select><select onchange="confirmOrder.provicechange($(this).val())" name="provice" id="J_provice"><option value="请选择-0" selected="selected">请选择</option><option value="北京-110000">北京</option><option value="天津-120000">天津</option><option value="河北-130000">河北</option><option value="山西-140000">山西</option><option value="内蒙古-150000">内蒙古</option><option value="辽宁-210000">辽宁</option><option value="吉林-220000">吉林</option><option value="黑龙江-230000">黑龙江</option><option value="上海-310000">上海</option><option value="江苏-320000">江苏</option><option value="浙江-330000">浙江</option><option value="安徽-340000">安徽</option><option value="福建-350000">福建</option><option value="江西-360000">江西</option><option value="山东-370000">山东</option><option value="河南-410000">河南</option><option value="湖北-420000">湖北</option><option value="湖南-430000">湖南</option><option value="广东-440000">广东</option><option value="广西-450000">广西</option><option value="海南-460000">海南</option><option value="重庆-500000">重庆</option><option value="四川-510000">四川</option><option value="贵州-520000">贵州</option><option value="云南-530000">云南</option><option value="西藏-540000">西藏</option><option value="陕西-610000">陕西</option><option value="甘肃-620000">甘肃</option><option value="青海-630000">青海</option><option value="宁夏-640000">宁夏</option><option value="新疆-650000">新疆</option><option value="台湾-710000">台湾</option><option value="香港-810000">香港</option><option value="澳门-820000">澳门</option></select><select onchange="confirmOrder.CityChange($(this).val())" id="J_city" name="city"><option value="请选择-0">请选择</option></select><select name="county" id="J_county"><option value="请选择-0">请选择</option></select><span class="error-msg hide message" id="area_div_error"></span><strong>标记"*"为提供货到付款的地区,<a href="http://www.bookschina.com/shopcar/CheckOut.aspx#">了解详情</a></strong></div><div class="listInfo consigneeDetailAddr_box clearfix"><label class="label_w80"><strong>*</strong>详细地址：</label><input class="inputW438" type="text" name="detailAddress" id="consignee_address" onblur="confirmOrder.check_Consignee(&#39;address_div&#39;)"><span class="error-msg hide" id="address_div_error"></span></div><div class="listInfo consigneeZip_box clearfix"><label class="label_w80"><strong>*</strong>邮政编码：</label><input class="inputW198" type="text" name="postCode" id="consignee_postcode" onblur="confirmOrder.check_Consignee(&#39;postcode_div&#39;)"><span class="error-msg hide" id="postcode_div_error"></span></div><div class="listInfo consigneePhone_box clearfix"><label class="label_w80" for=""><strong>*</strong>手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机：</label><input class="inputW198" type="text" name="mobileNum" id="consignee_mobile" onblur="confirmOrder.check_Consignee(&#39;call_phone_div&#39;)"><span class="mlr-10">或</span><label for="">固定电话：</label><input class="inputW138" type="text" name="telephoneNum" id="consignee_phone" onblur="confirmOrder.check_Consignee(&#39;call_phone_div&#39;)"><span class="error-msg hide" id="call_div_error"></span></div><div class="listInfo consigneeSave_box"><button type="button" id="consigneeSaveButton" onclick="confirmOrder.add_address()" data-b="1">确认收货地址</button></div></form></div></div>
                            <!--地址编辑-->
                            <div class="userAddre addre boxhide">
                                <div class="stepTit clearfix">
                                    <strong>收货人信息</strong>
                                    <div class="addNewAddreBox">
                                        <a href="javascript:void(0)" class="J_address_add_btn">新增收货地址</a>
                                    </div>
                                </div>
                                <div class="addr_panel">
                                    <ul>
                                        
                                    </ul>
                                </div>
                                <div class="addr_switch switch-on boxhide">
                                    <a class="more-address J_more_addr" href="javascript:void(0)">更多地址<i class="icon"></i></a>
                                </div>
                                <div class="addr_switch switch-off" style="display: none;">
                                    <a class="more-address J_hide_addr" href="javascript:void(0)">收起地址<i class="icon"></i></a>
                                </div>
                            </div>
                            <!--配送方式-->
                            <div class="shipping_method divhide">
                                <div class="stepTit clearfix">
                                    <strong>送货方式</strong>
                                </div>
                                <div class="shipping_list">
                                    <ul class="clearfix">
                                        <li class="postalShip"><span>邮政快递小包</span><i class="icon"></i><strong class="icon"></strong><div class="shipping_explain"><div class="shipping_explainInner"><b class="icon"></b>运费说明：全国6元/单 满69包邮。<a href="http://www.bookschina.com/question/default3.asp" target="_blank">了解配送费用</a></div></div></li>
                                    </ul>
                                </div>
                                <div class="shipping_region J_shipping_region" data-isnone="0" style="display:none">
                                    <div class="shipping_time clearfix">
                                        <label>送货上门时间：</label>
                                        <select>
                                            <option value="0">时间不限</option><option value="1">周一至周五</option><option value="2">周六日及节假日</option>
                                        </select>
                                    </div>
                                    <div class="shipping_area clearfix" style="display:none">
                                        <label>配送区域：</label><span></span>
                                    </div>
                                </div>
                            </div>
                            <!--支付方式-->
                            <div class="payment_method divhide">
                                <div class="stepTit clearfix">
                                    <strong>支付方式（请在48小时之内支付）</strong>
                                </div>
                                <div class="payment_list">
                                    <ul class="clearfix">
                                        
                                        <li class="online_payment "><span>在线支付</span><strong class="icon"></strong>
                                        </li>
                                        <li class="bank_payment "><span>银行转账</span><i class="icon"></i><strong class="icon"></strong><div class="shipping_explain">
                                            <div class="shipping_explainInner"><b class="icon"></b>请您在办理完付款后，务必与我们联系，告知您的订单号、付款金额、付款日期、收款银行名称，我们会根据您提供的信息为您核实到账情况。</div>
                                        </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--图书清单-->
                            <div class="book_listWrap divhide">
                                <div class="stepTit clearfix">
                                    <strong>图书清单</strong>
                                    <div class="addNewAddreBox">
                                        <a href="http://www.bookschina.com/shopcar/shoppingcart.aspx">返回购物车修改</a>
                                    </div>
                                </div>
                                <div class="book_list">
                                    <div class="book_list_title clearfix">
                                        <div class="book_name_tit"><span>图书名称</span></div>
                                        <div class="list_title book_price_tit"><span>定价</span></div>
                                        <div class="list_title book_sell_tit"><span>优惠价</span></div>
                                        <div class="list_title number_tit"><span>数量</span></div>
                                        <div class="list_title subtotal_tit"><span>小计</span></div>
                                    </div>
                                    <div class="book_list_con">
                                        <ul>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--其他信息-->

                            <div class="otherInfor clearfix divhide">
                                <div class="otherLeft">
                                    <!--优惠劵/书馨卡/账户余额-->
                                    <div class="tabBox">
                                        <div class="tit">
                                            <div class="titClick"><span>优惠劵/书馨卡/账户余额</span><i class="icon"></i></div>
                                        </div>
                                        <div class="virtualCon tabCon">
                                            <div class="tabtabTit"><span class="cur">优惠券</span><span>书馨卡/账户余额</span></div>
                                            <div class="tabContent">
                                                <div class="virtualBox">
                                                    <div class="virtualList"></div>
                                                    <div class="virtualForm">
                                                        <label>优惠券号码：</label>
                                                        <input type="text" id="couponNum" name="couponNum" autocomplete="nope">
                                                        <label>密码：</label>
                                                        <input type="password" id="couponPas" name="couponPas" autocomplete="nope">
                                                        <a id="addquan" href="javascript:void(0)">使用</a>
                                                        <a class="quxiao" id="qxquan" href="javascript:void(0)">取消</a>
                                                    </div>
                                                </div>
                                                <div class="bookcarBox">
                                                    <div class="inputWrap">
                                                        <label>书馨卡号码：</label><input type="text" id="bookcar" name="bookcar" autocomplete="nope"><label>密码：</label><input type="password" id="bookcarPW" name="bookcarPW" autocomplete="nope">
                                                        <a href="javascript:void(0)" id="addka">使用</a>
                                                        <a href="javascript:void(0)" class="quxiao" id="qxka">取消</a>
                                                    </div>
                                                    <div class="inputWrap">
                                                        <label>您的账户余额为<span id="balance">￥0</span> 使用账户余额支付：</label><input type="text" id="yuE" name="yuE" autocomplete="nope">
                                                        <a href="javascript:void(0)" id="addyue">使用</a>
                                                        <a href="javascript:void(0)" class="quxiao" id="qxyue">取消</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--发票-->
                                    <div class="invoiceBox">
                                        <div class="invoice">
                                            <div class="titClick CompanyInfo" data-name="" data-number="" data-efapiao="" data-type="" data-obj="0">
                                                <span>发票信息</span><div class="shuqian"></div>
                                            </div>
                                            <div class="noInvoice"><span>不开具发票</span><a href="javaScript:void(0)" onclick="addInvoice()">添加</a></div>

                                            <div class="haveInvoice" style="display: none;"><span>普通发票</span><span>中国ad是否会就开始疯狂的事</span><span>图书</span> <a href="javascript:void(0)" onclick="modifyInvoice()">修改</a><a href="javascript:void(0)" onclick="deletInvoice()">删除</a></div>
                                        </div>
                                    </div>
                                    <!--备注-->
                                    <div class="remark">
                                        <div class="remarkCon clearfix">
                                            <label>备注：</label><input type="text" value="" placeholder="限40个字 请将购买需求在备注详细说明">
                                        </div>
                                    </div>
                                    <div class="quehuoTIP">
                                        <dl>
                                            <dt>当出现商品缺货时，我的选择是：</dt>
                                            <dd data-value="5"><b class="radio"></b>发有货图书，缺货书款退至我的中图网账户余额</dd>
                                            <dd data-value="7"><b class="radio"></b>电话通知我哪些书缺货，由我来决定是否发货（将因此延迟一天发货）</dd>
                                        </dl>
                                        <div class="tip">（缺货不影响优惠券的使用以及免运费政策，账户余额可下次购书使用或提现）</div>
                                    </div>
                                </div>

                                <div class="otherRight divhide">
                                    <div class="money_list">
                                        <p class="clearfix" data-zongdj="0"><span id="sptotal">￥0.0</span>商品金额总计：</p>
                                        <p class="clearfix"><span id="spdiscount">-￥0.0</span>活动优惠：</p>
                                        <p class="clearfix"><span id="spshipping">￥0.0</span>运费：</p>
                                        <p class="clearfix"><span id="spBooksCard">-￥0</span>书馨卡：</p>
                                        <p class="clearfix"><span id="spProductCoupon">-￥0</span>优惠券：</p>
                                        <p class="clearfix"><span id="spShipBalance">-￥0</span>账户余额：</p>
                                        <p class="clearfix"><span id="">￥0.0</span>节省了：</p>
                                    </div>
                                    <div class="submit_wrap">
                                        <div class="total_pay clearfix"><span>￥<b id="spPayMoneys" data-p="0.0">0.0</b></span>您还需支付：</div>
                                        <button class="submi_btn">提交订单</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="/static/xiadan/hm.js.下载"></script><script src="/static/xiadan/hm.js.下载"></script><script>var _hmt = _hmt || [];    (function () {        var hm = document.createElement("script");        hm.src = "//hm.baidu.com/hm.js?6993f0ad5f90f4e1a0e6b2d471ca113a";        var s = document.getElementsByTagName("script")[0];        s.parentNode.insertBefore(hm, s);    })();</script>
    <script type="text/javascript" src="/static/xiadan/jquery-1.8.3.min.js.下载"></script>
       <div class="cusSer">
            <div class="cusSerIn">
                <a class="slide_min" onclick="NTKF.im_openInPageChat(&#39;kf_9067_1501484109259&#39;)">在线客服</a>
            </div>
        </div>
    <!--     <script language="javascript" type="text/javascript">
            NTKF_PARAM = {
                siteid: "kf_9067",                   //企业ID，为固定值，必填
                settingid: "kf_9067_1501484109259",  //接待组ID，为固定值，必填
                uid: "",                         //用户ID，未登录可以为空，但不能给null，uid赋予的值在显示到小能客户端上
                uname: "",           //用户名，未登录可以为空，但不能给null，uname赋予的值显示到小能客户端上
                isvip: "0",                           //是否为vip用户，0代表非会员，1代表会员，取值显示到小能客户端上
                userlevel: "1",                      //网站自定义会员级别，0-N，可根据选择判断，取值显示到小能客户端上
                erpparam: "abc",                      //erpparam为erp功能的扩展字段，可选，购买erp功能后用于erp功能集成
                ntalkerparam: {
                category: "每周专题",    //分类名称，多分类可以用分号(;)分隔， 长路径父子间用冒号(:)分割
                brand: ""             //品牌名称，多品牌可以用分号(;)分隔
                }
            }
        </script> -->
        <script type="text/javascript" src="/static/xiadan/ntkfstat.js.下载" charset="utf-8"></script>
    <div style="display:none">
        <script>
        var _hmt = _hmt || [];
        (function () {
            var hm = document.createElement("script");
            hm.src = "//hm.baidu.com/hm.js?6993f0ad5f90f4e1a0e6b2d471ca113a";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
        </script>
    </div>
        <script src="/static/xiadan/jquery.min.js.下载" type="text/javascript"></script>
        <script src="/static/xiadan/simplepop.js.下载" type="text/javascript"></script>
        <script src="/static/xiadan/jsHelper.js.下载" type="text/javascript"></script>
        <script type="text/javascript" src="/static/xiadan/logintop.js.下载"></script>
        <script type="text/javascript">javascript: logincommon();</script>
        <script type="text/javascript" src="/static/xiadan/cityData.js.下载"></script>
        <script type="text/javascript" src="/static/xiadan/CheckOut.js.下载"></script>
    </body>
    </html>