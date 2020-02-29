
@extends('layouts.app')
@section('content')
<style>
    body .layui-layer-btn .layui-layer-btn0 {
        background: #23c36b;
        border: none;
    }
</style>
<!--帮助中心内容页s-->
<div style="background: #F7F7F7;">
    <div class="w1200 ">

        <div class="personal_content">
            <div class="personal_left fl">
                <div class="pers_img">
                    <a href="/personal_center">
                        <img src="/templates//images/geren_pic.png" alt="">
                    </a>
                </div>


                <script src="/templates/js/shangqiao.js"></script>

                <div class="personal_right fl">
                    <div class="tixian_span red" style="margin-bottom: 15px;">
                        <span class="span_tixian">温馨提示：</span>人人保不会以任何理由要求您提供银行卡信息或支付额外费用，请谨防钓鱼链接或诈骗电话。
                    </div>
                    <div class="personal_center personal_center0">
                        <div>
                            <div class="help_hot_top">
                                <a href="{{url('pay/order')}}" class="nav_a "> 待付款</a>
                                <a href="{{url('pay/orders')}}" class="nav_a change_a">已付款</a>
                            </div>
                        </div>
                        <div class="personal_center" style="margin-top: 0;">
                            <div>

                                <div class="v-box show">
                                    <table class="dingdan_table xbx" style="border-collapse:collapse;">
                                        <thead>
                                        <tr>
                                            <th>服务项目</th>
                                            <th>服务明细</th>
                                            <th>服务用户</th>
                                            <th>支付金额</th>
                                            <th>订单状态</th>
                                            <th>订单操作</th>
                                        </tr>
                                        </thead>
                                        <tr>
                                            <td colspan="6" class="margin_td"></td>
                                        </tr>
                                        @foreach($data as $d)
                                        @if(empty($data))
                                        <tr>
                                            <td colspan="6" style="border: none;">
                                                <section class="content-container">
                                                    <img src="/templates/images/pay_succ@2x.png" alt="" class="success_img">
                                                    <div class="succ_p">
                                                        <p>您还没有相关订单,去下一单试试吧~</p>
                                                    </div>
                                                    <div class="btn_view">
                                                        <a href="javascript:;" class="zhuge_ss_go" data_title="去缴社保" data_href="/shebao">去缴社保</a>
                                                        <a href="javascript:;" class="zhuge_hf_go" data_title="去缴公积金" data_href="/gongjijin" style="margin-left: 20px;">去缴公积金</a>
                                                    </div>
                                                </section>
                                            </td>
                                        </tr>
                                        @elseif($d->a_status==1 && $d->p_status==1)
                                        <tr>
                                            <td colspan="6" style="border: none;">
                                                <section class="content-container">
                                                    <img src="/templates/images/pay_succ@2x.png" alt="" class="success_img">
                                                    <div class="succ_p">
                                                        <p>您还没有相关订单,去下一单试试吧~</p>
                                                    </div>
                                                    <div class="btn_view">
                                                        <a href="javascript:;" class="zhuge_ss_go" data_title="去缴社保" data_href="/shebao">去缴社保</a>
                                                        <a href="javascript:;" class="zhuge_hf_go" data_title="去缴公积金" data_href="/gongjijin" style="margin-left: 20px;">去缴公积金</a>
                                                    </div>
                                                </section>
                                            </td>
                                        </tr>
                                        @else

                                        <tr>
                                            <td colspan="6" class="dingdan_tit_td" style="">
                                                <span>{{date('Y-m-d H:i:s',$d->created_time)}}</span>
                                                <span class="margin_l40">订单号：</span> <span class="dingdan_num">
                                          {{$d->out_trade_no}}
                                        </span>
                                            </td>
                                        </tr>
                                        <tr class="dingdan_border_tr">
                                            <td class="dingdan_content">
                                                @if($d->type==1) 社保服务 @elseif($d->type==2) 公积金服务 @endif
                                            </td>
                                            <td>
                                                {{$d->a_month}}
                                            </td>
                                            <td>
                                <span>
                                 {{$d->u_name}}
                                </span>
                                            </td>
                                            <td>
                                        <span class="table_money_bl">
￥{{$d->total_amount/100}}
                                                                                        </span>
                                            </td>
                                            <td>
                                        <span class="col_red">
@if($d->a_status==1) 代付款 @elseif($d->a_status==2) 已付款 @endif
                                        </span>
                                            </td>
                                            <td>
                                                <div>
                                                    <a href="javascript:;" data-type="auto" class="cancel"
                                                       data="{{$d->p_id}}">删除订单</a>
                                                </div>
                                            </td>

                                        </tr>

                                        @endif
                                @endforeach
                                    </table>
                                </div>


                                <div class="v-box">

                                </div>
                                <div class="v-box">

                                </div>
                            </div>

                        </div>
                        <!--------------------------------------------------------------------------------->

                    </div>

                </div>
            </div>


        </div>
        <!--*********************************取消订单开始-->

        <!--帮助中心内容页e-->

        <script src="{{asset('ziyuan/js/cancel.js')}}"></script>
        <script>
            $(function () {
                //诸葛统计
                $('.zhuge_hf_go').on('click', function () {
                    var data_href = $(this).attr('data_href');
                    var data_title = $(this).attr('data_title');

                    zhuge.track('pc_订单列表_点击去缴公积金', {
                        '订单列表缴公积金': ''
                    });

                    location.href = data_href
                });

                //诸葛统计
                $('.zhuge_ss_go').on('click', function () {
                    var data_href = $(this).attr('data_href');
                    var data_title = $(this).attr('data_title');

                    zhuge.track('pc_订单列表_点击去缴社保', {
                        '订单列表缴社保': ''
                    });

                    location.href = data_href
                });
                $('.nav_a').click(function () {
                    var index = $(this).index();
                    var v_box = $('.v-box');
                    $.each(v_box, function (i, e) {
                        if (i == index) {
                            $(e).addClass('show');
                        } else {
                            $(e).removeClass('show')
                        }
                    })
                    $('.nav_a').removeClass('change_a');
                    $(this).addClass('change_a');
                });


                $('.cancel').click(function () {
                    var id = $(this).attr('data');
                    text = ' <p name="interest" id="cancel_reason" style="width: 100%;">确定要删除吗？  </p> ';
                    layer.open({
                        content: '<div style="">' + text + '</div>'
                        , title: '删除订单'
                        , btn: ['确定', '取消']
                        , btnAlign: 'c' //按钮居中
                        , shade: 0 //不显示遮罩
                        , yes: function (index) {
                            var cancel_reason = $("#cancel_reason").val();
                            $.post("{{url('pay/del')}}", {
                                id: id,
                                cancel_reason: cancel_reason
                            }, function (data) {
                                if (data.status == 'success') {
                                    layer.msg('取消成功');
                                    layer.close(index);
                                    window.location.reload(true)
                                }
                                else {
                                    layer.msg(data.message);
                                    window.location.reload(true)
                                }
                            }, 'json');
                        }
                    });
                });

            })


        </script>
        <!--底部资讯模块s-->
        @endsection
