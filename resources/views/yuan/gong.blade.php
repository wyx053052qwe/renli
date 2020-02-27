<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>layuiAdmin 内容系统 - 文章列表</title>
    <meta name="renderer" content="webkit">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="../../../layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="../../../layuiadmin/style/admin.css" media="all">
    <script type="text/javascript" src="../../../layuiadmin/layui/layui.js"></script>
</head>
<style type="text/css">
    #test1{
        text-align:center;
    }
    .pull-right {
        /*float: left!important;*/
    }
    .pagination {
        display: inline-block;
        padding-left: 0;
        margin: 20px 0;
        border-radius: 4px;
    }
    .pagination > li {
        display: inline;
    }
    .pagination > li > a,
    .pagination > li > span {
        position: relative;
        float: left;
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #428bca;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
    }
    .pagination > li:first-child > a,
    .pagination > li:first-child > span {
        margin-left: 0;
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }
    .pagination > li:last-child > a,
    .pagination > li:last-child > span {
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }
    .pagination > li > a:hover,
    .pagination > li > span:hover,
    .pagination > li > a:focus,
    .pagination > li > span:focus {
        color: #2a6496;
        background-color: #eee;
        border-color: #ddd;
    }
    .pagination > .active > a,
    .pagination > .active > span,
    .pagination > .active > a:hover,
    .pagination > .active > span:hover,
    .pagination > .active > a:focus,
    .pagination > .active > span:focus {
        z-index: 2;
        color: #fff;
        cursor: default;
        background-color: #428bca;
        border-color: #428bca;
    }
    .pagination > .disabled > span,
    .pagination > .disabled > span:hover,
    .pagination > .disabled > span:focus,
    .pagination > .disabled > a,
    .pagination > .disabled > a:hover,
    .pagination > .disabled > a:focus {
        color: #777;
        cursor: not-allowed;
        background-color: #fff;
        border-color: #ddd;
    }
    .clear{
        clear: both;
    }
</style>
<body>
<form action="{{url('yuan/gong')}}" method="get" id="form" >
    <div class="layui-inline">
        <label class="layui-form-label">姓名</label>
        <div class="layui-input-inline" style="width: 200px;">
            <input type="text" name="name"  value="{{$name}}" class="layui-input">
        </div>
    </div>
    <div class="layui-inline">
        <label class="layui-form-label">公积金账号</label>
        <div class="layui-input-inline" style="width: 200px;">
            <input type="text" name="a_account" value="{{$a_account}}" class="layui-input">
        </div>
    </div>
    <div class="layui-inline">
        <label class="layui-form-label">银行卡号</label>
        <div class="layui-input-inline" style="width: 200px;">
            <input type="text" name="a_id_card" value="{{$a_id_card}}" class="layui-input">
        </div>
    </div>

    <button class="layui-btn" lay-submit lay-filter="formDemo">搜索</button>


</form>
<table class="layui-table">
    <colgroup>
    </colgroup>
    <tr>
        <th>序号</th>
        <th>姓名</th>
        <th>公积金账号</th>
        <th>个人缴存基数</th>
        <th>个人月缴存额</th>
        <th>单位月缴存额</th>
        <th>月缴存额</th>
        <th>银行卡开户行</th>
        <th>银行卡号</th>
        <th>是否转户</th>
        <th>操作</th>
    </tr>
    @foreach($data as $d)
    <tr>
        <td>{{$d->a_id}}</td>
        <td>{{$d->u_name}}</td>
        <td>{{$d->a_account}}</td>
        <td>{{$d->a_personal}}</td>
        <td>{{$d->a_amount}}</td>
        <td>{{$d->a_month}}</td>
        <td>{{$d->a_month_personal}}</td>
        <td>{{$d->a_open}}</td>
        <td>{{$d->a_id_card}}</td>
        <td>
            @if($d->a_zhuanhu == 1) 否
                @else 是
                @endif
        </td>
        <td>
            <div class="layui-btn-group">
                <button type="button" class="layui-btn layui-btn-sm">
                    <i class="layui-icon  update">&#xe642;</i>
                </button>
            </div>
        </td>
    </tr>
        @endforeach
</table>
<div id="test1">
    {{$data->links()}}
</div>
<script src="../../../layuiadmin/layui/layui.js"></script>
<script>
    layui.config({
        base: '../../../layuiadmin/' //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['index', 'contlist', 'table','jquery', 'layer', 'upload', 'excel', 'laytpl', 'element', 'code'], function() {
        var table = layui.table
            , form = layui.form
            , layer = layui.layer
            , upload = layui.upload
            , excel = layui.excel
            , laytpl = layui.laytpl
            , element = layui.element;

        //监听搜索
        form.on('submit(LAY-app-contlist-search)', function (data) {
            var field = data.field;

            //执行重载
            table.reload('LAY-app-content-list', {
                where: field
            });
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

</script>
</body>
</html>
