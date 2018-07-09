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
			$bidder_username = get_post_meta($post->ID, '_htx_ass_winning_bidder', true);
			$bidder_userid = get_user_by('login', $bidder_username)->ID;
			$shopid_query = "SELECT ID, guid FROM htx_posts WHERE post_author='{$bidder_userid}' AND post_type='shops'";
			$shopid_result = $wpdb->get_row($shopid_query);
			$shop_id = $shopid_result->ID;
			$shop_title = get_post_meta( $shop_id, '_htx_shop_name', true );
			$shop_tit = mb_substr($shop_title, 0, 14,'utf-8');
			$shop_logo = get_post_meta( $shop_id, '_htx_shop_logo', true );
			$shop_link = $shopid_result->guid;
?>
                            <div class="rem-box">
                                <a class="rem-img" title="查阅招标情况" href="<?php the_permalink(); ?>">
                                    <img src="/p/images/ass-fanben-txt.jpg" alt="" /><span class="tj">标</span>
                                </a>
                                <div class="rem-price">￥<?php echo number_format((float)get_post_meta($post->ID, '_htx_ass_fei', true), 2); ?></div>
                                <div class="rem-name"><?php echo excerpttitle(12); ?></div>
                                <div class="rem-type layui-clear">
                                    <span class="wc">圆满完成</span>
                                </div>
                                <div class="rem-type layui-clear">
                                	<span class="fl"><?php $bid_args = array('type'	=> 'bid', 'post_id' => get_the_ID(), 'count' => true); echo get_comments($bid_args); ?>人投标</span>
                                	<span class="fr"><a rel="nofollow" style="background:none; border:hidden;" title="查看中标服务商-<?php echo $shop_title; ?>" href="<?php echo $shop_link; ?>"><img width="38" height="38" style="position:relative; top:-3px;" src="<?php echo $shop_logo; ?>" /></a> 中标</span>
                                </div>
                            </div>
<?php
		}
	}
}
//endwhile;	//loop2 end  
wp_reset_postdata();
?> 