/* Date: 2016-10-26T18:12:21Z Path: js/touch/product/detail_main.js */
define("swipe", ["ui"], function (e) {
    function t(e, t) {
        function n() {
            h = $.children, v = h.length, h.length < 2 && (t.continuous = !1), _.transitions && t.continuous && h.length < 3 && ($.appendChild(h[0].cloneNode(!0)), $.appendChild($.children[1].cloneNode(!0)), h = $.children), f = new Array(h.length), g = e.getBoundingClientRect().width || e.offsetWidth, $.style.width = h.length * g + "px";
            for (var n = h.length; n--;) {
                var i = h[n];
                i.style.width = g + "px", i.setAttribute("data-index", n), _.transitions && (i.style.left = n * -g + "px", r(n, w > n ? -g : n > w ? g : 0, 0))
            }
            t.continuous && _.transitions && (r(o(w - 1), -g, 0), r(o(w + 1), g, 0)), _.transitions || ($.style.left = w * -g + "px"), e.style.visibility = "visible"
        }

        function i() {
            t.continuous ? s(w - 1) : w && s(w - 1)
        }

        function a() {
            t.continuous ? s(w + 1) : w < h.length - 1 && s(w + 1)
        }

        function o(e) {
            return (h.length + e % h.length) % h.length
        }

        function s(e, n) {
            if (w != e) {
                if (_.transitions) {
                    var i = Math.abs(w - e) / (w - e);
                    if (t.continuous) {
                        var a = i;
                        i = -f[o(e)] / g, i !== a && (e = -i * h.length + e)
                    }
                    for (var s = Math.abs(w - e) - 1; s--;)r(o((e > w ? e : w) - s - 1), g * i, 0);
                    e = o(e), r(w, g * i, n || b), r(e, 0, n || b), t.continuous && r(o(e - i), -(g * i), 0)
                } else e = o(e), l(w * -g, e * -g, n || b);
                w = e, m(t.callback && t.callback(w, h[w]))
            }
        }

        function r(e, t, n) {
            c(e, t, n), f[e] = t
        }

        function c(e, t, n) {
            var i = h[e], a = i && i.style;
            a && (a.webkitTransitionDuration = a.MozTransitionDuration = a.msTransitionDuration = a.OTransitionDuration = a.transitionDuration = n + "ms", a.webkitTransform = "translate(" + t + "px,0)translateZ(0)", a.msTransform = a.MozTransform = a.OTransform = "translateX(" + t + "px)")
        }

        function l(e, n, i) {
            if (!i)return void($.style.left = n + "px");
            var a = +new Date, o = setInterval(function () {
                var s = +new Date - a;
                return s > i ? ($.style.left = n + "px", j && d(), t.transitionEnd && t.transitionEnd.call(event, w, h[w]), void clearInterval(o)) : void($.style.left = (n - e) * (Math.floor(s / i * 100) / 100) + e + "px")
            }, 4)
        }

        function d() {
            y = setTimeout(a, j)
        }

        function u() {
            j = 0, clearTimeout(y)
        }

        var p = function () {
        }, m = function (e) {
            setTimeout(e || p, 0)
        }, _ = {
            addEventListener: !!window.addEventListener,
            touch: "ontouchstart" in window || window.DocumentTouch && document instanceof window.DocumentTouch,
            transitions: function (e) {
                var t = ["transitionProperty", "WebkitTransition", "MozTransition", "OTransition", "msTransition"];
                for (var n in t)if (void 0 !== e.style[t[n]])return !0;
                return !1
            }(document.createElement("swipe"))
        };
        if (e) {
            var h, f, g, v, $ = e.children[0];
            t = t || {};
            var w = parseInt(t.startSlide, 10) || 0, b = t.speed || 300;
            t.continuous = void 0 !== t.continuous ? t.continuous : !0;
            var y, x, j = t.auto || 0, k = {}, C = {}, E = {
                handleEvent: function (e) {
                    switch (e.type) {
                        case"touchstart":
                            this.start(e);
                            break;
                        case"touchmove":
                            this.move(e);
                            break;
                        case"touchend":
                            m(this.end(e));
                            break;
                        case"webkitTransitionEnd":
                        case"msTransitionEnd":
                        case"oTransitionEnd":
                        case"otransitionend":
                        case"transitionend":
                            m(this.transitionEnd(e));
                            break;
                        case"resize":
                            m(n)
                    }
                    t.stopPropagation && e.stopPropagation()
                }, start: function (e) {
                    var t = e.touches[0];
                    k = {
                        x: t.pageX,
                        y: t.pageY,
                        time: +new Date
                    }, x = void 0, C = {}, $.addEventListener("touchmove", this, !1), $.addEventListener("touchend", this, !1)
                }, move: function (e) {
                    if (!(e.touches.length > 1 || e.scale && 1 !== e.scale)) {
                        t.disableScroll && e.preventDefault();
                        var n = e.touches[0];
                        C = {
                            x: n.pageX - k.x,
                            y: n.pageY - k.y
                        }, "undefined" == typeof x && (x = !!(x || Math.abs(C.x) < Math.abs(C.y))), x || (e.preventDefault(), u(), t.continuous ? (c(o(w - 1), C.x + f[o(w - 1)], 0), c(w, C.x + f[w], 0), c(o(w + 1), C.x + f[o(w + 1)], 0)) : (C.x = C.x / (!w && C.x > 0 || w == h.length - 1 && C.x < 0 ? Math.abs(C.x) / g + 1 : 1), c(w - 1, C.x + f[w - 1], 0), c(w, C.x + f[w], 0), c(w + 1, C.x + f[w + 1], 0)))
                    }
                }, end: function (e) {
                    var n = +new Date - k.time, i = Number(n) < 250 && Math.abs(C.x) > 20 || Math.abs(C.x) > g / 2, a = !w && C.x > 0 || w == h.length - 1 && C.x < 0;
                    t.continuous && (a = !1);
                    var s = C.x < 0;
                    x || (i && !a ? (s ? (t.continuous ? (r(o(w - 1), -g, 0), r(o(w + 2), g, 0)) : r(w - 1, -g, 0), r(w, f[w] - g, b), r(o(w + 1), f[o(w + 1)] - g, b), w = o(w + 1)) : (t.continuous ? (r(o(w + 1), g, 0), r(o(w - 2), -g, 0)) : r(w + 1, g, 0), r(w, f[w] + g, b), r(o(w - 1), f[o(w - 1)] + g, b), w = o(w - 1)), t.callback && t.callback(w, h[w])) : t.continuous ? (r(o(w - 1), -g, b), r(w, 0, b), r(o(w + 1), g, b)) : (r(w - 1, -g, b), r(w, 0, b), r(w + 1, g, b))), $.removeEventListener("touchmove", E, !1), $.removeEventListener("touchend", E, !1)
                }, transitionEnd: function (e) {
                    parseInt(e.target.getAttribute("data-index"), 10) == w && (j && d(), t.transitionEnd && t.transitionEnd.call(e, w, h[w]))
                }
            };
            return n(), j && d(), _.addEventListener ? (_.touch && $.addEventListener("touchstart", E, !1), _.transitions && ($.addEventListener("webkitTransitionEnd", E, !1), $.addEventListener("msTransitionEnd", E, !1), $.addEventListener("oTransitionEnd", E, !1), $.addEventListener("otransitionend", E, !1), $.addEventListener("transitionend", E, !1)), window.addEventListener("resize", E, !1)) : window.onresize = function () {
                n()
            }, {
                setup: function () {
                    n()
                }, slide: function (e, t) {
                    u(), s(e, t)
                }, prev: function () {
                    u(), i()
                }, next: function () {
                    u(), a()
                }, stop: function () {
                    u()
                }, getPos: function () {
                    return w
                }, getNumSlides: function () {
                    return v
                }, kill: function () {
                    u(), $.style.width = "", $.style.left = "";
                    for (var e = h.length; e--;) {
                        var t = h[e];
                        t.style.width = "", t.style.left = "", _.transitions && c(e, 0, 0)
                    }
                    _.addEventListener ? ($.removeEventListener("touchstart", E, !1), $.removeEventListener("webkitTransitionEnd", E, !1), $.removeEventListener("msTransitionEnd", E, !1), $.removeEventListener("oTransitionEnd", E, !1), $.removeEventListener("otransitionend", E, !1), $.removeEventListener("transitionend", E, !1), window.removeEventListener("resize", E, !1)) : window.onresize = null
                }
            }
        }
    }

    e("ui");
    return t
}), define("shoping_car", ["ui"], function (e) {
    var t = (e("ui"), {
        num: $(""), get_userid: function (e) {
            for (var t = document.cookie.split("; "), n = 0; n < t.length; n++) {
                var i = t[n].split("=");
                if (i[0] == e)return unescape(i[1])
            }
        }, set_num: function (e, n) {
            0 !== t.num ? $("." + e).find("." + n).length > 0 ? ($("." + e).find("." + n).text(t.num), $("." + e).find("." + n).show()) : $("." + e).append('<div class="' + n + '">' + t.num + "</div>") : $("." + e).find("." + n).length > 0 && $("." + e).find("." + n).hide()
        }, add_shoping: function (e, n, i, a, o, s) {
            var r = "/cart/add", c = {items: i, type: a};
            $.ajax({
                type: "get",
                url: r + "?" + o,
                dataType: "jsonp",
                jsonp: "callback",
                data: c,
                async: !1,
                success: function (i) {
                    s(i), "success" == i.result ? (t.num = parseInt($("." + n).text()) + 1, t.set_num(e, n)) : alert(i.message)
                },
                error: function (e) {
                    alert('"抱歉，本商品因信息有误，无法加入购物车。请您告知小美，以便尽快修复：客服热线400-123-8888。"')
                }
            })
        }
    });
    return t
}), define("detail", ["ui", "shoping_car", "swipe"], function (e) {
    var t = e("ui"), n = e("shoping_car"), i = e("swipe"), a = 1e3 * $("#start_time").val();
    new t.gotop({bottom: "80px"});
    var o = Jumei.getQueryString(location.href, "type");
    if (window.toast = new t.toast, a > 0) {
        new t.countdown({
            selector: "#time", endTime: a, isShow: !0, callback: function () {
                $(".text_time").html("<span>已结束</span>"), $("#time").hide()
            }
        })
    }
    var s = {
        type: $("#type").val(),
        item_id: $("#item_id").val(),
        pingjia_id: $("#product_id").val(),
        current_timeout: null,
        report_index: 1,
        report_pageCount: 10,
        report_number: 10,
        has_clickpj: !1
    }, r = !1;
    Jumei.getCookie("nickname") && (r = !0);
    var c = !1, l = {
        init: function () {
            this.initPage()
        }, initPage: function () {
            this.initEvent(), this.initShareFunc(), this.initSales(), this.initeRcommend(), this.initGa(), this.priceRemmind(), this.locateDetail(), this.directMail()
        }, initeRcommend: function () {
            $.ajax({
                url: "/recommend/sale?item_id=" + s.item_id + "&type=" + s.type, type: "get", success: function (e) {
                    var t = "";
                    if (0 !== e.item_list.length) {
                        t += '<div class="detail_group border_top">', t += '<div class="h5">大家还买了</div>', t += '<div id = "details_recommend" class = "details_recommend swipe">', t += '<ul class="swipe-wrap">';
                        for (var n = 0; n < e.item_list.length; n++) {
                            var a = e.item_list[n].name ? e.item_list[n].name : e.item_list[n].short_name, o = "";
                            a.length > 20 && (a = a.substring(0, 20) + "..."), n % 3 === 0 && (t += "<li>", t += '<ul style="margin: 0px 10px;">'), t += ' <a href = "/product/detail?item_id=' + e.item_list[n].item_id + "&type=" + e.item_list[n].type + '" class="details_recommend_a">', t += "<li>", t += '<p class = "img"><img src = "' + e.item_list[n].image_url_set.single[320] + '" onerror="this.src="http://s1.jmstatic.com/templates/touch/css/v3/image/bg_logo_1_1.jpg"" ></p>', t += '<p class = "title">' + a + "</p>", t += '<p class = "price">￥' + o + e.item_list[n].jumei_price + "</p>", t += "</li>", t += "</a>", n % 3 !== 2 && n !== e.item_list.length - 1 || (t += "</ul>", t += "</li>")
                        }
                        t += "</ul>", t += "</div>", t += "</div>", $(".detail_buy").append(t), new i($("#details_recommend")[0], {
                            startSlide: 0,
                            continuous: !1,
                            speed: 2e3,
                            disableScroll: !1,
                            stopPropagation: !1
                        })
                    }
                }, error: function () {
                }
            })
        }, initSales: function () {
            var e = this;
            $.ajax({
                url: "/promo/sales?item_id=" + s.item_id + "&type=" + s.type, type: "get", success: function (t) {
                    e.setSaleHtml(t)
                }, error: function () {
                }
            })
        }, setSaleHtml: function (e) {
            if (0 !== e.list.length) {
                "global_mall" == s.type && (s.item_id = s.pingjia_id);
                for (var t = e.list["" + s.type]["" + s.item_id].promo_sale_text, n = "", i = "", a = t.length, o = 0; a > o; o++)n += "", n += "type" in t[o] && "gift" === t[o].type || "content" in t[o] && "" !== t[o].content ? '<div class = "h5 sales_item  sales_item_click" id="sales_item_' + o + '">' : '<div class = "h5 sales_item" id="sales_item_' + o + '">', n += "color" in t[o] ? '<span class="sales_icon" style="background-color:#' + t[o].color + '}">' + t[o].simple_name + "</span>" : '<span class="sales_icon">' + t[o].simple_name + "</span>", n += '<a href="javascrit:;" onclick="return false;">', "show_name" in t[o] && (n += t[o].show_name), "type" in t[o] && "gift" === t[o].type && (n += "(已赠完)"), ("type" in t[o] && "gift" === t[o].type || "content" in t[o] && "" !== t[o].content) && (n += '<span class = "right"><label></label></span>'), n += "</a>", n += "</div>", i += '<div class="show_sale_item" id="sales_info_' + o + '">', i += '<div class="alert_head">', i += '<span class="close_alert_btn">×</span>', i += "type" in t[o] && "gift" === t[o].type ? "赠品" : "规则说明", i += "</div>", i += '<div class="alert_content">', "" !== t[o].content && (i += ' <div class="show_sale_rule">' + t[o].content + "</div>"), i += "</div>", i += "</div>";
                "" !== n && ($("#sale_div").append(n), $("#alert_box").append(i))
            }
        }, initShareFunc: function () {
        }, initEvent: function () {
            var e = this, t = $("#detail_nav").offset().top;
            $("#imgs_tap").tap(function () {
                $(window).scrollTop() > t && $(window).scrollTo(t), $("#detail_pingjia").removeClass("current_tap"), $("#detail_imgs").addClass("current_tap"), $(".detail_tap").removeClass("select"), $("#imgs_tap").addClass("select"), $(".tap_content").removeClass("show_right"), $(".tap_content").addClass("hide_right")
            }), $("#pingjia_tap").tap(function () {
                $(window).scrollTop() > t && $(window).scrollTop(t), $("#detail_imgs").removeClass("current_tap"), $("#detail_pingjia").addClass("current_tap"), $(".detail_tap").removeClass("select"), $("#pingjia_tap").addClass("select"), $(".tap_content").removeClass("hide_right"), $(".tap_content").addClass("show_right");
                var n = $("#ajax-loading");
                s.current_timeout = window.setTimeout(function () {
                    s.has_clickpj || (n.show(), $.ajax({
                        url: "http://koubei.jumei.com/ajax/reports_aggregate.json?path=reports_aggregate.json&type=" + s.type + "&product_id=" + s.pingjia_id + "&rows_per_page=10&page=1&callback=jsonp1",
                        type: "get",
                        dataType: "jsonp",
                        success: function (t) {
                            n.hide(), e.set_pingjia(t), s.has_clickpj = !0
                        },
                        error: function () {
                            n.hide(), alert("口碑网络错误，请重试")
                        }
                    }))
                }, 450)
            }), $(window).scroll(function () {
                t = $("#detail_nav").offset().top, $(window).scrollTop() >= t ? $(".detail_nav_inner").addClass("fix_top") : $(".detail_nav_inner").removeClass("fix_top")
            }), $(".more_pingjia").tap(function () {
                var t = $("#ajax-loading");
                s.report_index < s.report_pageCount && (t.show(), s.report_index++, $.ajax({
                    url: "http://koubei.jumei.com/ajax/reports_aggregate.json?path=reports_aggregate.json&type=" + s.type + "&product_id=" + s.pingjia_id + "&rows_per_page=10&page=" + s.report_index + "&callback=jsonp1",
                    type: "get",
                    dataType: "jsonp",
                    success: function (n) {
                        t.hide(), e.set_pingjia(n), s.has_clickpj = !0
                    },
                    error: function () {
                        t.hide(), alert("更多口碑网络错误，请重试")
                    }
                })), $(this).hide()
            }), $(".add_cart").click(function () {
                e.add_cart()
            }), $(".choose_size a").click(function (t) {
                t.preventDefault(), e.choose_size(this)
            });
            var n = $(".alert_box");
            $("#sale_div").delegate(".sales_item_click", "click", function () {
                var e = this.id, t = "sales_info_" + e.substr(e.length - 1, 1);
                $(".show_sale_item").hide(), $("#" + t).show(), $(".show_sale_rules").show(), n.show(), $(".float_cover_bg").show(), n.animate({"margin-top": "100px"}, "linear")
            }), $(".alert_box").delegate(".close_alert_btn", "click", function () {
                $(".show_sale_rules").hide(), n.hide(), $(".float_cover_bg").hide(), n.css("margin-top", "-400px")
            }), $("#direct_pay").on("click", function () {
                if (r) {
                    var e = "";
                    e = $("#only_one_size").length >= 1 ? $("#only_one_size").val() : $(".size_option.selected").find("input").val() + "," + $("#item_id").val() + ",1", $.ajax({
                        url: "/product/directPay",
                        data: {itemKeys: e},
                        type: "get",
                        dataType: "json",
                        success: function (e) {
                            1 * e.code === 0 ? window.location.href = e.url : alert(e.msg)
                        }
                    })
                } else {
                    alert("请先登录，再购买");
                    var t = window.location.href, n = $("#fromwx").val();
                    1 == n ? window.location.href = "http://wx.jumei.com/ExtConnect/index?act=microshop&url=" + encodeURIComponent(t) : window.location.href = "//passport.jumei.com/i/mobile/login?redirect=" + encodeURIComponent(t)
                }
            }), $(".company-info").on("click", function () {
                var t = $("#merchant_id").val();
                e.showCompanyInfo(t)
            })
        }, add_cart: function () {
            var e = this, t = $("#category").val();
            if ($("#add_xinyuan").length > 0 && r === !1) {
                alert("请先登录，再添加");
                var i = window.location.href, a = $("#fromwx").val();
                return 1 == a ? window.location.href = "http://wx.jumei.com/ExtConnect/index?act=microshop&url=" + encodeURIComponent(i) : window.location.href = "//passport.jumei.com/i/mobile/login?redirect=" + encodeURIComponent(i), !1
            }
            if (0 === $("#add_shopping").length && c === !0)return alert("此商品已在您的心愿列表中，不能重复添加"), !1;
            var o = "";
            if ("red_envelope" === s.type)o = "," + s.item_id + ",1"; else if (o = $(".size_option.selected").find("input").val(), $("#only_one_size").length >= 1 && (o = $("#only_one_size").val()), "" === o || !o)return alert("请先选择尺寸"), !1;
            var l = "";
            return l = Jumei.getQueryString(location.href, "selltype") ? "selltype=" + Jumei.getQueryString(location.href, "selltype") + "&selllabel=" + Jumei.getQueryString(location.href, "selllabel") : "selllabel=" + document.referrer, $(".add_cart").addClass("select"), 0 === $("#add_shopping").length && c === !1 ? $.ajax({
                url: "http://h5.jumei.com/user/wish_add?items=" + o,
                dataType: "jsonp",
                success: function (t) {
                    e.add_xy_callback(t)
                },
                error: function () {
                    alert("加心愿单网络错误，请重试")
                }
            }) : parseInt($(".detail_car_num").text()) >= 20 ? (alert("购物车最多只允许添加20个商品！"), $(".add_cart").removeClass("select")) : n.add_shoping("detail_car", "detail_car_num", o, t, l, e.add_car_callback), !1
        }, add_xy_callback: function (e) {
            var t = this;
            $("#add_xinyuan").removeClass("select"), 1 === e.result ? t.guide_animate() : alert(e.message)
        }, choose_size: function (e) {
            if (!$(e).hasClass("disabled")) {
                $(".choose_size .size_option").removeClass("selected"), $(e).addClass("selected"), $(e).find("input").prop("checked", !0), $(e).find("input").attr("checked", !0);
                var t = $(e).find("input").data("pricedetail");
                if ($("#mainProduct").text(t), location.href.indexOf("detail") > -1) {
                    var n = $(e).find("input").data("price");
                    $("#newPrice").text(n)
                }
            }
        }, guide_animate: function () {
            if (0 === $(".add_car_animation").length) {
                var e = $(".productPic img").attr("src");
                $(".productPic").append('<img  class="add_car_animation" src="' + e + '"/>')
            }
            var t = $(".add_car_animation");
            if ("yes" !== t.attr("animation")) {
                t.show(), $(".add_car_animation").animate({
                    width: "0px",
                    bottom: "0px",
                    right: "97%",
                    "z-index": 1
                }, 500, function () {
                });
                setTimeout(function () {
                    t.hide(), t.attr("animation", "no"), t.css({
                        width: "5rem",
                        right: "30%",
                        bottom: "70%",
                        "z-index": 9999
                    })
                }, 500);
                t.attr("animation", "yes")
            }
        }, add_car_callback: function (e) {
            $("#add_shopping").removeClass("select"), "success" === e.result && l.guide_animate()
        }, set_pingjia: function (e) {
            var t = this;
            if (s.report_pageCount = e.data.pageCount, s.report_index = e.data.pageNumber, s.report_number = e.data.rowsPerPage, e.data.pageNumber === e.data.pageCount || 0 === e.data.pageCount || !e.data.rows || e.data.rows && "" === e.data.rows ? $("#more_pingjia").hide() : $("#more_pingjia").show(), e.data.rows && "" !== e.data.rows) {
                var n = $("<ul>");
                for (var i in e.data.rows)n.append(t.set_pingjia_list(e.data.rows[i]));
                $("#detail_pingjia_inner").append(n)
            } else 1 !== s.report_index && s.report_index || $("#detail_pingjia_inner").append("<p>暂无评论信息</p>")
        }, set_pingjia_list: function (e) {
            if (!e.content_abstract_90 || "" === e.content_abstract_90 || !e.report_id || "" === e.report_id)return "";
            var t = "<li>";
            return t += '<div class="clearfix"><a style = "color:#ED145B;font-size:15px;font-weight:bold" href="koubei?report_id=' + e.report_id + '">' + decodeURIComponent(e.title) + "</a></div>", t += '<div class="little_gray">' + e.nickname + "(", t += e.age && "" !== e.age && "0" !== e.age ? e.age + "," : "未知年龄,", t += e.skin_type && "" !== e.skin_type ? e.skin_type + "," : "未知肤质,", t += e.hair_type && "" !== e.hair_type ? e.hair_type + ")</div>" : "未知发质)</div>", t += '<div style = "font-size:14px;word-break:break-all;word-wrap:break-word;">', t += e.content_abstract_90 + '<a href="koubei?report_id=' + e.report_id + '">[查看全部]</a></div>', t += '<div><span class="little_gray">阅读 ' + e.shown_view_count + " | 回复 " + e.comment_count + "| 有用" + e.shown_support_count + "</span></div>", t += "</li>"
        }, initGa: function () {
            $("#ga_go_check").length > 0 && $("#ga_go_check").click(function () {
                Jumei.ja("button", "go_check")
            }), $(".navTitle").length > 0 && $(".navTitle").each(function (e) {
                $(this).click(function () {
                    switch (e) {
                        case 0:
                            Jumei.ja("button", "tuangou");
                            break;
                        case 1:
                            Jumei.ja("button", "mingpin");
                            break;
                        case 2:
                            Jumei.ja("button", "meizhuang")
                    }
                })
            }), $(".add_cart").length > 0 && $(".add_cart").click(function () {
                Jumei.ja("button", "add_cart")
            }), $(".tab li").length > 2 && $(".tab li").eq(2).click(function () {
                Jumei.ja("button", "go_pc")
            }), $(".float_car").length > 0 && $(".float_car").click(function () {
                Jumei.ja("button", "cart_float")
            }), $(".search").length > 0 && $(".search").click(function () {
                Jumei.ja("button", "search")
            }), $(".cart_ico").length > 0 && $(".cart_ico").click(function () {
                Jumei.ja("button", "cart_edge")
            }), $("#ga_home_login").length > 0 && $("#ga_home_login").click(function () {
                Jumei.ja("button", "land_edge")
            }), $("#ga_login").length > 0 && $("#ga_login").click(function () {
                Jumei.ja("button", "land_now")
            }), $("#ga_home_register").length > 0 && $("#ga_home_register").click(function () {
                Jumei.ja("button", "register_egde")
            }), $("#ga_register").length > 0 && $("#ga_register").click(function () {
                Jumei.ja("button", "register_now")
            }), $("#download").length > 0 && $("#download").click(function () {
                Jumei.ja("button", "download_ijanstall")
            }), $("#commonBtn").length > 0 && $("#commonBtn").click(function () {
                Jumei.ja("button", "see_more")
            }), $(".jdetail").length > 0 && $(".jdetail").click(function () {
                var e = $(this).attr("data-type");
                "allComment" == e && Jumei.ja("button", "allComment"), "goodComment" == e && Jumei.ja("button", "goodComment"), "middleComment" == e && Jumei.ja("button", "middleComment"), "badComment" == e && Jumei.ja("button", "badComment")
            })
        }, priceRemmind: function () {
            var e = $(".choose_size a"), t = null, n = $(".remmind-content .com-wrap"), i = null, a = $("#rePriceInfo"), s = a.attr("data-skudefault");
            "" !== s && void 0 !== s || a.hide(), a.on("click", function () {
                if ("undefined" != o) {
                    if ("global_combination_deal" == o || "global_combination_mall" == o) {
                        for (var a = 0; a < e.length; a++)e.eq(a).hasClass("selected") && (t = e.eq(a).find("input").attr("id").substring(4));
                        for (var r = 0; r < n.length; r++)i = n.eq(r).attr("data-itemsku"), null == t && (t = s), i == t && n.eq(r).show().siblings(".com-wrap").hide()
                    }
                    $("#remmindWrap").show()
                }
            }), $("#closeBtn,.remmind-mask").on("click", function () {
                $(n).show(), $("#remmindWrap").hide()
            })
        }, locateDetail: function () {
            if ("global_combination_deal" == o || "global_combination_mall" == o) {
                var e = Jumei.getCookie("locatecombination");
                if (e && "" !== e) {
                    if (1 === Number(e)) {
                        $("#rePriceInfo").hide();
                        var t = $(".bottom_fixed").children();
                        $(t).each(function (e, t) {
                            e > 0 && $(".bottom_fixed").append('<span class="span_purchase">～卖光了～</span>').find($(t)).remove()
                        })
                    }
                } else $.ajax({
                    url: "http://www.jumei.com/i/api/locate",
                    type: "get",
                    dataType: "jsonp",
                    success: function (t) {
                        if (e = t, 1 === Number(e)) {
                            $("#rePriceInfo").hide();
                            var n = $(".bottom_fixed").children();
                            $(n).each(function (e, t) {
                                e > 0 && $(".bottom_fixed").append('<span class="span_purchase">～卖光了～</span>').find($(t)).remove()
                            })
                        }
                    }
                })
            }
        }, directMail: function () {
            var e = $("#is_dm").val();
            1 == e && l.getShowDirectMail()
        }, getShowDirectMail: function () {
            var e = $("#dm-key").attr("cookiekey"), t = Jumei.getCookie(e);
            if (t && "" !== t) {
                if (1 == t) {
                    var n = $(".bottom_fixed").children();
                    $(n).each(function (e, t) {
                        e > 0 && $(".bottom_fixed").append('<span class="span_purchase">～卖光了～</span>').find($(t)).remove()
                    })
                }
            } else $.ajax({
                url: "//www.jumei.com/i/api/locate?tag=DM",
                type: "get",
                dataType: "jsonp",
                success: function (e) {
                    if (1 == e) {
                        var t = $(".bottom_fixed").children();
                        $(t).each(function (e, t) {
                            e > 0 && $(".bottom_fixed").append('<span class="span_purchase">～卖光了～</span>').find($(t)).remove()
                        })
                    }
                }
            })
        }, showCompanyInfo: function (e) {
            $.ajax({
                url: "http://h5.jumei.com/pop/ajaxStandard",
                type: "get",
                data: {id: e},
                dataType: "jsonp",
                success: function (t) {
                    1 * t.code === 0 ? window.location.href = "http://h5.jumei.com/pop/standard?id=" + e : window.toast.show("<p>正在添加商家信息!</p>")
                }
            })
        }
    };
    l.init()
}), seajs.use(["detail"]);