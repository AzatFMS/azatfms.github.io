 $(function(){ 
 
	function ScrollManager(params) {
		
		this.defaults = {
			menu: $('menu'),
			main_menu: $('.main-menu'),
			scrolled_menu: $('.scrolled-menu'),
			section: $('section'),
			scrolled_menu_speed: 300,
			navigate_speed: 1000,
			position_actions: []
		};
		
		this.params = $.extend(this.params, this.defaults, params);
		
		for (var param_name in this.params) {
			this[param_name] = this.params[param_name];
		}
		
		this.current_id = null;
	}
	
	ScrollManager.prototype.checkScrolledMenu = function() {
	   if (this.scroll_top > this.menu_height) {
		   this.scrolled_menu.slideDown(this.scrolled_menu_speed);
	   } else {
		  this.scrolled_menu.slideUp(this.scrolled_menu_speed);
	   }
   }
   
   ScrollManager.prototype.initCurrentId = function() {
	   for (var position in this.positions) {
			if (this.scroll_top >= position) {
				this.current_id = this.positions[position];
			}
		}
   }
   
   ScrollManager.prototype.runPositionActions = function() {
	   var SM = this;
	   $.each(this.position_actions, function(i, item) {
			if (SM.scroll_top >= item.position) {
				SM.position_actions.splice (i,1);
				item.action();
			}
	   })
   }
   
	ScrollManager.prototype.initActiveMenuItem = function() {
		this.initCurrentId();
		this.menu.find('li').removeClass('active');
		this.menu.find('li a[href="#' + this.current_id + '"]').parent().addClass('active');
	}
	
	ScrollManager.prototype.initNavigateByClick = function() {
		var SM = this;
		this.menu.find('a').click(function (event) {
			event.preventDefault();
			SM.current_id  = $(this).attr('href');
			$('body,html').animate({scrollTop: $(SM.current_id).offset().top}, SM.navigate_speed);
		});
	}
	
	ScrollManager.prototype.run = function() {
		
		var SM = this;
		
		this.scroll_top = $(window).scrollTop();
		
		this.menu_height = this.main_menu.outerHeight() + this.main_menu.offset().top;
		
		this.positions = {};
		
		this.section.each(function() {
			if ($(this).attr('id')) {
				SM.positions[$(this).offset().top] = $(this).attr('id');
			}
		})
		
		SM.initNavigateByClick();
		SM.checkScrolledMenu();
		SM.initActiveMenuItem();
		SM.runPositionActions();
		
		$(window).scroll(function(){
			SM.scroll_top = $(window).scrollTop();
			SM.checkScrolledMenu();
			SM.initActiveMenuItem();
		   SM.runPositionActions();
       });
	}
	
	var scroll_manager = new ScrollManager({
		position_actions: [
			{
				position: $('.scills-list').offset().top + 160,
				action: function() {
					$('.circle-diagramm').circliful();
				}
			}
		]
	});
	
	scroll_manager.run();
	

});     
