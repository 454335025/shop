/* Date: 2016-10-09T16:44:31Z Path: js/touch/product/guide_download_main.js */
define("guide_download", function (e) {
    var t = $("#jumei_location"), i = null, a = location.href.toLowerCase(), n = navigator.userAgent.toLowerCase(), o = null, l = null, r = ["chanName1_chanType1_chanNumber1"], u = {
        http2native_url: null,
        init: function () {
            if (Jumei.getCookie("appid")); else if (/ipad/.test(n)); else {
                t.show();
                var e = new Date, i = parseInt(Jumei.getCookie("close_down_banner"), 10);
                if (!isNaN(i)) {
                    var a = new Date(i);
                    a > e.getTime() && t.hide()
                }
                this.initEvent()
            }
        },
        initEvent: function () {
            var e = this;
            $("#jumei_lo").on("click", function (t) {
                t.preventDefault(), null != i && l ? location.href = i : null == i && l ? u.deeplink(o, function () {
                    location.href = i
                }) : e.JumpOrDownload()
            }), $("#close_banner").on("click", function () {
                Jumei.ja("触屏版_引导条", "click", e.os() + "_关闭"), e.hide_notice()
            })
        },
        JumpOrDownload: function () {
            var e = this;
            return "360" === Jumei.getQueryString(location.search, "from") && "android" === e.os() ? void(location.href = "http://openbox.mobilem.360.cn/html/jumei/download160926.html?360appstore=1&webpg=jmyppush0927") : (e.changeUrl(), void(/iphone/.test(n) ? (location.href = e.http2native_url, setTimeout(function () {
                location.href = "http://h5.jumei.com/pages/2204"
            }, 5e3)) : /android/.test(n) ? (location.href = "http://h5.jumei.com/pages/2204", /ucbrowser/.test(n) || /mqqbrowser/.test(n) || setTimeout(function () {
                location.href = e.http2native_url
            }, 300)) : (location.href = "http://h5.jumei.com/pages/2204", /ucbrowser/.test(n) || /mqqbrowser/.test(n) || setTimeout(function () {
                location.href = e.http2native_url
            }, 300))))
        },
        contain: function (e, t) {
            return -1 !== e.indexOf(t)
        },
        os: function () {
            return /(iphone|ipod)/.test(n) ? "iphone" : "android"
        },
        changeUrl: function () {
            var e = this;
            if (Jumei.checkPlatformWap()) {
                var t = Jumei.getQueryString(location.search, "label"), i = Jumei.getQueryString(location.search, "item_id"), n = Jumei.getQueryString(location.search, "type"), u = "";
                if (t && n && ("partner" == n || "jmstore" == n))(e.contain(location.host, "h5") || e.contain(location.host, "share")) && (e.contain(location.pathname, "detailv2") ? e.http2native_url = "jumeimall://page/web?url=" + encodeURIComponent(location.href) : e.contain(location.pathname, "detail") && (e.http2native_url = "jumeimall://page/activity/detail?label=" + t + "&type=" + n), u = "_跳转app_h5_专场_", r = ["mainSite_activity_chanNumber1"]); else if (/s\/act\//.test(a))e.http2native_url = "jumeimall://page/web?url=" + encodeURIComponent(location.href), u = "_跳转app_h5_专场_", r = ["mainSite_activity_chanNumber1"]; else if (i && n && ("global_deal" == n || "jumei_deal" == n || "jumei_mall" == n || "jumei_pop" == n || "global_combination_deal" == n || "global_combination_mall" == n || "global_mall" == n || "global_pop" == n)) {
                    if (e.http2native_url = "jumeimall://page/alldetail?platform=" + e.os() + "&itemid=" + i + "&type=" + n, r = ["mainSite_productdetail_chanNumber1"], location.href.indexOf("yiqituan") > -1) {
                        var c = Jumei.getQueryString(a, "tid");
                        a.indexOf("list") > -1 ? (e.http2native_url = "jumeimall://page/adcommon?position=coutuan&title=聚美凑团", u = "凑团列表页_") : a.indexOf("detailsecret") > -1 ? (e.http2native_url = "jumeimall://page/grouponstatus?grouponid=" + c + "&itemid=" + i + "&type=" + n, u = "凑团现状页_") : (e.http2native_url = "jumeimall://page/grouponproduct?itemid=" + i + "&type=" + n + "&tid=" + c, u = "凑团详情页_"), r = ["mainSite_coutuan_chanNumber1"]
                    }
                    var m = Jumei.getQueryString(location.search, "selltype"), p = Jumei.getQueryString(location.search, "selllabel"), s = "";
                    l && (s = m && p ? "&selltype=deeplink_" + m + "&selllabel=" + p : "&selltype=deeplink"), e.http2native_url += s
                } else if (/\/cart\/list/.test(location.pathname))e.http2native_url = "jumeimall://page/shopping-cart?platform=" + e.os(), u = "_跳转app_购物车"; else if (/\/search\/index/.test(location.pathname)) {
                    var h = Jumei.getQueryString(a, "search") || "", _ = Jumei.getQueryString(a, "category_id"), d = Jumei.getQueryString(a, "brand_id"), g = Jumei.getQueryString(a, "function_id");
                    _ && (h += "&category_id=" + _), d && (h += "&brand_id=" + d), g && (h += "&function_id=" + g), e.http2native_url = "jumeimall://page/search?platform=" + e.os() + "&search=" + h, u = "_跳转app_搜素结果页"
                } else/\/mall\/index/.test(location.pathname) ? (e.http2native_url = "jumeimall://page/mall?platform=" + e.os(), u = "_跳转app_美妆商城") : (e.http2native_url = "jumeimall://page/homepage?platform=" + e.os(), u = "_跳转app_首页");
                n = n ? n : "", Jumei.ja("触屏版_引导条", "click", e.os() + u + n), o = e.http2native_url
            }
        },
        hide_notice: function () {
            t.hide(), /micromessenger/.test(n) && $(".fixnavs").css("top", 0);
            var e = new Date, i = e.getTime() + 864e5;
            Jumei.setCookie("close_down_banner", i, 1, "/", "jumei.com")
        },
        gt_ios9: function (e) {
            if (e = e || 9, navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPod/i)) {
                var t = navigator.userAgent.match(/OS [\d]{1,2}_\d[_\d]* like Mac OS X/i)[0].match(/[\d]{1,2}_/i);
                return t = parseInt(t[0]), Boolean(t >= e)
            }
            return !1
        },
        deeplink: function (e, t) {
            var a = arguments.length, n = "https://jump.jumei.com", o = {
                inapp_data: {jumeimallUrl: e},
                channels: r,
                sender_id: "senderID",
                download_title: " ",
                download_msg: " "
            };
            $.ajax({
                url: n + "/v2/url/a2f670413800b2dd",
                type: "POST",
                data: JSON.stringify(o),
                xhrFields: {withCredentials: !0},
                timeout: 3e4,
                success: function (e) {
                    i = n + e.path, t && t()
                },
                error: function () {
                    2 == a && (window.location.href = "http://h5.jumei.com/pages/2204")
                }
            })
        }
    };
    (u.gt_ios9() && (/micromessenger/.test(n) || /qq/.test(n)) || u.gt_ios9(10) && /weibo/.test(n)) && (l = !0, u.changeUrl(), u.deeplink(o)), u.init()
}), seajs.use(["guide_download"]);