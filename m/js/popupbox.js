<!--
//设置注册弹出框脚本，配合上面的jquery使用 
$(document).ready(function(){
	 $(".tkyy").click(function(event){
		event.stopPropagation(); //停止事件冒泡
	   $(".marsk-container").fadeIn(500);
	 });
   //点击空白处隐藏弹出层
   $(".marsk-container").click(function(event){
     var bscon = $('.tkyybscon');  // 设置目标区	
     if(!bscon.is(event.target) && bscon.has(event.target).length ==0){ 
      $('.marsk-container').fadeOut(500);     //淡出消失
     }	 
   });   
});

//设置下载弹出框脚本，配合上面的jquery使用 
$(document).ready(function(){
	 $(".downloadtkyy").click(function(event){
		event.stopPropagation(); //停止事件冒泡
	   $(".marsk2-container").fadeIn(500);
	 });
   //点击空白处隐藏弹出层
   $(".marsk2-container").click(function(event){
     var bscon2 = $('.tkyy2bscon');  // 设置目标区	
     if(!bscon2.is(event.target) && bscon2.has(event.target).length ==0){ 
      $('.marsk2-container').fadeOut(500);     //淡出消失
     }	 
   });   
});


//设置客服弹出框脚本，配合上面的jquery使用 
$(document).ready(function(){
	 $(".kftkyy").click(function(event){
		event.stopPropagation(); //停止事件冒泡
	   $(".marsk3-container").fadeIn(500);
	 });
   //点击空白处隐藏弹出层
   $(".marsk3-container").click(function(event){
     var bscon3 = $('.tkyy3bscon');  // 设置目标区	
     if(!bscon3.is(event.target) && bscon3.has(event.target).length ==0){ 
      $('.marsk3-container').fadeOut(500);     //淡出消失
     }	 
   });   
});


//设置如果是微信浏览器弹出框脚本，配合上面的jquery使用

	$(document).ready(function(){
/*var ua = navigator.userAgent.toLowerCase();//获取判断用的对象
if (ua.match(/MicroMessenger/i) == "micromessenger") { */
		 $(".wxtkyy").click(function(event){
			event.stopPropagation(); //停止事件冒泡
		   $(".marsk4-container").fadeIn(500);
		 });
	   //点击空白处隐藏弹出层
	   $(".marsk4-container").click(function(event){
		 var bscon4 = $('.tkyy4bscon');  // 设置目标区	
		 if(!bscon4.is(event.target) && bscon4.has(event.target).length ==0){ 
		  $('.marsk4-container').fadeOut(500);     //淡出消失
		  window.open('https://itunes.apple.com/cn/app/bsbinary/id1154867970?mt=8');
		 }	 
	   }); 
/*} */ 
	});


//设置安卓弹出框脚本，配合上面的jquery使用

	$(document).ready(function(){

		 $(".aztkyy").click(function(event){
			event.stopPropagation(); //停止事件冒泡
		   $(".marsk5-container").fadeIn(500);
		 });
	   //点击空白处隐藏弹出层
	   $(".marsk5-container").click(function(event){
		 var bscon5 = $('.tkyy4bscon');  // 设置目标区	
		 if(!bscon5.is(event.target) && bscon5.has(event.target).length ==0){ 
		  $('.marsk5-container').fadeOut(500);     //淡出消失
		  window.open('http://www.i-daohang.com/toolsoft/bsbinary.apk');
		 }	 
	   }); 

	});


-->