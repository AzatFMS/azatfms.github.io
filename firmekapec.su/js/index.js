$(function () {
    var slider = {
        slide_length: null,
        slide_position: 1,
        set_slide_length: function() {
            var self = this;
            $('.hcr-slider > img').each(function() {
               self.slide_length++;
            })
        },
        slide_show: function(numb) {
            $('.hcr-slider-'+numb).fadeIn(1200);
            $('.hcl-slidetext_'+numb).fadeIn(1000);
        },
        slide_hide: function(numb) {
            $('.hcr-slider-'+numb).fadeOut(1200);
            $('.hcl-slidetext_'+numb).fadeOut(1200);
        },
        slide_next: function() {
            this.slide_hide(this.slide_position);
            if(this.slide_position == this.slide_length) {
               this.slide_position = 1;
            }
            else {
                this.slide_position++;
            }
            this.slide_show(this.slide_position);
        },
        init: function() {
            $('.hcr-slider-'+this.slide_position).fadeIn(100);
            $('.hcl-slidetext_'+this.slide_position).fadeIn(100);
            this.set_slide_length();
            setInterval(function() {
                slider.slide_next()
            }, 5000);
        }
    };
    slider.init();
    $(".hcr-menu > div").hover(
        function () {
            $(this).children('.hcr-menu-submenu').stop().fadeIn();
        },
        function () {
            $(this).children('.hcr-menu-submenu').stop().fadeOut();
        }
    );
});
