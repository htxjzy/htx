<?php
		$recentPosts=new WP_Query($args);
		while ($recentPosts->have_posts()) : $recentPosts->the_post();	//loop start
			$postid = $post->ID;
			$post_link = get_the_permalink($postid);
			$title = $post->post_title;
			$ass_fee= number_format((float)get_post_meta($postid, '_htx_ass_fei', true), 2);
			$namesArr = wp_get_object_terms($postid, 'assignmentstax', array('fields'=>'names')); 
			$ass_cat = $namesArr[0];
			$namesArr = wp_get_object_terms($postid, 'assignmentsstatus', array('fields'=>'names')); 
			$ass_status = $namesArr[0];	
			
			$bididquery = "SELECT comment_ID, comment_approved FROM htx_comments WHERE comment_type='bid' AND comment_post_ID='{$postid}' AND user_id='{$cur_user}' ";
			$bidid_result = $wpdb->get_row($bididquery);
			$bid_id = $bidid_result->comment_ID;
			$comment_approved = $bidid_result->comment_approved;
			if($comment_approved){
				$bid_status = '通过';
			}else{
				$bid_status = '审核';
			}
			
			$ass_make_start = get_post_meta($postid, '_htx_ass_make_start', true);
			
			$bidder_username =trim(get_post_meta( $postid, '_htx_ass_winning_bidder', true ));
			$cur_username = get_userdata($cur_user)->user_login;
			if( !empty($bidder_username) && $bidder_username==$cur_username ){
				$isbider ='是';
				$ass_making_start = get_post_meta( $postid, '_htx_ass_making_start', true );
				if(empty(get_comment_meta( $bid_id, 'bidder_conform_start_time', true )) ){ 
$operate = '<p class="start_time">'.$ass_make_start.'</p><a class="ok_ass_make_start" bid_id="'.$bid_id.'" title="点击确认" href="javascript:;">确认以上<br/>动工日</a>';	
				}elseif(empty(get_comment_meta( $bid_id, 'bidder_conform_finish', true ))){
$operate = '<p class="start_time">如制作完</p><a class="ok_ass_finish" bid_id="'.$bid_id.'" title="完成后请点击这里" href="javascript:;">请确认</a>';				
				}else{ $operate=''; }
				/*elseif(empty(get_comment_meta( $bid_id, 'bidder_conform_complete', true ))){
$operate = '<p class="start_time">完工验收</p>';				
				}*/				
			}else{
				$isbider ='否';
				$operate ='';
			}
						
			echo '<tr><td><span class="spanid">'.$postid.'</span> <h2><a title="'.$title.'" href="'.$post_link.'" target="_blank">'.$title.'</a></h2></td><td><span class="bc-red">￥'.$ass_fee.'</span></td><td><span>'.$ass_cat.'</span></td><td><span>'.$ass_status.'</span></td><td><a class="bididlink" href="/other/my_join_abid?bid_id='.$bid_id.'" title="查阅该帖子">'.$bid_id.'</a> </td><td>'.$bid_status.'</td><td> '.$isbider.' </td><td> '.$operate.' </td></tr>';		
		endwhile;	//loop2 end  
		wp_reset_postdata();		

		// Get the current page
		$current_page  = max( 1, $paged );
		$max_num_pages = ceil( $total / $number );			
		$pid = 9999999999999999; // need an unlikely integer
		$args = array(
			'base'         => get_permalink( $pid ) . '%_%',
			'format'       => $format,
			'current'      => $current_page,
			'total'        => $max_num_pages,
			'type'         => 'plain',
			'prev_text'    => __( '上一页' ),
			'next_text'    => __( '下一页' ),
			'end_size'     => 1,
			'mid-size'     => 2
		);				
		// 显示分页链接
		if(!empty(paginate_links($args))){
			echo '<tr><td id="tdpage" style="padding:15px 15px;" colspan="8">'.paginate_links($args).'</td></tr>';
		}