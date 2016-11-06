/* Date: 2016-09-26T19:35:12Z Path: js/touch/search/search_list.js */
var float_layer = {
    layer_dom: null, scroll_dom: null, scroll_height: 0, touch_outtime: null, init: function (e) {
        var a = this;
        a.layer_dom = $("." + e.layer_name).length > 0 ? $("." + e.layer_name) : $("#" + e.layer_name), e.scroll_dom_name ? (a.scroll_dom = $("." + e.scroll_dom_name).length > 0 ? $("." + e.scroll_dom_name)[0] : $("#" + e.scroll_dom_name)[0], a.scroll_height = e.scroll_height ? e.scroll_height : $(a.scroll_dom).height(), a.scroll_dom.addEventListener("touchstart", function (e) {
            a.nStartY = e.touches[0].pageY, a.nStartX = e.touches[0].pageX
        }), a.scroll_dom.addEventListener("touchmove", function (e) {
            a.movey = e.touches[0].pageY - a.nStartY, a.movex = e.touches[0].pageX - a.nStartX;
            var s = e || window.event;
            s.preventDefault(), e.cancelable = !1, a.movey < 0 && Math.abs(a.movey) > 1 && (a.scroll_dom.scrollTop += Math.abs(a.movey)), a.movey > 0 && Math.abs(a.movey) > 1 && (a.scroll_dom.scrollTop -= Math.abs(a.movey)), a.nStartY = e.touches[0].pageY
        }), document.getElementsByTagName("body")[0].addEventListener("touchmove", function (e) {
            if (a.layer_show()) {
                var s = e || window.event;
                s.preventDefault(), e.cancelable = !1
            }
        })) : document.getElementsByTagName("body")[0].addEventListener("touchmove", function (e) {
            if (a.layer_show()) {
                var s = e || window.event;
                s.preventDefault(), e.cancelable = !1
            }
        })
    }, layer_show: function () {
        var e = this;
        return 0 === e.layer_dom.length ? !1 : "none" != e.layer_dom.css("display") && "hidden" != e.layer_dom.css("visibility") ? !0 : void 0
    }
}, search_list = {history: null, callback: null, url: ""};
search_list.init_url = function () {
    window.location.href;
    this.url = "/index/requestDelegate?url="
}, search_list.init = function (e) {
    search_list.init_url(), search_list.get_list(e, "http://mobile.jumei.com/msapi/mall/allcategories.json")
}, search_list.get_list = function (e, a) {
    var s = this, r = s.url + encodeURIComponent(a);
    $.ajax({
        url: r, success: function (a) {
            e(a.data)
        }, error: function () {
        }, type: "get", dataType: "json"
    })
}, search_list.get_history = function (e) {
    var a = localStorage.getItem(e.key);
    return a && "" !== a ? void e.callback(a) : null
}, search_list.get_recommend = function (e) {
    var a = e.param.url + "?", s = [];
    for (var r in e.param)s.push(r + "=" + e.param[r]);
    a += s.join("&"), search_list.get_list(e.callback, a)
};
var h5_host_url = $("#h5_host_url").val(), search_page = {history: [], change_history: !1, on_slide: !1};
search_page.hide_page = function () {
    $("#search_defer").removeClass("hide"), $("#page_outer").removeClass("show"), $("#search_page").removeClass("show").addClass("hide"), $("#search_back").show(), $("#search_cancel").hide(), $(".search_input").val(""), $(".search_links").show(), $(".recommend_lists").hide(), $(".history_lists").hide()
}, search_page.init = function () {
    $("#search_defer").click(function () {
        return 0 !== this.offsetLeft ? (search_page.hide_page(), !1) : void 0
    }), $(".search_links").height($("#search_page").height() - 46), $("#search_action,#page_top").click(function () {
        return 0 !== $("#search_defer")[0].offsetLeft ? void search_page.hide_page() : (search_page.change_history === !0 && search_list.get_history({
            key: "history_words",
            callback: search_page.set_history
        }), $("#search_defer").show().removeClass("hide").addClass("hide"), $("#page_outer").removeClass("hide").addClass("show"), $("#search_page").show().removeClass("hide").addClass("show"), $(this)[0] === $("#page_top")[0] && $(".search_input").trigger("focus"), !1)
    }), $("#search_back").click(function () {
        return search_page.hide_page(), !1
    }), $("#page_outer").click(function () {
        search_page.hide_page()
    }), $(".search_input").focus(function () {
        0 === $(this).val().length && ($(".search_links").hide(), $(".recommend_lists").hide(), $(".history_lists").show()), $("#search_page").addClass("mach-width"), $("#history_back").show(), $("#search_cancel").show(), $("#search_back").hide()
    }), $("#clear_history").click(function () {
        $(".history_lists li").remove(), $(this).hide(), search_page.history = [], localStorage.removeItem("history_words")
    }), $("#history_back").click(function () {
        $("#search_back").show(), $("#search_cancel").hide(), $(".search_input").val(""), $(".search_links").show(), $(".recommend_lists").hide(), $(".history_lists").hide(), $("#search_page").removeClass("mach-width"), $(this).hide()
    }), $("#search_cancel").click(function () {
        var e = $(".search_input").val().replace(/(^\s+)|(\s+$)/g, "");
        return "" === e ? null : (search_page.localStorage(), void(window.location.href = h5_host_url + "/search/index?search=" + e))
    }), document.onkeydown = function () {
        13 == event.keyCode && $("#search_cancel").trigger("click")
    }, float_layer.init({
        layer_name: "page_outer",
        scroll_height: $(".search_links").height(),
        scroll_dom_name: "search_links"
    })
}, search_page.data_init = function (e) {
    var a = "";
    if (!e)return null;
    for (var s = 0; s < e.length; s++)a += search_page.data_single(e[s]);
    $(".search_links").append(a), search_page.de_event()
}, search_page.data_single = function (e) {
    var a = "";
    if (e.sub_categories && 0 !== e.sub_categories.length) {
        a += '<li class="search_link">' + e.name + '<span class="arrow"></span><ul class="search_subs">';
        for (var s = e.sub_categories, r = 0; r < s.length; r++)a += '<li class="search_sub"><a href="' + h5_host_url + "/search/index?category_id=" + s[r].category_id + '">' + s[r].name + "</a></li>";
        a += "</ul></li>"
    } else a += '<li class="search_link"><a href="' + h5_host_url + "/search/index?category_id=" + e.category_id + '">' + e.name + '</a><span class="arrow"></span></li>';
    return a
}, search_page.de_event = function () {
    $(".search_link").click(function (e) {
        return $(".search_link").not($(this)).removeClass("select"), $(this).hasClass("select") ? $(this).removeClass("select") : $(this).addClass("select"), !1
    }), $(".search_sub").click(function (e) {
        var a = e || window.event;
        a.stopPropagation ? a.stopPropagation() : a.cancelBubble = !0
    }), document.getElementById("search_input").onpropertychange = search_page.search_input_change, document.getElementById("search_input").oninput = search_page.search_input_change
}, search_page.search_input_change = function () {
    0 === $(this).val().length ? ($(".search_links").hide(), $(".recommend_lists").hide(), $(".history_lists").show()) : ($(".history_lists").hide(), $(".search_links").hide(), $(".recommend_lists").show(), search_list.get_recommend({
        callback: search_page.set_recommend,
        param: {keyword: $(".search_input").val(), url: "http://mobile.jumei.com/msapi/search/suggestion.json"}
    }))
}, search_page.set_recommend = function (e) {
    var a = "";
    if (e)for (var s = 0; s < e.length; s++)a += '<li class="recommend_list"><a href="' + h5_host_url + "/search/index?search=" + e[s] + '">' + e[s] + '</a><span class="arrow"></span></li>';
    $(".recommend_lists").html(a), $(".recommend_list").click(function () {
        search_page.localStorage(this)
    })
}, search_page.localStorage = function (e) {
    var a = "", s = !1;
    if (e)a = $(e).find("a").text().replace(/(^\s+)|(\s+$)/g, ""); else if (a = $(".search_input").val().replace(/(^\s+)|(\s+$)/g, ""), "" === a)return !0;
    for (var r = 0; r < search_page.history.length; r++)if (a == search_page.history[r]) {
        s = !0;
        break
    }
    if (!s) {
        search_page.change_history = !0, search_page.history.push(a), search_page.history.length > 7 && search_page.history.shift();
        var t = search_page.history.join(",");
        localStorage.setItem("history_words", t)
    }
}, search_page.set_history = function (e) {
    $("#clear_history").siblings().remove();
    var a = search_page;
    a.history = e.split(",");
    for (var s = "", r = 0; r < a.history.length; r++)s += '<li class="history_list"><a href="' + h5_host_url + "/search/index?search=" + a.history[r] + '">' + a.history[r] + '</a><span class="arrow"></span></li>';
    $(".history_lists").prepend(s), 0 !== a.history.length ? $("#clear_history").show() : $("#clear_history").hide()
}, window.search_page = search_page, search_page.init(), search_list.init(search_page.data_init), search_list.get_history({
    key: "history_words",
    callback: search_page.set_history
});