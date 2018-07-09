<?php
$args=array(
	'post_type' => array('assignments'),
	'tax_query' => $tax_query   
);
$recentPosts=new WP_Query($args);
if($recentPosts->have_posts()){
	for($i=0; $i<6; $i++){
		$recentPosts->the_post();
		if(!empty(get_the_ID())){
?> 
<a class="layui-clear" title="查阅-<?php the_title(); ?>" href="<?php the_permalink(); ?>"><span>￥ <?php echo number_format((float)get_post_meta($post->ID, '_htx_ass_fei', true), 2); ?> </span><?php echo excerpttitle(16); ?><span><?php $bid_args = array('type'	=> 'bid', 'post_id' => get_the_ID(), 'count' => true); echo get_comments($bid_args); ?>人投标</span></a>
<?php
		}
	}
}
wp_reset_postdata();
?> 