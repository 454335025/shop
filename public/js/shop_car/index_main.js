// /* Date: 2016-09-12T18:31:22Z Path: js/touch/cart/index_main.js */
// define("new_cart", ["ui"], function (t) {
//     var i = t("ui"), e = new i.loadding, n = null, a = null, s = {
//         showDialog: function () {
//             if (n)return a.show(), !1;
//             var t = this;
//             a = new i.dialog({
//                 content: '<div class="data-title">海外购商品需要每件单独下单，请全部生成订单后一起结算</div><div class="data-content" id="scroller"></div>',
//                 id: "global-dialog",
//                 btn: 1,
//                 title: "温馨提示",
//                 ok: "合并结算",
//                 okCallback: function () {
//                     return !1
//                 }
//             }), this.getData("/cart/single_global", function (e) {
//                 if (0 === e.state)return location.href = "http://passport.jumei.com/i/mobile/login?redirect=" + encodeURI(window.location.href), !1;
//                 for (var s = "", o = e.jumei.cart, d = 0; d < o.length; d++)if (o[d].type.indexOf("global") > -1)s += '<li><div class="product-list cuhe clear"><div class="product-list-li clear"><img class="fl product-img" src="' + o[d].image + '"/><div class="fl product-desc"><div class="title">' + o[d].item_short_name + '</div><div class="icon-x">￥' + o[d].item_price + '<img src="http://p2.jmstatic.com/mobile/act/activities/2015_04/huodong_0323/close.png"/></div><div>' + o[d].quantity + '</div></div></div><div class="product-btn-list product-btn-common clear"><div class="product-btn fr" key="' + o[d].item_key + '">生成订单</div></div></div></li>'; else {
//                     for (var l = o[d].sub_items, c = "", r = 0; r < l.length; r++)c += '<div class="product-list-li clear"><img class="fl product-img" src="' + l[r].image + '"/><div class="fl product-desc"><div class="title">' + l[r].item_short_name + '</div><div class="icon-x"><img src="http://p2.jmstatic.com/mobile/act/activities/2015_04/huodong_0323/close.png"/></div><div>' + l[r].quantity + "</div></div></div>";
//                     s += '<li><div class="product-list cuhe clear">' + c + '<div class="product-btn-list clear"><div class="fl"><div>' + o[d].item_price_pre + "</div><div>￥" + o[d].item_price + '</div></div><div class="product-btn fr" key="' + o[d].item_key + '">生成订单</div></div></div></li>'
//                 }
//                 $(".data-title").html(e.jumei.show_single_global_layer_message), $("#global-dialog .data-content").html('<ul id="coupon-box-wrapper">' + s + "</div>"), a.show(), null == n && (n = new i.scroll({id: "coupon-box-wrapper"})), t.bindBtnEvent()
//             })
//         }, getData: function (t, i) {
//             e.show(), $.ajax({
//                 type: "get", url: t, dataType: "jsonp", timeout: 2e3, success: function (t) {
//                     e.hide(), i(t)
//                 }, error: function () {
//                     e.hide()
//                 }
//             })
//         }, bindBtnEvent: function () {
//             var t = this;
//             $(".product-btn").on("tap", function (i) {
//                 i.preventDefault(), i.stopPropagation();
//                 var e = this;
//                 if (!$(this).hasClass("selected")) {
//                     var n = $(this).attr("key");
//                     t.getData("/cart/single_confirmation?key=" + n, function (t) {
//                         if (t) {
//                             $(e).addClass("selected"), $(e).html("已生成");
//                             var i = $(".product-btn-list .product-btn").length, n = $(".product-btn-list .selected").length;
//                             i == n && $(".ui-dialog-ok").addClass("selected")
//                         }
//                     })
//                 }
//             }), $(".ui-dialog-ok").on("tap", function (t) {
//                 return t.preventDefault(), t.stopPropagation(), $(this).hasClass("selected") && (location.href = $("#touch-cart-confirm").attr("jump")), !1
//             })
//         }, test: function () {
//         }
//     };
//     return s
// }), define("cart", ["ui", "new_cart"], function (t) {
//     var i = t("ui"), e = new i.loadding, n = (t("new_cart"), {
//         haiTaoLength: 3,
//         maxLength: 0,
//         commonLength: 10,
//         initNumStyle: function () {
//             var t = this;
//             $("#cart-deals-list li").each(function () {
//                 var i = $(this).find(".type").val(), e = $(this).find(".quantity").val(), n = 0;
//                 n = i.indexOf("global") > -1 || i.indexOf("combination") > -1 ? t.haiTaoLength : t.commonLength, e == n && $(this).find(".btn-add").removeClass("btn-add-select")
//             })
//         },
//         getNum: function (t) {
//             var i = $(t).parent().find(".quantity").val();
//             return parseInt(i)
//         },
//         setNum: function (t, i) {
//             $(t).parent().find(".quantity").val(i)
//         },
//         addNum: function (t, i) {
//             var e = this.getNum(t), n = $(t).parent("li").find(".type").val(), a = this.commonLength;
//             "global" === n && (a = this.haiTaoLength), a > e && (e += 1, this.judgeNumChange(t, e), this.updateNum(t, i, e))
//         },
//         subNum: function (t, i) {
//             var e = this.getNum(t);
//             e > 1 && (e -= 1, this.judgeNumChange(t, e), this.updateNum(t, i, e))
//         },
//         judgeNumChange: function (t, i) {
//             i > 1 ? this.subBtnAddNumStyle(t) : this.subBtnSubNumStyle(t), 10 > i ? this.addBtnAddNumStyle(t) : this.addBtnSubNumStyle(t)
//         },
//         addBtnAddNumStyle: function (t) {
//             $(t).parent().find(".btn-add").addClass("btn-add-select")
//         },
//         addBtnSubNumStyle: function (t) {
//             $(t).parent().find(".btn-add").removeClass("btn-add-select")
//         },
//         subBtnAddNumStyle: function (t) {
//             $(t).parent().find(".btn-sub").addClass("btn-sub-select")
//         },
//         subBtnSubNumStyle: function (t) {
//             $(t).parent().find(".btn-sub").removeClass("btn-sub-select")
//         },
//         updateNum: function (t, i, e) {
//             var a = $(t).parent(), s = a.find(".type").val(), o = a.find(".item-key").val();
//             n.updateAjax(s, o, e, i)
//         },
//         updateAjax: function (t, i, a, s) {
//             e.show(), $.ajax({
//                 type: "post",
//                 url: "/cart/update",
//                 dataType: "json",
//                 data: {type: t, item_key: i, item_quantity: a},
//                 success: function (t) {
//                     s.call(n), e.show()
//                 },
//                 error: function () {
//                     e.show()
//                 }
//             })
//         },
//         deleteProduct: function (t, i) {
//             if (confirm("确认删除该商品？") === !1)return !1;
//             var e = $(t).parents("li"), a = e.find(".type").val(), s = e.find(".item-key").val();
//             n.updateAjax(a, s, 0, i)
//         }
//     }), a = {
//         init: function () {
//             var t = navigator.userAgent.toLowerCase(), i = Jumei.getQueryString(window.location.href, "platform");
//             t.match(/(iphone|ipod|android|ipad)/) || "wap" === i || $(".touch-cart-fixed").css("width", "20rem !important"), this.initEvent(), this.initMessage(), n.initNumStyle()
//         }, initMessage: function () {
//             var t = $(".message").html();
//             t && alert(t)
//         }, reloadUrl: function () {
//             var t = location.href;
//             t = t.replace(/&*message=([^&#]+)*/g, ""), t = t.replace(/&?t=\d+/, "");
//             var i = (new Date).getTime();
//             t = -1 === t.indexOf("?") ? t + "?t=" + i : t.split("?")[1] ? t + "&t=" + i : t + "t=" + i, location.href = t
//         }, initEvent: function () {
//             var t = this;
//             $(".btn-sub").on("tap", function (i) {
//                 i.preventDefault(), i.stopPropagation(), $(this).hasClass("btn-sub-select") && n.subNum(this, function () {
//                     t.reloadUrl()
//                 })
//             }), $(".btn-add").on("tap", function (i) {
//                 i.preventDefault(), i.stopPropagation(), $(this).hasClass("btn-add-select") && n.addNum(this, function () {
//                     t.reloadUrl()
//                 })
//             }), $(".cart-del").on("tap", function (i) {
//                 i.preventDefault(), i.stopPropagation(), n.deleteProduct(this, function () {
//                     t.reloadUrl()
//                 })
//             }), $("#touch-cart-confirm").on("tap", function (t) {
//                 t.preventDefault(), t.stopPropagation();
//                 var i = window.cartData, e = [], n = $('input[name="selected_item_keys"]'), a = $("#filterPostForm");
//                 i.forEach(function (t) {
//                     t.sale_status || e.push(t.item_key)
//                 }), n.val(e.join(",")), a.submit()
//             })
//         }, test: function () {
//         }
//     };
//     a.init()
// }), seajs.use(["cart"]);