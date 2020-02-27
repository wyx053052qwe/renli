<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>员工添加</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="../../../layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="../../../layuiadmin/style/admin.css" media="all">
</head>
<body>

<div class="layui-fluid">
    <div class="layui-card">
        <div class="layui-card-header">员工添加</div>
        <div class="layui-card-body" style="padding: 15px;">
            <form  class="addvoteform layui-form" action="" id="form_">
                @csrf
                <div class="layui-form-item">
                    <label class="layui-form-label">公司</label>
                    <div class="layui-input-block">
                        <input type="text" name="u_company" required  lay-verify="required" placeholder="请输入公司名" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">管理</label>
                    <div class="layui-input-block">
                        <input type="text" name="u_management" required  lay-verify="required" placeholder="请输入管理名" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">介绍人</label>
                    <div class="layui-input-block">
                        <input type="text" name="u_references" required  lay-verify="required" placeholder="请输入介绍人" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">单位</label>
                    <div class="layui-input-block">
                        <input type="text" name="u_unit" required  lay-verify="required" placeholder="请输入单位" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">入职时间</label>
                    <div class="layui-input-inline">
                        <input type="text" class="layui-input" name="u_in_time" placeholder="yyyy-mm-dd" id="test1">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">姓名</label>
                    <div class="layui-input-block">
                        <input type="text" name="u_name" required  lay-verify="required" placeholder="请输入姓名" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">性别</label>
                    <div class="layui-input-block">
                        <input type="radio" name="u_sex" value="1" title="男" checked>
                        <input type="radio" name="u_sex" value="2" title="女" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">手机号</label>
                    <div class="layui-input-block">
                        <input type="text" name="u_phone" required  lay-verify="required|phone" placeholder="请输入手机号" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">身份证</label>
                    <div class="layui-input-block">
                        <input type="text" name="u_id_cart" required  lay-verify="required|identity" placeholder="请输入身份证" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">婚姻状况</label>
                    <div class="layui-input-block">
                        <input type="radio" name="u_marriage" value="1" title="未婚" checked>
                        <input type="radio" name="u_marriage" value="2" title="已婚" >
                        <input type="radio" name="u_marriage" value="3" title="离婚" >
                    </div>
                </div>
                <div class="layui-form-item fu">
                    <label class="layui-form-label">夫妻编号</label>
                    <div class="layui-input-block">
                        <input type="text" name="u_number" required  lay-verify="" placeholder="请输入夫妻编号" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">职务</label>
                    <div class="layui-input-block">
                        <input type="text" name="u_position" required  lay-verify="required" placeholder="请输入职务" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">职业</label>
                    <div class="layui-input-block">
                        <input type="text" name="u_professional" required  lay-verify="required" placeholder="请输入职业" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">职称</label>
                    <div class="layui-input-block">
                        <input type="text" name="u_title" required  lay-verify="required" placeholder="请输入职称" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">学历</label>
                    <div class="layui-input-block">
                        <select name="u_formal" lay-verify="">
                            <option value="">请选择</option>
                            <option value="1">初中</option>
                            <option value="2">中专</option>
                            <option value="3">高中</option>
                            <option value="4">大专</option>
                            <option value="5">本科</option>
                        </select>
                    </div>
                </div>
{{--                <div class="layui-form-item">--}}
{{--                    <label class="layui-form-label">地区</label>--}}
{{--                    <div class="layui-input-inline">--}}
{{--                        <select name="provid" id="provid" lay-filter="provid">--}}
{{--                            <option value="">请选择省</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="layui-input-inline">--}}
{{--                        <select name="cityid" id="cityid" lay-filter="cityid">--}}
{{--                            <option value="">请选择市</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="layui-input-inline">--}}
{{--                        <select name="areaid" id="areaid" lay-filter="areaid">--}}
{{--                            <option value="">请选择县/区</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="layui-form-item">
                    <label class="layui-form-label">家庭住址</label>
                    <div class="layui-input-block">
                        <input type="text" name="u_address"  lay-verify="required" placeholder="请输入家庭住址" autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="../../../layuiadmin/layui/layui.js"></script>
<script src="{{asset('assets/data.js')}}"></script>
<script src="{{asset('assets/province.js')}}"></script>
<script>
    layui.config({
        base: '../../../layuiadmin/' //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['index', 'form', 'laydate'], function(){
        var $ = layui.$
            ,admin = layui.admin
            ,element = layui.element
            ,layer = layui.layer
            ,laydate = layui.laydate
            ,form = layui.form;

        form.render(null, 'component-form-group');

        laydate.render({
            elem: '#test1'
        });

        // /* 自定义验证规则 */
        // form.verify({
        //     title: function(value){
        //         if(value.length < 5){
        //             return '标题至少得5个字符啊';
        //         }
        //     }
        //     ,pass: [/(.+){6,12}$/, '密码必须6到12位']
        //     ,content: function(value){
        //         layedit.sync(editIndex);
        //     }
        // });
        //
        // /* 监听指定开关 */
        // form.on('switch(component-form-switchTest)', function(data){
        //     layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
        //         offset: '6px'
        //     });
        //     layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
        // });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        /* 监听提交 */
        form.on('submit(formDemo)', function(data){
            $.ajax({
                url:"{{url('yuan/doadd')}}",
                method:"post",
                data:$('#form_').serialize(),
                dataType:"json",
                success:function(res){
                   if(res.code==1){
                       layer.msg(res.message,{icon:5,time:3000});
                   }else if(res.code==2){
                        layer.msg(res.message,{icon:1,time:3000});
                    }else if(res.code==3){
                        layer.msg(res.message,{icon:5,time:3000});
                    }
                }

            });
            // layer.msg(JSON.stringify(data.field));
            return false;
        });
    });
</script>
</body>
</html>
