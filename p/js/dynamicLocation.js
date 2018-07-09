$(document).ready(function(){
				
	$(window).scroll(function(){
		
		if(!((jQuery(window).scrollTop()>(jQuery('.assignments').offset().top+jQuery('.assignments').outerHeight())) || (jQuery(window).scrollTop()<(jQuery('.assignments').offset().top-jQuery(window).height())))){
			$(".positionDot a").removeClass("dynamicBg");			
			$(".positionDot a:nth-child(1)").addClass("dynamicBg");					
		}else{
			$(".positionDot a:nth-child(1)").removeClass("dynamicBg");		
		}
		
		if(!((jQuery(window).scrollTop()>(jQuery('.providers').offset().top+jQuery('.providers').outerHeight())) || (jQuery(window).scrollTop()<(jQuery('.providers').offset().top-jQuery(window).height())))){
			$(".positionDot a").removeClass("dynamicBg");			
			$(".positionDot a:nth-child(2)").addClass("dynamicBg");					
		}else{
			$(".positionDot a:nth-child(2)").removeClass("dynamicBg");		
		}
		
		if(!((jQuery(window).scrollTop()>(jQuery('.experts').offset().top+jQuery('.experts').outerHeight())) || (jQuery(window).scrollTop()<(jQuery('.experts').offset().top-jQuery(window).height())))){			
			$(".positionDot a").removeClass("dynamicBg");			
			$(".positionDot a:nth-child(3)").addClass("dynamicBg");					
		}else{
			$(".positionDot a:nth-child(3)").removeClass("dynamicBg");		
		}
		
		if(!((jQuery(window).scrollTop()>(jQuery('.cases').offset().top+jQuery('.cases').outerHeight())) || (jQuery(window).scrollTop()<(jQuery('.cases').offset().top-jQuery(window).height())))){
			$(".positionDot a").removeClass("dynamicBg");			
			$(".positionDot a:nth-child(4)").addClass("dynamicBg");					
		}else{
			$(".positionDot a:nth-child(4)").removeClass("dynamicBg");		
		}
		  
		if(!((jQuery(window).scrollTop()>(jQuery('.information').offset().top+jQuery('.information').outerHeight())) || (jQuery(window).scrollTop()<(jQuery('.information').offset().top-jQuery(window).height())))){
			
			$(".positionDot a").removeClass("dynamicBg");			
			$(".positionDot a:nth-child(5)").addClass("dynamicBg");					
		}else{
			$(".positionDot a:nth-child(5)").removeClass("dynamicBg");		
		}
		
		if(!((jQuery(window).scrollTop()>(jQuery('.links').offset().top+jQuery('.links').outerHeight())) || (jQuery(window).scrollTop()<(jQuery('.links').offset().top-jQuery(window).height())))){			
			$(".positionDot a").removeClass("dynamicBg");			
			$(".positionDot a:nth-child(6)").addClass("dynamicBg");					
		}else{
			$(".positionDot a:nth-child(6)").removeClass("dynamicBg");		
		}
		
	});	

/*	$(document).on('click', '.positionDot a', function () {		
   		$(this).siblings().removeClass("dynamicBg");
		$(this).addClass("dynamicBg");			
	});*/
	
	/*$(".positionDot a").click(function(){
   		$(this).siblings().css({"background":"#fff","color":"#393D49"});
		$(this).css({"background":"#dd0b19"});		
	});*/
	
	/*$(document).on("scroll", function(){
		
		var theObjValue = $(this).attr("href");
				   				
	});*/	
	
	
});  
  
