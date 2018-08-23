{extend name="common/default"}
{block name="main"}
 <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">作品管理</a><span class="crumb-step">&gt;</span><span>新增作品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="/good/update/{$good->gid}" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody><tr>
                            
                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>商品名称：</th>
                                <td>
                                    <input class="common-text required" id="gname" name="gname" size="50" value="{$good->gname}" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>定价：</th>
                                <td>
                                    <input class="common-text required" id="price" name="price" size="50" value="{$good->price}" type="number">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>库存量：</th>
                                <td>
                                    <input class="common-text required" id="stock" name="stock" size="50" value="{$good->stock}" type="number">
                                </td>
                            </tr>
                             <tr>
                                <th><i class="require-red">*</i>缩略图</th>
                                <td>
                                    <input type='file' name='gpic' value="">
                                    <!--/static/uploads/images/20171111.jpg -->
                                    <img style="width:100px;" src="{:config('app.disp_path')}{$good->gpic}" alt="">
                                </td>
                            </tr>

                             <tr>
                                <th><i class="require-red">*</i>内容</th>
                                <td>
                                    <textarea name="gdesc" id="gdesc" cols="70" rows="10">{$good->gdesc}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>状态：</th>
                                <td>
                                    <input type="radio" 
                                    {if $good->status == 1}checked{/if}

                                    name="status" value='1'>新品
                                    <input type="radio" name="status"

                                    {if $good->status == 2}checked{/if}

                                     value='2'>上架
                                    <input type="radio" name="status" 

                                    {if $good->status == 3}checked{/if}

                                    value='3'>下架
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