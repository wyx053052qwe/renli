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
        <div class="layui-card-header">工资</div>
        <div class="layui-card-body" style="padding: 15px;">
            <form  class="addvoteform layui-form" action="" id="form_">
                @csrf
                <div class="layui-form-item">
                    <label class="layui-form-label">姓名</label>
                    <div class="layui-input-block">
                        <input type="text" name="u_name" required  lay-verify="required" placeholder="请输入姓名" class="layui-input u_name">
                        <input type="hidden" name="u_id" value="" class="u_id">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">工资基数</label>
                    <div class="layui-input-block">
                        <input type="text" name="w_jishu" required  lay-verify="required|number" placeholder="请输入工资基数" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">银行卡开户行</label>
                    <div class="layui-input-block">
                        <input type="text" name="w_kaihu" required  lay-verify="required" placeholder="请输入银行卡开户行" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">银行卡号</label>
                    <div class="layui-input-block">
                        <input type="text" name="w_id_card" required  lay-verify="required|cart" placeholder="请输入银行卡号"  class="layui-input cart">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">是否需要流水</label>
                    <div class="layui-input-block">
                        <input type="radio" name="w_liushui" value="1" title="否">
                        <input type="radio" name="w_liushui" value="2" title="是" checked>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">入职时间</label>
                    <div class="layui-input-inline">
                        <input type="text" class="layui-input" name="w_date" placeholder="yyyy-mm-dd" id="test1">
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
        //日期组件
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
        //正则验证银行卡号
        form.verify({
            cart: [
                /^(\d{16}|\d{19}|\d{17})$/
                ,'银行卡号不正确'
            ]
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //判断银行卡号
        $('.cart').blur(function(){
            var cart = $(this).val();
            if(cart == ''){
                layer.alert("银行卡号不能为空");return;
            }
            $.ajax({
                url:"{{url('yuan/cart')}}",
                data:{cart:cart},
                dataType:"json",
                success:function(res){
                    if(res.code == 1){
                        layer.alert(res.message);
                    }
                }

            });
        });
        //获取姓名id
        $('.u_name').blur(function(){
            var u_name = $(this).val();
            $.ajax({
                url:"{{url('yuan/name')}}",
                data:{u_name:u_name},
                dataType:"json",
                success:function(res){
                    if(res.code == 1){
                        layer.alert(res.message);
                    }else{
                        $('.u_anme').val(res.u_name);
                        $('.u_id').val(res.u_id);
                    }
                }
            });
        });

        /* 监听提交 */
        form.on('submit(formDemo)', function(data){
            $.ajax({
                url:"{{url('yuan/dowage')}}",
                method:"post",
                data:$('#form_').serialize(),
                dataType:"json",
                success:function(res){
                    if(res.code==1){
                        layer.msg(res.message,{icon:5,time:3000});
                    }else if(res.code==2){
                        layer.msg(res.message,{icon:1,time:3000});
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
