var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-10208510-2']);
_gaq.push(['_trackPageview']);
_gaq.push(['_addIgnoredRef', 'm.jumei.com/i/MobileWap/app_ga']);
var reg = new RegExp("^wap_touch*"),referer = Jumei.getCookie("referer_site");
if(referer.match(reg))
{_gaq.push(['_setCustomVar',1,'site_type','touch',2]);}
else {_gaq.push(['_setCustomVar',1,'site_type','wap',2]);}

(function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
// function getCookie(objName){var arrStr = document.cookie.split("; "); for(var i = 0;i < arrStr.length;i ++){ var temp = arrStr[i].split("="); if(temp[0] == objName) return unescape(temp[1]); } }
//引导条
$(function(){
    var $guide = $("#jumei_location"),
        deepshareUrl = null,
        loHref = location.href.toLowerCase(),
        agent = navigator.userAgent.toLowerCase(),
        linkParam = null,
        cgGa_str = null,
        deepFlag = null;
    var guideDownload = {
        http2native_url :null,
        init:function(){
            if(Jumei.getCookie('appid')){   //在app里面不显示引导条

            }else if( /ipad/.test(agent) ){    //在ipad里不显示引导条

            }else{
                $guide.show();
                //if( /micromessenger/.test(uaa) ){ //特殊处理微信打开含有引导条的情况
                //    var height = $guide.height();
                //    $('.fixnavs').css('top',height);
                //    $(window).scroll(function() {
                //        if ($('body').scrollTop() > 0) {
                //            $('.fixnavs').css('top', 0);
                //        } else if ($('body').scrollTop() === 0) {
                //            if($guide.css('display') === 'none'){
                //                $('.fixnav').css('top',0);
                //            }else{
                //                $('.fixnavs').css('top', height);
                //            }
                //        }
                //    });
                //}
                var now = new Date();
                var close_value=parseInt(Jumei.getCookie('close_down_banner'),10);
                if(!isNaN(close_value)){
                    var banner_data=new Date(close_value);
                    if(banner_data>now.getTime()){
                        $guide.hide();
                        //特殊处理微信打开含有引导条的情况
                        //if( /micromessenger/.test(uaa) ){
                        //    $('.fixnavs').css('top',0);
                        //}
                    }
                }
                this.initEvent();
            }
        },
        initEvent:function(){
            var self = this;
            $('#jumei_lo').on('click',function(e){
                e.preventDefault();
                if(deepshareUrl != null && deepFlag ){
                    location.href = deepshareUrl;
                }else if(deepshareUrl==null && deepFlag){
                    guideDownload.deeplink(linkParam,function(){
                        location.href = deepshareUrl;
                    });
                }else{
                    self.JumpOrDownload();
                }
            });

            $('#close_banner').on('click',function(){
                Jumei.ja('触屏版_引导条','click',self.os()+'_关闭');
                self.hide_notice();
            });
        },
        JumpOrDownload:function(){
            var self = this;
            self.changeUrl();
            if(/iphone/.test(agent)){ //iphone链接跳转

                location.href = self.http2native_url;
                setTimeout(function() {
                    location.href = 'http://h5.jumei.com/pages/2204';
                }, 5000);

            }else if(/android/.test(agent)){ //android链接跳转

                location.href = 'http://h5.jumei.com/pages/2204';

                if( /ucbrowser/.test(agent) || /mqqbrowser/.test(agent) ){ //安卓uc、qq浏览器屏蔽跳转

                }else{
                    setTimeout(function() {
                        location.href = self.http2native_url;
                    }, 300);
                }

            }else{ //其他手机浏览器ua不带iphone 和 android的情况
                location.href = 'http://h5.jumei.com/pages/2204';
                if( /ucbrowser/.test(agent) || /mqqbrowser/.test(agent) ){ //安卓uc、qq浏览器屏蔽跳转

                }else{
                    setTimeout(function() {
                        location.href = self.http2native_url;
                    }, 300);
                }
            }
        },
        os:function(){
            var ua = navigator.userAgent.toLowerCase();
            if(/(iphone|ipod)/.test(ua)){
                return 'iphone';
            }else{
                return 'android';
            }
        },
        changeUrl:function(){
            var self = this;
            if (self.checkPlatformWap()) {
                linkParam = self.http2native_url='jumeimall://page/homepage?platform='+self.os()+'';//讲转化完的链接赋值给deepShare的参数
            }
        },
        hide_notice:function(){
            var ua = navigator.userAgent.toLowerCase();
            $guide.hide();
            if( /micromessenger/.test(ua) ){
                $('.fixnavs').css('top',0);
            }
            var today = new Date();
            var expires_date_str=today.getTime() + 1000*60*60*24;
            Jumei.setCookie("close_down_banner",expires_date_str,1,"/","jumei.com");
        },
        checkPlatformWap: function() {
            //判断当前页面是否为触屏版进入
            var self = this;
            var platform = self.getQueryString(window.location.href, 'platform');
            var ua = navigator.userAgent.toLowerCase();
            if (platform == 'wap'){
                return true;
            }
            else{
                if(/jumei/i.test(ua)||/baby/i.test(ua)||/global/i.test(ua)||/youth/i.test(ua)){
                    return false;
                }
                else
                    return true;
            }
        },
        getQueryString: function(url, name) {
            //获取url中的参数
            var reg = new RegExp(name + '\\s*=\\s*([^&#]+)\\s*');
            var r = url.match(reg);
            if (r != null) {
                return  decodeURI(r[1]);
            } else {
                return null;
            }
        },
        gt_ios9:function() {//判断系统版本
            // 判断是否 iPhone 或者 iPod
            var ua = navigator.userAgent.toLowerCase();
            if(/iphone/i.test(ua) || /ipod/i.test(ua)) {
                // 判断系统版本号是否大于 9
                var iosVersion = +ua.match(/os \d+/i)[0].split(' ')[1];
                return iosVersion >= 9;
            } else {
                return false;
            }
        },
        deeplink: function (linkParam,callback) {//deepLink方法
            var arLength = arguments.length;
            var DS_API_HOST = 'https://jump.jumei.com';//域名
            // 在打开APP时，能够获取到inapp_data中的数据
            var params = {
                inapp_data: {
                    //name: "mkdir",
                    jumeimallUrl:linkParam
                },
                channels:["mainSite_h5Index_chanNumber1"],
                sender_id : "senderID",
                download_title : " ",
                download_msg : " "
            };
            $.ajax({
                url: DS_API_HOST + '/v2/url/a2f670413800b2dd',//78d88b80410c926a
                type: 'POST',
                data: JSON.stringify(params),
                xhrFields: {withCredentials: true},
                timeout:30000,
                success: function(result) {
                    // deepshareUrl为所生成的DeepShare Link
                    // 可以让用户跳转到此链接 打开/下载 APP
                    deepshareUrl = DS_API_HOST + result.path;
                    callback && callback();
                },
                error: function() {
                    //出错情况下可以继续用户正常逻辑，可设置一个默认url.
                    if(arLength==2){
                        window.location.href = 'http://h5.jumei.com/pages/2204';
                    }
                }
            });
        }
    };
    guideDownload.init();
    if(guideDownload.gt_ios9() && (/micromessenger/.test(agent)||/qq/.test(agent))){
        deepFlag = true;
        guideDownload.changeUrl();
        guideDownload.deeplink(linkParam);//deeplin  Ajax
    }
});
