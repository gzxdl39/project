{extend name="common/default"}
{block name="main"}
 <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">作品管理</a><span class="crumb-step">&gt;</span><span>新增作品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="/cate/save?id=" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody><tr>
                            <th width="120"><i class="require-red">*</i>父级分类：</th>
                            <td>


                                <select name="pid" id="pid" class="required">
                                    <option value="0">请选择</option>
                                    {foreach $cates as $k=>$v}
                                    <?php
                                    
                                        $n = substr_count($v->path,',')-1;
                                        
                                     ?>
                                        <option
                                           {if $v->cid == $cid}selected{/if}

                                         value="{$v->cid}">{:str_repeat('&nbsp;',4*$n)}💞💞💞{$v->cname}</option>
                                    {/foreach}
                                </select>
                            </td>
                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>分类名称：</th>
                                <td>
                                    <input class="common-text required" id="cname" name="cname" size="50" value="" type="text">
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