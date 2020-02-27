//诸葛统计
$('.zhuge_header').on('click', function () {
    var data_href = $(this).attr('data_href');
    var data_title = $(this).attr('data_title');

    zhuge.track('pc_公共导航_点击导航', {
        '导航': data_title
    });

    location.href = data_href
});
