$(function(){
    $(".navTitle").on("click",function(){
        console.log(1);return;
        $(this).addClass("nav_select").siblings().removeClass("nav_select");
    })
});