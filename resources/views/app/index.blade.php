@extends('layouts.app')
@section('content')

<!--轮播图end-->
<!--社保明细弹框s-->
<div class="md-modal animated">
    <h1>社保缴纳明细</h1>
    <div class="s-b-detail" id="calculateRes" style="display: block;">
        <table id="detail">

        </table>
    </div>
    <div class="close_xiangxi" style="">关闭</div>
</div>
<div class="md-overlay "></div>
<!--社保明细弹框e-->
<!--社保计算器end-->
<!--数据展示模块s-->
<div class="w1200">
    <div class="module1 module3">
        <div class="icon_box animated">
            <div class="icon" style="display:block;position: relative">
                <span> <em>18</em>年专注社保行业</span>
                <span class="span2">
                      人人保服务面向全国，承诺用户增减不漏费用不错，7x24小时帮您解决人事管理中遇到的任何问题，股权代码：<em style="color:#3BB54D;font-size: 16px;">200487</em>
                 </span>
            </div>
        </div>
        <div class="icon_box animated">
            <div class="icon" style="display:block;position: relative">
                <span><em>2W+</em>累计服务企业</span>
                <span class="span2">人人保专业人事专员全程操作，大幅节省企业的人事成本，降低用工风险，助力企业专注员工优化与调整</span>
            </div>
        </div>
        <div class="icon_box animated">
            <div class="icon" style="display:block;position: relative">
                <span><em>10W+</em>累计服务用户</span>
                <span class="span2">专业服务人员一对一为您服务，社保/公积金缴纳一键提交，帮您第一时间享受当地优惠政策</span>
            </div>
        </div>
    </div>
</div>
<!--数据展示模块e-->
<!--缴纳社保模块s-->
<div class="module1-shebao w1200 index_module_1 animated">
    <div class="shebao-nav">缴纳社保 <span>个人</span></div>
    <ul class="taocan-box">
        <li>
            <div class="taocan-title">
                <img src="{{asset('templates/images/s-nian.png')}}" alt="社保代缴">
            </div>
            <div class="taocan-xx">
                套餐类型：年套餐
                <span class="HOT animated pulse">HOT</span>
            </div>
            <div class="taocan-xx">
                缴纳期限：12个月
            </div>
            <div class="taocan-xx">
                服务原价：
                <del>{{$nian->yuan}}.00元</del>
            </div>
            <div class="taocan-xx">
                服务现价：<em style="color:#F1B700;">{{$nian->xian}}.00元</em>
            </div>
        </li>
        <li>
            <div class="taocan-title">
                <img src="/templates/images/s-bannian.png" alt="社保代缴">
            </div>
            <div class="taocan-xx">
                套餐类型：半年套餐
            </div>
            <div class="taocan-xx">
                缴纳期限：6个月
            </div>
            <div class="taocan-xx">
                服务原价：
                <del>{{$ban->yuan}}.00元</del>
            </div>
            <div class="taocan-xx">
                服务现价：<em style="color:#F1B700;">{{$ban->xian}}.00元</em>
            </div>
        </li>
        <li>
            <div class="taocan-title">
                <img src="/templates/images/s-ji.png" alt="代缴社保">
            </div>
            <div class="taocan-xx">
                套餐类型：季套餐
            </div>
            <div class="taocan-xx">
                缴纳期限：3个月
            </div>
            <div class="taocan-xx">
                服务原价：
                <del>{{$ji->yuan}}.00元</del>
            </div>
            <div class="taocan-xx">
                服务现价：<em style="color:#F1B700;">{{$ji->xian}}.00元</em>
            </div>
        </li>
        <li style="margin-right: 0;">
            <div class="taocan-title">
                <img src="/templates/images/s-yue.png" alt="代缴社保">
            </div>
            <div class="taocan-xx">
                套餐类型：月套餐
            </div>
            <div class="taocan-xx">
                缴纳期限：1个月
            </div>
            <div class="taocan-xx">
                服务原价：
                <del>{{$yue->yuan}}.00元</del>
            </div>
            <div class="taocan-xx">
                服务现价：<em style="color:#F1B700;">{{$yue->xian}}.00元</em>
            </div>
        </li>
    </ul>
    <div class="btn-box" style="text-align: center">
        <a class="buy buy_shebao" href="{{url('pay/social?type=1')}}" >购买套餐</a>
{{--        <a href="javascript:;" target="_blank"><button class="free-btn zhuge_index_zixun_ss">免费咨询</button></a>--}}
    </div>
</div>


<script>
    $("#nb_invite_wrap").hide();
</script>
<!--缴纳公积金s-->
<div class="module1-shebao w1200 index_module_2 animated">
    <div class="shebao-nav">缴纳公积金 <span class="circle-2">个人</span></div>
    <ul class="taocan-box">
        <li>
            <div class="taocan-title">
                <img src="/templates/images/g-nian.png" alt="公积金代缴">
            </div>
            <div class="taocan-xx">
                套餐类型：年套餐
                <span class="HOT animated pulse">HOT</span>
            </div>
            <div class="taocan-xx">
                缴纳期限：12个月
            </div>
            <div class="taocan-xx">
                服务原价：
                <del>{{$gnian->yuan}}.00元</del>
            </div>
            <div class="taocan-xx">
                服务现价：<em style="color:#F1B700;">{{$gnian->xian}}.00元</em>
            </div>
        </li>
        <li>
            <div class="taocan-title">
                <img src="/templates/images/g-bannian.png" alt="公积金代缴">
            </div>
            <div class="taocan-xx">
                套餐类型：半年套餐
            </div>
            <div class="taocan-xx">
                缴纳期限：6个月
            </div>
            <div class="taocan-xx">
                服务原价：
                <del>{{$gban->yuan}}.00元</del>
            </div>
            <div class="taocan-xx">
                服务现价：<em style="color:#F1B700;">{{$gban->xian}}.00元</em>
            </div>
        </li>
        <li>
            <div class="taocan-title">
                <img src="/templates/images/g-ji.png" alt="代缴公积金">
            </div>
            <div class="taocan-xx">
                套餐类型：季套餐
            </div>
            <div class="taocan-xx">
                缴纳期限：3个月
            </div>
            <div class="taocan-xx">
                服务原价：
                <del>{{$gji->yuan}}.00元</del>
            </div>
            <div class="taocan-xx">
                服务现价：<em style="color:#F1B700;">{{$gji->xian}}.00元</em>
            </div>
        </li>
        <li style="margin-right: 0;">
            <div class="taocan-title">
                <img src="/templates/images/g-yue.png" alt="代缴公积金">
            </div>
            <div class="taocan-xx">
                套餐类型：月套餐
            </div>
            <div class="taocan-xx">
                缴纳期限：1个月
            </div>
            <div class="taocan-xx">
                服务原价：
                <del>{{$gyue->yuan}}.00元</del>
            </div>
            <div class="taocan-xx">
                服务现价：<em style="color:#F1B700;">{{$gyue->xian}}.00元</em>
            </div>
        </li>
    </ul>
    <div class="btn-box" style="text-align: center">
         <a class="buy buy_shebao" href="{{url('pay/socialg?type=2')}}" >购买套餐</a>
{{--        <a href="javascript:;" target="_blank"><button class="free-btn zhuge_index_zixun_hf">免费咨询</button></a>--}}
    </div>
</div>
<!--缴纳公积金e-->
<!--企业定制服务s-->
{{--<div class="module1-shebao w1200 index_module_3 animated">--}}
{{--    <div class="shebao-nav">企业定制服务 <span class="circle-3">企业</span></div>--}}
{{--    <div class="entry-Calculator qiye_box fl">--}}
{{--        <div class="clearfix">--}}
{{--            <div class="qiye_btn active zhuge_qiye_ss">企业社保</div>--}}
{{--            <div class="qiye_btn zhuge_qiye_hf" style="margin-left:38px; ">企业公积金</div>--}}
{{--        </div>--}}

{{--        <div class="animated qiye_title_none qiye_title  qiye-show">--}}
{{--            <div class="qiye-first-title">企业定制化保护服务，为中小企业而生</div>--}}
{{--            <div class="qiye-scend-title">高效管理，一站式操作，降低用工风险，超2W+企业使用</div>--}}
{{--            <ul class="qiye-content">--}}
{{--                <li class="qiye_li">--}}
{{--                    <div class="radio_b"></div>--}}
{{--                    社保开户/转入;--}}
{{--                </li>--}}
{{--                <li class="qiye_li">--}}
{{--                    <div class="radio_b"></div>--}}
{{--                    社保基数核定;--}}
{{--                </li>--}}
{{--                <li class="qiye_li">--}}
{{--                    <div class="radio_b"></div>--}}
{{--                    社保人员一键增减;--}}
{{--                </li>--}}
{{--                <li class="qiye_li">--}}
{{--                    <div class="radio_b"></div>--}}
{{--                    社保费用计算和缴纳;--}}
{{--                </li>--}}
{{--                <li class="qiye_li">--}}
{{--                    <div class="radio_b"></div>--}}
{{--                    费用报销及政策享受条件咨询--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--            <div class="qiye_liaojie zhuge_about_more_ss" >了解更多--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="animated  qiye_title_none qiyegjj_title">--}}
{{--            <div class="qiye-first-title">企业定制化保护服务，为中小企业而生</div>--}}
{{--            <div class="qiye-scend-title">高效管理，一站式操作，降低用工风险，超2W+企业使用</div>--}}
{{--            <ul class="qiye-content">--}}
{{--                <li class="qiye_li">--}}
{{--                    <div class="radio_b"></div>--}}
{{--                    公积金开户/转入;--}}
{{--                </li>--}}
{{--                <li class="qiye_li">--}}
{{--                    <div class="radio_b"></div>--}}
{{--                    公积金基数核定;--}}
{{--                </li>--}}
{{--                <li class="qiye_li">--}}
{{--                    <div class="radio_b"></div>--}}
{{--                    公积金年检和对账;--}}
{{--                </li>--}}
{{--                <li class="qiye_li">--}}
{{--                    <div class="radio_b"></div>--}}
{{--                    公积金费用计算和缴纳;--}}
{{--                </li>--}}
{{--                <li class="qiye_li">--}}
{{--                    <div class="radio_b"></div>--}}
{{--                    公积金贷款和支取的咨询和办理;--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--            <div class="zhuge_about_more_hf" >了解更多--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="qiye-taodian fr">--}}
{{--        <div class="qiye-content-left fl">--}}
{{--            <div class="select_box1">--}}
{{--                <span>企业名称</span>--}}
{{--                <input type="text" id="enterprise_name" class="input_txt" value="">--}}
{{--            </div>--}}
{{--            <div class="select_box1">--}}
{{--                <span>联系人</span>--}}
{{--                <input type="text" id="enterprise_man" class="input_txt" value="">--}}
{{--            </div>--}}
{{--            <div class="select_box1">--}}
{{--                <span>联系电话</span>--}}
{{--                <input type="text" id="enterprise_tel" class="input_txt" value="">--}}
{{--            </div>--}}
{{--            <div class="select_box1">--}}
{{--                <span>地区</span>--}}
{{--                <select name="ddlPrivece" id="ddlPrivece" class="select_ele"--}}
{{--                        onchange="searchCity('#ddlPrivece','#ddlCity')">--}}
{{--                    <option value="">请选择省份</option>--}}
{{--                </select>--}}
{{--                <select name="ddlCity" id="ddlCity" style="margin-left: 10px;" class="select_ele">--}}
{{--                    <option value="">请选择城市</option>--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <div class="select_box1">--}}
{{--                <span>所属行业</span>--}}
{{--                <select name="" id="enterprise" class="select_ele  select_ele1">--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <div class="select_box1">--}}
{{--                <span>企业规模</span>--}}
{{--                <select name="" id="enterprise_type" class="select_ele select_ele1">--}}
{{--                    <option value="">请选择规模</option>--}}
{{--                    <option value="20人以下">20人以下</option>--}}
{{--                    <option value="20-99人">20-99人</option>--}}
{{--                    <option value="100-499人">100-499人</option>--}}
{{--                    <option value="500-999人">500-999人</option>--}}
{{--                    <option value="1000-9999人">1000-9999人</option>--}}
{{--                    <option value="10000人以上">10000人以上</option>--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <div class="select_box1">--}}
{{--                <span>具体需求</span>--}}
{{--                <textarea name="" id="text_box" cols="30" rows="10"></textarea>--}}
{{--            </div>--}}
{{--            <div class="select_box1">--}}
{{--                <span></span>--}}
{{--                <input type="button" id="enter_sub" class="qiye-shenqing-btn" value="申请企业开户">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!--企业定制服务e-->--}}
<!--客户见证模块e-->
<div class="kehu_module">
    <div class="w1200" style="overflow: hidden;">
        <div class="shebao-nav">客户见证</div>
        <div class=" swiper-container2">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="kehu_bg">
                        <div class="kehu_miaoshu">
                            自己做影楼行业，规模不算大。也没有自己的社保账户，社保一直困扰着我，通过身边的朋友知道了人人保，我选择了年付社保，既省心又省钱，在人人保交我很放心。
                        </div>
                    </div>
                    <div class="kehu_bott">
                        <div class="left_kh">
                            <img src="https://uplt.rrb365.com/image/20181107/2018110711153064285.png" alt="">
                        </div>
                        <div class="right_kh">
                            <div class="kehu_name">小李</div>
                            <div>职业：<span>摄影师</span> &nbsp;&nbsp; &nbsp; 地区：<span>河北省</span>
                            </div>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="kehu_bg">
                        <div class="kehu_miaoshu">
                            我现在做的是兼职，单位不给交，自己交特别麻烦，后来我找到了人人保，可以直接在网上缴费，用起来方便多了，解决了我的烦恼。非常感谢人人保。
                        </div>
                    </div>
                    <div class="kehu_bott">
                        <div class="left_kh">
                            <img src="https://uplt.rrb365.com/image/20181107/2018110711153871699.png" alt="">
                        </div>
                        <div class="right_kh">
                            <div class="kehu_name">小峰</div>
                            <div>职业：<span>自由职业者</span> &nbsp;&nbsp; &nbsp; 地区：<span>天津市</span>
                            </div>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="kehu_bg">
                        <div class="kehu_miaoshu">
                            裸辞后做了自己的淘宝店铺，可是社保不能断啊，因为我还要去医院定期开药，然后问了度娘和知乎，综合比较还是选择了人人保，客服很贴心的帮我考虑问题。
                        </div>
                    </div>
                    <div class="kehu_bott">
                        <div class="left_kh">
                            <img src="https://uplt.rrb365.com/image/20181107/2018110711160360862.png" alt="">
                        </div>
                        <div class="right_kh">
                            <div class="kehu_name">半夏</div>
                            <div>职业：<span>淘宝店主</span> &nbsp;&nbsp; &nbsp; 地区：<span>北京</span>
                            </div>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="kehu_bg">
                        <div class="kehu_miaoshu">
                            我一直在家陪孩子，想着社保也交了几年了，现在断了的话不划算。闺蜜说她正在人人保交社保，挺不错的，服务费还便宜，所以我也在人人保交了，真的挺方便的。
                        </div>
                    </div>
                    <div class="kehu_bott">
                        <div class="left_kh">
                            <img src="https://uplt.rrb365.com/image/20181107/2018110711161556247.png" alt="">
                        </div>
                        <div class="right_kh">
                            <div class="kehu_name">佳佳</div>
                            <div>职业：<span>全职妈妈</span> &nbsp;&nbsp; &nbsp; 地区：<span>北京</span>
                            </div>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="kehu_bg">
                        <div class="kehu_miaoshu">
                            由于个人原因离职了，社保又不想断交，头痛的很。朋友说可以找代缴公司，后来了解到人人保，沟通完感觉还挺专业的，试着交了半年，一切正常，售后什么的都很不错。
                        </div>
                    </div>
                    <div class="kehu_bott">
                        <div class="left_kh">
                            <img src="https://uplt.rrb365.com/image/20181107/2018110711162574533.png" alt="">
                        </div>
                        <div class="right_kh">
                            <div class="kehu_name">彭彭</div>
                            <div>职业：<span>上班族</span> &nbsp;&nbsp; &nbsp; 地区：<span>上海</span>
                            </div>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
<!--新闻资讯模块s-->
@endsection
