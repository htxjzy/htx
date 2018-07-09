<?php get_header(); ?>
  <div class="abanner">
  	<img class="img-responsive" src="/m/images/banner-4.jpg" alt="宝盛微交易" />
  </div>
  <div class="row parow">
  <div class="col-md-12">
    	<div class="daohang"><span>当前位置：</span><a href="/">首页</a><span>&gt;</span><a href="/information">资讯中心</a></div>
        
       	<div class="s_bl_ul">
			<div class="sn_title">
            <h1><?php the_title(); ?></h1>
<?php 
if( get_post_meta(get_the_ID(),'mspc_subtitle',true)!='' ){         
	echo "<h2>".esc_html( get_post_meta(get_the_ID(),'mspc_subtitle',true))."</h2>";
}else{
	echo "";
} 
?>     
            </div>
			<table><tr><td>作者：宝盛微交易</td><td>时间：<?php the_time("Y-m-d"); ?></td></tr></table>  
            <div class="dixian"></div>          
<?php if(have_posts()): while(have_posts()): the_post(); ?>                      
         	<div id="post-<?php the_ID(); ?>" class="sn_content">
<?php the_content(); ?> 
<?php endwhile; endif; ?>
        	</div><!--.sn_content END-->                           
            </div><!--.s_bl_ul end-->
        
    </div>  
  </div>
<?php get_footer(); ?>