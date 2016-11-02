// nav slide
var nav_scroll ={
    outer:null,
    $inner:null,
    hidden_width:0,
    current_x:0,
    start_x:0,
    scale:1,
    distance:0,
    init:function(outer,inner){
        var self =this;
        self.outer = $(outer)[0];
        self.$inner = $(inner);
        var inner_width = 0;
        self.$inner.children().each(function(){
            inner_width += $(this).width();
        });
        self.hidden_width = inner_width-$(self.outer).width();
        self.$inner.width(inner_width);
        self.outer.addEventListener('touchstart', self.eventlistener, false);
    },
    eventlistener:{
        handleEvent: function(event) {
            switch (event.type) {
                case 'touchstart': this.start(event); break;
                case 'touchmove': this.move(event); break;
                case 'touchend': this.end(event); break;
            }
        },
        start:function(){
            nav_scroll.start_x = event.touches[0].pageX;
            nav_scroll.outer.addEventListener('touchmove', this, false);
        },
        move:function(){
            var this_e = event || window.event;
            this_e.preventDefault();
            this_e.stopPropagation()
            nav_scroll.move_x = event.touches[0].pageX;
            nav_scroll.current_x = nav_scroll.current_x+nav_scroll.move_x-nav_scroll.start_x;
            nav_scroll.start_x = nav_scroll.move_x;
            nav_scroll.transform();
        },
        end:function(){
            nav_scroll.outer.removeEventListener('touchmove', this, false)
            nav_scroll.outer.removeEventListener('touchend', this, false)
        }
    },
    transform:function(x){
        var self =this;
        if(-nav_scroll.current_x>=self.hidden_width){
            if(-nav_scroll.current_x===self.hidden_width){
                return null;
            }
            nav_scroll.current_x = -self.hidden_width;
        }
        else if(nav_scroll.current_x>=0){
            if(nav_scroll.current_x===0){
                return null;
            }
            nav_scroll.current_x =0;
        }
        $(self.outer).css('-webkit-transform','translateX('+nav_scroll.current_x+'px)');
    }
}
nav_scroll.init('#nav-outer','#nav-inner');/**
 * Created by GE62 on 2016/10/11.
 */


shoping_car.init('float_car', 'shoping_car_num');
$(".float_car").show();
