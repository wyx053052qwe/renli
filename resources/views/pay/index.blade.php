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
<!--<div class="layui-form-item block">-->
<!--    <div class="layui-form-label block">导入人员信息</div>-->
<!--    <div class="layui-form-block block">-->
<!--        <input type="file" class="layui-btn layui-btn-primary" id="LAY-excel-import-excel" multiple="multiple">-->
<!--    </div>-->
<!--</div>-->
<!--<div  class="layui-form-block sss">-->
<!--    <button class="layui-btn layui-btn-normal export">导出</button>-->
<!--</div>-->

<table class="layui-table">
    <tr>
        <th><input type="checkbox" class="checkbox">全选</th>
        <th>姓名</th>
        <th>公司</th>
        <th>身份证号</th>
        <th>缴存月数</th>
        <th>缴存数额</th>
        <th>状态</th>
        <th>支付时间</th>
        <th>创建订单时间</th>
        <th>操作</th>
    </tr>
    @foreach($data as $d)
    <tr p_id="{{$d->p_id}}">
        <td>
            <input type="checkbox" class="fu" >
            {{$d->p_id}}
        </td>
        <td>{{$d->u_name}}</td>
        <td>{{$d->u_company}}</td>
        <td>{{$d->u_id_cart}}</td>
        <td>{{$d->a_month}}</td>
        <td>{{$d->total_amount/100}}</td>
        <td>@if($d->a_status==1) 未支付 @else 支付 @endif</td>
        <td>{{date('Y-m-d H:i:s',$d->updated_time)}}</td>
        <td>{{date('Y-m-d H:i:s',$d->created_time)}}</td>
        <td>
            <div class="layui-btn-group">
<!--                <button type="button" class="layui-btn layui-btn-sm">-->
<!--                    <i class="layui-icon  update">&#xe642;</i>-->
<!--                </button>-->
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

        // //导入
        // $('.layui-btn.layuiadmin-btn-list').on('click', function(){
        //     var type = $(this).data('type');
        //     active[type] ? active[type].call(this) : '';
        // });
        // // 监听上传文件的事件
        // $('#LAY-excel-import-excel').change(function(e) {
        //     var files = e.target.files;
        //     uploadExcel(files);
        // });
        // // 文件拖拽
        // $('body')[0].ondragover = function(e) {
        //     e.preventDefault();
        // }
        // $('body')[0].ondrop = function(e) {
        //     e.preventDefault();
        //     var files = e.dataTransfer.files;
        //     uploadExcel(files);
        // }
        // /**
        //  * 上传excel的处理函数，传入文件对象数组
        //  * @param  {[type]} files [description]
        //  * @return {[type]}       [description]
        //  */
        // function uploadExcel(files) {
        //     try {
        //         excel.importExcel(files, {
        //             // 读取数据的同时梳理数据
        //             fields: {
        //                 'u_id': 'A'
        //                 ,'u_company': 'B'
        //                 ,'u_management': 'C'
        //                 ,'u_references': 'D'
        //                 ,'u_unit': 'E'
        //                 ,'u_in_time': 'F'
        //                 ,'u_name': 'G'
        //                 ,'u_sex': 'H'
        //                 ,'u_phone': 'I'
        //                 ,'u_id_cart': 'J'
        //                 ,'u_marriage': 'K'
        //                 ,'u_position': 'L'
        //                 ,'u_professional': 'M'
        //                 ,'u_title': 'N'
        //                 ,'u_formal': 'O'
        //                 ,'u_address': 'P'
        //                 ,'u_number': 'Q'
        //                 ,'a_account': 'R'
        //                 ,'a_personal': 'S'
        //                 ,'a_amount': 'T'
        //                 ,'a_month': 'U'
        //                 ,'a_month_personal': 'V'
        //                 ,'a_open': 'W'
        //                 ,'a_id_card': 'X'
        //                 ,'a_zhuanhu': 'Y'
        //                 ,'w_jishu': 'Z'
        //                 ,'w_kaihu': 'AA'
        //                 ,'w_id_card': 'AB'
        //                 ,'w_liushui': 'AC'
        //                 ,'w_date': 'AD'
        //                 ,'q_yue':'AE'
        //                 ,'q_dai':'AF'
        //                 ,'q_dan':'AG'
        //                 ,'q_dongjie':'AH'
        //
        //             }
        //         }, function(data) {
        //             // 还可以再进行数据梳理
        //             //    data = excel.filterImportData(data, {
        //             //      'id': 'A'
        //             //      ,'username': 'B'
        //             //      ,'experience': 'C'
        //             //      ,'sex': 'D'
        //             //      ,'score': 'E'
        //             //      ,'city': 'F'
        //             //      ,'classify': 'G'
        //             //      ,'wealth': 'H'
        //             //      ,'sign': 'I'
        //             //    });
        //             // 如果不需要展示直接上传，可以再次 $.ajax() 将JSON数据通过 JSON.stringify() 处理后传递到后端即可
        //             $.ajax({
        //                 url: '/yuan/upload'
        //                 ,method:"post"
        //                 , data:{data:data}
        //                 , dataType: 'json'
        //                 , success: function (res) {
        //                     if(res.code == 1){
        //                         layer.alert(res.message,{icon:5});
        //                     }else if(res.code == 2){
        //                         layer.alert(res.message,{icon:1});
        //                         setTimeout(function(){
        //                             window.location.reload();//刷新当前页面.
        //                         },1000)
        //                     }else if(res.code == 3){
        //                         layer.alert(res.message,{icon:5});
        //                     }
        //                 }
        //             });
        //             //展示表格文件转换成的json数据格式
        //             // layer.open({
        //             //     title: '文件转换结果'
        //             //     ,area: ['799px', '399px']
        //             //     ,tipsMore: true
        //             //     ,content: laytpl($('#LAY-excel-export-ans').html()).render({data: data, files: files})
        //             //     ,success: function() {
        //             //         element.render('tab');
        //             //         layui.code({
        //             //         });
        //             //     }
        //             // });
        //         });
        //     } catch (e) {
        //         layer.alert(e.message);
        //     }
        // };
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

        // //导出
        // $(document).on('click','.export',function(){
        //     var u_id='';
        //     $('.fu').each(function(){
        //         if($(this).prop('checked')){
        //             u_id +=','+$(this).parent().parent().attr('u_id');
        //         }
        //     });
        //     if(u_id == ''){
        //         layer.alert('请选择数据',{icon:5,time:3000});return;
        //     }
        //     $.ajax({
        //         url: '{{url('yuan/export')}}',
        //         data:{u_id:u_id},
        //     dataType: 'json',
        //         success: function(res) {
        //         // 假如返回的 res.data 是需要导出的列表数据
        //         console.log(res.data);// [{name: 'wang', age: 18, sex: '男'}, {name: 'layui', age: 3, sex: '女'}]
        //         // 1. 数组头部新增表头
        //         res.data.unshift({
        //             u_id: '序号',
        //             u_company: '公司',
        //             u_management: '管理',
        //             u_references: '介绍人',
        //             u_unit: '单位',
        //             u_in_time: '入职时间',
        //             u_name: '姓名',
        //             u_sex: '性别',
        //             u_phone: '手机号',
        //             u_id_cart: '身份证号',
        //             u_marriage: '婚姻状况',
        //             u_position: '职务',
        //             u_professional: '职业',
        //             u_title: '职称',
        //             u_formal: '学历',
        //             u_address: '家庭住址',
        //             u_number: '夫妻编号',
        //             a_account: '公积金账号',
        //             a_personal: '个人缴存基数',
        //             a_amount: '个人月缴存额',
        //             a_month: '单位月缴存额',
        //             a_month_personal: '月缴存额',
        //             a_open: '公积金开户 银行卡开户行',
        //             a_id_card: '银行卡号',
        //             a_zhuanhu: '是否转户',
        //             w_jishu: '工资基数',
        //             w_kaihu: '银行卡开户行',
        //             w_id_card: '银行卡号',
        //             w_liushui: '是否需要流水',
        //             w_date: '开户日期',
        //             q_yue: '个人账户余额',
        //             q_dai: '是否贷款',
        //             q_dan: '是否担保',
        //             q_dongjie: '账户是否冻结',
        //         });
        //         // 2. 如果需要调整顺序，请执行梳理函数
        //         var data = excel.filterExportData(res.data, {
        //             u_id:'u_id',
        //             u_company: 'u_company',
        //             u_management:'u_management',
        //             u_references:'u_references',
        //             u_unit:'u_unit',
        //             u_in_time:'u_in_time',
        //             u_name:'u_name',
        //             u_sex:'u_sex',
        //             u_phone:'u_phone',
        //             u_id_cart:'u_id_cart',
        //             u_marriage:'u_marriage',
        //             u_position:'u_position',
        //             u_professional:'u_professional',
        //             u_title:'u_title',
        //             u_formal:'u_formal',
        //             u_address:'u_address',
        //             u_number:'u_number',
        //             a_account:'a_account',
        //             a_personal:'a_personal',
        //             a_amount:'a_amount',
        //             a_month:'a_month',
        //             a_month_personal:'a_month_personal',
        //             a_open:'a_open',
        //             a_id_card:'a_id_card',
        //             a_zhuanhu:'a_zhuanhu',
        //             w_jishu:'w_jishu',
        //             w_kaihu:'w_kaihu',
        //             w_id_card:'w_id_card',
        //             w_liushui:'w_liushui',
        //             w_date:'w_date',
        //             q_yue:'q_yue',
        //             q_dai:'q_dai',
        //             q_dan:'q_dan',
        //             q_dongjie:'q_dongjie',
        //         });
        //         // 3. 执行导出函数，系统会弹出弹框
        //         var timestart = Date.now();
        //         layui.excel.exportExcel({
        //             sheet1:data
        //         }, '人员信息.xlsx', 'xlsx');
        //         var timeend = Date.now();
        //         var spent = (timeend - timestart) / 1000;
        //         layer.alert('单纯导出耗时 '+spent+' s');
        //     }
        // });
        // });

        //删除
        $(document).on('click','.del',function(){
            var p_id = $(this).parents('td').parent('tr').attr('p_id');
            $.ajax({
                url:"/pay/delete",
                method: "post",
                data:{p_id:p_id},
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
            var p_id='';
            $('.fu').each(function(){
                if($(this).prop('checked')){
                    p_id +=','+$(this).parent().parent().attr('p_id');
                }
            });
            if(p_id == ''){
                layer.alert('请选择数据',{icon:5,time:3000});return;
            }
            $.ajax({
                url:"{{url('pay/dels')}}",
                data:{p_id:p_id},
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
