<?php
if(is_user_logged_in()){
		
	$cur_user = $current_user->ID;
	
	$shopid_query = "SELECT ID FROM htx_posts WHERE post_author='{$cur_user}' AND post_type='shops'";
	$shopid_result = $wpdb->get_row($shopid_query);
	$shop_id = $shopid_result->ID;
	
	if(!empty($shop_id)){	
		$namesArr = wp_get_object_terms($shop_id, 'shopstax', array('fields' => 'names'));
		$shop_cat = $namesArr[0];	
		$namesArr = wp_get_object_terms($shop_id, 'assignmentstax', array('fields' => 'names'));	
		foreach($namesArr as $name){
			$be_good_at .= $name.', ';
		}
		$be_good_at = rtrim($be_good_at, ', ');
		echo '<p class="pshop">我是服务商：<span>'.$shop_cat.'</span>擅长: <span>'.$be_good_at.'</span><!--累计收入：￥<span>0.00</span>--></p>';
	}
	
	$expertid_query = "SELECT ID FROM htx_posts WHERE post_author='{$cur_user}' AND post_type='experts'";
	$expertid_result = $wpdb->get_row($expertid_query);
	$expert_id = $expertid_result->ID;
	if(!empty($expert_id)){
		$expert_title = get_post_meta( $expert_id, '_htx_exp_title', true );
		$namesArr = wp_get_object_terms($expert_id, 'assignmentstax', array('fields' => 'names'));	
		$be_good_at = '';
		foreach($namesArr as $name){
			$be_good_at .= $name.', ';
		}
		$be_good_at = rtrim($be_good_at, ', ');	
		echo '<p class="pexpert">我是专家：<span>'.$expert_title.'</span>擅长: <span>'.$be_good_at.'</span><!--累计收入：￥<span>0.00</span>--></p>';
	}
	
	// ass total num
	$args_num_all=array(
		'author'		=> $cur_user,
		'post_type' 	=> array('assignments'), 
		'post_status'	=>array('publish','draft'), 	
	);
	$posts_num_all=new WP_Query($args_num_all);
	$total_num_all = $posts_num_all->found_posts;
	
	// pro total num
	$pro_args=array(
		'author'		=> $cur_user,
		'post_type' 	=> array('projects'), 
		'post_status'	=>array('publish','draft'), 	
	);
	$pro_posts=new WP_Query($pro_args);
	$pro_total = $pro_posts->found_posts;

	// join ass total num
	$bid_args = array(
		'type'			=> 'bid',
		'user_id'		=> $cur_user,
		//'status '	=> 'all', //default all
		'count' 		=> true //return only the count
	);
	$total_bid_num = get_comments($bid_args); 

	$args = array(
		'type'			=> 'bid',
		'user_id'		=> $cur_user,
	);	
	$comments_query = new WP_Comment_Query;
	$comments = $comments_query->query( $args );
	
	foreach ( $comments as $comment ) {
		$post_ids[] = $comment->comment_post_ID;		
	}
	
	$username = get_user_by('id', $cur_user)->user_login;			
	$bidder_posts_query = " SELECT post_id FROM htx_postmeta WHERE meta_key='_htx_ass_winning_bidder' AND meta_value='{$username}' ";
	$result_arrs = $wpdb->get_results($bidder_posts_query);
	foreach($result_arrs as $result_arr){
		$bidder_post_ids[]=$result_arr->post_id;
	}
	$bidder_posts_num = count($bidder_post_ids);
	
	// favorite ass total num
	$favorite_postid_query = " SELECT comment_post_ID FROM htx_comments WHERE comment_type='favorite' AND user_id='{$cur_user}' ";
	$favorite_postid_arrays = $wpdb->get_results($favorite_postid_query);
	foreach($favorite_postid_arrays as $favorite_post){
		$favorite_post_ids[] = $favorite_post->comment_post_ID;
	}
	
	$args=array(
		'post_type' 	=> array('assignments'),
		'post__in'		=> $favorite_post_ids,	
	);			
	$recentPosts=new WP_Query($args);	
	$total_favorite = $recentPosts->found_posts;	
	 	
}// end if is_user_logged_in()