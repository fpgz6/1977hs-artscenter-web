<?php if (!defined('THINK_PATH')) exit();?><style>
#Copyright{color:#646464;text-align:center;background:rgba(0,0,0,0.5);position:fixed;bottom:52px;width:100%;max-width: 640px;
font-size: 12px;text-align: center;width: 16px;height: 99px;opacity: 0.8;right: 0;border-radius: 4px;line-height: 1.2;
background: #fff;padding:3px 0;display:block;z-index:9999;
background: -moz-linear-gradient( #fff, #f5f5f5);
background: -webkit-linear-gradient( #fff, #f5f5f5);
background: -ms-linear-gradient( #fff, #f5f5f5);
background: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#f5f5f5));
background: linear-gradient( #fff, #f5f5f5);}
#Copyright img{vertical-align: sub;width: 16px;height: 14px;display:block;margin-bottom:2px;}
</style>
<!DOCTYPE HTML> 
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="apple-touch-fullscreen" content="no" />
<meta content="telephone=no" name="format-detection" />
<meta name="apple-mobile-web-app-capable" content="no" />
<link rel="icon" href="/1977hs/Uploads/logo.png">
<title>兰州1977画室|兰州画室|兰州美术培训|1977微官网</title>
<meta name="keywords" content="画室,兰州画室,1977画室,兰州1977画室,兰州美术高考,兰州美术培训,兰州美术培训班,兰州美术高考培训班,兰州最好的画室,1977微官网"/>
<meta name="description" content="画室,兰州画室,1977画室,兰州1977画室,兰州美术高考,兰州美术培训,兰州美术培训班,兰州美术高考培训班,兰州最好的画室,1977微官网" /> 
<link href="/1977hs/Public/Css/mobile/public.css" rel="stylesheet"/>
<link href="/1977hs/Public/Css/mobile/style.css" rel="stylesheet"/>
<script type="application/javascript" src="/1977hs/Public/Js/mobile/iscroll.js"></script>
<script src="/1977hs/Public/Js/jquery.min.js"></script>
<script src="/1977hs/Public/Js/bootstrap.min.js"></script>
<script src="/1977hs/Public/Js/mobile/swipe.js"></script>
<link href="/1977hs/Public/Css/mobile/swipe.css" rel="stylesheet"/>
<script src="/1977hs/Public/Js/mobile/jquery-1.8.0.min.js"></script>
<script src="/1977hs/Public/Js/mobile/common.js"></script>

<script>
var myScroll,
    pullDownEl, pullDownOffset,
    pullUpEl, pullUpOffset,
    generatedCount = 0;

function pullDownAction () {
    setTimeout(function () {    // <-- Simulate network congestion, remove setTimeout from production!
        var el, li, i;
        el = document.getElementById('thelist');

        for (i=0; i<3; i++) {
            li = document.createElement('li');
            li.innerText = 'Generated row ' + (++generatedCount);
            el.insertBefore(li, el.childNodes[0]);
        }
        
        myScroll.refresh();     // Remember to refresh when contents are loaded (ie: on ajax completion)
    }, 1000);   // <-- Simulate network congestion, remove setTimeout from production!
}

function pullUpAction () {
    setTimeout(function () {    // <-- Simulate network congestion, remove setTimeout from production!
        var el, li, i;
        el = document.getElementById('thelist');

        for (i=0; i<3; i++) {
            li = document.createElement('li');
            li.innerText = 'Generated row ' + (++generatedCount);
            el.appendChild(li, el.childNodes[0]);
        }
        
        myScroll.refresh();     // Remember to refresh when contents are loaded (ie: on ajax completion)
    }, 1000);   // <-- Simulate network congestion, remove setTimeout from production!
}

var showItem = 3;
var n = 1;
function loaded() {
    pullDownEl = document.getElementById('pullDown');
    pullDownOffset = pullDownEl.offsetHeight;
    pullUpEl = document.getElementById('pullUp');   
    pullUpOffset = pullUpEl.offsetHeight;
    
    myScroll = new iScroll('wrapper', {
        momentum: false,
        useTransition: true,
        topOffset: pullDownOffset,
        onRefresh: function () {

        },
        onScrollMove: function () {
            if (this.y < -90*n) {
                this.y = -90*n;
                n += 1;
                console.log(this.y);
                scrollOffset = 0;
                /*myScroll.stop();*/
                showItem +=1;
                $(".scrollNav-2 .scroller li").eq(showItem).css("visibility","visible").hide().fadeIn();
            };
        },
        onScrollEnd: function () {
            
        }
    });
    
    setTimeout(function () { document.getElementById('wrapper').style.left = '0'; }, 800);
}

document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);

document.addEventListener('DOMContentLoaded', function () { setTimeout(loaded, 200); }, false);
</script>
</head>
<body style="overflow:hidden">
<div id="banner">
    <div id='mySwipe' class='swipe'>
        <div class='swipe-wrap'>
            <div style="background:url(/1977hs/Uploads/img/2015/mobilebackground.jpg) center top no-repeat;background-size:cover;height: 100%;">
            </div>
        </div>
    </div>
</div>
<div id="scrollNav" class="scrollNav-2">
    <div id="wrapper">
        <div class="scroller">
            <div id="pullDown"></div>
            <ul id="thelist" class="clearfix">
                <li>
                    <a href="<?php echo U('Aboutus/index');?>">
                        <h2>关于1977</h2>
                        <p style="padding-top:0px">ABOUT US</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Strength/index');?>">
                        <h2>实力展示</h2>
                        <p style="padding-top:0px">SHOW OF STRENGTH</p>
                    </a>
                </li>
                <li>  
                    <a href="<?php echo U('Admission/index');?>">
                        <h2>招生详情</h2>
                        <p style="padding-top:0px">ENROLLMENT DETAILS</p>                   
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Consultus/index');?>">
                        <h2>1977资讯</h2>
                        <p style="padding-top:0px">CONSULT US</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Works/sumiao');?>">
                        <h2>作品展示</h2>
                        <p style="padding-top:0px">APPLY ONLINE</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Application/index');?>">
                        <h2>在线报名</h2>
                        <p style="padding-top:0px">APPLY ONLINE</p>
                    </a>
                </li>
            </ul>
            <div id="pullUp" class=""></div>
        </div>
    </div>
</div>
<script>
// pure JS
var elem = document.getElementById('mySwipe');
window.mySwipe = Swipe(elem, {
  // startSlide: 4,
   auto: 5000,
  // continuous: false,
  // disableScroll: true,
  // stopPropagation: true,
  // callback: function(index, element) {},
  // transitionEnd: function(index, element) {}
});
// with jQuery
// window.mySwipe = $('#mySwipe').Swipe().data('Swipe');
// 微信分享到朋友圈的内容和图片的定制
(function () {
 
    // data for weixin
    var dataForWeixin = {
        imgUrl: "http://120.24.54.104/1977hs/Public/public/logo.png",
        imgWidth: "200",
        imgHeight: "200",
        url: "http://120.24.54.104/scda",
        title: "大学生职业发展协会:\n协会详细资料,面试人员抢先看",
        desc: "协会详细资料,面试人员抢先看",
        callback: function () {}
    };
 
    var onBridgeReady = function () {
 
        // 发送给朋友
        WeixinJSBridge.on("menu:share:appmessage", function (argv) {
            WeixinJSBridge.invoke("sendAppMessage", {
                "img_url": dataForWeixin.imgUrl,
                "img_width": dataForWeixin.imgWidth,
                "img_height": dataForWeixin.imgHeight,
                "link": dataForWeixin.url,
                "desc": dataForWeixin.desc,
                "title": dataForWeixin.title
            }, function (res) { dataForWeixin.callback(); });
        });
 
        // 发送到朋友圈
        WeixinJSBridge.on("menu:share:timeline", function (argv) {
            WeixinJSBridge.invoke("shareTimeline", {
                "img_url": dataForWeixin.imgUrl,
                "img_width": dataForWeixin.imgWidth,
                "img_height": dataForWeixin.imgHeight,
                "link": dataForWeixin.url,
                "desc": dataForWeixin.desc,
                "title": dataForWeixin.title
            }, function (res) { dataForWeixin.callback(); });
        });
 
        // 分享到微博
        WeixinJSBridge.on("menu:share:weibo", function (argv) {
            WeixinJSBridge.invoke("shareWeibo", {
                "content": dataForWeixin.title,
                "url": dataForWeixin.url
            }, function (res) { dataForWeixin.callback(); });
        });
 
        // 分享到facebook
        WeixinJSBridge.on("menu:share:facebook", function (argv) {
            WeixinJSBridge.invoke("shareFB", {
                "img_url": dataForWeixin.imgUrl,
                "img_width": dataForWeixin.imgWidth,
                "img_height": dataForWeixin.imgHeight,
                "link": dataForWeixin.url,
                "desc": dataForWeixin.desc,
                "title": dataForWeixin.title
            }, function (res) { dataForWeixin.callback(); });
        });
    };
 
    if (document.addEventListener) {
        document.addEventListener("WeixinJSBridgeReady", onBridgeReady, false);
    } else if (document.attachEvent) {
        document.attachEvent("onWeixinJSBridgeReady", onBridgeReady);
    }
})();
</script>
</body>
</html>