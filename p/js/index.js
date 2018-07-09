/**
  项目首页JS主入口
**/    
layui.define(['jquery', 'element', 'form', 'carousel'], function(exports){
	var $ = layui.$; //引用jquery重点处
  	var elementi = layui.element	//导航菜单加载
  ,formi = layui.form	//搜索需要加载
  ,carousel = layui.carousel;	//幻灯片轮播需要加载
  
	$(document).ready(function(){	//滚动导航
				
		$(document).on("scroll",function(){			
			if($(window).scrollTop()>120){ 
			
			//alert(jQuery('.headermid').offset().top);				
				$(".sform").css({"top":"39px"});
				$(".headerscroll").fadeIn(300);
				$(".positionDot").fadeIn(300);
				
			}else{
				$(".sform").css({"top":"143px"});
				$(".headerscroll").fadeOut(300);
				$(".positionDot").fadeOut(300);
			}			
					
		});

		if(!$("#test").is(":hidden")){	//When the page is refreshed
			if($(window).scrollTop()>0){ 
				$(".sform").css({"top":"39px"});
				$(".headerscroll").fadeIn(300);
				$(".positionDot").fadeIn(300);
			}
		}
						
	});  
  
  //建首页幻灯片实例
  carousel.render({
    elem: '#htx_banners'
    ,width: '100%' //设置容器宽度
	,height:'450px' //设置容器高度
    ,arrow: 'always' //始终显示箭头
  });

  //建首页幻灯片实例
  carousel.render({
    elem: '#htx_banners2'
    ,width: '100%' //设置容器宽度
	,height:'300px' //设置容器高度
    ,arrow: 'always' //始终显示箭头
  });

  //服务商列表页slides
  carousel.render({
    elem: '#htx_shop_slides'
    ,width: '100%' //设置容器宽度
	,height:'260px' //设置容器高度
    ,arrow: 'always' //始终显示箭头
  });
    
   
   //alert("我要弹出");
  //layer.msg('Hello World');
  //监听提交
  /*form.on('submit(formDemo)', function(data){
    layer.msg(JSON.stringify(data.field));
    return false;
  });*/  
   
  exports('index', {}); //注意，这里是模块输出的核心，模块名必须和use时的模块名一致
});    