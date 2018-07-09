<?php get_header(); ?>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    </ol>
       
<!-- Wrapper for slides -->
<div class="carousel-inner" role="listbox">
            <div class="item active">
              <a href="/baosheng/register" target="_blank"><img src="/m/images/banner1.jpg" alt="01"></a>
              <div class="carousel-caption">
              </div>
            </div>
            <div class="item">
              <a href="http://www.bsbinary.com/hotact/1060.html" target="_blank"><img src="/m/images/banner2.jpg" alt="02"></a>
              <div class="carousel-caption">
              </div>
            </div>
</div><!--.carousel-inner END-->
       
<!-- Controls -->
<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true" style="display:none;"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="display:none;"></span>
    <span class="sr-only">Next</span>
</a>
<script>
          $(function(){
            var myElement= document.getElementById('carousel-example-generic')
            var hm=new Hammer(myElement);
            hm.on("swipeleft",function(){
                $('#carousel-example-generic').carousel('next')
            })
            hm.on("swiperight",function(){
                $('#carousel-example-generic').carousel('prev')
            })
        })
</script>
</div>
  <div class="section-wrapper" id="section-2">
  	<div class="div2bg">
    <div class="section">
    	<h2 class="sectiontit">行情建议</h2>        
        <div class="draw_tabcon">
            <div class="tab">
                <a href="javascript:;" class="on">看涨看跌</a>
                <a href="javascript:;">一触式</a>
                <a href="javascript:;">范围</a>
                <a href="javascript:;">短期</a>
            </div>
            <div class="content">          
                <ul>
                    <li style="display:block;">
                    <!--<img class="img-responsive" src="/m/images/hangqingkuaizhao.png" />-->
                    	<div class="row">
                        	<div class="col-md-3">
                            	<h3>资产</h3>
                                <p><?php echo get_option('atd00'); ?></p>
                                <p><?php echo get_option('atd10'); ?></p>
                                <p><?php echo get_option('atd20'); ?></p>
                            </div>
                            <div class="col-md-3">
                            	<h3>目标价格</h3>
                                <p><?php echo get_option('atd01'); ?></p>
                                <p><?php echo get_option('atd11'); ?></p>
                                <p><?php echo get_option('atd21'); ?></p>                            
                            </div>
                            <div class="col-md-3">
                            	<h3>到期时间</h3>
                                <p><span class="spanbox"><span class="spantxt"><?php echo substr(get_option('atd02'),10,6); ?></span><span class="glyphicon glyphicon-triangle-bottom"></span></span></p>
                                <p><span class="spanbox"><span class="spantxt"><?php echo substr(get_option('atd12'),10,6); ?></span><span class="glyphicon glyphicon-triangle-bottom"></span></span></p>
                                <p><span class="spanbox"><span class="spantxt"><?php echo substr(get_option('atd22'),10,6); ?></span><span class="glyphicon glyphicon-triangle-bottom"></span></span></p>                                  	                            
                            </div>
                            <div class="col-md-3">
                            	<h3>剩余时间</h3>
                                <p><?php echo secToTime(strtotime(get_option('atd02'))-time()); ?></p>
                                <p><?php echo secToTime(strtotime(get_option('atd12'))-time()); ?></p>
                                <p><?php echo secToTime(strtotime(get_option('atd22'))-time()); ?></p>                            
                            </div>
                        </div>                                       
                    </li>
                    <li>
                    	<div class="row">
                        	<div class="col-md-3">
                            	<h3>资产</h3>
                                <p><?php echo get_option('btd00'); ?></p>
                                <p><?php echo get_option('btd10'); ?></p>
                                <p><?php echo get_option('btd20'); ?></p>
                            </div>
                            <div class="col-md-3">
                            	<h3>目标价格</h3>
                                <p><?php echo get_option('btd01'); ?></p>
                                <p><?php echo get_option('btd11'); ?></p>
                                <p><?php echo get_option('btd21'); ?></p>                            
                            </div>
                            <div class="col-md-3">
                            	<h3>到期时间</h3>
                                <p><span class="spanbox"><span class="spantxt"><?php echo substr(get_option('btd02'),10,6); ?></span><span class="glyphicon glyphicon-triangle-bottom"></span></span></p>
                                <p><span class="spanbox"><span class="spantxt"><?php echo substr(get_option('btd12'),10,6); ?></span><span class="glyphicon glyphicon-triangle-bottom"></span></span></p>
                                <p><span class="spanbox"><span class="spantxt"><?php echo substr(get_option('btd22'),10,6); ?></span><span class="glyphicon glyphicon-triangle-bottom"></span></span></p>                                  	                            
                            </div>
                            <div class="col-md-3">
                            	<h3>剩余时间</h3>
                                <p><?php echo secToTime(strtotime(get_option('btd02'))-time()); ?></p>
                                <p><?php echo secToTime(strtotime(get_option('btd12'))-time()); ?></p>
                                <p><?php echo secToTime(strtotime(get_option('btd22'))-time()); ?></p>                            
                            </div>
                        </div>                                      
                    </li>
                    <li> 
                        	<div class="col-md-3">
                            	<h3>资产</h3>
                                <p><?php echo get_option('ctd00'); ?></p>
                                <p><?php echo get_option('ctd10'); ?></p>
                                <p><?php echo get_option('ctd20'); ?></p>
                            </div>
                            <div class="col-md-3">
                            	<h3>目标价格</h3>
                                <p><?php echo get_option('ctd01'); ?></p>
                                <p><?php echo get_option('ctd11'); ?></p>
                                <p><?php echo get_option('ctd21'); ?></p>                            
                            </div>
                            <div class="col-md-3">
                            	<h3>到期时间</h3>
                                <p><span class="spanbox"><span class="spantxt"><?php echo substr(get_option('ctd02'),10,6); ?></span><span class="glyphicon glyphicon-triangle-bottom"></span></span></p>
                                <p><span class="spanbox"><span class="spantxt"><?php echo substr(get_option('ctd12'),10,6); ?></span><span class="glyphicon glyphicon-triangle-bottom"></span></span></p>
                                <p><span class="spanbox"><span class="spantxt"><?php echo substr(get_option('ctd22'),10,6); ?></span><span class="glyphicon glyphicon-triangle-bottom"></span></span></p>                                  	                            
                            </div>
                            <div class="col-md-3">
                            	<h3>剩余时间</h3>
                                <p><?php echo secToTime(strtotime(get_option('ctd02'))-time()); ?></p>
                                <p><?php echo secToTime(strtotime(get_option('ctd12'))-time()); ?></p>
                                <p><?php echo secToTime(strtotime(get_option('ctd22'))-time()); ?></p>                            
                            </div>
                        </div>   
                    </li>
                    <li> 
                    	<div class="row">
                        	<div class="col-md-3">
                            	<h3>资产</h3>
                                <p><?php echo get_option('dtd00'); ?></p>
                                <p><?php echo get_option('dtd10'); ?></p>
                                <p><?php echo get_option('dtd20'); ?></p>
                            </div>
                            <div class="col-md-3">
                            	<h3>目标价格</h3>
                                <p><?php echo get_option('dtd01'); ?></p>
                                <p><?php echo get_option('dtd11'); ?></p>
                                <p><?php echo get_option('dtd21'); ?></p>                            
                            </div>
                            <div class="col-md-3">
                            	<h3>到期时间</h3>
                                <p><span class="spanbox"><span class="spantxt"><?php echo substr(get_option('dtd02'),10,6); ?></span><span class="glyphicon glyphicon-triangle-bottom"></span></span></p>
                                <p><span class="spanbox"><span class="spantxt"><?php echo substr(get_option('dtd12'),10,6); ?></span><span class="glyphicon glyphicon-triangle-bottom"></span></span></p>
                                <p><span class="spanbox"><span class="spantxt"><?php echo substr(get_option('dtd22'),10,6); ?></span><span class="glyphicon glyphicon-triangle-bottom"></span></span></p>                                  	                            
                            </div>
                            <div class="col-md-3">
                            	<h3>剩余时间</h3>
                                <p><?php echo secToTime(strtotime(get_option('dtd02'))-time()); ?></p>
                                <p><?php echo secToTime(strtotime(get_option('dtd12'))-time()); ?></p>
                                <p><?php echo secToTime(strtotime(get_option('dtd22'))-time()); ?></p>                            
                            </div>
                        </div>        
                    </li>            
                </ul>        
            </div>   
        </div><!--.draw_tabcon END-->
<script>
<!--
$(function(){  
    $(".draw_tabcon .tab a").click(function(){
        $(this).addClass('on').siblings().removeClass('on');
        var index = $(this).index();
        number = index;
        $('.draw_tabcon .content li').hide();
        $('.draw_tabcon .content li:eq('+index+')').show();
    });
	$(".draw_tabcon .tab a:first").css({"margin":"0 1% 0 0", "width":"24%"});
	$(".draw_tabcon .tab a:last").css({"margin":"0 0 0 1%", "width":"24%"});
	
});
-->
</script>			               
    </div>
    </div>
  </div>
<div class="box">
<img class="img-responsive" src="/m/images/box01.jpg" /> 
<img class="img-responsive" src="/m/images/box02.jpg" />
</div>
<div class="section-wrapper" id="section-5">
    <div class="section"> 
        <h2>关于我们</h2> 
<img class="img-responsive"  src="/m/images/1.jpg"/>      
        <div class="sectiont row">
            <div class="col-xs-12">
            <p>宝盛涨跌期权（BSBINARY.HK）是宝盛国际控股集团有限公司（BS INTERNATIONAL HOLDINGS GROUP LIMITED）旗下拥有并独立运营的互联网金融投资品牌。宝盛国际控股集团有限公司是一家英国环球金融集团，旗下产业涉及私人银行、股票、证券、远期外汇合约等众多金融服务，宝盛的用户遍及全球100多个国家和地区，投资者人数在2015年已经突破了1亿之巨。</p>
            <div class="xiazai">APP下载</div>
            <a class="axiazai al" href="https://itunes.apple.com/cn/app/bsbinary/id1154867970?mt=8" target="_blank">Apple下载</a><a class="axiazai ar" href="http://www.bsbinary.com/toolsoft/app-BSBinary.apk">Android下载</a>
            </div>
        </div> 
    </div>

    <div class="section">
    <h2>公司新闻</h2>        
        <div class="sectiont row">
            <div class="col-xs-12">

<?php
$args = array('post_type'=>'information', 'showposts'=>3);
query_posts($args);
if( have_posts() ) : while( have_posts() ) : the_post();
?>
      	<a class="row" href="<?php the_permalink(); ?>" title="阅读全文">
             <div class="col-xs-2">
                <div class="nywrap">
                       <div class="nian"><?php the_time("Y"); ?></div>
                       <div class="yueri"><?php the_time("m/d"); ?></div>
                </div>
             </div>
             <div class="col-xs-10">
                <h3><?php the_title(); ?></h3>
                <p><?php echo excerptexcerpt(26); ?>...</p>
             </div>        
        </a><!--.row box-->
<?php
endwhile; endif; wp_reset_query();
?>            

                    
                <a class="more" href="/information">更多新闻+</a>                      
            
            </div>
        </div>  
    </div>
    
</div>
<div class="box">
<img class="img-responsive" src="/m/images/box04.jpg" />   
</div>
<?php get_footer(); ?>