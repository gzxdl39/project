{extend name="common/default"}
{block name="main"}
 <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">作品管理</a><span class="crumb-step">&gt;</span><span>新增作品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            {foreach $orders as $k=>$v}
                            {foreach $v->detail as $kk=>$vv}
                            <table class="result-tab" width="100%">
                        <tr>
                            <th style='width:300px;'>商品名称</th>
                            <th>商品图片</th>
                            <th>购买单价</th>
                            <th>购买数量</th>
                            <th>小计</th>
                        </tr>
                        <tr>
                        
                            <td>{$vv->good->gname}</td>
                            <td><img style='width:50px;' src="{:config('disp_path').$vv->good->gpic}" alt=""></td>
                            <td>{$vv->good->price}</td>
                            <td>{$v->cnt}</td>
                            <td>{$v->total}</td>
                            <tr>
                                
                           {/foreach}
                           {/foreach}
                            <tr>
                                <th></th>
                                <td colspan="5">
                                    <a href="/order/index"><input class="btn btn6" value="返回" type="button"></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
{/block}