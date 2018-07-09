/**

**/    
layui.define(['jquery', 'element', 'form', 'carousel','laydate'], function(exports){

	carousel = layui.carousel;	//幻灯片轮播需要加载
    var laydate = layui.laydate;

    //开始时间
    laydate.render({
        elem: '#start_time'
    });
    //结束时间
    laydate.render({
        elem: '#end_time'
    });
  
  //任务列表幻灯片实例
  carousel.render({
        elem: '#htx_taskbanners'
        ,width: '100%' //设置容器宽度
        ,height:'300px' //设置容器高度
        ,arrow: 'always' //始终显示箭头
    });
  exports('jQuery.task', {}); //注意，这里是模块输出的核心，模块名必须和use时的模块名一致
});    