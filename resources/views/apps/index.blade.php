@extends('layouts.apps')
@section('content')
<!-- 清楚浮动 加上clear_both类名 -->
<div class="index_warp">
    <div class="index_header">
        <img src="/templates/images/logo-head@2x.png" alt="" class="index_logo">
        <a href="tel:400-862-0588"><img src="/templates/new_module/images/tel.png" alt="" class="index_tel"></a>
    </div>
    <div style="height: 1.36666rem;"></div>
    <div class="index_banner_warp index_banner">
        <div class="swiper-container  index_banner_list">
            <div class="index_banner_item swiper-wrapper">
                <div class="swiper-slide">
                    <a href="javascript:;"  onclick="top_slide_click('','企业减免社保声明')"> <img src="https://upload.rrb365.com/image/20200225/2020022515001046219.png" alt="企业减免社保声明"> </a>
                </div>
                <div class="swiper-slide">
                    <a href="javascript:;"  onclick="top_slide_click('','驰援武汉，服务费全免')"> <img src="https://upload.rrb365.com/image/20200213/2020021318150919732.png" alt="驰援武汉，服务费全免"> </a>
                </div>
                <div class="swiper-slide">
                    <a href="javascript:;"  onclick="top_slide_click('','疫情防控新举措')"> <img src="https://upload.rrb365.com/image/20200208/2020020816534279500.png" alt="疫情防控新举措"> </a>
                </div>
                <div class="swiper-slide">
                    <a href="javascript:;"  onclick="top_slide_click('','足不出户缴社保')"> <img src="https://upload.rrb365.com/image/20200207/2020020713093628348.png" alt="足不出户缴社保"> </a>
                </div>
            </div>

            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
        <!--<ul class="index_banner_tab clear_both">-->
        <!--<li class="index_banner_tab_item"></li>-->
        <!--</ul>-->
    </div>
    <div class="index_nav_list clear_both">
        <div class="index_nav_item" data_href="{{url('/app/shebao')}}" data_title="社保" data_shijian="点击缴社保">
            <img src="/templates/new_module/images/home_icon_jsb.png" alt="" class="index_nav_img">
            <p>缴社保</p>
        </div>
        <div class="index_nav_item"  data_href="{{url('/app/gongjijin')}}" data_title="公积金" data_shijian="点击缴公积金">
            <img src="/templates/new_module/images/home_icon_jgjj.png" alt="" class="index_nav_img">
            <p>缴公积金</p>
        </div>
        <!--<div class="index_nav_item"  data_href="/?app=salary/index" data_title="薪酬管理" data_shijian="点击缴公积金">-->
        <!--<img src="/templates/new_module/images/icon_one@2x.png" alt="" class="index_nav_img">-->
        <!--<p>薪酬管理</p>-->
        <!--</div>-->
<!--        <div class="index_nav_item"  data_href="/zengzhi" data_title="增值服务" data_shijian="点击增值服务">-->
<!--            <img src="/templates/new_module/images/home_icon_zzfw.png" alt="" class="index_nav_img">-->
<!--            <p>增值服务</p>-->
<!--        </div>-->
<!--        <div class="index_nav_item"  data_href="/?app=index/gongju" data_title="自助工具" data_shijian="点击查社保">-->
<!--            <img src="/templates/new_module/images/icon_1@2x.png" alt="" class="index_nav_img">-->
<!--            <p>自助工具</p>-->
<!--        </div>-->
        <!---->
        <!--<div class="index_nav_item" data_href="https://m.health.pingan.com/activity/2020/antiEpidemic_plan/index.html?re_from=sat_beijing_rrbb&order_from=sat_beijing_rrbb" data_title="免费新冠肺炎保险" data_shijian="点击免费新冠肺炎保险">-->
        <!--<a href="javascript:;"> <img src="https://upload.rrb365.com/image/20200211/2020021111340877256.png" alt="" class="index_nav_img"></a>-->
        <!--<p>免费新冠肺炎保险</p>-->
        <!--</div>-->
        <!---->
        <!--<div class="index_nav_item" data_href="https://m.renrenbao.com/?app=insure/index" data_title="商业保险" data_shijian="点击商业保险">-->
        <!--<a href="javascript:;"> <img src="https://uplt.rrb365.com/image/20190725/2019072517345471878.png" alt="" class="index_nav_img"></a>-->
        <!--<p>商业保险</p>-->
        <!--</div>-->
        <!---->
        <!--<div class="index_nav_item" data_href="https://m.renrenbao.com/?app=examination/index" data_title="健康体检" data_shijian="点击健康体检">-->
        <!--<a href="javascript:;"> <img src="https://uplt.rrb365.com/image/20190725/2019072517293216361.png" alt="" class="index_nav_img"></a>-->
        <!--<p>健康体检</p>-->
        <!--</div>-->
        <!---->
        <!--<div class="index_nav_item" data_href="http://m.zhuge.com/city/house/?ad_source=cpc_renrenbao&spread=sem_cpc_renrenbao" data_title="买房租房" data_shijian="点击买房租房">-->
        <!--<a href="javascript:;"> <img src="https://uplt.rrb365.com/image/20190725/2019072517302321793.png" alt="" class="index_nav_img"></a>-->
        <!--<p>买房租房</p>-->
        <!--</div>-->
        <!---->
        <!--<div class="index_nav_item" data_href="https://promo.guahao.com/topic/pneumonia?_cp=renrenbao" data_title="在线问诊" data_shijian="点击在线问诊">-->
        <!--<a href="javascript:;"> <img src="https://upload.rrb365.com/image/20200205/2020020509101654881.png" alt="" class="index_nav_img"></a>-->
        <!--<p>在线问诊</p>-->
        <!--</div>-->
        <!---->
    </div>
    <div class="index_new_zui">
        <div class="index_new_zui_list clear_both">
            <img src="/templates/new_module/images/new.png" alt="" class="index_new_zui_img">
            <div class="swiper-container1 " style="width: 7.2rem;float: left;height: 0.4rem;overflow: hidden">
                <div class=" swiper-wrapper">
                    <div class="swiper-slide index_new_zui_text">
                        北京 刘** 成功缴纳社保 2020-02-26 13:33:26
                    </div>
                    <div class="swiper-slide index_new_zui_text">
                        北京 崔** 成功缴纳社保 2020-02-26 13:03:25
                    </div>
                    <div class="swiper-slide index_new_zui_text">
                        广州 彭** 成功缴纳社保 2020-02-26 13:00:17
                    </div>
                    <div class="swiper-slide index_new_zui_text">
                        广州 彭** 成功缴纳公积金 2020-02-26 12:59:19
                    </div>
                    <div class="swiper-slide index_new_zui_text">
                        广州 彭** 成功缴纳公积金 2020-02-26 12:58:14
                    </div>
                    <div class="swiper-slide index_new_zui_text">
                        广州 彭** 成功缴纳社保 2020-02-26 12:50:17
                    </div>
                    <div class="swiper-slide index_new_zui_text">
                        北京 张** 成功缴纳社保 2020-02-26 12:39:53
                    </div>
                    <div class="swiper-slide index_new_zui_text">
                        北京 石** 成功缴纳社保 2020-02-26 12:09:58
                    </div>
                    <div class="swiper-slide index_new_zui_text">
                        北京 楚** 成功缴纳社保 2020-02-26 12:07:13
                    </div>
                    <div class="swiper-slide index_new_zui_text">
                        北京 楚** 成功缴纳公积金 2020-02-26 12:06:30
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--政策解读-->
    <div class="index_zhengce">
        <div class="index_title">政策解读</div>
        <ul class="index_zhengce_list clear_both index_zhengce_list_1">
            <li class="index_zhengce_item" data_href="/?app=index/house_policy" data_title="买房政策">
                <div class="index_zhengce_item_text">
                    <p class="index_service_title">买房政策</p>
                    <p class="index_service_text">买房政策要知道</p>
                </div>
                <img src="/templates/new_module/images/illustrator_home.png" alt="" class="index_zhengce_item_img">
            </li>
            <li class="index_zhengce_item index_zhengce_item_2" data_href="/?app=index/car_policy" data_title="买车政策">
                <div class="index_zhengce_item_text ">
                    <p class="index_service_title">买车政策</p>
                    <p class="index_service_text">买车摇号需资格</p>
                </div>
                <img src="/templates/new_module/images/illustrator_car.png" alt="" class="index_zhengce_item_img">
            </li>
        </ul>
        <ul class="index_zhengce_list clear_both index_zhengce_list_2">
            <li class="index_zhengce_item" data_href="/?app=index/school_policy" data_title="上学政策">
                <div class="index_zhengce_item_text">
                    <p class="index_service_title">上学政策</p>
                    <p class="index_service_text">孩子上学怎么办</p>
                </div>
                <img src="/templates/new_module/images/illustrator_study.png" alt="" class="index_zhengce_item_img">
            </li>
            <li class="index_zhengce_item index_zhengce_item_2" data_href="/?app=index/settle_policy" data_title="落户政策">
                <div class="index_zhengce_item_text">
                    <p class="index_service_title">落户政策</p>
                    <p class="index_service_text">积分落户有多远</p>
                </div>
                <img src="/templates/new_module/images/illustrator_bedroom.png" alt="" class="index_zhengce_item_img">
            </li>
        </ul>
    </div>
    <div class="index_adv_warp">
        <div class="clear_both index_adv_warp_item">
            <div class="swiper-container2  index_adv_warp_item">
                <div class=" swiper-wrapper index_adv_warp_item">
                    <div class="swiper-slide index_adv_warp_item" >
                        <a href="javascript:;"  > <img  class="middle_banner" data_href="https://m.renrenbao.com/shebao" data_title="疫情缴社保" src="https://upload.rrb365.com/image/20200225/2020022510433188069.png" alt="疫情缴社保"> </a>
                    </div>
                </div>

                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <div class="index_tuijian">
        <div class="index_title">推荐服务</div>
        <ul class="index_tuijian_list clear_both">
            <li class="index_tuijian_item" >
                <a href="javascript:;" class="index_nav_item1" data_href="https://m.health.pingan.com/activity/2020/antiEpidemic_plan/index.html?re_from=sat_beijing_rrbb&order_from=sat_beijing_rrbb" data_title="免费新冠肺炎保险" data_shijian="点击免费新冠肺炎保险">
                    <img src="https://upload.rrb365.com/image/20200211/2020021111340877256.png" alt="" class="index_tuijian_img">
                    <div>
                        <h4>免费新冠肺炎保险</h4>
                        <p>共同抗疫，公益保险免费领</p>
                    </div>
                </a>
            </li>
            <li class="index_tuijian_item" >
                <a href="javascript:;" class="index_nav_item1" data_href="https://m.renrenbao.com/?app=insure/index" data_title="商业保险" data_shijian="点击商业保险">
                    <img src="https://uplt.rrb365.com/image/20190725/2019072517345471878.png" alt="" class="index_tuijian_img">
                    <div>
                        <h4>商业保险</h4>
                        <p>社保+商保，生活更美好</p>
                    </div>
                </a>
            </li>
            <li class="index_tuijian_item" >
                <a href="javascript:;" class="index_nav_item1" data_href="https://m.renrenbao.com/?app=examination/index" data_title="健康体检" data_shijian="点击健康体检">
                    <img src="https://uplt.rrb365.com/image/20190725/2019072517293216361.png" alt="" class="index_tuijian_img">
                    <div>
                        <h4>健康体检</h4>
                        <p>关爱自己，从体检开始</p>
                    </div>
                </a>
            </li>
            <li class="index_tuijian_item" >
                <a href="javascript:;" class="index_nav_item1" data_href="http://m.zhuge.com/city/house/?ad_source=cpc_renrenbao&spread=sem_cpc_renrenbao" data_title="买房租房" data_shijian="点击买房租房">
                    <img src="https://uplt.rrb365.com/image/20190725/2019072517302321793.png" alt="" class="index_tuijian_img">
                    <div>
                        <h4>买房租房</h4>
                        <p>心中好房源，尽在掌握</p>
                    </div>
                </a>
            </li>
            <li class="index_tuijian_item" >
                <a href="javascript:;" class="index_nav_item1" data_href="https://promo.guahao.com/topic/pneumonia?_cp=renrenbao" data_title="在线问诊" data_shijian="点击在线问诊">
                    <img src="https://upload.rrb365.com/image/20200205/2020020509101654881.png" alt="" class="index_tuijian_img">
                    <div>
                        <h4>在线问诊</h4>
                        <p>免费在线问诊，共抗疫情</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <!--服务保障模块-->
    <div class="index_service">
        <div class="index_title" style="padding-top: 0">服务保障</div>
        <ul class="index_service_list clear_both">
            <li class="index_service_item">
                <img src="/templates/new_module/images/home_icon_15@2x.png" alt="" class="index_service_item_img">
                <h4>安全放心</h4>
                <p><span>1000平方米</span>真实办公场地，</p>
                <p>人社部批准社保代缴机构</p>
            </li>
            <li class="index_service_item">
                <img src="/templates/new_module/images/home_icon_16@2x.png" alt="" class="index_service_item_img">
                <h4>专业服务</h4>
                <p><span>5年</span>耗资千万打造社保代缴</p>
                <p>系统，<span>18道工序</span>拒绝断缴</p>
            </li>
            <li class="index_service_item">
                <img src="/templates/new_module/images/home_icon_17@2x.png" alt="" class="index_service_item_img">
                <h4>有应必回</h4>
                <p><span>7X24小时</span>专属客服答疑，</p>
                <p>一次服务获<span>永久</span>社保管家</p>
            </li>
            <li class="index_service_item">
                <img src="/templates/new_module/images/home_icon_18@2x.png" alt="" class="index_service_item_img">
                <h4>优质体验</h4>
                <p><span>3分钟</span>快速缴纳，动态服务</p>
                <p>参保进度随时查看</p>
            </li>
            <li class="index_service_item">
                <img src="/templates/new_module/images/home_icon_19@2x.png" alt="" class="index_service_item_img">
                <h4>业务全面</h4>
                <p>多种增值服务，为不同需求</p>
                <p>用户指定<span>专属</span>解决方案</p>
            </li>
            <li class="index_service_item">
                <img src="/templates/new_module/images/home_icon_20@2x.png" alt="" class="index_service_item_img">
                <h4>更多选择</h4>
                <p>每<span>5</span>个人中就有<span>3</span>个人选择</p>
                <p>人人保代缴</p>
            </li>
        </ul>
    </div>
    <!--新闻资讯模块-->
    <div class="module_x">
        <div class="title title1">
            <h3>新闻资讯</h3>
            <a class="news_more" href="/news">更多&nbsp;></a>
        </div>
        <ul class="news_list">
            <li>
                <a href="javascript:;" class="news_click" data_href="/news/2865.html" data_title="辞职个人社保怎么办">
                    <span class="news_title">辞职个人社保怎么办</span>
                    <div class="news_botm">
                        <div class="news_tag">社保知识</div>
                        <div class="news_time">
                            <span>一叶知秋</span> &nbsp; &nbsp;
                            <span>2020-02-25</span>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="javascript:;" class="news_click" data_href="/news/2863.html" data_title="在没有工作时候，自己怎么缴纳社保？">
                    <span class="news_title">在没有工作时候，自己怎么缴纳社保？</span>
                    <div class="news_botm">
                        <div class="news_tag">社保知识</div>
                        <div class="news_time">
                            <span>一叶知秋</span> &nbsp; &nbsp;
                            <span>2020-02-25</span>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="javascript:;" class="news_click" data_href="/news/2862.html" data_title="离职期间个人社保怎么办？">
                    <span class="news_title">离职期间个人社保怎么办？</span>
                    <div class="news_botm">
                        <div class="news_tag">社保知识</div>
                        <div class="news_time">
                            <span>Mis_Dan</span> &nbsp; &nbsp;
                            <span>2020-02-25</span>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="javascript:;" class="news_click" data_href="/news/2857.html" data_title="失业期间社保自己怎么缴纳？">
                    <span class="news_title">失业期间社保自己怎么缴纳？</span>
                    <div class="news_botm">
                        <div class="news_tag">社保知识</div>
                        <div class="news_time">
                            <span>一叶知秋</span> &nbsp; &nbsp;
                            <span>2020-02-24</span>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="javascript:;" class="news_click" data_href="/news/2856.html" data_title="没工作时自己怎么缴纳社保？">
                    <span class="news_title">没工作时自己怎么缴纳社保？</span>
                    <div class="news_botm">
                        <div class="news_tag">社保知识</div>
                        <div class="news_time">
                            <span>一叶知秋</span> &nbsp; &nbsp;
                            <span>2020-02-24</span>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="javascript:;" class="news_click" data_href="/news/2855.html" data_title="北京个人缴纳社保一个月多少钱">
                    <span class="news_title">北京个人缴纳社保一个月多少钱</span>
                    <div class="news_botm">
                        <div class="news_tag">社保知识</div>
                        <div class="news_time">
                            <span>Mis_Dan</span> &nbsp; &nbsp;
                            <span>2020-02-24</span>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="javascript:;" class="news_click" data_href="/news/2854.html" data_title="个人怎么缴纳社保最合适？">
                    <span class="news_title">个人怎么缴纳社保最合适？</span>
                    <div class="news_botm">
                        <div class="news_tag">社保知识</div>
                        <div class="news_time">
                            <span>一叶知秋</span> &nbsp; &nbsp;
                            <span>2020-02-21</span>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="javascript:;" class="news_click" data_href="/news/2853.html" data_title="上海外地个人社保怎么交">
                    <span class="news_title">上海外地个人社保怎么交</span>
                    <div class="news_botm">
                        <div class="news_tag">社保知识</div>
                        <div class="news_time">
                            <span>Mis_Dan</span> &nbsp; &nbsp;
                            <span>2020-02-21</span>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="javascript:;" class="news_click" data_href="/news/2852.html" data_title="自己找代缴公司交社保怎么选">
                    <span class="news_title">自己找代缴公司交社保怎么选</span>
                    <div class="news_botm">
                        <div class="news_tag">社保知识</div>
                        <div class="news_time">
                            <span>一叶知秋</span> &nbsp; &nbsp;
                            <span>2020-02-21</span>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="javascript:;" class="news_click" data_href="/news/2849.html" data_title="辞职没工作自己怎么交社保">
                    <span class="news_title">辞职没工作自己怎么交社保</span>
                    <div class="news_botm">
                        <div class="news_tag">社保知识</div>
                        <div class="news_time">
                            <span>Mis_Dan</span> &nbsp; &nbsp;
                            <span>2020-02-20</span>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <!--弹框样式-->
    <div class="content_href">
        <div class="content_con_warp">
            <div class="content_con">
                <img src="/templates/new_module/images/logo.png" alt="" class="content_logo">
                <p>人人保.专业客服.答疑解惑</p>
                <div>
                    <div class="btn line_btn"><a href="http://p.qiao.baidu.com/cps/chat?siteId=13047548&userId=27282829" id="index_tall" data_tall="http://p.qiao.baidu.com/cps/chat?siteId=13047548&userId=27282829">在线咨询</a></div>
                    <div class="btn"><a href="tel:400-862-0588" id="index_tel" data_tel="400-862-0588">电话联系</a></div>
                </div>
            </div>
            <img src="/templates/images/close1@2x.png" alt="" class="close">
        </div>
    </div>
    <!--    抽奖弹框-->
    <!--    <div class="cj-warp">-->
    <!--        <div class="cj-div">-->
    <!--            <img src="/templates/new_module/images/ha.png"  class="cj-img" onclick="location.href='/?app=index/login'">-->
    <!--            <img src="/templates/new_module/images/del.png" alt="" class="cj-close">-->
    <!--        </div>-->
    <!---->
    <!--    </div>-->
    <!--浮窗-->
    <div class="fuchuang-warp">
        <img class="fc-close" src="/templates/new_module/images/f-close.png"/>
        <img src="/templates/new_module/images/f-img.png" alt="" class="fc-img" onclick="location.href='/?app=index/login'">

    </div>
    <div class="index_banner_footer">
        <img src="/templates/new_module/images/home_img_4.png" alt="">
        <a href="http://www.beian.miit.gov.cn" target="_blank" style="font-size: 0.293333rem; color: #989898">京ICP备19002972号-1</a>
    </div>
    <!--底部-->
    <div class="header_footer">
        <ul class="header_footer_list">
            <li class="header_footer_item bottom_zhuge" data_href="{{url('/app/index')}}" data_title="首页">
                <img src="/templates/new_module/images/choose_homepage@2x.png" alt="" class="header_footer_img" >
                <p >首页</p>
            </li>
            <li class="header_footer_item bottom_zhuge" data_href="{{url('/app/order')}}" data_title="订单" >
                <img src="/templates/new_module/images/unchoose_order@2x.png" alt="" class="header_footer_img">
                <p>订单</p>
            </li>
        </ul>
    </div>
    @endsection
