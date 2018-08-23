{extend name="common/default"}
{block name="main"}
  <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">作品管理</span></div>
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
                            <th>分类名称</th>
                            <th>分类父ID</th>
                            <th>分类的路径</th>
                         
                            <th>操作</th>
                        </tr>
                        {foreach $cates as $k=>$v} 
                        <?php
                            $n = substr_count($v->path,',')-1;

                        ?>
                        <tr>
                          
                            <td>{$v->cid}</td>
                            <td>{:str_repeat('&nbsp;',6*$n)}💞💞💞{$v->cname}</td>
                            <td>{$v->pid}</td>
                            <td>{$v->path}</td>
                            <td>
                                <a class="link-update" href="/cate/{$v->cid}/edit">修改</a>
                                <a class="link-del" onclick="return confirm('您确认要删除吗？')" href="/cate/delete/{$v->cid}">删除</a>
                                <a class="link-del" href="/cate/create/{$v->cid}">添加子类</a>
                            </td>
                        </tr>
                        {/foreach}
                       
                    </table>
                    <div class="list-page"> {$cates->render()|raw}</div>
                   
                </div>
            </form>
        </div>
    </div>
    <!--/main-->

{/block}