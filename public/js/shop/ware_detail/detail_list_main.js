/* Date: 2016-06-30T14:29:15Z Path: js/touch/product/detail_list_main.js */
define("detail_list",function(t){var a={init:function(){this.user_evaluation()},user_evaluation:function(){var t=$("#detail_groupcon"),a=($("#comm_detail"),t.data("token")),e=t.data("verify"),i=$("#product_id").val();void 0!==e&&this.ajaxRequest(i,2,a,e);$("#comment").click(function(){window.location.href="/product/comment?product_id="+i});$(".jdetail").click(function(){var t=$(this).attr("data-type");"allComment"==t&&(window.location.href="/product/comment?product_id="+i),"goodComment"==t&&(window.location.href="/product/comment?product_id="+i+"&average_score=4"),"middleComment"==t&&(window.location.href="/product/comment?product_id="+i+"&average_score=3"),"badComment"==t&&(window.location.href="/product/comment?product_id="+i+"&average_score=2")})},ajaxRequest:function(t,a,e,i){var o=this;$.ajax({url:"http://koubei.jumei.com/api/v1/getProductScoreList.html",dataType:"jsonp",type:"get",data:{product_id:t,page_size:a,token:e,verify_code:i,type:"all"},success:function(t){o.ajaxcomment(t)},error:function(){alert("网络连接错误")}})},ajaxcomment:function(t){var a=$("#comment"),e="",i=t.data.filterList,o=$("#num_bt0"),n=$("#num_bt1"),d=$("#num_bt2"),c=$("#num_bt3"),r=parseInt(t.data.high_number)+parseInt(t.data.middle_number)+parseInt(t.data.low_number);if(o.text(r),n.text(t.data.high_number),d.text(t.data.middle_number),c.text(t.data.low_number),5>=r)return!1;for(var s=0;s<i.length;s++){var m=i[s];e+='<div class="comm_list"><div class="list_top clear"><div class="top_nickname">'+m.uname+"</div>",""!==m.group_url&&(e+='<div class="user_level"><img src=" '+m.group_url+'"/></div>'),e+='</div><div class="list_text">'+m.comments+'</div><div class="list_model clear">',void 0!==m.size&&(e+='<div class="tab"><span class="tab_content">'+m.size+"</span></div>"),void 0!==m.attribute&&(e+=' <div class="tab"><span class="tab_content">'+m.attribute+"</span></div>"),e+='<div class="tab tab_right"><span class="tab_name"></span><span class="tab_content">'+m.paytime+"</span></div></div></div>"}return e+='<div class="btn-wrap"><a href="/product/comment?product_id='+i[0].product_id+'" class="common-btn" id="commonBtn">查看'+r+"条评论</a></div>",a.append(e),void $("#detail_groupcon").show()}};a.init()}),seajs.use(["detail_list"]);