{extend name="common/default"}
{block name="main"}
 <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">作品管理</a><span class="crumb-step">&gt;</span><span>新增作品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="/order/update/{$good->oid}" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody><tr>
                           
                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>订单号：</th>
                                <td>
                                    <input class="common-text required" id="oid" name="oid" size="50" value="{$good->oid}" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>总金额：</th>
                                <td>
                                    <input class="common-text required" id="total" name="total" size="50" value="{$good->total}" type="number">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>总数量：</th>
                                <td>
                                    <input class="common-text required" id="cnt" name="cnt" size="50" value="{$good->cnt}" type="number">
                                </td>
                            </tr>
                             <tr>
                                <th><i class="require-red">*</i>收货人</th>
                                <td>
                                    <input class="common-text required" id="rec" name="rec" size="50" value="{$good->rec}" type="text">
                               
                                </td>
                            </tr>

                             <tr>
                                <th><i class="require-red">*</i>收货地址</th>
                                <td>
                                    <input class="common-text required" id="addr" name="addr" size="50" value="{$good->addr}" type="text">
                       
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>联系方式</th>
                                <td>
                                    <input class="common-text required" id="tel" name="tel" size="50" value="{$good->tel}" type="text">
                          
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>内容</th>
                                <td>
                                    <textarea name="umsg" id="umsg" cols="70" rows="10">{$good->umsg}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <th></th>
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
    <!--/main-->
{/block}