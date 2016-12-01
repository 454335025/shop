define("weizhi/alarm", ["weizhi/RMAMaxCountDialog", "weizhi/dialog", "weizhi/template", "weizhi/MobileDialog", "weizhi/platform"], function (a) {
    function b(a, b, f) {
        var g;
        "function" == typeof f && (g = f);
        var h = new d({
            tpl: c, title: "温馨提示", content: a, cancelCallback: function () {
                e && clearTimeout(e), g && g()
            }
        });
        h.show();
        var i = window.innerWidth / 320;
        $(".ui-dialog").css("zoom", i), b && (e && clearTimeout(e), e = setTimeout(function () {
            h.hide(), g && g()
        }, b))
    }

    var c = a("templates/RMAMaxCountDialog"), d = a("weizhi/dialog");
    a("weizhi/platform");
    var e = 0;
    return b
});