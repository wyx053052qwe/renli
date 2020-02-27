// (function ($) {
//     $.fn.jkqRoll = function (options) {
//
//         $.fn.jkqRoll.defaultPara = {
//             type: "fade",   //fade 渐显
//             autoPlay: true,   //是否自动播放
//             autoRandom: false,  //是否随机播放
//             isBg: false,   //是否是背景轮播
//             isRollTitle: true,    //是否自动显示轮播数字
//             conTime: 1000, //效果持续时间
//             autoTime: 5000, //自动运行间隔 当type为无缝滚动的时候 相当于运行速度。
//             defaultIndex: 0, //默认的当前位置索引 0是第一个
//             moveNum: 1,   //每次移动个数
//             moveRange: 590,  //每次移动距离
//             rollTitle: ".RollTit ul",
//             titleSelectClass: "select", //当前选中项对应的class名称
//             rollCon: ".RollCon ul",
//             leftCell: ".leftArrow",    //左边按钮
//             rightCell: ".rightArrow",    //右边按钮
//             trigger: "mouseover"    //触发方式
//         }
//         return this.each(function () {
//             var opts = $.extend({}, $.fn.jkqRoll.defaultPara, options);
//             var index = opts.defaultIndex;
//             var rollTitle = $(opts.rollTitle, $(this));
//             var rollBox = $(opts.rollCon, $(this));
//             var rollBoxSize = rollBox.children().size() / opts.moveNum;
//             var leftBtn = $(opts.leftCell, $(this));
//             var rightBtn = $(opts.rightCell, $(this));
//             var interval = null;
//             var autoPlay = opts.autoPlay;
//             var moveRange = opts.moveRange * opts.moveNum;
//
//             //alert(rollBoxSize);
//
//             var GetRandomNum = function (Min, Max) {
//                 var Range = Max - Min;
//                 var Rand = Math.random();
//                 return (Min + Math.round(Rand * Range));
//             }
//
//             rollTitle.html("");
//             for (var i = 1; i <= rollBoxSize; i++) {
//                 rollTitle.append("<li" + (i == 1 ? " class=\"select\"" : "") + ">" + (opts.isRollTitle ? i.toString() : "") + "</li>");
//             }
//
//             if (opts.isBg) {
//                 var img = null;
//                 rollBox.children().each(function () {
//                     img = $(this).find("img");
//                     $(this).find("a").css({ "background": "url(" + img.attr("src") + ") no-repeat top center", "display": "block", " width": "100%", "height": img.height() });
//                     img.remove();
//                 });
//             }
//             switch (opts.type) {
//                 case "left":
//                     rollBox.wrap('<div style="overflow:hidden;width:' + moveRange + 'px;position:relative;"></div>').
//                     css({ "width": (moveRange * rollBoxSize) + "px", "overflow": "hidden", "padding": "0", "margin": "0", "position": "relative" }).
//                     children().css({ "float": "left", "width": opts.moveRange + "px" });
//                     break;
//                 case "top":
//                     rollBox.wrap('<div style="overflow:hidden;position:relative;height:' + moveRange + 'px;"></div>').
//                     css({ "padding": "0", "margin": "0", "position": "relative" }).
//                     children().css({ "height": "" + moveRange + "px" });
//                     break;
//                 default:
//                     break;
//             }
//
//             var Plays = function () {
//                 if (opts.autoRandom) {
//                     var random = GetRandomNum(0, rollBoxSize - 1);
//                     if (random == index)
//                         index = random++;
//                     else
//                         index = random;
//                 }
//                 if (index >= rollBoxSize) {
//                     index = 0;
//                 } else if (index < 0) {
//                     index = rollBoxSize - 1;
//                 }
//
//                 switch (opts.type) {
//                     case "fade":
//                         rollBox.children().stop(true, true).eq(index).fadeIn(opts.conTime).siblings().hide();
//                         break;
//                     case "left":
//                         rollBox.stop(true, false).animate({ "left": parseInt(-index) * moveRange }, opts.conTime);
//                         break;
//                     case "top":
//                         rollBox.stop(true, false).animate({ "top": parseInt(-index) * moveRange }, opts.conTime);
//                         break;
//                     default:
//                         break;
//                 }
//                 rollTitle.children().removeClass(opts.titleSelectClass).eq(index).addClass(opts.titleSelectClass);
//             }
//             //初始化
//             Plays();
//             //是否自动循环
//             if (autoPlay) {
//                 interval = setInterval(function () { index++; Plays() }, opts.autoTime);
//
//                 $(this).hover(function () {
//                     if (autoPlay) {
//                         clearInterval(interval);
//                     }
//                 }, function () {
//                     if (autoPlay) {
//                         clearInterval(interval);
//                         interval = setInterval(function () { index++; Plays() }, opts.autoTime);
//                     }
//                 });
//             }
//             //鼠标事件
//             var mst;
//             if (opts.trigger == "mouseover") {
//                 rollTitle.children().hover(function () {
//                     clearTimeout(mst); index = rollTitle.children().index(this); mst = window.setTimeout(Plays, 200);
//                 }, function () { if (!mst) clearTimeout(mst); });
//                 leftBtn.mouseover(function () { index--; Plays(); });
//                 rightBtn.mouseover(function () { index++; Plays(); });
//             } else {
//                 rollTitle.children().click(function () { index = rollTitle.children().index(this); Plays(); });
//                 leftBtn.click(function () { index--; Plays(); });
//                 rightBtn.click(function () { index++; Plays(); });
//             }
//         });
//     };
// })(jQuery);
function banner(){
    var bn_id = 0;
    var bn_id2= 1;
    var speed33=5000;
    var qhjg = 1;
    var MyMar33;
    $("#banner .d1").hide();
    $("#banner .d1").eq(0).fadeIn("slow");
    if($("#banner .d1").length>1)
    {
        $("#banner_id li").eq(0).addClass("nuw");
        function Marquee33(){
            bn_id2 = bn_id+1;
            if(bn_id2>$("#banner .d1").length-1)
            {
                bn_id2 = 0;
            }
            $("#banner .d1").eq(bn_id).css("z-index","2");
            $("#banner .d1").eq(bn_id2).css("z-index","1");
            $("#banner .d1").eq(bn_id2).show();
            $("#banner .d1").eq(bn_id).fadeOut("slow");
            $("#banner_id li").removeClass("nuw");
            $("#banner_id li").eq(bn_id2).addClass("nuw");
            bn_id=bn_id2;
        };

        MyMar33=setInterval(Marquee33,speed33);

        $("#banner_id li").click(function(){
            var bn_id3 = $("#banner_id li").index(this);
            if(bn_id3!=bn_id&&qhjg==1)
            {
                qhjg = 0;
                $("#banner .d1").eq(bn_id).css("z-index","2");
                $("#banner .d1").eq(bn_id3).css("z-index","1");
                $("#banner .d1").eq(bn_id3).show();
                $("#banner .d1").eq(bn_id).fadeOut("slow",function(){qhjg = 1;});
                $("#banner_id li").removeClass("nuw");
                $("#banner_id li").eq(bn_id3).addClass("nuw");
                bn_id=bn_id3;
            }
        })
        $("#banner_id").hover(
            function(){
                clearInterval(MyMar33);
            }
            ,
            function(){
                MyMar33=setInterval(Marquee33,speed33);
            }
        )
    }
    else
    {
        $("#banner_id").hide();
    }
}


