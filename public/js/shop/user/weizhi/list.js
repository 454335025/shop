define("weizhi/list", ["weizhi/adapter", "weizhi/alarm", "weizhi/RMAMaxCountDialog", "weizhi/dialog", "weizhi/platform", "weizhi/toast"], function (a) {
    function b() {
        $(".status-wrap").each(function () {
            var a = $(this);
            0 == $.trim(a.html()).length && a.hide()
        })
    }

    a("weizhi/adapter");
    var c = a("weizhi/alarm"), d = a("weizhi/toast");
    $("body").on("click", ".alarm-trigger", function () {
        c($(this).attr("data-alarm"))
    });

});