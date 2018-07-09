<?php 
/*
Template Name: 成功案例
*/
?>
<?php get_header(); ?> 
<link rel="stylesheet" href="/p/css/main.css">
	<a class="banner_box" style="background:url(/p/images/bannerlist.jpg) center top no-repeat;" href="#"></a>
<div class="wrap-for-s">
<div class="dyn-nav dyn-nav-for-s">
		<blockquote class="layui-elem-quote">当前位置 <i class="layui-icon" style="font-size:22px; margin:0 10px; color:#FF5722;">&#xe715;</i> <a href="/" title="返回首页">首页</a><i class="layui-icon" style="font-size:16px; margin:0 10px; color:#666;">&#xe602;</i> <span>成功案例</span></blockquote>
    </div>
    <!--当前位置 end-->
    <div class="task">
        <div class="layui-main">
            <div class="single pb10">
                <div class="htx-list layui-clear">
                    <div class="list-table">
                            <table>
                                <thead>
                                <tr>
                                    <th>预算服务费-任务标题<!-- / 浏览人数--> <br/> 投标数</th>
                                    <th>任务模式<br/> 中标者</th>
                                    <th>我要操作</th>
                                </tr>
                                </thead>
                                <tbody>
<?php 
$cur_url = home_url().'/other/cases';
$paged = isset( $_GET[ 'cpage' ] ) ? $_GET[ 'cpage' ] : 1;
$number = 10; //Need to be consistent with the wp BO definition
$tax_query = array(
	array('taxonomy' => 'assignmentscases', 'field'=>'slug', 'terms' =>'cases')
);
$args=array(
	//'post_type' => get_post_type(),
	'post_type' => array('assignments'),
	'posts_per_page'=>$number,
	'paged' 	=> $paged,
	'tax_query' => $tax_query        
);
$recentPosts=new WP_Query($args);
$total = $recentPosts->found_posts;
$format = $cur_url.'?cpage=%#%';
$alink = $cur_url;
while ($recentPosts->have_posts()) : $recentPosts->the_post();	//loop2 start
			$bidder_username = get_post_meta($post->ID, '_htx_ass_winning_bidder', true);
			$bidder_userid = get_user_by('login', $bidder_username)->ID;
			$shopid_query = "SELECT ID, guid FROM htx_posts WHERE post_author='{$bidder_userid}' AND post_type='shops'";
			$shopid_result = $wpdb->get_row($shopid_query);
			$shop_id = $shopid_result->ID;
			$shop_title = get_post_meta( $shop_id, '_htx_shop_name', true );
			$shop_logo = get_post_meta( $shop_id, '_htx_shop_logo', true );
			$shop_link = $shopid_result->guid;
?>
                                <tr>
                                    <td>
                                        <a href="<?php the_permalink(); ?>" title="查看任务-<?php the_title(); ?>">
                                            <span>￥ <?php echo number_format((float)get_post_meta($post->ID, '_htx_ass_fei', true), 2); ?></span>
                                            <span><?php echo excerpttitle(20); ?></span>
                                        <div><!--14520人浏览 / --><?php $bid_args = array('type'	=> 'bid', 'post_id' => get_the_ID(), 'count' => true); echo get_comments($bid_args); ?> 人投标</div>
                                        </a>
                                    </td>
                                    <td>
										<p>
<?php 
$mode_namesarr =  wp_get_object_terms(get_the_ID(), 'assignmentsmode', array('fields'=>'names')); 
echo $mode_namesarr[0];
?>                                                                              
                                        </p>
                                        <div>    
<a rel="nofollow" target="_blank" title="查看中标服务商-<?php echo $shop_title; ?>" href="<?php echo $shop_link; ?>"><img width="38" height="38" style="position:relative; top:-3px;" src="<?php echo $shop_logo; ?>" /></a>
                                        </div>
                                    </td>
                                    <td><a href="/other/submission" target="_blank" title="去发布">我有类似需求</a></td>
                                </tr>
<?php 
endwhile;	//loop2 end  
wp_reset_postdata();
?> 
                                                                                                  
                                </tbody>
                            </table>
<?php include(TEMPLATEPATH . '/a-paging-box.php'); ?>                 
                    </div>
<div class="list-user-box" style="padding-top:0px;">
<?php include(TEMPLATEPATH . '/sidebar_exp.php');  ?>
                        <a style="display:none;" class="htx-adv-as mt20">
                        	<img src="/p/images/adh90.jpg" />
                        </a>
                    </div><!--.list-user-box end-->                    
                </div>
                

            </div>
        </div>
    </div>
</div><!--.wrap-for-s end-->
<?php get_footer(); ?>