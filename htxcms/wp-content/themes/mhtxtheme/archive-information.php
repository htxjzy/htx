<?php get_header(); ?> 
 <div class="abanner">
  	<img class="img-responsive" src="/m/images/banner-4.jpg" alt="宝盛微交易" />
  </div>
  <div class="row parow">
	<div class="col-md-12">
    	<div class="daohang"><span>当前位置：</span><a href="/">首页</a><span>&gt;</span><span>资讯中心</span></div>

<div class="ms_3">
 <?php
$paged=get_query_var('paged')?get_query_var('paged'):1;	
$args=array('post_type' => array('information'), 'paged' => $paged);
$recentPosts=new WP_Query($args);
while ($recentPosts->have_posts()) : $recentPosts->the_post();	//loop2 start
?>
<div id="post-<?php the_ID(); ?>" class="media">
    <a href="<?php the_permalink(); ?>">
      <div class="media-body">
        <h4 class="media-heading"><span class="glyphicon glyphicon-th-large"></span><?php the_title(); ?></h4>
        <p><?php echo excerptexcerpt(36); ?>...</p>
        <p class="ptime">发文时间：<span><?php the_time("Y-m-d"); ?></span></p>
      </div>
      <div class="media-right">    
          <img class="media-object" src="<?php echo trim(catch_that_image()); ?>" alt="宝盛缩略图">    
      </div>
    </a>
</div>    
<?php endwhile;	//loop2 end  ?>  
<div id="pagenavi"><?php par_pagenavi(9); ?></div><!--end #pagenavi-->   


 
</div>        
        
        
    </div><!--.col-md-12-->  
  </div>
<?php get_footer(); ?>