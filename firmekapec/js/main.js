$(function () {

    //slider
    var Slider = {
        container: $('.small-slider'),
        next_btn: $('.small-slider__next'),
        prev_btn: $('.small-slider__prev'),
        width_block: 0,
        item: 0,
        setWidthBlocks: function () {
            this.width_block = this.container.outerWidth();
            this.container.find('li').width(this.width_block);
            this.container.find('ul').show();
        },
        setPos: function() {
            this.container.find('ul').animate({marginLeft: -this.item*this.width_block}, 1000);
        },
        run: function () {
            var _self = this;
            this.setWidthBlocks();

            this.next_btn.click(function () {
                if (_self.container.find('li').length - 1 > _self.item) {
                    _self.item++;
                    _self.setPos();
                }

            });
            this.prev_btn.click(function () {
                if (_self.item > 0) {
                    _self.item--;
                    _self.setPos();
                }
            });
            $(window).resize(function () {
                _self.setWidthBlocks();
                _self.setPos();
            });
        }
    };

    Slider.run();
});     
