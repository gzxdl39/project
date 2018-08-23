{extend name="common/default"}
{block name="main"}
<!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">作品管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="/good/index" method="get">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="cate_id" id="cate_id" class="required">
                                    <option value="0">请选择</option>
                                    {foreach $cates as $k=>$v}
                                    <?php
                                        $n = substr_count($v->path,',')-1; 
                                     ?>
                                     <option
                                          
                                         value="{$v->cid}">{:str_repeat('&nbsp;',4*$n)}💞💞💞{$v->cname}</option>
                                         
                                    {/foreach}
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="gname" value="{if(!empty($gname))}{$gname}{/if}" id="gname" type="text"></td>
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
                            <th>ID</th>
                            <th style='width:250px;'>商品名称</th>
                            <th >分类名称</th>
                            <th>商品图片</th>
                            <th>商品定价</th>
                            <th>库存</th>
                            <th>销量</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        {foreach $goods as $k=>$v}
                        <tr>
                        
                            <td>{$v->gid}</td>
                            <td>{$v->gname}</td>
                            <td>{$v->cate->cname}</td>
                            <td><img style='width:100px;' src="{:config('app.disp_path')}{$v->gpic}" alt=""></td>
                            <td>{$v->price}</td>
                            <td>{$v->stock}</td>
                            <td>{$v->salecnt}</td>
                            <td>
                                {if $v->status == 1}
                                 新品
                                {elseif $v->status == 2}
                                 上架
                                {elseif $v->status == 3}
                                 下架
                                 {/if}
                            </td>
                           
                            <td>
                                <a class="link-update" href="/good/{$v->gid}/edit">修改</a>
                                 <a class="link-update" href="/good/up/{$v->gid}">上架</a>
                                  <a class="link-update" href="/good/down/{$v->gid}">下架</a>
                                <a class="link-del" onclick="return confirm('您确认要删除吗？')" href="/good/delete/{$v->gid}">删除</a>
                            </td>
                        </tr>
                      {/foreach}
                    </table>
                    <div class="list-page"> {$goods->render()|raw}</div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
{/block}