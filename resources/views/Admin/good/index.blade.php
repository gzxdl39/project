@extends('Admin.common.default') 
@section('content') 
<!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">商品列表</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="/shop" method="get">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="cname" id="cate_id" class="required">
                                    <option value="" selected="selected">
                                        @if($k)
                                        {{$k}}
                                        @else
                                        请选择
                                        @endif
                                    </option>
                                   @foreach($cate as $v)
                                     <option value="{{$v->cname}}">
                                       @if($v->pid == 0) --|{{$v->cname}}
                                       @elseif($v->pid != 0) {{$v->cname}}
                                       @endif
                                    </option> 
                                    @endforeach
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="sgname" value="{{$l}}{{$request['keywords'] or ''}}" id="sgname" type="text"></td>
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
                        <tr>
                        @foreach($shop as $row)
                            <td>{{$row->sgid}}</td>
                            <td>{{$row->sgname}}</td>
                            <td>{{$row->cname}}</td>
                            <td><img style='width:100px;' src="{{$row->gpic}}" alt=""></td>
                            <td>{{$row->price}}</td>
                            <td>{{$row->stock}}</td>
                            <td>{{$row->salecnt}}</td>
                            <td>
                                @if($row->status == 1)
                                 新品
                                @elseif($row->status == 2)
                                 上架
                                @elseif($row->status == 3)
                                 下架
                                 @endif
                            </td>
                            <td>
                                <form action="/shop/{{$row->sgid}}" method="post">
                                {{csrf_field()}}
                                {{method_field("DELETE")}}
                                <a class="btn btn-danger" href="/shop/{{$row->sgid}}/edit">修改</a>
                                 <a class="btn btn-success" href="/shop/up/{{$row->sgid}}">上架</a>
                                 <button class="btn btn-warning del" onclick="return confirm('确定要删除吗？');" >删除</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="list-page">{{$shop->appends($request)->render()}}</div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
@endsection