<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>月缴列表</title>
    <meta name="renderer" content="webkit">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="../../../layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="../../../layuiadmin/style/admin.css" media="all">
    <script type="text/javascript" src="../../../layuiadmin/layui/layui.js"></script>
</head>
<script type="text/javascript">
    layui.config({
        base: 'layui_exts/'
    }).extend({
        excel: 'excel'
    });
</script>
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
    .block {
        float: left;
    }
    .sss {
        float: left;
        margin-left: 20px;
    }
</style>
<body>
<div class="layui-form-item block">
    <div class="layui-form-label block">导入人员信息</div>
    <div class="layui-form-block block">
        <input type="file" class="layui-btn layui-btn-primary" id="LAY-excel-import-excel" multiple="multiple">
    </div>
</div>
<div  class="layui-form-block sss">
    <button class="layui-btn layui-btn-normal export">导出</button>
</div>
{{--<form action="{{url('yuan/wage')}}" method="get" id="form" >--}}
{{--    <div class="layui-inline">--}}
{{--        <label class="layui-form-label">姓名</label>--}}
{{--        <div class="layui-input-inline" style="width: 200px;">--}}
{{--            <input type="text" name="name"  value="{{$name}}" class="layui-input">--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="layui-inline">--}}
{{--        <label class="layui-form-label">银行卡号</label>--}}
{{--        <div class="layui-input-inline" style="width: 200px;">--}}
{{--            <input type="text" name="id_cart" value="{{$id_cart}}" class="layui-input">--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <button class="layui-btn" lay-submit lay-filter="formDemo">搜索</button>--}}


{{--</form>--}}
<table class="layui-table">
    <colgroup>
    </colgroup>
    <tr>
        <th><input type="checkbox" class="checkbox">全选</th>
        <th>姓名</th>
        <th>个人账号</th>
        <th>身份证号</th>
        <th>个人缴存基数</th>
        <th>个人月缴存额</th>
        <th>单位月缴存额</th>
        <th>月缴存额</th>
        <th>操作</th>
    </tr>
    @foreach($data as $d)
    <tr y_id="{{$d->y_id}}">
        <td>
            <input type="checkbox" class="fu" >
            {{$d->y_id}}
        </td>
            <td>{{$d->y_name}}</td>
            <td>{{$d->y_zhang}}</td>
            <td>{{$d->y_id_cart}}</td>
            <td>{{$d->y_gjcj}}</td>
            <td>{{$d->y_gyjc}}</td>
            <td>{{$d->y_dyjc}}</td>
            <td>{{$d->y_yjc}}</td>
        <td>
            <div class="layui-btn-group">
                <button type="button" class="layui-btn layui-btn-sm">
                    <i class="layui-icon  update">&#xe642;</i>
                </button>
                <button type="button" class="layui-btn layui-btn-sm">
                    <i class="layui-icon  del">&#xe640;</i>
                </button>
            </div>
        </td>
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
        $(function () {
            var aa = setTimeout(function(){
                window.location.reload();//刷新当前页面.
            },1000);

            clearTimeout(aa);
        });
        //导入
        $('.layui-btn.layuiadmin-btn-list').on('click', function () {
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
        });
        // 监听上传文件的事件
        $('#LAY-excel-import-excel').change(function (e) {
            var files = e.target.files;
            uploadExcel(files);
        });
        // 文件拖拽
        $('body')[0].ondragover = function (e) {
            e.preventDefault();
        }
        $('body')[0].ondrop = function (e) {
            e.preventDefault();
            var files = e.dataTransfer.files;
            uploadExcel(files);
        }

        /**
         * 上传excel的处理函数，传入文件对象数组
         * @param  {[type]} files [description]
         * @return {[type]}       [description]
         */
        function uploadExcel(files) {
            try {
                excel.importExcel(files, {
                    // 读取数据的同时梳理数据
                    fields: {
                        'y_id': 'A'
                        , 'y_zhang': 'B'
                        , 'y_name': 'C'
                        , 'y_id_cart': 'D'
                        , 'y_gjcj': 'E'
                        , 'y_gyjc': 'F'
                        , 'y_dyjc': 'G'
                        , 'y_yjc': 'H'
                    }
                }, function (data) {
                    // 还可以再进行数据梳理
                    //    data = excel.filterImportData(data, {
                    //      'id': 'A'
                    //      ,'username': 'B'
                    //      ,'experience': 'C'
                    //      ,'sex': 'D'
                    //      ,'score': 'E'
                    //      ,'city': 'F'
                    //      ,'classify': 'G'
                    //      ,'wealth': 'H'
                    //      ,'sign': 'I'
                    //    });
                    // 如果不需要展示直接上传，可以再次 $.ajax() 将JSON数据通过 JSON.stringify() 处理后传递到后端即可
                    $.ajax({
                        url: '/yue/upload'
                        , method: "post"
                        , data: {data: data}
                        , dataType: 'json'
                        , success: function (res) {
                            if (res.code == 1) {
                                layer.alert(res.message, {icon: 5});
                            } else if (res.code == 2) {
                                layer.alert(res.message, {icon: 1});
                            }
                        }
                    });
                    //展示表格文件转换成的json数据格式
                    // layer.open({
                    //     title: '文件转换结果'
                    //     ,area: ['799px', '399px']
                    //     ,tipsMore: true
                    //     ,content: laytpl($('#LAY-excel-export-ans').html()).render({data: data, files: files})
                    //     ,success: function() {
                    //         element.render('tab');
                    //         layui.code({
                    //         });
                    //     }
                    // });
                });
            } catch (e) {
                layer.alert(e.message);
            }
        };

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
        //导出
        $(document).on('click','.export',function(){
            var y_id='';
            $('.fu').each(function(){
                if($(this).prop('checked')){
                    y_id +=','+$(this).parent().parent().attr('y_id');
                }
            })
            if(y_id == ''){
                layer.alert('请选择数据',{icon:5,time:3000});return;
            }
            $.ajax({
                url: '{{url('yue/export')}}',
                data:{y_id:y_id},
                dataType: 'json',
                success: function(res) {
                    // 假如返回的 res.data 是需要导出的列表数据
                    console.log(res.data);// [{name: 'wang', age: 18, sex: '男'}, {name: 'layui', age: 3, sex: '女'}]
                    // 1. 数组头部新增表头
                    res.data.unshift({
                        y_id: '序号',
                        y_zhang: '个人账号',
                        y_name: '姓名',
                        y_id_cart: '身份证号',
                        y_gjcj: '个人缴存基数',
                        y_gyjc: '个人月缴存额',
                        y_dyjc: '单位月缴存额',
                        y_yjc: '月缴存额',
                    });
                    // 2. 如果需要调整顺序，请执行梳理函数
                    var data = excel.filterExportData(res.data, {
                        y_id:'y_id',
                        y_zhang:'y_zhang',
                        y_name:'y_name',
                        y_id_cart:'y_id_cart',
                        y_gjcj:'y_gjcj',
                        y_gyjc:'y_gyjc',
                        y_dyjc:'y_dyjc',
                        y_yjc:'y_yjc',
                    });
                    // 3. 执行导出函数，系统会弹出弹框
                    var timestart = Date.now();
                    layui.excel.exportExcel({
                        sheet1:data
                    }, '月缴存记录.xlsx', 'xlsx');
                    var timeend = Date.now();
                    var spent = (timeend - timestart) / 1000;
                    layer.alert('单纯导出耗时 '+spent+' s');
                }
            });
        });
        //删除
        $(document).on('click','.del',function(){
            var y_id = $(this).parents('td').parent('tr').attr('y_id');
            $.ajax({
                url:"/yue/delete",
                method: "post",
                data:{y_id:y_id},
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
            var y_id='';
            $('.fu').each(function(){
                if($(this).prop('checked')){
                    y_id +=','+$(this).parent().parent().attr('y_id');
                }
            });
            if(y_id == ''){
                layer.alert('请选择数据',{icon:5,time:3000});return;
            }
            $.ajax({
                url:"{{url('yue/dels')}}",
                data:{y_id:y_id},
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

