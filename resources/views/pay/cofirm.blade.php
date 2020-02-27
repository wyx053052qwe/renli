@extends('layouts.app')
@section('content')
<div class="out_bank">
    <div class="w1200 ">
        <div class="input_box">
            <div class="liucheng_Box liucheng_Box_xd">
                <!--进度条-->
                <div class="Bar Bar_xd">
                    <div style="width: 50%;">
                        <span></span>
                    </div>
                </div>
                <!--END-->
                <div class="liucheng">
                    <div class="liucheng_text">
                        <p class="liucheng1 liucheng_xd_green"></p>
                        <p class=" green1 green">确认订单</p>
                    </div>
                    <div class="liucheng_text">
                        <p class="liucheng1 liucheng_xd"></p>
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
            <form class="layui-form" action="{{url('pay/pays')}}" method="post">
                <div class="canbao_Nex">
                    <h4 class="canbao_title1">参保人员信息</h4>

                    <div class="geren_message">
                        <div class="mobal mobal_3">
                            <p class="canbao_text">姓名：</p>
                            <span class="name">
                                {{$data->u_name}}
                            </span>
                        </div>
                        <div class="mobal mobal_3">
                            <p class="canbao_text">身份证号：</p>
                            <span>
                                {{$data->u_id_cart}}
                            </span>
                        </div>
                        <div class="mobal mobal_3">
                            <p class="canbao_text">公司：</p>
                            <span>
                               {{$data->u_company}}
                            </span>
                        </div>

                    </div>
                    <h4 class="canbao_title1">服务明细</h4>
                    <div class="geren_message">
                        <div class="mobal mobal_3">
                            <p class="canbao_text">参保城市：</p>
                            <span>
                                菏泽
                            </span>
                        </div>
                        <div class="mobal mobal_3">
                            <p class="canbao_text">缴纳详情：</p>
                            <span>
                                缴纳社保
                            </span>
                        </div>
                        <div class="mobal mobal_3">
                            <p class="canbao_text">缴纳月份：</p>
                            <span>
                                {{$data->p_month}}
                            </span>
                        </div>
                        <div class="mobal mobal_3">
                            <p class="canbao_text">缴纳基数：</p>
                            <span>
                               {{$data->w_jishu}}.00
                            </span>
                        </div>
                    </div>

                    <div class="feiyong_box feiyong_box1">
                        <div class="mobal mobal_4">
                            <span class="zongjia" id="actual_payment">￥
                               {{$data->p_money}}.00
                            </span>
                            <p class="canbao_text">实付款：</p>
                        </div>
                    </div>
                    <div style="text-align: right;">
                        <button class="btn_shouhou" style="margin-top: 0;" lay-filter="add" lay-submit
                                id="sub_next">确认支付</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--***************************************end******************************************************-->
<!--提交订单e-->
<!--数据模块s-->
<div class="jiaoshebao_box">
    <div class="w1200">
        <div class="module1 module3">
            <div class="icon_box animated flipInX">
                <div class="icon icon11">
                    <span> <em>18</em>年专注社保行业</span>
                    <span class="span2">
                      人人保服务面向全国，承诺用户增减不漏费用不错，7x24小时帮您解决人事管理中遇到的任何问题，股权代码：<em style="color:#3BB54D;font-size: 16px;">200487</em>
                 </span>
                </div>
            </div>
            <div class="icon_box animated flipInX">
                <div class="icon icon11">
                    <span><em>2W+</em>累计服务企业</span>
                    <span class="span2">人人保专业人事专员全程操作，大幅节省企业的人事成本，降低用工风险，助力企业专注员工优化与调整</span>
                </div>
            </div>
            <div class="icon_box animated flipInX">
                <div class="icon icon11">
                    <span><em>10W+</em>累计服务用户</span>
                    <span class="span2">专业服务人员一对一为您服务，社保/公积金缴纳一键提交，帮您第一时间享受当地优惠政策</span>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="" id="balance_use">
</div>
@endsection
