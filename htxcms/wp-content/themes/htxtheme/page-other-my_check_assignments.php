<?php 
/*
Template Name: 我把关的项目
*/
?>
<?php 
include TEMPLATEPATH . '/header.php'; 
?>		
<link rel="stylesheet" href="/p/css/member.css">
<style>
.start_time{ color:#FF5722; text-align:center; }
.ok_ass_make_start{ display:block; width:66px; padding:3px 0; font-size:12px; margin:0 auto; text-align:center; background:#5FB878; color:#fff; border-radius:6px; }
.ok_ass_make_start:hover{ color:#fff; background:#009688; }
.ok_ass_finish{ display:block; width:66px; padding:3px 0; font-size:12px; margin:0 auto; text-align:center; background:#5FB878; color:#fff; border-radius:6px; }
.ok_ass_finish:hover{ color:#fff; background:#009688; }
tr.add_bold th{ font-weight:bold;  }
</style>
<a class="banner_box" style="background:url(/p/images/banners/banner_user.jpg) center top no-repeat;" href="#"></a>
<!-- banner end -->

<article class="layui-main">
<?php include(TEMPLATEPATH . '/p_user_menu.php'); ?>
    <div class="layui-center-box layui-clear">
        <div class="user-left">
<?php include(TEMPLATEPATH . '/p_user_center_sidebar.php'); ?>
<script>
$(function(){
	$(".layui-main .layui-clear > a:nth-child(1)").addClass("cur");
	$(".layui-main .layui-clear > .user-left > ul li.c-expert dl dd:nth-child(2) a").addClass("active");
	
});
</script>
        </div>
        <!--左边 end-->
        <div class="user-right">         
			<div class="htx-box htx-box-send-ass"> 
<?php 
if(is_user_logged_in()){
	//wp_nonce_field( 'htx_nonce_field_id', 'htx_nonce_field_name' );	
	$cur_user = $current_user->ID;
	$paged = isset( $_GET[ 'cpage' ] ) ? $_GET[ 'cpage' ] : 1;	
	$cur_url = home_url().'/other/my_check_assignments';			
	$number = 20;
	$offset = ( $paged - 1 ) * $number;
	
	$expertid_query = "SELECT ID FROM htx_posts WHERE post_author='{$cur_user}' AND post_type='experts'";
	$expertid_result= $wpdb->get_row($expertid_query);
	$expert_id = $expertid_result->ID;

	$args=array(
		'post_type' 	=> array('assignments'),
		'meta_key'		=> '_htx_ass_exp_selected',	
		'meta_value'	=> $expert_id,
		'posts_per_page'=> $number,
		'offset' 		=> $offset
	);		
	$format = $cur_url.'?cpage=%#%';
	$alink = $cur_url;	
	$recentPosts=new WP_Query($args);	
	$total = $recentPosts->found_posts;	
}	//end is user logged in
?>                      
                <h3>
                    <b class="bc-red">我把关的任务</b><span style="margin-left:20px;">共 <span style="color:#e4393c;"><?php echo $total; ?></span> 个任务</span>
                </h3>
                <div class="htx-table" style="padding-top:0;">
                    <table class="layui-table"  lay-skin="lg">
                        <colgroup>
                            <col width="50%">
                            <col>
                        </colgroup>
                        <thead>
                        <tr class="add_bold">
                            <th>任务编号/标题</th>
                            <th>任务金额</th>
                            <th>任务类型</th>
                            <th>中标商户</th>
                        </tr>
                        </thead>
                        <tbody>
<?php
if(is_user_logged_in()){
	
	while ($recentPosts->have_posts()) : $recentPosts->the_post();	//loop start
		$postid = $post->ID;
		$post_link = get_the_permalink($postid);
		$title = $post->post_title;
		$ass_fee= number_format((float)get_post_meta($postid, '_htx_ass_fei', true), 2);
		$namesArr = wp_get_object_terms($postid, 'assignmentstax', array('fields'=>'names')); 
		$ass_cat = $namesArr[0];			
		$bidder_username =trim(get_post_meta( $postid, '_htx_ass_winning_bidder', true ));
		$bidder_user_id = get_user_by('login', $bidder_username)->ID;
		$shopid_query = "SELECT ID FROM htx_posts WHERE post_author='{$bidder_user_id}' AND post_type='shops'";
		$shopid_result=$wpdb->get_row($shopid_query);
		$shop_id = $shopid_result->ID;
		$shop_title = get_post($shop_id)->post_title;	
		$shop_link = get_the_permalink($shop_id);
		$shop_logo = get_post_meta($shop_id, '_htx_shop_logo', true);	
									
		echo '<tr><td><span class="spanid">'.$postid.'</span> <h2><a title="'.$title.'" href="'.$post_link.'" target="_blank">'.$title.'</a></h2></td><td><span class="bc-red">￥'.$ass_fee.'</span></td><td><span>'.$ass_cat.'</span></td><td><a title="'.$shop_title.'" href="'.$shop_link.'" target="_blank"><img width="48" height="48" src="'.$shop_logo.'" /></a></td></tr>';		
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
			echo '<tr><td id="tdpage" style="padding:15px 15px;" colspan="4">'.paginate_links($args).'</td></tr>';
		}	


//echo '<tr><td colspan="4"><div class="layui-none-information"><i></i><span>暂时没有信息</span></div></td></tr>';
}	//end is user logged in
?>
<script>

var curUrl = window.location.search;
if(curUrl.length != 0 ){
    $("#tdpage .page-numbers:nth-child(2)").attr("href", "<?php echo $cur_url; ?>");
	if(curUrl=="?cmpage=2"){ $("#tdpage .page-numbers:nth-child(1)").attr("href", "<?php echo $cur_url; ?>"); }
}
		
</script>
                        </tbody>
                    </table>
                </div>
            </div>			
            
        </div>
    </div>
</article>
<?php include TEMPLATEPATH . '/footer.php'; ?>
<?php if(!is_user_logged_in()){ ?>
<script>	
layui.use('layer', function(){ 
		var $ = layui.$ 
		,layer = layui.layer;

		//layer.close(layer.index);
		layer.closeAll();
		layer.open({
			title: false,
			type: 1,
			content: $('#login-htx'),
			area: ['530px', '475px']
			,cancel: function(){ 
    			location.reload();
  			}			
		});				
});
</script>
<?php
} 
?>	