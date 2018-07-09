$(document).ready(function(){			
	$(window).scroll(function(){  
		if(!((jQuery(window).scrollTop()>(jQuery('.experts').offset().top+jQuery('.experts').outerHeight())) || (jQuery(window).scrollTop()<(jQuery('.experts').offset().top-jQuery(window).height())))){			
			$(".experts .expertbox").addClass("animated");
			$(".experts .expertbox").addClass("bounceIn");
			
			$(".experts .expertincomebox").addClass("animated");
			$(".experts .expertincomebox").addClass("fadeIn");
					
		}else{
			$(".experts .expertbox").removeClass("animated");
			$(".experts .expertbox").removeClass("bounceIn");

			$(".experts .expertincomebox").removeClass("animated");
			$(".experts .expertincomebox").removeClass("fadeIn");		
		}
	});	
});  
  
