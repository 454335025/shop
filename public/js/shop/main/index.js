$(document).ready(function () {
    $(".arrow").on("click", function () {
        arrow(this);
    });
    $(".search_link").on("click", function () {
        directory(this);
    });
    $("#search_cancel").on("click", function () {
        searchByWareName();
    })
});

/**
 * arrow hide show
 * @param obj
 */
function arrow(obj) {
    var li_class = $(obj).parent("li").attr("class");
    if (li_class == "search_link") {
        $(obj).parent("li").attr("class", "search_link select");
    } else if (li_class == "search_link select") {
        $(obj).parent("li").attr("class", "search_link");
    }
}
/**
 * 目录显示隐藏
 * @param obj
 */
function directory(obj) {
    var li_class = $(obj).attr("class");
    if (li_class == 'search_link') {
        $(obj).attr("class", "search_link select");
    } else if (li_class == 'search_link select') {
        $(obj).attr("class", "search_link");
    }
}

/**
 * search by ware_name
 */
function searchByWareName() {
    var ware_name = $("#search_input").val();
    window.location.href = "/shop?ware_name=" + ware_name;

}
