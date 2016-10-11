
;(function($)
{
    var h5_host_url = $('#h5_host_url').val();
    var search_page={
        history:[],
        change_history:false,
        on_slide:false
    }
    search_page.hide_page = function(){
        $('#search_defer').removeClass('hide');
        $('#page_outer').removeClass('show');
        $('#search_page').removeClass('show').addClass('hide');
        $('#search_back').show();
        $('#search_cancel').hide();
        $('.search_input').val('');
        $('.search_links').show();
        $('.recommend_lists').hide();
        $('.history_lists').hide();
    }
    search_page.init = function(){
        var self = this;
        $('#search_defer').click(function(){
            if(this.offsetLeft!=0){
                search_page.hide_page();
                return false;
            }
        });
        $('.search_links').height($('#search_page').height()-46);
        $('#search_action,#page_top').click(function(){
            if($('#search_defer')[0].offsetLeft!=0){
                search_page.hide_page();
                return;
            }
            if(search_page.change_history == true){
                search_list.get_history({'key':'history_words',callback:search_page.set_history});
            }
            $('#search_defer').show().removeClass('hide').addClass('hide');
            $('#page_outer').removeClass('hide').addClass('show');
            $('#search_page').show().removeClass('hide').addClass('show');
            if($(this)[0] === $("#page_top")[0]){
                $('.search_input').trigger("focus");
            }
            return false;
        });
        $('#search_back').click(function(){
            search_page.hide_page();
            return false;
        });
        $('#page_outer').click(function(){
            search_page.hide_page();
        });
        $('.search_input').focus(function(){
            if($(this).val().length==0){
                $('.search_links').hide();
                $('.recommend_lists').hide();
                $('.history_lists').show();
            }
            $('#search_page').addClass('mach-width');
            $('#history_back').show();
            $('#search_cancel').show();
            $('#search_back').hide();
        });
        $('#clear_history').click(function(){
            $('.history_lists li').remove();
            $(this).hide();
            search_page.history = [];
            localStorage.removeItem('history_words');
        })
        $('#history_back').click(function(){
            $('#search_back').show();
            $('#search_cancel').hide();
            $('.search_input').val('');
            $('.search_links').show();
            $('.recommend_lists').hide();
            $('.history_lists').hide();
            $('#search_page').removeClass('mach-width');
            $(this).hide();
        })
        $('#search_cancel').click(function(){
            var val =$('.search_input').val().replace(/(^\s+)|(\s+$)/g, "");
            if(val == ""){
                return null;
            }
            search_page.localStorage();
            window.location.href= h5_host_url +'/search/index?search='+val;
        });
        document.onkeydown = function()
        {
            if(event.keyCode==13)
            {
                $('#search_cancel').trigger('click');
            }
        }
        float_layer.init({'layer_name':'page_outer','scroll_height':$('.search_links').height(),'scroll_dom_name':'search_links'});
    }
    search_page.data_init = function(data){
        var search_list_str='';
        if(!data){
            return null;
        }
        for(var i=0;i<data.length;i++){
            search_list_str+=search_page.data_single(data[i]);
        }
        $('.search_links').append(search_list_str);
        search_page.de_event();
    }
    search_page.data_single = function(item){
        var html='';
        if(!item.sub_categories||item.sub_categories.length==0){
            html+='<li class="search_link"><a href="'+h5_host_url+'/search/index?category_id='+item.category_id+'">'+item.name+'</a><span class="arrow"></span></li>';
        }
        else{
            html+='<li class="search_link">'+item.name+'<span class="arrow"></span><ul class="search_subs">';
            var sub_categories=item.sub_categories;
            for(var j=0;j<sub_categories.length;j++){
                html+='<li class="search_sub"><a href="'+h5_host_url+'/search/index?category_id='+sub_categories[j].category_id+'">'+sub_categories[j].name+'</a></li>';
            }
            html+='</ul></li>'
        }
        return html;
    }
    search_page.de_event = function(){
        var self = this;
        $('.search_link').click(function(e){
            $('.search_link').not($(this)).removeClass('select');
            if($(this).hasClass('select')){
                $(this).removeClass('select');
            }
            else{
                $(this).addClass('select');
            }
            return false;
        });
        $('.search_sub').click(function(e){
            var evt = e || window.event;
            //IE用cancelBubble=true来阻止而FF下需要用stopPropagation方法
            evt.stopPropagation ? evt.stopPropagation() : (evt.cancelBubble=true);
        })
        document.getElementById('search_input').onpropertychange = search_page.search_input_change;
        document.getElementById('search_input').oninput = search_page.search_input_change;
    }
    search_page.search_input_change = function(){
        if($(this).val().length==0){
            $('.search_links').hide();
            $('.recommend_lists').hide();
            $('.history_lists').show();
        }
        else{
            $('.history_lists').hide();
            $('.search_links').hide();
            $('.recommend_lists').show();
            search_list.get_recommend({'callback':search_page.set_recommend,'param':{'keyword':$('.search_input').val(),'url':'http://mobile.jumei.com/msapi/search/suggestion.json'}});
        }
    }
    search_page.set_recommend = function(data){
        var html='';
        if(data){
            for(var i=0;i<data.length;i++){
                html+='<li class="recommend_list"><img src="http://s1.jmstatic.com/templates/touch/css/v3/image/search_btn.png" alt="" class="icon"><a href="'+h5_host_url+'/search/index?search='+data[i]+'">'+data[i]+'</a><span class="arrow"></span></li>';
            }
        }
        $('.recommend_lists').html(html);
        $('.recommend_list').click(function(){
            search_page.localStorage(this);
        })
    }
    search_page.localStorage = function(obj){
        var val ='';
        var has_history = false;
        if(!obj){
            val =$('.search_input').val().replace(/(^\s+)|(\s+$)/g, "");
            if (val == ''){
                return true;
            }
        }
        else{
            val =$(obj).find('a').text().replace(/(^\s+)|(\s+$)/g, "");
        }
        for(var i=0;i<search_page.history.length;i++){
            if(val == search_page.history[i]){
                has_history = true;
                break;
            }
        }
        if(!has_history){
            search_page.change_history = true;
            search_page.history.push(val);
            if(search_page.history.length>7){
                search_page.history.shift();
            }
            history_str=search_page.history.join(',');
            localStorage.setItem('history_words',history_str);
        }
    }
    search_page.set_history = function(data){
        $('#clear_history').siblings().remove();
        // $('.history_lists').html('');
        var self = search_page;
        self.history=data.split(',');
        var html='';
        for(var i=0;i<self.history.length;i++){
            html+='<li class="history_list"><img src="http://s1.jmstatic.com/templates/touch/css/v3/image/history_icon.png" alt="" class="icon"><a href="'+h5_host_url+'/search/index?search='+self.history[i]+'">'+self.history[i]+'</a><span class="arrow"></span></li>';
        }
        $('.history_lists').prepend(html);
        if(self.history.length!=0){
            $('#clear_history').show();
        }
        else{
            $('#clear_history').hide();
        }
    }
    window.search_page=search_page;
    search_page.init();
})(window.jQuery || window.Zepto)
search_list.init(search_page.data_init);
search_list.get_history({'key':'history_words',callback:search_page.set_history});