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
    <script type="text/javascript">
        layui.config({
            base: 'layui_exts/'
        }).extend({
            excel: 'excel'
        });
    </script>
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
    .clear {
        clear: both;
    }
    .block {
        float: left;
    }
    .sss {
        float: left;
        margin-left: 20px;
    }

</style>
<body>
<table class="layui-table">
    <tr>
        <td><input type="checkbox" class="checkbox">全选</td>
        <td>服务名称</td>
        <td>年套餐</td>
        <td>半年套餐</td>
        <td>季套餐</td>
        <td>月套餐</td>
        <td>操作</td>
    </tr>
    @foreach($data as $k=>$d)
    <tr>
    <tr s_id="{{$d->s_id}}">
        <td>
            <input type="checkbox" class="fu" >
            {{$d->s_id}}
        </td>
        <td>
            @if($d->type == 1) 社保
            @else 公积金
            @endif
        </td>
        <td>原价：{{$nian[$k]->yuan}}元 现价：{{$nian[$k]->xian}}元</td>
        <td>原价：{{$ban[$k]->yuan}}元 现价：{{$ban[$k]->xian}}元</td>
        <td>原价：{{$ji[$k]->yuan}}元 现价：{{$ji[$k]->xian}}元</td>
        <td>原价：{{$yue[$k]->yuan}}元 现价：{{$yue[$k]->xian}}元</td>
        <td><div class="layui-btn-group">
                <button type="button" class="layui-btn layui-btn-sm">
                    <i class="layui-icon  update">&#xe642;</i>
                </button>
                <button type="button" class="layui-btn layui-btn-sm">
                    <i class="layui-icon  del">&#xe640;</i>
                </button>
            </div></td>
    </tr>
    @endforeach
</table>
<div>
    <button class="layui-btn dels" lay-submit lay-filter="formDemo">批量删除</button>
</div>
<div id="test1">
    {{$data->links()}}
</div>

    <script src="../../../layuiadmin/layui/layui.js"></script>
    <script>
        layui.config({
            base: '../../../layuiadmin/' //静态资源所在路径
        }).extend({
            index: 'lib/index' //主入口模块
        }).use(['index', 'contlist', 'table','jquery', 'layer', 'upload', 'excel', 'laytpl', 'element', 'code','laypage'], function(){
            var table = layui.table
                ,form = layui.form
                ,layer = layui.layer
                ,excel = layui.excel
                ,laytpl = layui.laytpl
                ,element = layui.element

            //监听搜索
            form.on('submit(LAY-app-contlist-search)', function(data){
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


//全选
            $(document).on('click', ".checkbox",function(){
                if($(this).prop('checked')){
                    $('.fu').each(function(){
                        $('.fu').prop('checked',true);
                    });
                }else{
                    $('.fu').each(function(){
                        $('.fu').prop('checked',false);
                    });
                }
            });
            //删除
            $(document).on('click','.del',function(){
                var s_id = $(this).parents('td').parent('tr').attr('s_id');
                $.ajax({
                    url:"/shop/delete",
                    method: "post",
                    data:{s_id:s_id},
                    dataType:"json",
                    success:function(res){
                        if(res.code==2){
                            layer.alert(res.message,{icon:1,time:6000});
                            setTimeout(function(){
                                window.location.reload();//刷新当前页面.
                            },1000)
                        }else{
                            layer.alert(res.message,{icon:5,time:5000});
                        }
                    }
                });
            });
            $(document).on('click','.dels',function(){
                var s_id='';
                $('.fu').each(function(){
                    if($(this).prop('checked')){
                        s_id +=','+$(this).parent().parent().attr('s_id');
                    }
                });
                if(s_id == ''){
                    layer.alert('请选择数据',{icon:5,time:3000});return;
                }
                $.ajax({
                    url:"{{url('shop/dels')}}",
                    data:{s_id:s_id},
                    method:"post",
                    dataType:"json",
                    success:function(res){
                        if(res.code == 2){
                            layer.alert(res.message,{icon:1,time:3000});
                            setTimeout(function(){
                                window.location.reload();//刷新当前页面.
                            },1000)
                        }else{
                            layer.alert(res.message,{icon:5,time:3000});
                        }
                    }
                });
            });

        });
    </script>
</body>
</html>
