@extends('layouts.apps')
@section('content')
<div class="index_header">
    <a href="/"><span class="back"></span></a>
    缴社保
    <a href="tel:400-862-0588"><img src="/templates/new_module/images/tel.png" alt="" class="index_tel"></a>
</div>
<div style="height: 1.26rem;"></div>
<div class="buy_hint_warp" style="height: 1rem;">
    <div class="buy_hint clear_both" style="background: #f2e5cc">
        <div class="buy_hint_lf" style="background: #f2e5cc;"></div>
        <p style="color:#ed7737 ">郑重提示！法律规定：公民在拘留、服刑期间缴社保，疑似或确认患有重大疾病后才开始缴纳社保等行为，均属于严重违法行为。禁止在我平台恶意缴纳。如发现参保人有恶意隐瞒或者欺诈、损害国家利益以及人人保合法权益的行为，导致平台受到有关机关行政处罚或者其他损失的，人人保有权要求参保人承担人民币十万元违约金。违约金不足以弥补实际损失的，参保人还应当补足。人人保提示您：遵纪守法，乐享生活！</p>
        <div class="buy_hint_close_div" style="background: #f2e5cc;">
            <img src="https://upload.rrb365.com/image/20190716/2019071617144629650.png" alt="" class="buy_hint_close">
        </div>
    </div>
</div>

</div>
<div class="buy_info">

    <div class="buy_info">
        <div class="buy_info_con">
            <ul>
                <li class="buy_info_item clear_both normal_block">
                    <ol id="taocan">
                        <li class="buy_info_pruduct active zhuge_pruduct" data_title="年套餐" product_type="4" data="4">
                            <p class="buy_info_pruduct_tit">年套餐</p>
                            <p class="buy_info_pruduct_price">￥<span>{{$nian->xian}}</span></p>
                            <p class="buy_info_pruduct_price_del">
                                <del>￥{{$nian->yuan}}</del>
                            </p>
                        </li>
                        <li class="buy_info_pruduct zhuge_pruduct" data_title="半年套餐" product_type="3" data="3">
                            <p class="buy_info_pruduct_tit">半年套餐</p>
                            <p class="buy_info_pruduct_price">￥<span>{{$ban->xian}}</span></p>
                            <p class="buy_info_pruduct_price_del">
                                <del>￥{{$ban->yuan}}</del>
                            </p>
                        </li>
                        <li class="buy_info_pruduct zhuge_pruduct" data_title="季套餐" product_type="2" data="2">
                            <p class="buy_info_pruduct_tit">季套餐</p>
                            <p class="buy_info_pruduct_price">￥<span>{{$ji->xian}}</span></p>
                            <p class="buy_info_pruduct_price_del">
                                <del>￥{{$ji->yuan}}</del>
                            </p>
                        </li>
                        <li class="buy_info_pruduct zhuge_pruduct" data_title="月套餐" product_type="1" data="1">
                            <p class="buy_info_pruduct_tit">月套餐</p>
                            <p class="buy_info_pruduct_price">￥<span>{{$yue->xian}}</span></p>
                            <p class="buy_info_pruduct_price_del">
                                <del>￥{{$yue->yuan}}</del>
                            </p>
                        </li>
                    </ol>
                </li>
                <!-- 补缴服务--start -->

                <li class="buy_info_item special_repair" style="display: none;">
                    补缴服务
                    <div class="buy_info_item_rt buy_info_style">选择补缴月份需连续且与正常订单月份衔接</div>
                </li>
                <li class="buy_info_item repair" style="display: none;" data="1">
                    <ol id="bujiao_taocan">
                        <li class="buy_info_item_title clear_both"><span>月套餐</span> <span
                                style="border-left: 0.013333rem solid #0CD475;">199元</span>
                        </li>
                    </ol>
                    <ol class="clear_both buy_info_time">
                        <li class="buy_info_time_item" data="2020-2">2020-2</li>
                        <li class="buy_info_time_item" data="2020-1">2020-1</li>
                        <li class="buy_info_time_item" data="2019-12">2019-12</li>

                    </ol>
                </li>
                <!--             补缴服务--end -->
                <!--            <li class="buy_info_item jiaonayuefen">-->
                <!--                缴纳月份-->
                <!--                <img src="/templates/new_module/images/choose.png" alt="" class="buy_info_item_go" style="-->
                <!--	margin-top: 0.1rem;">-->
                <!--                <div class="buy_info_item_rt buy_info_yue">-->
                <!--                    12个月（2020-03~2021-02）-->
                <!--                </div>-->
                <!--            </li>-->
            </ul>
        </div>
    </div>
    <!--产品类型-->
    <input type="hidden" name="product_type" id="product_type" value="4">
    <!--产品id-->
    <input type="hidden" name="product_id" id="product_id" value="4">
    <!--下单开始时间-->
    <input type="hidden" name="customer_order_time" id="customer_order_time" value="2020-03">
    <!--城市是否允许补缴-->
    <input type="hidden" name="ss_allow_bj" id="ss_allow_bj" value="1">
    <!--用户是否允许补缴-->
    <input type="hidden" name="is_customer_repair" id="is_customer_repair" value="2">
    <!--可补缴月份-->
    <input type="hidden" name="ss_max_bj" id="ss_max_bj" value="3">
    <!--下单截止时间-->
    <input type="hidden" name="end_time" id="end_time" value="2021-02">
    <!--一次性缴纳几个月-->
    <input type="hidden" name="ss_min_month" id="ss_min_month" value="1">
    <div style="height: 2.7rem;">
        <div class="buy_now_bottom">
<!--            <label class="buy_now_yuedu">-->
<!--                <input type="checkbox" class="checkbox_l zhuge_check_box" data_title="点击勾选协议">-->
<!--                <span>我已认真阅读并同意 <a href="javascript:;" class="zhuge_rrb_service" data_href="/?app=index/site_agreement&is_show=1" data_title="点击服务代理协议">《服务代理协议》</a></span>-->
<!--            </label>-->
            <div class="buy_now_btn">下一步</div>
        </div>
    </div>


    <!--弹框样式-->
    <div class="content_href">
        <div class="content_con_warp">
            <div class="content_con">
                <img src="/templates/new_module/images/logo.png" alt="" class="content_logo">
                <p>人人保.专业客服.答疑解惑</p>
                <div>
                    <div class="btn line_btn"><a href="http://p.qiao.baidu.com/cps/chat?siteId=13047548&userId=27282829">在线咨询</a>
                    </div>
                    <div class="btn"><a href="tel:400-862-0588">电话联系</a></div>
                </div>
            </div>
            <img src="/templates/images/close1@2x.png" alt="" class="close">
        </div>
    </div>
    <!-- 缴纳月份弹框 -->
    <div class="tankuang tankuang_jiaona">
        <div class="tankuang_content">
            <ul id="date_list">
                <li class="time">2020-3</li>
                <li class="time">2020-4</li>
                <li class="time">2020-5</li>
            </ul>
        </div>
    </div>

    <!-- 缴纳基数 -->
    <div class="tankuang tankuang_jishu">
        <div class="tankuang_content">
            <div class="jishu_titl">缴纳基数</div>
            <p class="jishu_text">1、社会保险基数简称社保基数，是指职工在一个社保年度的社会保险缴纳缴费基数</p>
            <p class="jishu_text">2、它是按照职工上一年度1月至12月的所有工资性收入所得的月平均额来进行确定，有上限和下限之分</p>
            <p class="jishu_text">3、<label id="city_name">北京</label>地区基数上下限为<span
                    id="basedata_area">3613~27786</span>。</p>
            <div class="i_know">我知道了</div>
        </div>
    </div>
    <!-- 补缴提示 -->
    <div class="tankuang tankuang_bujiao">
        <div class="tankuang_content">
            <div class="jishu_titl">温馨提示</div>
            <p class="jishu_text bujiao_text">当前城市允许补缴5个月，在您购买当前月新参或者续缴服务后。可正常选择</p>
            <div class="i_know">我知道了</div>
        </div>
    </div>
    <script>
        // 套餐类型 更改时间  buy_info_pruduct
        $("#taocan").on('click', '.buy_info_pruduct', function () {
            var product_type = $(this).attr("product_type");
            $(this).addClass("active").siblings().removeClass("active")
        });
        $(document).on('click','.buy_now_btn',function(){
            var type = $('.active').attr('product_type');
            var many = $('.active').children('.buy_info_pruduct_price').children('span').text();
            $.ajax({
                url:"{{url('app/socials')}}",
                method:'POST',
                data:{type:type,many:many},
                dataType:'json',
                success:function(res){
                    if(res.code==2){
                        location.href="/app/user";
                    }else if(res.code==1){
                        alert(res.message);
                    }else if(res.code==3){
                        alert(res.message);
                        location.href='/app/order';
                    }
                }
            });
        });
    </script>
    @endsection
