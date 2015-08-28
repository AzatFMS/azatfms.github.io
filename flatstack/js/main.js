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
	   
       $(window).scroll(function(){
           checkScrolledMenu();
       });
	   
	   checkScrolledMenu();
	  
   });     
