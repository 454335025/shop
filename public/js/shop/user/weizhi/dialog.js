define("touch/comp/dialog", ["library/template", "templates/MobileDialog"], function (a) {
    var b = a("library/template"), c = a("templates/MobileDialog"), d = function (a) {
        this.init(a)
    };
    return d.prototype = {
        init: function (a) {
            this.options = $.extend({
                element: "element",
                width: 260,
                height: 200,
                bgOpacity: .6,
                minH: 30,
                tpl: c,
                showContent: !0,
                content: "聚美提示您！",
                showTitle: !0,
                title: "提示",
                type: "slidedown",
                btn: 2,
                ok: "确定",
                cancel: "取消",
                showClose: !0,
                clickBgClose: !0,
                init: function () {
                },
                okCallback: null,
                cancelCallback: function () {
                }
            }, a || {}), "string" == typeof this.options.tpl && (this.options.tpl = b.compile(this.options.tpl)), this.bg = '<div class="ui-bg"></div>', this._create()
        }, _create: function () {
            this._appendHtml(), this._initFunc(), this._bindEvent(), this._resize()
        }, _appendHtml: function () {
            var a = this, b = $(".ui-bg"), c = $("body");
            this.options.platform = this._platform();
            var d = a.options.tpl(this.options);
            this.dialog = $(d), this.dialogContent = this.dialog.find(".ui-dialog-content"), this.dialog.css("position", "fixed"), this._style(), $("body").append(a.dialog), b.length <= 0 && c.append(a.bg)
        }, _platform: function () {
            var a = navigator.userAgent.toLowerCase();
            return /android/g.test(a) ? "android" : /(iphone|ipod|ipad)/g.test(a) ? "iphone" : "qita"
        }, _style: function () {
            var a = this._platform();
            "android" == a ? this.dialog.addClass("android") : this.dialog.addClass("ios")
        }, _initFunc: function () {
            this.options.init()
        }, show: function () {
            $("body").height(), $(window).height() * Jumei.scale, this._culculate(), this._setFlag(), this._animateShow()
        }, _animateShow: function () {
            var a = $(".ui-bg"), b = this, c = this.options.type;
            switch (a.show(), this.options.clickBgClose && a.unbind("click").click(function () {
                return b.hide(), b.options.cancelCallback(), !1
            }), a.animate({opacity: this.options.bgOpacity}, 500, "ease-out"), c) {
                case"slidedown":
                    this.dialog.show();
                    break;
                case"rotate":
                    this.dialog.show(), this.dialog.wrap('<div class="ui-dialog-wrap"></div>'), this.dialog.css({
                        transform: "rotateY(-390deg)",
                        "-webkit-transform": "rotateY(-390deg)"
                    }), this.dialog.animate({
                        transform: "rotateY(0deg)",
                        "-webkit-transform": "rotateY(0deg)"
                    }, 500, "ease");
                    break;
                case"scale":
                    this.dialog.show(), this.dialog.css({
                        transform: "scale(0)",
                        "-webkit-transform": "scale(0)"
                    }), this.dialog.animate({
                        transform: "scale(1)",
                        "-webkit-transform": "scale(1)"
                    }, 200, "ease", function () {
                    });
                    break;
                case"fadein":
                    this.dialog.show(), this.dialog.css("opacity", 0), this.dialog.animate({opacity: 1}, 400, "ease", function () {
                    });
                    break;
                default:
                    this.dialog.show(), a.show(), a.animate({opacity: .5}, 500, "ease")
            }
        }, _bindEvent: function () {
            var a = this, b = $(".ui-dialog-btn .ui-dialog-cancel,.ui-dialog .ui-dialog-close"), c = $(".ui-dialog .ui-dialog-ok");
            b && b.click(function () {
                return a.hide(), a.options.cancelCallback(), !1
            }), c && c.click(function () {
                var b = !0;
                return "function" == typeof a.options.okCallback && (b = a.options.okCallback()), b !== !1 && a.hide(), !0
            })
        }, _resize: function () {
        }, _culculate: function () {
            var a = this;
            a.windowHeight = $(window).height(), a.windowWidth = 320, a.dialog.show(), a.height = a.dialog.height(), a.dialog.hide()
        }, _setFlag: function () {
            var a = 0;
            this.dialog.width(this.options.width), this.dialogContent.css("minHeight", this.options.minH), this.dialog.css("left", "100%").show(), a = (window.innerHeight - this.dialog.height()) / 2;
            var b = this.dialog.width();
            this.dialog.css({left: "50%", "margin-left": -b / 2 + "px", top: a + "px"}), this.dialog.hide()
        }, hide: function () {
            $(".ui-bg").hide(), this.dialog.hide()
        }
    }, d
});