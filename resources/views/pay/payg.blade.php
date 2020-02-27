@extends('layouts.app')
@section('content')
<!--提交订单e-->
<!--***************************************************start*****************************************************************************-->
<!--<a href="https://www.renrenbao.com/?app=index/activity&channel=zyzh&keyword=rrbnew" target="_blank" style="margin:0px auto 0;display: block">-->
<!--<img src="/templates/images/banner_top.png" alt="" style="width: 1200px;margin:0px auto 0;display: block">-->
<!--</a>-->

<div class="out_bank">
    <div class="w1200 ">
        <div class="input_box">
            <div class="liucheng_Box liucheng_Box_xd" style="border:none">
                <!--进度条-->
                <div class="Bar Bar_xd">
                    <div style="width: 15%;">
                        <span></span>
                    </div>
                </div>
                <!--END-->
                <div class="liucheng">
                    <div class="liucheng_text">
                        <p class="liucheng1 liucheng_xd"></p>
                        <p class=" green1 green">确认订单</p>
                    </div>
                    <div class="liucheng_text">
                        <p class="liucheng1 liucheng_xd_hui"></p>
                        <p class="green1  ">提交订单</p>
                    </div>
                    <div class="liucheng_text">
                        <p class="liucheng1 liucheng_xd_hui"></p>
                        <p class="green1">支付订单</p>
                    </div>
                    <div class="liucheng_text">
                        <p class="liucheng1 liucheng_xd_hui"></p>
                        <p class="green1">订单完成</p>
                    </div>
                </div>
            </div>

            <div  class="pay-hint">
                郑重提示！法律规定：公民在拘留、服刑期间缴社保，疑似或确认患有重大疾病后才开始缴纳社保等行为，均属于严重违法行为。禁止在我平台恶意缴纳。如发现参保人有恶意隐瞒或者欺诈、损害国家利益以及人人保合法权益的行为，导致平台受到有关机关行政处罚或者其他损失的，人人保有权要求参保人承担人民币十万元违约金。违约金不足以弥补实际损失的，参保人还应当补足。人人保提示您：遵纪守法，乐享生活！
            </div>
            <form class="layui-form">
                <div class="canbao_Nex">
                    <div id="no_bj">
                        <h4 class="canbao_title1">缴纳信息</h4>
                        <div class="mobal " style="height: 90px;">
                            <p class="canbao_text"><em>选择套餐：</em></p>
                            <div class="set_meal">
                                <input type="hidden" name="product_type" id="product_type"
                                       value="4">
                                <ul class="set_meal_ul" id="taocan">
                                    <li class="set_meal_halfyear change" product_type="4" zhuge_product_type="4">
                                        <img src="/templates/images/set_meal_year.png" alt="">
                                        <del>￥{{$nian->yuan}}.00</del>
                                        <span>￥{{$nian->xian}}.00</span>
                                    </li>
                                    <li class="set_meal_halfyear" product_type="3" zhuge_product_type="3">
                                        <img src="/templates/images/set_meal_halfyear.png" alt="">
                                        <del>￥{{$ban->yuan}}.00</del>
                                        <span>￥{{$ban->xian}}.00</span>
                                    </li>
                                    <li class="set_meal_halfyear" product_type="2" zhuge_product_type="2">
                                        <img src="/templates/images/season.png" alt="">
                                        <del>￥{{$ji->yuan}}.00</del>
                                        <span>￥{{$ji->xian}}.00</span>
                                    </li>
                                    <li class="set_meal_halfyear" product_type="1" zhuge_product_type="1">
                                        <img src="/templates/images/month.png" alt="">
                                        <del>￥{{$yue->yuan}}.00</del>
                                        <span>￥{{$yue->xian}}.00</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <div class=" liucheng_next">
                        <div style="margin: 30px;">
                            <button class="buy_xd " id="sub_next" type="button" lay-filter="add" lay-submit="">
                                <a href="javascript:;" style="color: white;">确认订单</a>
                            </button>
                            <!--<input type="submit" value="下一步" class="buy " style="color: white;">-->
                        </div>
                    </div>
                    <!--</form>-->
                </div>
            </form>
        </div>
    </div>
</div>
<!--***************************************************end*****************************************************************************-->
<!--数据模块e-->
<!--底部资讯模块s-->
<script src="/templates/js/validate.js"></script>
<script src="/templates/js/xcity.js"></script>
<script src="/templates/js/localtion.js"></script>
<script>
    layui.use(['layer', 'form'], function () {
        $ = layui.jquery;
        var layer = layui.layer, form = layui.form;
        //城市联动
        form.on('select(province)', function (data) {
            if (data.value == 0) {
                $("#city").html("");
                form.render('select');
                return false;
            }
            $.get('/?app=personalcenter/get_cities', {province: data.value},
                function (res) {
                    if (res.code == 1) {
                        var option = '';
                        $.each(res.data, function (key, val) {
                            option += "<option value='" + val.city_name + "'>" + val.city_name + "</option>";
                        });
                        $("#city").html(option);
                        form.render('select');
                    } else {
                        layer.msg(res.msg, {icon: 5, anim: 6}, function () {
                        }, {time: 500});
                        return false;
                    }
                }, 'json');
            return false;
        });


        form.on('checkbox(zhuge_checkbox)', function(data){
            zhuge.track('pc_下单_点击勾选协议');
        });

        //监听切换城市
        form.on('select(myselect)', function (data) {
            var city_names =  data.elem[data.elem.selectedIndex].text;
            zhuge.track('pc_下单_点击社保缴纳城市', {
                '社保缴纳城市': city_names
            });
            //获取当前城市的详细信息
            $.get('/?app=social/get_city_detail', {
                'city_id': data.value,
                'product_type': $('#product_type').val()
            }, function (res) {
                if (res.status == 'success') {
                    //特殊城市需要展现人员类别
                    if (res.data.ss_idtype_ids.length > 1) {
                        $('#id_type').css('display', '');
                        var str = '';
                        $.each(res.data.ss_idtype_ids, function (k, v) {
                            if (v['id'] == "1") {
                                str += "<input type='radio' name='id_type' value='" + v['id'] + "' title='" + v['type_name'] + "' checked>";
                            } else {
                                str += "<input type='radio' name='id_type' value='" + v['id'] + "' title='" + v['type_name'] + "' >";
                            }
                        });
                        $('#id_type_content').html(str);
                        form.render();
                    } else {
                        $('#id_type').css('display', 'none');
                        $('#id_type_content').html("");
                        form.render();
                    }
                    if (res.data['is_new'] == 1) {
                        $('[name=ss_sort][value=1]').prop('checked', true);
                    } else {
                        $('[name=ss_sort][value=2]').prop('checked', true);
                    }
                    /*                    if(res.data['ss_allow_bj'] == 1 && res.data['is_customer_repair'] == 1){
                     $('[name=ss_sort][value=3]').prop('checked',true);
                     }*/
                    /*                    $('[name=ss_sort]').each(function(k,v){
                     if(res.data['is_new'] == $(v).val()){
                     $(v).prop('checked',true);
                     }
                     });*/
                    /*                    $(".sort input:radio").removeAttr('checked');
                     form.render();
                     if (res.data['is_new'] == 1) {
                     $('.sort input:radio[value="1"]').prop('checked', 'checked');
                     form.render();
                     } else {
                     $('.sort [name=id_type][value="2"]').prop('checked', 'checked');
                     form.render();
                     }*/
                    $('#is_new').val(res.data['is_new']);
                    $('#ss_allow_bj').val(res.data['ss_allow_bj']);
                    $('#is_customer_repair').val(res.data['is_customer_repair']);
                    $('#ss_min_month').val(res.data['ss_min_month']);
                    $('#ss_max_bj').val(res.data['ss_max_bj']);
                    $('#bj_time').val(res.data['city_order_time']);
                    //根据返回的城市信息修改基数范围判断基数是否锁定
                    if (res.data['base_is_lock'] == 1) {
                        $('#basedata').val(res.data['customer_basedata']);
                        $('#basedata').attr('placeholder', res.data['ss_min'] + '~' + res.data['ss_max']);
                        $('#basedata').attr('readonly', 'readonly');
                        $('#base_explain').html("温馨提示：基数范围：" + res.data['ss_min'] + "~" + res.data['ss_max'] + "元");
                        $('#base_is_lock').val(1);
                        form.render();
                    } else {
                        $('#basedata').val('');
                        $('#basedata').attr('placeholder', res.data['ss_min'] + '~' + res.data['ss_max']);
                        $('#basedata').attr('readonly', false);
                        $('#base_explain').html("温馨提示：基数范围：" + res.data['ss_min'] + "~" + res.data['ss_max'] + "元");
                        $('#base_is_lock').val(2);
                        form.render();
                    }
                    $('#ss_min').val(res.data['ss_min']);
                    $('#ss_max').val(res.data['ss_max']);
                    var start_time = '';
                    $.each(res.data.start_time, function (k, v) {
                        start_time += "<option value='" + v + "'>" + v + "</option>";
                    });
                    $('#start_month').html(start_time);
                    $('#end_month').html("<option value='" + res.data.end_time + "'>" + res.data.end_time + "</option>");
//                    套餐渲染
                    var taocan_str='';
                    var bj_taocan_str='';
                    $.each(res.data.taocan,function(i,v){
                        if(v.product_type==4)
                        {
                            if(v.product_price != v.promotion_price)
                            {
                                taocan_str+='<li class="set_meal_halfyear change" product_type="'+v.id+'">' +
                                    '<img src="/templates/images/set_meal_year.png" alt=""><del>￥'+v.product_price+'</del><span>￥'+v.promotion_price+'</span></li>';
                            }
                            else
                            {
                                taocan_str+='<li class="set_meal_halfyear change" product_type="'+v.id+'">' +
                                    '<img src="/templates/images/set_meal_year.png" alt=""><span>￥'+v.product_price+'</span></li>';
                            }
                        }
                        if(v.product_type==3)
                        {
                            if(v.product_price != v.promotion_price)
                            {
                                taocan_str+='<li class="set_meal_halfyear" product_type="'+v.id+'">' +
                                    '<img src="/templates/images/set_meal_halfyear.png" alt=""><del>￥'+v.product_price+'</del><span>￥'+v.promotion_price+'</span></li>';
                            }
                            else
                            {
                                taocan_str+='<li class="set_meal_halfyear" product_type="'+v.id+'">' +
                                    '<img src="/templates/images/set_meal_halfyear.png" alt=""><span>￥'+v.product_price+'</span></li>';
                            }
                        }
                        if(v.product_type==2)
                        {
                            if(v.product_price != v.promotion_price)
                            {
                                taocan_str+='<li class="set_meal_halfyear" product_type="'+v.id+'">' +
                                    '<img src="/templates/images/season.png" alt=""><del>￥'+v.product_price+'</del><span>￥'+v.promotion_price+'</span></li>';
                            }
                            else
                            {
                                taocan_str+='<li class="set_meal_halfyear" product_type="'+v.id+'">' +
                                    '<img src="/templates/images/season.png" alt=""><span>￥'+v.product_price+'</span></li>';
                            }
                        }
                        if(v.product_type==1)
                        {
                            if(v.product_price != v.promotion_price)
                            {
                                taocan_str+='<li class="set_meal_halfyear" product_type="'+v.id+'">' +
                                    '<img src="/templates/images/month.png" alt=""><del>￥'+v.product_price+'</del><span>￥'+v.promotion_price+'</span></li>';
                            }
                            else
                            {
                                taocan_str+='<li class="set_meal_halfyear" product_type="'+v.id+'">' +
                                    '<img src="/templates/images/month.png" alt=""><span>￥'+v.product_price+'</span></li>';
                            }
                        }
                    });
                    $.each(res.data.bj_taocan,function(i,v){
                        if(v.product_type==1)
                        {
                            if(v.product_price != v.promotion_price)
                            {
                                bj_taocan_str+='<li class="" style="background: #E6FBF2;border: 1px solid #28DA84;"><img src="/templates/images/month.png" alt="">' +
                                    '<del>￥'+v.product_price+'</del><span>￥'+v.promotion_price+'</span></li>';
                            }
                            else
                            {
                                bj_taocan_str+='<li class="" style="background: #E6FBF2;border: 1px solid #28DA84;"><img src="/templates/images/month.png" alt="">' +
                                    '<span>￥'+v.product_price+'</span></li>';
                            }
                        }
                    });
                    $("#taocan").html(taocan_str);
                    $("#bj_taocan").html(bj_taocan_str);
                    form.render();
                    $('#bj').css('display', 'none');
                    $('#no_bj').css('display', 'block');
                } else {
                    layer.msg(res.message);
                }
            }, 'json');
        });
        //切换缴纳类型展示不同提示
        form.on('radio(ss_sort)', function (data) {
            var ss_sort_data =  $(data.elem).attr('title');

            zhuge.track('pc_下单_点击社保参保类型', {
                '社保参保类型': ss_sort_data
            });

            if (data.value == '1') {
                if ($('#is_new').val() == 2) {
                    layer.confirm('您在当前城市已缴纳过社保，请选择续缴服务。', function (index) {
                        layer.closeAll('dialog');
                        $('[name=ss_sort][value="1"]').prop('checked', false);
                        form.render();
                    });
                    $('[name=ss_sort][value="2"]').prop('checked', true);
                    form.render();
                    $('.leixing_shuoming').eq(0).css('display', 'none');
                    $('.leixing_shuoming').eq(1).css('display', 'block');
                    $('.leixing_shuoming').eq(2).css('display', 'none');
                    return;
                }
                $('.leixing_shuoming').css('display', 'none');
                $('.leixing_shuoming').eq(0).css('display', 'block');
                $('#bj').css('display', 'none');
                $('#no_bj').css('display', 'block');
            } else if (data.value == '2') {
                $('.leixing_shuoming').css('display', 'none');
                $('.leixing_shuoming').eq(1).css('display', 'block');
                $('#bj').css('display', 'none');
                $('#no_bj').css('display', 'block');
            } else if (data.value == '3') {
                if ($('#ss_allow_bj').val() == 2) {
                    layer.confirm('当前城市暂不支持补缴服务。', function (index) {
                        layer.closeAll('dialog');
                        $('[name=ss_sort][value="3"]').prop('checked', false);
                        form.render();
                    });
                    if ($('#is_new').val() == 2) {
                        $('[name=ss_sort][value="2"]').prop('checked', true);
                        form.render();
                        $('.leixing_shuoming').eq(0).css('display', 'none');
                        $('.leixing_shuoming').eq(1).css('display', 'block');
                    } else {
                        $('[name=ss_sort][value="1"]').prop('checked', true);
                        $('.leixing_shuoming').eq(0).css('display', 'block');
                        $('.leixing_shuoming').eq(1).css('display', 'none');
                        form.render();
                    }
                    $('.leixing_shuoming').eq(2).css('display', 'none');
                    return;
                }
                if ($('#is_customer_repair').val() == 2) {
                    layer.confirm('您购买了当前月份的新参或续缴服务后，才可以选择补缴。', function (index) {
                        layer.closeAll('dialog');
                        $('[name=ss_sort][value="3"]').prop('checked', false);
                        form.render();
                    });
                    if ($('#is_new').val() == 2) {
                        $('[name=ss_sort][value="2"]').prop('checked', true);
                        form.render();
                        $('.leixing_shuoming').eq(0).css('display', 'none');
                        $('.leixing_shuoming').eq(1).css('display', 'block');
                    } else {
                        $('[name=ss_sort][value="1"]').prop('checked', true);
                        form.render();
                        $('.leixing_shuoming').eq(0).css('display', 'block');
                        $('.leixing_shuoming').eq(1).css('display', 'none');
                    }
                    $('.leixing_shuoming').eq(2).css('display', 'none');
                    return;
                }
                $('.leixing_shuoming').css('display', 'none');
                $('.leixing_shuoming').eq(2).css('display', 'block');
                $('#bj').css('display', 'block');
                $('#no_bj').css('display', 'none');
                var bj_product_types = $('#bj_product_types').val();
                $('#product_type').val(bj_product_types);
                $.get("/?app=social/get_bj_start", {
                    'ss_max_bj': $('#ss_max_bj').val(),
                    'start_month': $('#bj_time').val()
                }, function (res) {
                    var bj_time = '';
                    $.each(res, function (k, v) {
                        bj_time += "<div class='month_select'><input type='checkbox' name='bj_start_month[]' value='" + v + "' lay-skin='primary' title='" + v + "'></div>";
                    });
                    $('#bj_start_time').html(bj_time);
                    form.render();
                }, 'json');
            }
        });
        //判断人员类别
        form.on('radio(id_type)', function (data) {
            var id_type_name = $(data.elem).attr('title');
            zhuge.track('pc_下单_点击人员类别', {
                '人员类别': id_type_name
            });
            if (data.value != "1" && "-1" >= 0) {
                layer.confirm('如需更换人员类别，请联系人人保客服。', function (index) {
                    layer.closeAll('dialog');
                    var this_id_type = "1";
                    $('[name=id_type][value="' + this_id_type + '"]').prop('checked', true);
                    form.render();
                });
            }
        });
        //选择套餐的判断
        $('.set_meal_ul').on('click','li',function () {
            var producy_type_name = '月套餐'
            if($(this).attr('zhuge_product_type') == 2){
                producy_type_name = '季套餐'
            }
            if($(this).attr('zhuge_product_type') == 3){
                producy_type_name = '半年套餐'
            }
            if($(this).attr('zhuge_product_type') == 4){
                producy_type_name = '年套餐'
            }
            zhuge.track('pc_下单_点击社保套餐', {
                '社保套餐': producy_type_name
            });

            $('.set_meal_ul li').removeClass();
            $(this).addClass('set_meal_halfyear change');
            $('#product_type').val($(this).attr('product_type'));
        });
        $(document).on('click','#sub_next',function(){
           var type =  $('.change').attr('product_type');
          var many = $('.change').children('span').text();
          $.ajax({
              url:"{{url('pay/socialss')}}",
              method:'post',
              data:{type:type,many:many},
              dataType:'json',
              success:function(res){
                  if(res.code==2){
                      location.href="/pay/cofirm";
                  }else if(res.code==1){
                      alert(res.message);
                  }else if(res.code==3){
                      alert(res.message);
                      location.href='/pay/order';
                  }
              }
          });
        });
        //提交订单
        form.on('submit(add)', function (data) {
        });


    });



</script>

@endsection
