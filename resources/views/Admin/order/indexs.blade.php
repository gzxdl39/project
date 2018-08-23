{extend name="common/default"}
{block name="main"}
<!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">作品管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="" method="get">
                  <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="status" id="cate_id" class="required">
                                    <option value="0">请选择</option>
                                     <option value="1">已下单</option>
                                     <option value="2">已发货</option>
                                     <option value="3">已收货</option>
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="rec" value="{if(!empty($rec))}{$rec}{/if}" id="rec" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="insert.html"><i class="icon-font"></i>新增作品</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th>订单号</th>
                            <th>总金额</th>
                            <th>下单时间</th>
                            <th>收货人</th>
                            <th>收货地址</th>
                            <th>总数量</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                       {foreach $goods as $k=>$v}
                        <tr>
                        
                            <td>{$v->oid}</td>
                            <td>{$v->total}</td>
                            <td>{:date('Y-m-d H:i:s',$v->create_at)}</td>
                            <td>{$v->rec}</td>
                            <td>{$v->addr}</td>
                            <td>{$v->cnt}</td>
                            <td>
                                {if $v->status == 1}
                                 已下单
                                {elseif $v->status == 2}
                                 已发货
                                {elseif $v->status == 3}
                                 已收货
                                 {/if}
                            </td>
                           
                            <td>
                                <a class="link-update" href="/order/{$v->oid}/edit">修改</a>
                                 <a class="link-update" href="/order/myorder/{$v->oid}">订单详情</a>
                                  <a class="link-update" href="/order/up/{$v->oid}">发货</a>
                                  <a class="link-update" href="/order/down/{$v->oid}">收货</a>
                                <a class="link-del" onclick="return confirm('您确认要删除吗？')" href="/order/delete/{$v->oid}">删除</a>
                            </td>
                        </tr>
                       {/foreach}
                    </table>
                    <div class="list-page"> </div>
                </div>

            </form>

        </div>
        <div class="list-page"> {$goods->render()|raw}</div>
    </div>
    <!-- /main -->
{/block}