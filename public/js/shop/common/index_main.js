/* Date: 2016-10-26T18:12:21Z Path: js/touch/index/index_main.js */
!function (t, e, i) {
    var a = i(t);
    t.Jumei = t.Jumei || {}, t.Jumei.ui = t.Jumei.ui || {}, t.Jumei.ui.lazyLoad = t.Jumei.ui.lazyLoad || a, t.define && define("lazyLoad", function (t, e, i) {
        i.exports = a
    })
}(this, document, function (t) {
    "use strict";
    var e = 0, i = $(t), a = [], n = {}, r = function (t) {
        this.options = {container: "body", urlName: "data-url"}, n = $.extend(this.options, t), this._init()
    };
    return r.prototype = {
        _init: function () {
            this.reset(), $(document).on("scroll", this._showOriginImg)
        }, reset: function () {
            a = $(this.options.container), this._showOriginImg()
        }, _showOriginImg: function () {
            e && clearTimeout(e), e = setTimeout(function () {
                var t = i.scrollTop(), e = i.height(), r = t + e, o = "img[" + n.urlName + "]";
                a && a.find(o).each(function (e, i) {
                    var a = $(i), o = a.offset().top, s = a.height(), c = o + s;
                    if (c > t && r > o) {
                        var l = a.attr(n.urlName);
                        l && a.attr("src", l).removeAttr(n.urlName)
                    }
                })
            }, 50)
        }
    }, r
}), define("index", ["lazyLoad"], function (t) {
    var e = t("lazyLoad"), i = (new e({container: ".list_container", urlName: "data-original"}), {
        outer: null,
        $inner: null,
        hidden_width: 0,
        current_x: 0,
        start_x: 0,
        scale: 1,
        distance: 0,
        init: function (t, e) {
            var i = this;
            i.outer = $(t)[0], i.$inner = $(e);
            var a = 0;
            i.$inner.children().each(function () {
                a += $(this).width()
            }), i.hidden_width = a - $(i.outer).width(), i.$inner.width(a + 5), i.outer.addEventListener("touchstart", i.eventlistener, !1)
        },
        eventlistener: {
            handleEvent: function (t) {
                switch (t.type) {
                    case"touchstart":
                        this.start(t);
                        break;
                    case"touchmove":
                        this.move(t);
                        break;
                    case"touchend":
                        this.end(t)
                }
            }, start: function () {
                i.start_x = event.touches[0].pageX, i.outer.addEventListener("touchmove", this, !1)
            }, move: function () {
                var t = event || window.event;
                t.preventDefault(), t.stopPropagation(), i.move_x = event.touches[0].pageX, i.current_x = i.current_x + i.move_x - i.start_x, i.start_x = i.move_x, i.transform()
            }, end: function () {
                i.outer.removeEventListener("touchmove", this, !1), i.outer.removeEventListener("touchend", this, !1)
            }
        },
        transform: function (t) {
            var e = this;
            if (-i.current_x >= e.hidden_width) {
                if (-i.current_x === e.hidden_width)return null;
                i.current_x = -e.hidden_width
            } else if (i.current_x >= 0) {
                if (0 === i.current_x)return null;
                i.current_x = 0
            }
            $(e.outer).css("-webkit-transform", "translateX(" + i.current_x + "px)")
        }
    });
    i.init("#nav-outer", "#nav-inner"), function () {
        var t = [];
        $("#position li").length > 1 && (t = document.getElementById("position").getElementsByTagName("li"));
        new window.Swipe(document.getElementById("slider"), {
            auto: 2e3,
            continuous: !0,
            disableScroll: !1,
            stopPropagation: !1,
            callback: function (e) {
                var i = t.length;
                for (e >= i && (e %= 2); i--;)t[i].className = " ";
                t[e].className = "cur"
            }
        })
    }(), $(function () {
        var t, e = {
            init: function () {
                var e = this;
                if (0 !== $("#index-activity-block").length) {
                    var i = document.querySelectorAll(".card-id");
                    t = {card_id: i[0].getAttribute("value"), curPage: 1}, e.ajaxUrl(t)
                }
            }, ajaxUrl: function (t) {
                var e = this;
                $.ajax({
                    url: "/index/ajaxActivityList",
                    dataType: "json",
                    type: "get",
                    data: {card_id: t.card_id, page: t.curPage},
                    success: function (i) {
                        var a = t.card_id;
                        1 * i.code === 1 && e.listHtml(i, a)
                    },
                    error: function () {
                    }
                })
            }, listHtml: function (t, e) {
                var i, a, n = "", r = "", o = this;
                if (!t.data || 0 !== t.data.item_count) {
                    $("#search_defer").find(".card-id").each(function () {
                        $(this).attr("value") === e && (a = this)
                    }), i = $(a).siblings(".index-activity-title"), $(a).parents("#index-activity-block").show(), i.children(".today-title").append(t.data.tab_online_name).show(), i.find(".tomorrow-title .index-title-tab").after(t.data.tab_preshow_name), t.data.tab_preshow_num > 0 ? (i.find(".tomorrow-title").show(), i.find(".tomorrow-title .pre-number").html(t.data.tab_preshow_num).show()) : i.find(".today-title").css("width", "100%"), $(".index-activity-title .index-second-title").on("click", function () {
                        $(this).hasClass("today-title") ? ($(this).addClass("select-now").siblings(".tomorrow-title").removeClass("select-pre"), $(this).parents(".index-activity-title").siblings(".today-model").show().siblings(".tomorrow-model").hide()) : ($(this).addClass("select-pre").siblings(".today-title").removeClass("select-now"), $(this).children(".pre-number").hide(), $(this).parents(".index-activity-title").siblings(".tomorrow-model").show().siblings(".today-model").hide())
                    });
                    var s, c = t.data.item_list;
                    for (s in c)"formal" === c[s].tag ? n += "<li><a href='" + c[s].url + "'><div class='activity-list-img2'><img src='" + c[s].image_url_set.main[640] + "'><div class='down-triangle2'></div></div><div class='activity-list-text'><h1 class='activity-list-title'>" + c[s].marketing_title + "</h1><span class='activity-list-info'>" + c[s].marketing_word + "</span></div><div class='activity-list-countdown' data-time='" + c[s].end_time + "'><span>还剩00天00小时</span></div></a></li>" : r += "<li><a href='" + c[s].url + "'><div class='activity-list-img2'><img src='" + c[s].image_url_set.main[640] + "'><div class='down-triangle2'></div></div><div class='activity-list-text'><h1 class='activity-list-title'>" + c[s].marketing_title + "</h1><span class='activity-list-info'>" + c[s].marketing_word + "</span></div></a></li>";
                    $(a).siblings(".today-model").append(n), $(a).siblings(".tomorrow-model").append(r);
                    for (var l = document.querySelectorAll(".activity-list-countdown"), d = 0; d < l.length; d++) {
                        var u = l[d].getAttribute("data-time");
                        u *= 1e3, o.countBox(l[d], u)
                    }
                }
            }, countBox: function (t, e) {
                t.timer = setInterval(function () {
                    --e;
                    var i = (e - (new Date).getTime()) / 1e3;
                    if (0 >= i)return void clearInterval(t.timer);
                    var a = Math.floor(i / 86400), n = i - 24 * a * 60 * 60, r = Math.floor(n / 3600);
                    a = 10 > a ? "0" + a : a, r = 10 > r ? "0" + r : r, 0 === parseInt(r) && n > 0 ? t.innerHTML = "即将结束" : t.innerHTML = "<span>还剩" + a + "天" + r + "时</span>"
                }, 1e3)
            }
        };
        e.init()
    });
    var a = {
        product: {
            maxPage: 1,
            currentPage: 1,
            cardId: $("#call_deal_card_id").attr("value"),
            locatekey: "",
            showDirectMail: "",
            ajaxNow: !0
        }, init: function () {
            a.clickEvent(), $(".float_car").show(), a.initCartNum(), a.scrollEvent(), a.set_imgsize(), a.getShowDirectMail(a.ajaxProduct)
        }, clickEvent: function () {
            $(".navTitle").on("click", function () {
                $(this).addClass("nav_select").siblings().removeClass("nav_select")
            }), $(".nt_mall a").on("click", function () {
                a.toggle(this)
            }), $("#search_defer .my").on("click", function () {
                $.ajax({
                    url: "/index/ajaxAccountJump", type: "get", dataType: "json", success: function (t) {
                        1 * t.code === 0 && (window.location.href = t.url)
                    }
                })
            })
        }, toggle: function (t) {
            var e = null;
            e = $(t).next("ul"), $(".mall_sel").not(e).hide(), e.toggle()
        }, scrollEvent: function () {
            $(document).on("scroll", function () {
                var t = $("#nav-outer"), e = $(".go_top");
                $(window).scrollTop() > $("#hearder_nav").offset().top ? t.addClass("fix-menu") : t.removeClass("fix-menu"), $(window).scrollTop() > 800 ? e.show() : e.hide()
            })
        }, set_imgsize: function () {
            $(".metro_item").each(function () {
                var t = $(this), e = parseInt(t.attr("w"), 10), i = parseInt(t.attr("h"), 10) / e, a = t.width();
                switch (e) {
                    case 4:
                        a = .97 * a;
                        break;
                    case 3:
                        a = .98 * a;
                        break;
                    case 2:
                        a = .99 * a
                }
                var n = a * i + "px";
                t.find("a").css("height", n)
            })
        }, initCartNum: function () {
            var t = ({"result":"success","cart_total_quantity":3,"cart_global_quantity":0,"cart_total_all_quantity":3});
                    t.data.cart_total_quantity && t.data.cart_total_quantity > 0 && $(".float_car").append('<div class="shoping_car_num">' + t.data.cart_total_quantity + "</div>")
        }, ajaxProduct: function () {
            $.ajax({
                url: "/index/ajaxDealPageList",
                data: {card_id: a.product.cardId, page: a.product.currentPage, locateDM: a.product.showDirectMail},
                type: "get",
                dataType: "json",
                success: function (t) {
                    return t && t.card ? (a.product.currentPage++, a.product.maxPage = 1 * t.page_count, a.productList(t), void(a.product.ajaxNow = !0)) : ($(".loading").hide(), void $(".touch-footer-container").show())
                }
            })
        }, windowScroll: function () {
            var t = $(window), e = 0;
            $(document).on("scroll", function () {
                e && clearTimeout(e), e = setTimeout(function () {
                    t.scrollTop() > $("body").height() - t.height() - 10 && (a.product.currentPage <= a.product.maxPage ? a.product.ajaxNow === !0 && (a.product.ajaxNow = !1, a.ajaxProduct()) : ($(".loading").hide(), $(".touch-footer-container").show()))
                }, 100)
            })
        }, productList: function (t) {
            var e = t.card, i = e.material, n = "", r = $(".list_container");
            if (i && i.length > 0) {
                $(".list_container .head_name").html(e.title);
                for (var o = "", s = "", c = 0; c < i.length; c++)!i[c] || i[c] instanceof Array || a.isEmptyObject(i[c]) || (o = i[c].url_h5 && "" !== i[c].url_h5 ? i[c].url_h5 : i[c].url_schema, s = i[c].image_url_set.dx_image && i[c].image_url_set.dx_image.url && i[c].image_url_set.dx_image.url[640] ? i[c].image_url_set.dx_image.url[640] : i[c].image_url_set.single && i[c].image_url_set.single.url && i[c].image_url_set.single.url[640] ? i[c].image_url_set.single.url[640] : "", n += '<a href="' + o + '"><div class="item-product clearfix"><div class="item_image"><img src="http://f0.jmstatic.com/btstatic/h5/index/bg_logo_1_1.jpg" class="lazy product-img" data-original="' + s + '">', "global" === i[c].category && i[c].area_icon && i[c].area_icon[320] && (n += '<img class="product-icon lazy" src="' + i[c].area_icon[320] + '">'), ("onsell" !== i[c].status || i[c].end_time < e.date_time) && (n += '<div class="sell_state">已抢光</div>'), n += '</div><div class="information"><p>' + i[c].name + '</p></div><div class="price_info"><div class="clearfix"><div class="now_price pull_left">', n += i[c].start_time > e.date_time ? "<em>即将揭晓</em>" : "￥<em>" + i[c].jumei_price + "</em>", i[c].market_price && 1 * i[c].market_price > 0 && (n += '<span class="grey del"><span>￥' + i[c].market_price + "</span></span>"), n += "</div>", i[c].start_time <= e.date_time && i[c].discount && 1 * i[c].discount <= 9 && 1 * i[c].discount > 0 && (n += '<span class="grey pull_right">' + i[c].discount + "折</span>"), n += '</div><div class="clearfix buy_num">', i[c].buyer_number && 1 * i[c].buyer_number > 0 && (n += '<div class="grey">' + i[c].buyer_number + "人已购买</div>"), n += "</div></div></div></a>");
                r.append(n).show()
            }
        }, getShowDirectMail: function (t) {
            a.product.locatekey = $("#locate_key").attr("value");
            var e = Jumei.getCookie(a.product.locatekey);
            e && "" !== e ? (a.product.showDirectMail = "1" === e ? "1" : "0", a.product.ajaxNow === !0 && (a.product.ajaxNow = !1, t && t()), setTimeout(a.windowScroll(), 500)) : $.ajax({
                url: "//www.jumei.com/i/api/locate?tag=DM",
                type: "get",
                dataType: "jsonp",
                success: function (e) {
                    a.product.showDirectMail = "1" === e ? "1" : "0", a.product.ajaxNow === !0 && (a.product.ajaxNow = !1, t && t()), setTimeout(a.windowScroll(), 500)
                }
            })
        }, isEmptyObject: function (t) {
            for (var e in t)return !1;
            return !0
        }
    };
    a.init()
}), seajs.use(["index"]);