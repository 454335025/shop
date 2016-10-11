$(function(){
    //首页添加活动调用模块
    var indexActivity = {
        init:function(){
            var _this = this;
            if($('#index-activity-block').length === 0){
                return;
            }
            var cardIDs = document.querySelectorAll(".card-id");
            for(var i = 0; i < cardIDs.length; i++){
                //默认加载今日上新活动第一页
                option={
                    card_id : cardIDs[i].getAttribute("value"),
                    curPage:1,
                    maxPage:1,
                };
                _this.ajaxUrl(option);
            }
//                $(window).scroll(function(){
//                    _this.loadAgain();
//                });
        },
        ajaxUrl:function(data){
            var _this = this;
            $.ajax({
                url:"/i/MobileWap/activity_list",
                dataType:"json",
                type:'get',
                data:{
                    card_id: data.card_id,
                    page:data.curPage,
                },
                success:function(res){
                    var curID = data.card_id;
                    _this.listHtml(res,curID);
                },
                error:function(){
                    //alert("网络连接错误");
                }
            });
        },
        listHtml:function(res,curid){
            var tpl_now = "", tpl_pre="";
            var _this = this;
            if(res.data.item_count === 0){
                return ;
            }
            option.maxPage = res.data.page_count;
            var _curID;
            $("#search_defer").find(".card-id").each(function(){
                if($(this).attr("value") === curid){
                    _curID = this;
                }
            });
            //title渲染
            $(_curID).siblings(".index-activity-title").show();
            $(_curID).siblings(".index-activity-title").children(".today-title").append(res.data.tab_online_name);
            $(_curID).siblings(".index-activity-title").find(".tomorrow-title .index-title-tab").after(res.data.tab_preshow_name);
            //是否显示预告活动数
            if(res.data.tab_preshow_num > 0){
                $(_curID).siblings(".index-activity-title").find(".tomorrow-title .pre-number").html(res.data.tab_preshow_num).show();
            }
            //菜单点击切换
            $(".index-activity-title .index-second-title").on("click",function(){
                if($(this).hasClass("today-title")){
                    $(this).addClass("select-now").siblings(".tomorrow-title").removeClass("select-pre");
                    $(this).parents(".index-activity-title").siblings(".today-model").show();$(this).parents(".index-activity-title").siblings(".tomorrow-model").hide();
                }else{
                    $(this).addClass("select-pre").siblings(".today-title").removeClass("select-now");
                    $(this).children(".pre-number").hide();
                    $(this).parents(".index-activity-title").siblings(".tomorrow-model").show();$(this).parents(".index-activity-title").siblings(".today-model").hide();
                }
            });
            //list渲染
            var dataList = res.data.item_list, list;
            for(list in dataList){
                if(dataList[list].tag === "formal"){
                    tpl_now += "<li><a href='"+dataList[list].url+"'><div class='activity-list-img2'><img src='"+dataList[list].image_url_set.main['640']+"'><div class='down-triangle2'></div></div>"+
                        "<div class='activity-list-text'><h1 class='activity-list-title'>"+dataList[list].marketing_title+"</h1><span class='activity-list-info'>"+dataList[list].marketing_word+"</span></div>"+
                        "<div class='activity-list-countdown' data-time='"+dataList[list].end_time+"'><span>还剩00天00小时</span></div></a></li>";
                }else{
                    tpl_pre += "<li><a href='"+dataList[list].url+"'><div class='activity-list-img2'><img src='"+dataList[list].image_url_set.main['640']+"'><div class='down-triangle2'></div></div>"+
                        "<div class='activity-list-text'><h1 class='activity-list-title'>"+dataList[list].marketing_title+"</h1><span class='activity-list-info'>"+dataList[list].marketing_word+"</span></div>"+
                        "</a></li>";
                }
            }
            $(_curID).siblings(".today-model").append(tpl_now);
            $(_curID).siblings(".tomorrow-model").append(tpl_pre);
            $(".activity-list-img2").css("width",$(window).width());
//                $(window).resize(function(){
//                    $(".activity-list-img2").css("width",$(window).width());
            $(".activity-list-img2").height($(".activity-list-img2").width()*0.416);
            $(".down-triangle2").css("top",$(".activity-list-img2").height()-5);
//                });
            //倒计时
            var countdownAll = document.querySelectorAll(".activity-list-countdown");
            for(var i = 0; i < countdownAll.length; i++){
                var endtime = countdownAll[i].getAttribute("data-time");
                endtime*=1000;
                _this.countBox(countdownAll[i],endtime);
            }
        },
//            loadAgain: function () {
//                if ($("#page-down").attr("flag") !== "false" && $("#page-down").offset().top >= $(window).scrollTop() && $("#page-down").offset().top <= ($(window).scrollTop() + $(window).height())) {
//                    option.curPage++;
//                    if(option.curPage > option.maxPage){
//                        $("#page-down").attr("flag","false");
//                        return;
//                    }
//                    this.ajaxUrl(option);
//                }
//            },
        countBox:function(ele,endTime){
            ele.timer = setInterval(function(){
                --endTime;
                var allSeconds = (endTime - (new Date().getTime()))/1000;
                if(allSeconds<=0){
                    clearInterval(ele.timer);
                    return;
                }
                var days = Math.floor(allSeconds/(60*60*24));
                var d_s = allSeconds - (days*24*60*60);
                var hours = Math.floor(d_s/(60*60));
                days = days<10?"0"+days:days;
                hours = hours<10?"0"+hours:hours;
                if(parseInt(hours) === 0 && d_s > 0){
                    ele.innerHTML = "即将结束";
                }else{
                    ele.innerHTML = "<span>还剩"+days+"天"+hours+"时</span>";
                }
            },1000);
        },
    };
    indexActivity.init();
});



(function () {
    var bullets = [];
    $('#banners').height($('.container').width() * 0.41);
    if ($('#position li').length > 1) {
        var bullets = document.getElementById('position').getElementsByTagName('li');
    }
    var banner = new Swipe(document.getElementById('slider'), {
        auto: 2000,
        continuous: true,
        disableScroll: false,
        stopPropagation: false,
        callback: function (pos) {
            var i = bullets.length;
            if (i <= pos) {
                pos = pos % 2;
            }
            while (i--) {
                bullets[i].className = ' ';
            }
            bullets[pos].className = 'cur';
        }
    });
})();



function set_imgsize() {
    $('.metro_item').each(function () {
        var $this_obj = $(this);
        var w = parseInt($this_obj.attr('w'), 10);
        var w_h = parseInt($this_obj.attr('h'), 10) / w;
        var width_px = $this_obj.width();
        switch (w) {
            case 4:
                width_px = width_px * 0.97;
                break;
            case 3:
                width_px = width_px * 0.98;
                break;
            case 2:
                width_px = width_px * 0.99;
                break;
            default:
                break;
        }
        var height_px = width_px * w_h + 'px';
        $this_obj.find('img').css('height', height_px);
    });
}
set_imgsize();





$(function () {
    // banner 初始化
    var img_dir = "http://s1.jmstatic.com/templates/touch/css";
    // $("img.lazy").lazyload({
    //     threshold : 10,
    //     effect : "fadeIn"  });

    var supportsOrientationChange = "onorientationchange" in window,
        orientationEvent = supportsOrientationChange ? "orientationchange" : "resize";

    window.addEventListener(orientationEvent, function () {
        set_imgsize();
        // $('#banners').find('img').eq(0).load(function(){
        //     $('#banners').height($('#banners').find('img').eq(0).height())
        // })
        $('#banners').height($('.container').width() * 0.41);
        // $('#banners').height($('#slider').width()*0.97*0.5);
        var box = $(".sell_state");
        box.css('z-index', 1);
    }, false);

    $('.group_more').css('line-height', $('.metro_group_head').eq(0).height() + 'px');
});