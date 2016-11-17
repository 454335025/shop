$(document).ready(function () {
    $(".arrow").on("click", function () {
        var li_class = $(this).parent("li").attr("class");
        if (li_class == "search_link") {
            $(this).parent("li").attr("class", "search_link select");
        } else if (li_class == "search_link select") {
            $(this).parent("li").attr("class", "search_link");
        }
    });
});

/**
 * 目录显示隐藏
 * @param obj
 */
function directory(obj) {
    var li_class = $(obj).attr("class");
    if (li_class =='search_link') {
        $(obj).attr("class", "search_link select");
    }else if(li_class =='search_link select'){
        $(obj).attr("class", "search_link");
    }
}
