<?php 
/*
Template Name: 我发布的任务
*/
?>
<?php 
include TEMPLATEPATH . '/header.php'; 
?>		
<link rel="stylesheet" href="/p/css/member.css">
<style>
.complete_confirm{ color:#FF5722; text-align:center; }
.ok_ass_complete{ display:block; width:66px; padding:3px 0; font-size:12px; margin:0 auto; text-align:center; background:#5FB878; color:#fff; border-radius:6px; }
.ok_ass_complete:hover{ color:#fff; background:#009688; }
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
	$(".layui-main .layui-clear > .user-left > ul li:nth-child(2) dl dd:nth-child(1) a").addClass("active");
	
});
</script>
        </div>
        <!--左边 end-->
        <div class="user-right">
         
<div class="htx-box htx-box-send-ass">
<?php include TEMPLATEPATH . '/p_inc_decide_sent_ass_status.php'; ?>
                <h3>
                    <b class="bc-red">我发布的任务</b>
                </h3>
                <div class="list_box">
                     
                    <div class="list_li">
                        <strong>任务状态：</strong>
                        <a <?php if($_GET['status']=='all' || empty($_GET['status'])) echo 'class="cur"'; ?> href="/other/my_sent_assignments?status=all">所有（<span><?php echo $total_num_all; ?></span>）</a>
                        <a <?php if($_GET['status']=='auditing') echo 'class="cur"'; ?> href="/other/my_sent_assignments?status=auditing">审核（<span><?php echo $total_num['auditing']; ?></span>）</a>
                        <a <?php if($_GET['status']=='tendering') echo 'class="cur"'; ?> href="/other/my_sent_assignments?status=tendering">招标（<span><?php echo $total_num['tendering']; ?></span>）</a>
                        <a <?php if($_GET['status']=='bidopening') echo 'class="cur"'; ?> href="/other/my_sent_assignments?status=bidopening">开标（<span><?php echo $total_num['bidopening']; ?></span>）</a>
                        <a <?php if($_GET['status']=='making') echo 'class="cur"'; ?> href="/other/my_sent_assignments?status=making">制作（<span><?php echo $total_num['making']; ?></span>）</a>
                        <a <?php if($_GET['status']=='finished') echo 'class="cur"'; ?> href="/other/my_sent_assignments?status=finished">完工（<span><?php echo $total_num['finished']; ?></span>）</a>
                        <a <?php if($_GET['status']=='completed') echo 'class="cur"'; ?> href="/other/my_sent_assignments?status=completed">竣工（<span><?php echo $total_num['completed']; ?></span>）</a>
                    </div>
                </div>
                <div class="htx-table" style="padding-top:0px;">
                    <table  class="layui-table"  lay-skin="nob">
                        <colgroup>
                            <col width="45%">
                            <col width="15%">
                            <col width="10%">
                            <col width="10%">
                            <col width="10%">
                            <col width="10%">
                            
                        </colgroup>
                        <thead>
                        <tr>
                            <th>任务编号/标题</th>
                            <th> 投标数</th>
                            <th>任务金额</th>
                            <th>任务类型</th>
                            <th>任务状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
<?php 
if(is_user_logged_in()){		
	while ($recentPosts->have_posts()) : $recentPosts->the_post();	//loop start	 
?>                        
                        <tr>
                            <td>
                                <span class="spanid"><?php the_ID(); ?></span>
                                <h2><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" target="_blank"><?php echo excerpttitle(24); ?></a></h2>
                            </td>
                            <td>
<?php 
	$postid = $post->ID;
	$args = array(
		'type'			=> array('bid'),
		'post_id' 		=> $postid,			
		'count' 		=> true //return only the count
	);	 
	echo get_comments($args);	
?>                            
                            </td>
                            <td><span class="bc-red">￥<?php echo number_format((float)get_post_meta($post->ID, '_htx_ass_fei', true), 2); ?> </span></td>
                            <td><span>
<?php 
$namesArr = wp_get_object_terms($post->ID, 'assignmentstax', array('fields'=>'names')); 
echo $namesArr[0];
?>
                            </span></td>
                            <td><span>
<?php 
$namesArr = wp_get_object_terms($post->ID, 'assignmentsstatus', array('fields'=>'names')); 
echo $namesArr[0];
?>
                            </span></td>
<td>
<?php 
$post_id = $post->ID;
$post_status = $post->post_status;

$ass_winning_bidder = get_post_meta( $post->ID, '_htx_ass_winning_bidder', true );
$bidder_userid = get_user_by('login', $ass_winning_bidder)->ID;	
$bidder_commentid_query = "SELECT comment_ID FROM htx_comments WHERE user_id='{$bidder_userid}' AND comment_post_ID='{$post_id}' ";
$bidder_commentid_result = $wpdb->get_row($bidder_commentid_query);
$bid_id = $bidder_commentid_result->comment_ID;

if($post_status == 'draft'){ 
	echo '<a class="layui-btn layui-btn-small layui-btn-danger" style="height:32px; line-height:32px; border-radius:6px;" href="/other/edit_ass?edit_ass_id='.get_the_ID().'">编辑</a>';}elseif( $post_status == 'publish' && !empty(get_comment_meta( $bid_id, 'bidder_conform_finish', true )) && empty(get_comment_meta( $bid_id, 'bidder_conform_complete', true )) ){ 
	echo '<p class="complete_confirm">如验收通过</p><a class="ok_ass_complete" title="验收通过请点击这里结款" target="_blank" href="/other/i_want_to_recharge?bid_id='.$bid_id.'">结款</a>'; 
}else{
	echo '<p style="height:32px;"></p>';
} 
?>
</td>
                        </tr>                       
<?php
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
		echo '<tr><td id="tdpage" style="padding:15px 15px;" colspan="6">'.paginate_links($args).'</td></tr>';
	}

	if(!($recentPosts->have_posts()))
		echo '<tr><td colspan="6"><div class="layui-none-information"><i></i><span>暂时没有信息</span></div></td></tr>';
	}
?>
<script>	
    var curUrl = window.location.search;
    var numValue = (curUrl.split("&")).length-1;
	var numofStr = (curUrl.split("2")).length-1;
    if(numValue >= 1){
        $("#tdpage .page-numbers:nth-child(2)").attr("href", "<?php echo $alink; ?>");
    }
    if(numofStr==1){
        $("#tdpage .page-numbers:nth-child(1)").attr("href", "<?php echo $alink; ?>");
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