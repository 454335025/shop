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