$(function(){
    $(".navTitle").on("click",function(){
        $(this).addClass("nav_select").siblings().removeClass("nav_select");
    })
});