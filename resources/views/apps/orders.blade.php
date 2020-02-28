@extends('layouts.apps')
@section('content')
<div class="index_header">
    订单
    <a href="tel:400-862-0588"><img src="/templates/new_module/images/tel.png" alt="" class="index_tel"></a>
</div>
<div style="height: 1.26rem;"></div>
<!-- 清楚浮动 加上clear_both类名1 -->
<div class="order_warp">
    <div class="order_nav clear_both">
        <div class="order_nav_item "><a class="zhuge_no_pay" href="javascript:;"  data_href="{{url('app/order')}}" data_title="待付款" >待付款</a> <p></p></div>
        <div class="order_nav_item active"><a class="zhuge_is_pay" href="javascript:;"   data_href="{{url('app/orders')}}" data_title="已付款" style="color: #0cd574;" > 已付款 </a>
            <p></p></div>
    </div>
    <div class="order_list">
        <!--不存在订单-->
        <!--存在订单-->
        <!-- 待付款 -->
        @foreach($data as $d)
        <div class="order_item" >

            @if(empty($data))
            <!--不存在订单-->
            <div>
                <img src="/templates/new_module/images/empty.png" alt="" class="no_data_img">
                <p class="no_more no_data_text">您还没有相关订单<br>去下一单试试吧</p>
                <div class="jiaona_btn zhuge_jiaoshebao" data_title="订单列表缴社保"  data_href="{{url('/app/shebao')}}" >去缴社保</div>
                <div class="jiaona_btn zhuge_jiaogongjijin" data_title="订单列表缴公积金" data_href="{{url('/app/gongjijin')}}" >去缴公积金</div>
            </div>
            @elseif($d->a_status==1 && $d->p_status==1)
            <!--            <div>-->
            <!--                <img src="/templates/new_module/images/empty.png" alt="" class="no_data_img">-->
            <!--                <p class="no_more no_data_text">您还没有相关订单<br>去下一单试试吧</p>-->
            <!--                <div class="jiaona_btn zhuge_jiaoshebao" data_title="订单列表缴社保"  data_href="{{url('/app/shebao')}}" >去缴社保</div>-->
            <!--                <div class="jiaona_btn zhuge_jiaogongjijin" data_title="订单列表缴公积金" data_href="{{url('/app/gongjijin')}}" >去缴公积金</div>-->
            <!--            </div>-->
            @else
            <div class="order_item_title"> @if($d->type==1) 社保服务 @elseif($d->type==2) 公积金服务 @endif <p class="order_item_title_rt">
                    @if($d->a_status==1) 代付款 @elseif($d->a_status==2) 已付款 @endif</p></div>
            <div class="order_item_content">
                <div class="order_item_text clear_both">
                    <p class="order_item_text_lf">时间：</p>
                    <p class="order_item_text_rt">{{$d->a_month}}</p>
                </div>
                <div class="order_item_text clear_both">
                    <p class="order_item_text_lf">姓名：</p>
                    <p class="order_item_text_rt">{{$d->u_name}}</p>
                </div>
                <div class="order_item_text clear_both">
                    <p class="order_item_text_lf">支付金额：</p>
                    <p class="order_item_text_rt">{{$d->total_amount/100}}元</p>
                </div>
            </div>
        </div>
        <div class="order_item_bottom clear_both">
<!--            <div class="order_btn pay_btn">-->
<!--                <a class="order_pay_green"-->
<!--                   href="/pay/cofirm">去支付</a>-->
<!--            </div>-->
<!--                          <div class="order_btn pay_btn" onclick="location.href='/wxpay/?order_type=SS&order_id=207573'">立即支付</div>-->
<!--            <div class="order_btn cancel_order">-->
<!--                <a href="javascript:;" data-type="auto" class=" cancel"-->
<!--                   data="{{$d->p_id}}">取消订单</a>-->
<!--            </div>-->
<!--                          <div class="order_btn cancel_order" onclick="location.href='/?app=order_new/cancelOrderPage&id=207573&order_type_name=社保服务&project_desc=新参 年套餐(2020.03-2021.02)&order_status=1&order_type=SS'">取消订单 </div>-->
<!--        </div>-->
            <div class="order_btn cancel_order">
                <a href="javascript:;" data-type="auto" class=" cancel"
                   data="{{$d->p_id}}">删除订单</a>
            </div>
    </div>
    @endif
    @endforeach
    <div class="no_more">亲~没有更多了！</div>
</div>

</div>
<!--弹框样式-->
<div class="content_href">
    <div class="content_con_warp">
        <div class="content_con">
            <img src="/templates/new_module/images/logo.png" alt="" class="content_logo">
            <p>人人保.专业客服.答疑解惑</p>
            <div>
                <div class="btn line_btn"><a href="http://p.qiao.baidu.com/cps/chat?siteId=13047548&userId=27282829">在线咨询</a></div>
                <div class="btn"><a href="tel:400-862-0588">电话联系</a></div>
            </div>
        </div>
        <img src="/templates/images/close1@2x.png" alt="" class="close">
    </div>
</div>
<!--底部-->
<div class="header_footer">
    <ul class="header_footer_list">
        <li class="header_footer_item bottom_zhuge" data_href="{{url('/app/index')}}" data_title="首页">
            <img src="/templates/new_module/images/unchoose_homepage@2x.png" alt="" class="header_footer_img" >
            <p >首页</p>
        </li>
        <li class="header_footer_item bottom_zhuge" data_href="{{url('/app/order')}}" data_title="订单" >
            <img src="/templates/new_module/images/choose_order@2x.png" alt="" class="header_footer_img">
            <p>订单</p>
        </li>
    </ul>
</div>
<script>
    $('.zhuge_jiaoshebao').click(function () {
        var data_href = $(this).attr('data_href');
        var data_title = $(this).attr('data_title');
        zhuge.track('W_点击去缴社保', {
            '订单列表缴社保' : '',
        });
        location.href = data_href;
    });

    $('.zhuge_jiaogongjijin').click(function () {
        var data_href = $(this).attr('data_href');
        var data_title = $(this).attr('data_title');
        zhuge.track('W_点击去缴公积金', {
            '订单列表缴公积金' : '',
        });
        location.href = data_href;
    });
    $('.zhuge_no_pay').click(function () {
        var data_href = $(this).attr('data_href');
        var data_title = $(this).attr('data_title');
        zhuge.track('W_点击待付款', {
            '待付款列表' : data_title,
        });
        location.href = data_href;
    });
    $('.zhuge_is_pay').click(function () {
        var data_href = $(this).attr('data_href');
        var data_title = $(this).attr('data_title');
        zhuge.track('W_点击已付款', {
            '已付款列表' : data_title,
        });
        location.href = data_href;
    });
    $('.cancel').click(function () {
        var id = $(this).attr('data');
        text = ' <p name="interest" id="cancel_reason" style="width: 100%;"> 确定要删除吗？ </p> ';
        layer.open({
            content: '<div style="">' + text + '</div>'
            , title: '取消订单'
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
                        window.location.reload(true)
                    }
                    else {
                        window.location.reload(true);
                    }
                }, 'json');
            }
        });
    })
</script>
@endsection
