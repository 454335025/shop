define("weizhi/adapter", [], function () {
    function a() {
        var a = window.innerWidth / 320;
        b.css("zoom", a)
    }

    var b = $("body").children();
    $(window).resize(a), a()
});