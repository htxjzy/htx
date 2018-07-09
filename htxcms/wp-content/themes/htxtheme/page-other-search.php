<?php 
/*
Template Name: 搜索页面
*/

if(!isset( $_POST['htx_nonce_field_name'] )){ 
	echo '{"reg":"搜索失败01"}';
	exit();
}
	
//check nonce for security
$nonce = $_POST['htx_nonce_field_name'];
if(!wp_verify_nonce( $nonce, 'htx_nonce_field_id' )){
	echo '{"reg":"搜索失败02"}';
	exit();
}

if(isset($_POST['skeyword'])){
	$keyword = trim($_POST['skeyword']);	

	$ass_query = "SELECT post_id FROM htx_postmeta WHERE meta_key in('_htx_ass_must_provid', '_htx_ass_must_cityid', '_htx_ass_title') AND meta_value like '%{$keyword}%'";
	$assArrs = $wpdb->get_results($ass_query); 
	foreach($assArrs as $assArr){
		$assids[] = $assArr->post_id;
	}
	
}
?>
<?php get_header(); ?> 
<link rel="stylesheet" href="/p/css/main.css">
	<!--<a class="banner_box" style="background:url(/p/images/bannerlist.jpg) center top no-repeat;" href="#"></a>-->
<div class="wrap-for-s">
<div class="dyn-nav dyn-nav-for-s">
		<blockquote class="layui-elem-quote">当前位置 <i class="layui-icon" style="font-size:22px; margin:0 10px; color:#FF5722;">&#xe715;</i> <a href="/" title="返回首页">首页</a><i class="layui-icon" style="font-size:16px; margin:0 10px; color:#666;">&#xe602;</i> 搜索-<span style="color:#e4393c;"><?php echo $keyword; ?></span></blockquote>
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
                                    <th>预算服务费-任务标题<!-- / 浏览人数--><br/>要求服务商所在地</th>
                                    <th>任务模式-状态</th>
                                    <th>我要操作</th>
                                </tr>
                                </thead>
                                <tbody>
<?php 
if(!empty($assids)){
$cur_url = home_url().'/other/cases';
$paged = isset( $_GET[ 'cpage' ] ) ? $_GET[ 'cpage' ] : 1;
$number = 10; //Need to be consistent with the wp BO definition
$args=array(
	//'post_type' => get_post_type(),
	'post_type' => array('assignments'),
	'posts_per_page'=>$number,
	'paged' 	=> $paged,
	'post__in' => $assids        
);
$recentPosts=new WP_Query($args);
$total = $recentPosts->found_posts;
$format = $cur_url.'?cpage=%#%';
$alink = $cur_url;
while ($recentPosts->have_posts()) : $recentPosts->the_post();	//loop2 start
?>
                                <tr>
                                    <td>
                                        <a href="<?php the_permalink(); ?>" title="查看任务-<?php the_title(); ?>">
                                            <span>￥ <?php echo number_format((float)get_post_meta($post->ID, '_htx_ass_fei', true), 2); ?></span>
                                            <span><?php echo excerpttitle(20); ?></span>
                                        <div><!--14520人浏览 / -->
<?php echo get_post_meta( $post->ID, '_htx_ass_must_provid', true ); ?> - <?php echo get_post_meta( $post->ID, '_htx_ass_must_cityid', true ); ?> - <?php echo get_post_meta( $post->ID, '_htx_ass_must_areaid', true ); ?>                                        
                                        </div>
                                        </a>
                                    </td>
                                    <td>
										<p>
<?php 
$mode_namesarr =  wp_get_object_terms(get_the_ID(), 'assignmentsmode', array('fields'=>'names')); 
$status_namesarr =  wp_get_object_terms(get_the_ID(), 'assignmentsstatus', array('fields'=>'names')); 
echo $mode_namesarr[0].'-<span style="color:#e4393c;">'.$status_namesarr[0].'</span>';
?>                                                                               
                                        </p>
                                        
                                    </td>
                                    <td><a href="/other/submission" target="_blank" title="去发布">我有类似需求</a></td>
                                </tr>
<?php 
endwhile;	//loop2 end  
wp_reset_postdata();

}else{ echo '<tr><td colspan="3" style="text-align:center">没有匹配的任务</td></tr>'; }

?> 
                                                                                                  
                                </tbody>
                            </table>
<?php 
if(!empty($assids)){
include(TEMPLATEPATH . '/a-paging-box.php'); 
}


?>                 
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