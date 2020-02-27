<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>开户人员</title>
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
    .block {
        float: left;
    }
    .sss {
        float: left;
        margin-left: 20px;
    }
</style>
<body>
{{--<form action="{{url('yuan/gong')}}" method="get" id="form" >--}}
{{--    <div class="layui-inline">--}}
{{--        <label class="layui-form-label">姓名</label>--}}
{{--        <div class="layui-input-inline" style="width: 200px;">--}}
{{--            <input type="text" name="name"  value="{{$name}}" class="layui-input">--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="layui-inline">--}}
{{--        <label class="layui-form-label">公积金账号</label>--}}
{{--        <div class="layui-input-inline" style="width: 200px;">--}}
{{--            <input type="text" name="a_account" value="{{$a_account}}" class="layui-input">--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="layui-inline">--}}
{{--        <label class="layui-form-label">银行卡号</label>--}}
{{--        <div class="layui-input-inline" style="width: 200px;">--}}
{{--            <input type="text" name="a_id_card" value="{{$a_id_card}}" class="layui-input">--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <button class="layui-btn" lay-submit lay-filter="formDemo">搜索</button>--}}


{{--</form>--}}
<div class="layui-form-item block">
    <div class="layui-form-label block">导入人员信息</div>
    <div class="layui-form-block block">
        <input type="file" class="layui-btn layui-btn-primary" id="LAY-excel-import-excel" multiple="multiple">
    </div>
</div>
<div  class="layui-form-block sss">
    <button class="layui-btn layui-btn-normal export">导出</button>
</div>
<form action="{{url('kai/index')}}" method="get" id="form" >
    <div class="layui-inline">
        <label class="layui-form-label">姓名</label>
        <div class="layui-input-inline" style="width: 200px;">
            <input type="text" name="name"  value="{{$name}}" class="layui-input">
        </div>
    </div>
    <div class="layui-inline">
        <label class="layui-form-label">身份证号</label>
        <div class="layui-input-inline" style="width: 200px;">
            <input type="text" name="id_cart" value="{{$id_cart}}" class="layui-input">
        </div>
    </div>

    <button class="layui-btn" lay-submit lay-filter="formDemo">搜索</button>


</form>

<table class="layui-table">
    <colgroup>
    </colgroup>
    <tr>
        <th><input type="checkbox" class="checkbox">全选</th>
        <th>姓名</th>
        <th>身份证号</th>
        <th>婚姻状况</th>
        <th>固定电话</th>
        <th>手机号</th>
        <th>家庭收入</th>
        <th>个人缴存基数</th>
        <th>个人账户银行卡号</th>
        <th>电子邮箱</th>
        <th>开户状态</th>
        <th>操作</th>
    </tr>
    @foreach($data as $d)
    <tr k_id="{{$d->k_id}}">
        <td>
            <input type="checkbox" class="fu" >
            {{$d->k_id}}
        </td>
        <td>{{$d->k_name}}</td>
        <td>{{$d->k_id_cart}}</td>
        <td>
            @if($d->k_hun==1) 未婚
                @elseif($d->k_hun == 2) 已婚
                @elseif($d->k_hun == 3) 离婚
                @else 未知
                @endif
        </td>
        <td>{{$d->k_mobile}}</td>
        <td>{{$d->k_phone}}</td>
        <td>{{$d->k_shou}}</td>
        <td>{{$d->k_js}}</td>
        <td>{{$d->k_card_number}}</td>
        <td>{{$d->k_email}}</td>
        <td>
        @if($d->status==1) 未开户
            @elseif($d->status==2) 已开户
            @else 未知
            @endif
        </td>
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
            //导入
            $('.layui-btn.layuiadmin-btn-list').on('click', function(){
                var type = $(this).data('type');
                active[type] ? active[type].call(this) : '';
            });
            // 监听上传文件的事件
            $('#LAY-excel-import-excel').change(function(e) {
                var files = e.target.files;
                uploadExcel(files);
            });
            // 文件拖拽
            $('body')[0].ondragover = function(e) {
                e.preventDefault();
            }
            $('body')[0].ondrop = function(e) {
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
                            'k_id': 'A'
                            ,'k_name': 'B'
                            ,'k_id_cart': 'C'
                            ,'k_hun': 'D'
                            ,'k_mobile': 'E'
                            ,'k_phone': 'F'
                            ,'k_shou': 'G'
                            ,'k_zw': 'H'
                            ,'k_zy': 'I'
                            ,'k_zc': 'J'
                            ,'k_xl': 'K'
                            ,'k_address': 'L'
                            ,'k_postal': 'M'
                            ,'k_js': 'N'
                            ,'k_khh': 'O'
                            ,'k_card_number': 'P'
                            ,'k_email': 'Q'
                            ,'status': 'R'
                        }
                    }, function(data) {
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
                        // console.log(data[0]['缴存人登记导入表格']);
                        $.ajax({
                            url: '/kai/upload'
                            ,method:"post"
                            , data:{data:data[0]['缴存人登记导入表格']}
                            , dataType: 'json'
                            , success: function (res) {
                                if(res.code == 1){
                                    layer.alert(res.message,{icon:5});
                                }else if(res.code == 2){
                                    layer.alert(res.message,{icon:1});
                                    setTimeout(function(){
                                        window.location.reload();//刷新当前页面.
                                    },1000)
                                }else if(res.code == 3){
                                    layer.alert(res.message,{icon:5});
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

            //导出
            $(document).on('click','.export',function(){
                var k_id='';
                $('.fu').each(function(){
                    if($(this).prop('checked')){
                        k_id +=','+$(this).parent().parent().attr('k_id');
                    }
                });
                if(k_id == ''){
                    layer.alert('请选择数据',{icon:5,time:3000});return;
                }
                $.ajax({
                    url: '{{url('kai/export')}}',
                    data:{k_id:k_id},
                    dataType: 'json',
                    success: function(res) {
                        // 假如返回的 res.data 是需要导出的列表数据
                        // console.log(res.data);// [{name: 'wang', age: 18, sex: '男'}, {name: 'layui', age: 3, sex: '女'}]
                        // 1. 数组头部新增表头
                        res.data.unshift({
                            k_id: '序号',
                            k_name: '姓名',
                            k_id_cart: '身份证号',
                            k_hun: '婚姻状况',
                            k_mobile: '固定电话',
                            k_phone: '手机号',
                            k_shou: '家庭月收入',
                            k_zw:'职务',
                            k_zy: '职业',
                            k_zc: '职称',
                            k_xl: '学历',
                            k_address: '家庭住址',
                            k_postal: '邮政编码',
                            k_js: '个人缴存基数',
                            k_khh: '个人账户银行卡开户行',
                            k_card_number: '个人账户银行卡号',
                            k_email: '电子邮箱',
                            status: '开户状态',
                        });
                        // 2. 如果需要调整顺序，请执行梳理函数
                        var data = excel.filterExportData(res.data, {
                            k_id:'k_id',
                            k_name: 'k_name',
                            k_id_cart:'k_id_cart',
                            k_hun:'k_hun',
                            k_mobile:'k_mobile',
                            k_phone:'k_phone',
                            k_shou:'k_shou',
                            k_zw:'k_zw',
                            k_zy:'k_zy',
                            k_zc:'k_zc',
                            k_xl:'k_xl',
                            k_address:'k_address',
                            k_postal:'k_postal',
                            k_js:'k_js',
                            k_khh:'k_khh',
                            k_card_number:'k_card_number',
                            k_email:'k_email',
                            status:'status',
                        });
                        // 3. 执行导出函数，系统会弹出弹框
                        var timestart = Date.now();
                        layui.excel.exportExcel({
                            sheet1:data
                        }, '开户人员信息登记表.xlsx', 'xlsx');
                        var timeend = Date.now();
                        var spent = (timeend - timestart) / 1000;
                        layer.alert('单纯导出耗时 '+spent+' s');
                    }
                });
            });

            //删除
            $(document).on('click','.del',function(){
                var k_id = $(this).parents('td').parent('tr').attr('k_id');
                $.ajax({
                    url:"/kai/delete",
                    method: "post",
                    data:{k_id:k_id},
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
                var k_id='';
                $('.fu').each(function(){
                    if($(this).prop('checked')){
                        u_id +=','+$(this).parent().parent().attr('k_id');
                    }
                });
                if(k_id == ''){
                    layer.alert('请选择数据',{icon:5,time:3000});return;
                }
                $.ajax({
                    url:"{{url('kai/dels')}}",
                    data:{k_id:k_id},
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
