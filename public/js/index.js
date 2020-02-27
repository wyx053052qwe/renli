
$('.mingxi').on('click', function () {
    zhuge.track('pc_首页_点击社保计算明细', {
        '首页社保计算明细': ''
    });
});

$('.zhuge_buy_ss').on('click', function () {
    zhuge.track('pc_首页_点击购买套餐', {
        '首页购买套餐': '社保'
    });

    location.href = '/?app=social/pay_social'
});

$('.zhuge_buy_hf').on('click', function () {
    zhuge.track('pc_首页_点击购买套餐', {
        '首页购买套餐': '公积金'
    });

    location.href = '/?app=fund/pay_fund'
});

$('.zhuge_index_zixun_hf').on('click', function () {
    zhuge.track('pc_首页_点击免费咨询', {
        '首页免费咨询': '公积金'
    });

    window.open('http://p.qiao.baidu.com/cps/chat?siteId=13047548&userId=27282829', '_blank')
});

$('.zhuge_index_zixun_ss').on('click', function () {
    zhuge.track('pc_首页_点击免费咨询', {
        '首页免费咨询': '公积金'
    });

    window.open('http://p.qiao.baidu.com/cps/chat?siteId=13047548&userId=27282829', '_blank')
});

$('.zhuge_qiye_ss').on('click', function () {
    zhuge.track('pc_首页_点击企业服务', {
        '首页企业服务': '社保'
    });
});

$('.zhuge_qiye_hf').on('click', function () {
    zhuge.track('pc_首页_点击企业服务', {
        '首页企业服务': '公积金'
    });
});

$('.zhuge_about_more_ss').on('click', function () {
    zhuge.track('pc_首页_点击企业了解更多', {
        '首页企业服务更多': '社保'
    });

    window.open('/qiye', '_blank')
});

$('.zhuge_about_more_hf').on('click', function () {
    zhuge.track('pc_首页_点击企业了解更多', {
        '首页企业服务更多': '公积金'
    });

    window.open('/qiye', '_blank')
});

$('.zhuge_index_news').on('click', function () {
    var data_href = $(this).attr('data_href');
    var data_title = $(this).attr('data_title');

    zhuge.track('pc_首页_点击资讯', {
        '首页资讯': ''
    });

    window.open(data_href, '_blank')
});


