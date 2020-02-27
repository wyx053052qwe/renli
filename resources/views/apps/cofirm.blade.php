@extends('layouts.apps')
@section('content')
<div class="index_header">
    <a href="javascript:;" onclick="history.go(-1)" class="back"></a>
    确认订单
</div>
<form class="layui-form" action="{{url('app/send')}}" method="post">
<div style="height: 1.23rem;"></div>
<div class="orderInfo_user">
    <div class="orderInfo_title">订单信息

    </div>
    <div class="orderInfo_user_info">
        <div class="orderInfo_user_content clear_both">
            <img src="/templates/new_module/images/project.png" alt="" class="orderInfo_user_img">
            <div class="orderInfo_user_text">
                <p>参保姓名：{{$data->u_name}}</p>
                <p>身份证号：{{$data->u_id_cart}}</p>
            </div>
        </div>
        <div class="orderInfo_user_content clear_both">
            <img src="/templates/new_module/images/portrait.png" alt="" class="orderInfo_user_img">
            <div class="orderInfo_user_text">
                <p>所在公司：{{$data->u_company}} </p>
                <p>缴纳项目：菏泽  基数({{$data->w_jishu}}) </p>
                <p>缴纳月份：
                    {{$data->p_mmonth}}
                </p>
            </div>
        </div>
    </div>
</div>
<div class="order_way">

</div>
<div class="orderInfo_info">
    <div class="orderInfo_title">支付金额
    </div>
    <div class="orderInfo_info_content">
        <div class="orderInfo_info_content_text">
            <p>实付款 <span class="green total_money">{{$data->p_money}}元</span></p>
        </div>
    </div>
</div>
<div style="height: 1.6rem;"></div>
<div class="order_bottom_warp">
    <div class="order_sfk">实付款：<span class="green total_money" id="">{{$data->p_money}}元</span></div>

    <button style="width: 447px;height:163px;%float: left;background: #0CD475;color: #FFFFFF;font-size:64px;">去支付</button>
</div>
</form>
<div class='coupon_warp'>

</div>
@endsection
