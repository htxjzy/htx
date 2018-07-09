<?php
$args=array(
	'post_type' => array('shops'),
	'posts_per_page'=>4,
	'tax_query' => $tax_query  
);
$recentPosts=new WP_Query($args);
if($recentPosts->have_posts()){
	for($i=0; $i<4; $i++){
		$recentPosts->the_post();
		if(!empty(get_the_ID())){
?> 
<a class="img-a" title="查阅服务商-<?php the_title(); ?>" href="<?php the_permalink(); ?>"><img src="<?php echo get_post_meta( $post->ID, '_htx_shop_logo', true ); ?>" alt=""></a>        
<?php
		}
	}
}
wp_reset_postdata();
?> 
