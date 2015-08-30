 $(function(){ 
		//Фиксированное меню
	   function checkScrolledMenu() {
		   var top_menu_height = $('.header-menu').outerHeight() + 60;
		   var scroll_top;
		   scroll_top = $(this).scrollTop();
			   if (scroll_top > top_menu_height) {
			   $('.scrolled-menu').slideDown(300);
		   } else {
			  $('.scrolled-menu').slideUp(300);
		   }
	   }
	   
	   //Индикация активного пункта меню
	   function initActiveMenu() {
			var positions = {};
			$('section').each(function() {
				if ($(this).attr('id')) {
					positions[$(this).offset().top] = $(this).attr('id');
				}
			})
			
			
			
			function getIdByPosition() {
				var scroll_top = $(this).scrollTop(),
				current_id;
				for (var position in positions) {
					if (scroll_top >= position) {
						current_id = positions[position];
					}
				}
				return current_id;
			}
			
			var current_id = getIdByPosition();
			$('menu li').removeClass('active');
			$('menu li a[href="#' + current_id + '"]').parent().addClass('active');
	   }
	   
	   var scills_init = false;
	   
	   function scillsInit() {
		   if (!scills_init) {
			   
			   var scroll_top = $(this).scrollTop() + $(window).height(),
				scills_position = $('.scills-list').offset().top + 160;
				if (scroll_top >= scills_position) {
					
					scills_init = true;
					$('.circle-diagramm').circliful();
				}
		   }
	   }
	   
       $(window).scroll(function(){
           checkScrolledMenu();
		   initActiveMenu();
		   scillsInit();
       });
	   
	   checkScrolledMenu();
	   initActiveMenu();
	   scillsInit();
	  
		$('menu a').click(function (event) {
			event.preventDefault();
			var id  = $(this).attr('href'),
			top = $(id).offset().top;
			$('body,html').animate({scrollTop: top}, 1000);
		});

});     
