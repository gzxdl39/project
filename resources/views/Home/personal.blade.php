<html>
<title>
    用户中心--Book Store
</title><link href="/static/personal/layer.css" rel="stylesheet"><link rel="stylesheet" href="/static/personal/books.css" type="text/css"><link rel="stylesheet" href="/static/personal/css.css" type="text/css">

    <script src="/static/personal/hm.js"></script><script type="text/javascript">
        function checkSuggestion() {
            if (document.getElementById("txtSuggestion").value.length == 0) {
                alert("请输入意见与建议的内容！");
                return false;
            }
        }
    </script>
<script type="text/javascript" async="async" charset="utf-8" src="/static/personal/userinfo.php"></script><script type="text/javascript" async="async" charset="utf-8" src="/static/personal/zh_cn.js" data-requiremodule="lang"></script><script type="text/javascript" async="async" charset="utf-8" src="/static/personal/chat.in.js" data-requiremodule="chatManage"></script><script type="text/javascript" async="async" charset="utf-8" src="/static/personal/mqtt31.js" data-requiremodule="MQTT"></script><script type="text/javascript" async="async" charset="utf-8" src="/static/personal/mqtt.chat.js" data-requiremodule="Connection"></script></head>
<body><div id="nTalk_post_hiddenElement" style="left: -10px; top: -10px; visibility: hidden; display: none; width: 1px; height: 1px;"></div>
    
<link type="text/css" rel="stylesheet" href="/static/personal/book.css">
<link type="text/css" rel="stylesheet" href="/static/personal/common2.css">
<script type="text/javascript" src="/static/personal/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/static/personal/autocomplete.js"></script>
<script type="text/javascript" src="/static/personal/logintop.js"></script>

<!--顶部工具栏-->
<!-- <div class="topBar">
    <div class="w1200 clearfix">
        <!-登入 注册-->
        <div class="loginArea"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;欢迎光临Book Store</b><a href="" target="_self" class="userCenter"></a><a href="javascript:void(0)" class="userExit" onclick="loginoutcommon();">[安全退出]</a></div>

<script type="text/javascript" src="/static/personal/logintop.js"></script>
<script type="text/javascript"> $(document).ready(function () { javascript: isLoging(); }) </script>
<script type="text/javascript">

</script><div id="bigAutocompleteContent" class="bigautocomplete-layout"></div>

    <form method="post" action="http://www.bookschina.com/vieworder/default.aspx" id="form1">
<div class="aspNetHidden">
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKMTQ1ODMzMzQ4Nw9kFgICAg9kFhYCAQ8WAh4EVGV4dAUnPGltZyBzcmM9Ii9WaWV3T3JkZXIvaW1hZ2VzL3VzZXJtLmpwZyI+ZAICDxYCHwAFD3p0d18xNTg4NmphaDAwMWQCAw8WAh8ABQExZAIEDxYCHwAFMOWGjea2iOi0ue+/pTIwMOWFg++8jOWwseS8muaIkOS4uuS6jOaYn+e6p+S8muWRmGQCBQ8WAh8ABQQwLjAwZAIGDxYCHwAFATBkAgcPFgIfAAUBMGQCCA8WAh8ABQEwZAIJDxYCHwAFATBkAgoPFgIfAAUBMGQCCw8WAh4LXyFJdGVtQ291bnQCBBYIZg9kFgZmDxUCBzY2NDA1NTgi5Z+O5Y2X5pen5LqLLeetvuWQjeaJi+eov+WFuOiXj+eJiGQCAQ8PFgQeB1Rvb2xUaXAFIuWfjuWNl+aXp+S6iy3nrb7lkI3miYvnqL/lhbjol4/niYgeCEltYWdlVXJsBThodHRwOi8vaW1hZ2UxMi5ib29rc2NoaW5hLmNvbS8yMDE0LzIwMTQwODI2L3o2NjQwNTU4LmpwZ2RkAgIPFQQHNjY0MDU1OCLln47ljZfml6fkuost562+5ZCN5omL56i/5YW46JeP54mIBDIyLjADNy4wZAIBD2QWBmYPFQIHNzAwMDA0Mgzkurrpl7TlpLHmoLxkAgEPDxYEHwIFDOS6uumXtOWkseagvB8DBThodHRwOi8vaW1hZ2UxMi5ib29rc2NoaW5hLmNvbS8yMDE1LzIwMTUwNTE0L3o3MDAwMDQyLmpwZ2RkAgIPFQQHNzAwMDA0Mgzkurrpl7TlpLHmoLwEMjUuMAQxMS44ZAICD2QWBmYPFQIHNDY0MzMyNBnnuqLmpbzljLvkuost6Zey5pqH5Lib5LmmZAIBDw8WBB8CBRnnuqLmpbzljLvkuost6Zey5pqH5Lib5LmmHwMFNWh0dHA6Ly9pbWFnZTMxLmJvb2tzY2hpbmEuY29tLzIwMTgvenVvLzgvejQ2NDMzMjQuanBnZGQCAg8VBAc0NjQzMzI0Gee6oualvOWMu+S6iy3pl7LmmofkuJvkuaYDNy44AzMuNGQCAw9kFgZmDxUCBzcxODc2MDAV5aSn5aW95rKz5bGx5Y+v6aqR6am0ZAIBDw8WBB8CBRXlpKflpb3msrPlsbHlj6/pqpHpqbQfAwU4aHR0cDovL2ltYWdlMTIuYm9va3NjaGluYS5jb20vMjAxNi8yMDE2MDUyNi96NzE4NzYwMC5qcGdkZAICDxUEBzcxODc2MDAV5aSn5aW95rKz5bGx5Y+v6aqR6am0BDM5LjUEMTkuOGRkgZaaEiRTSk06BYsIc5Y/N3hJYhzn0vn/FaAmliiumN4=">
</div>

<div class="aspNetHidden">

    <input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="B4256543">
    <input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEdAAMW+JGb8NHqRd5RzfZFzmyxSj1J8GIpOBQrWopoMDZSuTzmltaUM7aEAN+g9cP/m11yVN6cNl+/3EhoOeknpiTrlUzjoqDKluj0dr8DdbQexw==">
</div>
        <div class="FrameworkView">
            <!-- 左侧栏目开始 -->
            
<div class="AccountlistorderL">
<div class="Accountlistorder">
<ul>
<li class="Ttopnone"><a href="http://www.bookschina.com/ViewOrder/default.aspx"><span class="order">个人中心</span></a></li><br>
<br>
<li class="T">订单管理</li><br>
<li><a href="">我的订单</a></li>
<li><a href="">收货地址</a></li>
<li><a href="">退换货管理</a></li>
<li><a href="">我的收藏夹</a></li><br>
<li class="T">个人信息</li><br>
<li><a href="/information">编辑个人资料</a></li>
<li><a href="">邮箱找回密码</a></li><br>

<li class="Tnone"><a href="" style="font-weight:bold;">退出登录</a></li>
</ul>
</div>
</div>
            &nbsp;<!-- 左侧栏目结束 --><!-- 中间栏目开始 --><div class="Mposition">
                <div class="PersonalAccount">
                    <div class="Useravatar">
                        <img src="/static/personal/moneysmall.jpg">
                        <br>
                        用户头像
                    </div>
                    <div class="AccountView">

                        <div class="UsernameView">
                            <span class="orderTB">欢迎，</span>
                        </div>
                        <div class="itemlistL" style="width: 470px;">
                            <ul>
                                <li>账户余额：<span class="ordermoney">￥0.00</span></li>
                                
                            </ul>
                        </div>


                        <div class="itemlistL" style="width: 470px;">

                        </div>


                        <div class="WarnFramework">
                            <div class="warn">
                            
                            </div>
                        </div>

                    </div>
                </div>
                <div style="float: left; width: 600px;">
                    <div class="Alternative">
                        <span class="orderTB">猜您可能会喜欢</span>
                    </div>
                    <div class="Recommendedbooks">
                        
                                <div class="Frameworkpic">
                                    <div style="height: 140px;">
                                        <a href="http://www.bookschina.com/6640558.htm" target="_blank" title="城南旧事-签名手稿典藏版">
                                            <img id="rptRecommendedbooks_book_cover_0" title="城南旧事-签名手稿典藏版" src="/static/personal/z6640558.jpg"></a>
                                    </div>
                                    <div>
                                        <a href="http://www.bookschina.com/6640558.htm" target="_blank">城南旧事-签名手稿典藏版</a>
                                    </div>
                                    <div>
                                        <span class="Crossprice">￥22.0</span> <span class="Ask">￥7.0</span>
                                    </div>
                                </div>
                            
                                <div class="Frameworkpic">
                                    <div style="height: 140px;">
                                        <a href="http://www.bookschina.com/7000042.htm" target="_blank" title="人间失格">
                                            <img id="rptRecommendedbooks_book_cover_1" title="人间失格" src="/static/personal/z7000042.jpg"></a>
                                    </div>
                                    <div>
                                        <a href="http://www.bookschina.com/7000042.htm" target="_blank">人间失格</a>
                                    </div>
                                    <div>
                                        <span class="Crossprice">￥25.0</span> <span class="Ask">￥11.8</span>
                                    </div>
                                </div>
                            
                                <div class="Frameworkpic">
                                    <div style="height: 140px;">
                                        <a href="http://www.bookschina.com/4643324.htm" target="_blank" title="红楼医事-闲暇丛书">
                                            <img id="rptRecommendedbooks_book_cover_2" title="红楼医事-闲暇丛书" src="/static/personal/z4643324.jpg"></a>
                                    </div>
                                    <div>
                                        <a href="http://www.bookschina.com/4643324.htm" target="_blank">红楼医事-闲暇丛书</a>
                                    </div>
                                    <div>
                                        <span class="Crossprice">￥7.8</span> <span class="Ask">￥3.4</span>
                                    </div>
                                </div>
                            
                                <div class="Frameworkpic">
                                    <div style="height: 140px;">
                                        <a href="http://www.bookschina.com/7187600.htm" target="_blank" title="大好河山可骑驴">
                                            <img id="rptRecommendedbooks_book_cover_3" title="大好河山可骑驴" src="/static/personal/z7187600.jpg"></a>
                                    </div>
                                    <div>
                                        <a href="http://www.bookschina.com/7187600.htm" target="_blank">大好河山可骑驴</a>
                                    </div>
                                    <div>
                                        <span class="Crossprice">￥39.5</span> <span class="Ask">￥19.8</span>
                                    </div>
                                </div>
                            
                    </div>
                </div>
            </div>
            <!-- 中间栏目结束 -->
            <!-- 右侧栏目开始 -->
            <div class="AccountlistorderR">

                <div class="signWrap ">

                    <div class="signBtnWrap">
                        <div class="signBtn">
                            <a href="javascript:void(0)">签到送积分</a>
                        </div>
                        <div class="signRuleText">
                            <span>连续签到7天奖励20积分</span>
                        </div>
                    </div>

                    <div class="signRecord">
                        <ul id="ulCalendar">
                            
                            <li class="NoSign">
                                <span class="getIntegral">+5</span>
                                <span class="signDate">08.27</span>
                            </li>
                            
                            <li class="NoSign">
                                <span class="getIntegral">+5</span>
                                <span class="signDate">08.28</span>
                            </li>
                            
                            <li class="NoSign">
                                <span class="getIntegral">+5</span>
                                <span class="signDate">08.29</span>
                            </li>
                            
                            <li class="NoSign">
                                <span class="getIntegral">+5</span>
                                <span class="signDate">08.30</span>
                            </li>
                            
                            <li class="NoSign">
                                <span class="getIntegral">+5</span>
                                <span class="signDate">08.31</span>
                            </li>
                            
                            <li class="NoSign">
                                <span class="getIntegral">+5</span>
                                <span class="signDate">09.01</span>
                            </li>
                            
                            <li class="NoSign">
                                <span class="getIntegral">+20</span>
                                <span class="signDate">09.02</span>
                            </li>
                            
                        </ul>
                    </div>
                </div>

                <div class="NoticeView">
                    <h1>公告</h1>
                    <ul>

<li>・<a href="http://www.bookschina.com/Subject/newDonate.aspx" target="_blank">王凯影迷15吨公益捐书接力</a></li>
<li>・<a href="http://www.bookschina.com/ADService/bookshr.asp" target="_blank">中国图书网诚聘英才</a></li>
<li><a href="http://weibo.com/bookschina" target="_blank" title="新浪微博">・关注我们的官方微博：<img src="/static/personal/sina.ico"></a></li>
</ul>
                </div>
                <div class="sort">
                    <ul>
                        <li class="Bline">热门图书</li>
                        <li><a class="books-this" href="http://www.bookschina.com/books/congshu/default.aspx?book_id=4274428" target="_blank">阿加莎・克里斯蒂推理小说</a></li>
<li><a class="books-this" href="http://www.bookschina.com/books/congshu/default.aspx?book_id=5718430" target="_blank">彩书坊珍藏版少儿图书</a></li>
<li><a class="books-this" href="http://www.bookschina.com/books/congshu/default.aspx?book_id=3344817" target="_blank">西方绘画大师系列</a></li>
<li><a class="books-this" href="http://www.bookschina.com/books/congshu/default.aspx?book_id=4493108" target="_blank">诺奖得主略萨作品系列</a></li>

                    </ul>
                </div>
       
            </div>
            <!-- 右侧栏目结束 -->
        </div>
    </form>


    <div class="layui-layer-shade" id="layui-layer-shade1" style="z-index: 19891014; background-color: #000; opacity: 0.3; filter: Alpha(opacity=50);"></div>
    <div class="layui-layer layui-layer-page" id="layui-layer1" style="z-index: 19891015; width: 560px; top: 25%; left: 50%; margin-left: -280px;">
        <div id="" class="layui-layer-content">
            <div id="signPopWrap">
                <div class="signPopWrap">
                    <div class="signTit">
                        <div class="signGet">
                            <span id="spanNotice">签到成功，奖励积分</span>
                        </div>
                        <!--翻牌-->
                        <div class="flopTIt">
                            <span>翻翻书 抽抽奖</span>
                        </div>
                    </div>
                    <div class="flopCon">
                        <ul id="ulSignIn">
                            
                            <li class="flopItem ">
                                
                                <div class="bookCover" id="cover0">
                                    <img src="/static/personal/B6588971.jpg" alt="">
                                </div>
                                
                            </li>
                            
                            <li class="flopItem ">
                                
                                <div class="bookCover" id="cover1">
                                    <img src="/static/personal/B7568012.jpg" alt="">
                                </div>
                                
                            </li>
                            
                            <li class="flopItem ">
                                
                                <div class="bookCover" id="cover2">
                                    <img src="/static/personal/B5330672.jpg" alt="">
                                </div>
                                
                            </li>
                            
                            <li class="flopItem ">
                                
                                <div class="bookCover" id="cover3">
                                    <img src="/static/personal/B7738264.jpg" alt="">
                                </div>
                                
                            </li>
                            
                            <li class="flopItem ">
                                
                                <div class="bookCover" id="cover4">
                                    <img src="/static/personal/B5196782.jpg" alt="">
                                </div>
                                
                            </li>
                            
                            <li class="flopItem ">
                                
                                <div class="bookCover" id="cover5">
                                    <img src="/static/personal/B6982215.jpg" alt="">
                                </div>
                                
                            </li>
                            
                        </ul>
                        <div class="popPrize" id="popPrize">
                            <div class="popPrizeCover">
                                <img src="/static/personal/qiandaoxianjinquan.jpg" id="imgShowSignImg" alt="">
                            </div>

                            <div class="popPrizeText">
                                <span id="spanShowSignTitle"></span>
                            </div>

                        </div>
                        <div class="porzePopMask"></div>
                    </div>
                    <div class="qiandaoNotice">
                        <dl class="txtMarquee-top">
                            <dt></dt>
                            <dd class="bd">
                                <div class="bdInner">
                                    <div class="tempWrap" style="overflow:hidden; position:relative; height:32px"><ul style="height: 160px; position: relative; padding: 0px; margin: 0px; top: -96px;"><li class="clone" style="height: 32px;"><a href="http://www.bookschina.com/Subject/180813child.aspx" target="_blank">暑假童乐惠：精品童书3本折上8折！</a></li>
                                        
                                        <li style="height: 32px;"><a href="http://www.bookschina.com/Subject/180815dzj.aspx" target="_blank">818读者节第三波：采销大推荐，每满99立减30，可叠加用券！</a></li>
                                        
                                        <li style="height: 32px;"><a href="http://www.bookschina.com/Subject/180813zs.aspx" target="_blank">818读者节之追书地图：5折封顶2本折上9折，叠加用全场5折以下优惠券！</a></li>
                                        
                                        <li style="height: 32px;"><a href="http://www.bookschina.com/Subject/180813child.aspx" target="_blank">暑假童乐惠：精品童书3本折上8折！</a></li>
                                        
                                    <li class="clone" style="height: 32px;"><a href="http://www.bookschina.com/Subject/180815dzj.aspx" target="_blank">818读者节第三波：采销大推荐，每满99立减30，可叠加用券！</a></li></ul></div>
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <span class="layui-layer-setwin"><a class="layui-layer-ico layui-layer-close layui-layer-close2" href="javascript:;"></a></span>
        </div>
    </div>
    <input type="hidden" id="hidIsSignIn" value="False">
    <input type="hidden" id="hidIsNotChouJiang" value="True">
    <script src="/static/personal/jquery.SuperSlide.2.1.2.js" type="text/javascript"></script>
    <script type="text/javascript">
  </script>
    <div class="clear"></div> 
  <script type="text/javascript" src="/static/personal/jquery-1.8.3.min.js"></script>
    <select id="cid">
        <option value="" class="ss">--请选择---</option>
    </select>
 </body>
<script type="text/javascript">
       //第一级数据使用ajax
        $.ajax({
            //url地址
            url:'/city',
            //请求方式
            type:'get',
            // 获取upid下标值
            data:{upid:0},
            //异步处理
            async:true,
            dataType:'json',//返回响应数据类型
            //Ajax 响应成功匿名函数
            success:
            // 数据
            function(data){
                //遍历
                for(var i=0;i<data.length;i++){
                    $(".ss").attr("disabled",true);
                    //存储在option
                    option='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    //把带有数据的option内部插入到第一个select
                    $("#cid").append(option);
                }
            },
            //Ajax 响应失败
            error:
            function(){
                alert("Ajax响应失败");
            }
        });

        //获取其他三级数据 
        $("select").live("change",function(){
            //移除元素
            $(this).nextAll("select").remove();
            // alert($(this).val());
            o=$(this);
            //获取子级的upid
            upid=$(this).val();
            // alert(upid);
            $.ajax({
            url:'/city',//url地址
            type:'get',//请求方式
            data:{upid:upid},
            async:true,//异步处理
            //Ajax 响应成功匿名函数
            success:
            function(data){
                //创建select
                select=$("<select></select>");
                //内部插入option
                select.append('<option value="" class="mm">--请选择--</option>');
                // alert(data);
                //判断
                if(data.length>0){
                    //遍历
                    for(var i=0;i<data.length;i++){
                        // alert(data[i].name);
                        //存储在option
                        option='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                        // alert(option);
                        // 把带有数据的option内部插入到创建好的select
                        select.append(option);
                    }
                    //把创建好的select 追加到前一个select后
                    o.after(select);
                    //禁用其他级别 请选择
                    $(".mm").attr("disabled",true);
                }

            },
            //Ajax 响应失败的匿名函数
            error:
            function(){
                alert("Ajax响应失败");
            }
        });
        });
</script>
</html>