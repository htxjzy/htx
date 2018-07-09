<?php
$args=array(
	'post_type' => array('assignments'),
	'posts_per_page'=>1,
	'tax_query' => $tax_query   
);
$recentPosts=new WP_Query($args);
//while ($recentPosts->have_posts()) : $recentPosts->the_post();	//loop2 start
if($recentPosts->have_posts()){
	for($i=0; $i<1; $i++){
		$recentPosts->the_post();
		if(!empty(get_the_ID())){
?>                       
                            <div class="rem-box">
                                <a class="rem-img" title="查阅招标情况" href="<?php the_permalink(); ?>">
<?php 
$getThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()),full); 
if(!empty($getThumbnail[0])){
	echo '<img src="'.$getThumbnail[0].'" alt=""><span class="tj">荐</span>';
}else{
	echo '<img src="/p/images/ass-fanben.jpg" alt=""><span class="tj">荐</span>'; 
}								
?>
                                    
                                </a>
                                <div class="rem-price">￥<?php echo number_format((float)get_post_meta($post->ID, '_htx_ass_fei', true), 2); ?></div>
                                <div class="rem-name"><?php echo excerpttitle(12); ?></div>
                                <div class="rem-type layui-clear">
                                    <span>投标中</span>
                                    <span><i class="layui-icon" style="font-size:18px; color:#FF5722; position:relative; top:2px;">&#xe60e;</i> 剩余
<?php 
date_default_timezone_set('prc');  //Time shows Beijing time
$ass_bid_end = get_post_meta( $post->ID, '_htx_ass_bid_end', true );
$distance = strtotime($ass_bid_end)-time();
if($distance>0){
	echo dtime2second($distance);
}else{
	echo "0";
}
?>                                          
                                    </span>
                                </div>
                                <div class="rem-sub">
                                    <a class="bc-yellow" href="<?php the_permalink(); ?>">我要投标</a>
                                </div>
                            </div>
<?php
		}
	}
}
//endwhile;	//loop2 end  
wp_reset_postdata();
?> 