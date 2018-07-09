<?php 
/*
Template Name: 我参加的任务
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
	$(".layui-main .layui-clear > .user-left > ul li:nth-child(3) dl dd:nth-child(2) a").addClass("active");
	
});
</script>
        </div>
        <!--左边 end-->
        <div class="user-right">         
			<div class="htx-box htx-box-send-ass"> 
<?php 
if(is_user_logged_in()){
	wp_nonce_field( 'htx_nonce_field_id', 'htx_nonce_field_name' );	
	$cur_user = $current_user->ID;
	
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
	
}	//end is user logged in
?>                      
                <h3>
                    <b class="bc-red">我参加的任务</b>
                </h3>
                <div class="list_box">
                    <div class="list_li">
                    	<a <?php if($_GET['what_ass']=='all' || empty($_GET['what_ass'])) echo 'class="cur"'; ?> href="/other/my_join_assignments">所有任务<span>（<?php echo $total_bid_num; ?>）</span></a>
                        <a <?php if($_GET['what_ass']=='bidder') echo 'class="cur"'; ?> href="/other/my_join_assignments?what_ass=bidder">中标任务<span>（<?php echo $bidder_posts_num; ?>）</span></a>                        
                    </div>
                </div>
                <div class="htx-table" style="padding-top:0;">
                    <table class="layui-table"  lay-skin="lg">
                        <colgroup>
                            <col width="36%">
                            <col>
                        </colgroup>
                        <thead>
                        <tr class="add_bold">
                            <th>任务编号/标题</th>
                            <th>任务金额</th>
                            <th>任务类型</th>
                            <th>任务状态</th>
                            <th>投帖ID</th>
                            <th>投帖状态</th>
                            <th>中标</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
<?php
if(is_user_logged_in()){
	
	$paged = isset( $_GET[ 'cpage' ] ) ? $_GET[ 'cpage' ] : 1;	
	$cur_url = home_url().'/other/my_join_assignments';			
	$number = 20;
	$offset = ( $paged - 1 ) * $number;
	
	if(!empty($_GET['what_ass'])){
		$get_value = trim($_GET['what_ass']);	
		switch($get_value){
			case 'all':
				if(!empty($post_ids)){
					$args=array(
						'post_type' 	=> array('assignments'),
						'post__in'		=> $post_ids,
						'posts_per_page'=> $number,
						'offset' 		=> $offset
					);		
					$total = count($post_ids);
					$format = $cur_url.'?what_ass=all&cpage=%#%';
					$alink = $cur_url.'?what_ass=all';
					include TEMPLATEPATH . '/p_inc_join_ass_loop.php'; 
				}else{
					echo '<tr><td colspan="8"><div class="layui-none-information"><i></i><span>暂时没有信息</span></div></td></tr>';
				}
				break;			
			case 'bidder':				
				if(!empty($bidder_post_ids)){
					$args=array(
						'post_type' 	=> array('assignments'),
						'post__in'		=> $bidder_post_ids,
						'posts_per_page'=> $number,
						'offset' 		=> $offset
					);		
					$total = count($bidder_post_ids);
					$format = $cur_url.'?what_ass=bidder&cpage=%#%';
					$alink = $cur_url.'?what_ass=bidder';	
					include TEMPLATEPATH . '/p_inc_join_ass_loop.php'; 
				}else{
					echo '<tr><td colspan="8"><div class="layui-none-information"><i></i><span>暂时没有信息</span></div></td></tr>';
				}
				break;	
		} //end switch
	}else{
			if(!empty($post_ids)){
				$args=array(
					'post_type' 	=> array('assignments'),
					'post__in'		=> $post_ids,
					'posts_per_page'=> $number,
					'offset' 		=> $offset
				);		
				$total = count($post_ids);
				$format = $cur_url.'?what_ass=all&cpage=%#%';
				$alink = $cur_url.'?what_ass=all';
				include TEMPLATEPATH . '/p_inc_join_ass_loop.php'; 
			}else{
				echo '<tr><td colspan="8"><div class="layui-none-information"><i></i><span>暂时没有信息</span></div></td></tr>';
			}			
	}	
//echo '<tr><td colspan="8"><div class="layui-none-information"><i></i><span>暂时没有信息</span></div></td></tr>';
}	//end is user logged in
?>
<script>
	var postUrl = "/other/dataproccess";
	$('a.ok_ass_make_start').click(function(){
		var bidder_comment_id = $(this).attr("bid_id");
		var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();	
		var postData = {
				bidder_comment_id_for_confirm_time: bidder_comment_id,
				htx_nonce_field_name: htx_nonce_field_name,			
			}		
		layui.use('layer', function(){
			var layer = layui.layer;	
			$.ajax({
				type:"post",
				url: postUrl,
				data: postData,
				success:function(data) {
					layer.open({
						title: false,
						content: data,
						yes: function(index, layero){
							//do something
							location.reload();
							layer.close(index); 
						},
						cancel: function(index, layero){
							//do something 
							location.reload();
							layer.close(index);
						}    
					});     
				}
			});	//$.ajax end	  
			layer.close(index);
		});//layui.use end  
	}); // end click a.ok_ass_make_start
	
	$('a.ok_ass_finish').click(function(){
		var bidder_comment_id = $(this).attr("bid_id");
		var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();	
		var postData = {
				bidder_comment_id_for_confirm_finish: bidder_comment_id,
				htx_nonce_field_name: htx_nonce_field_name,			
			}
		layui.use('layer', function(){
			var layer = layui.layer;
			layer.confirm('确定已经完成制作吗，确定后将向雇主证明任务已经制作完成', {icon:3, title:false}, function(index){
				//do something
				$.ajax({
					type:"post",
					url: postUrl,
					data: postData,
					success:function(data) {
						layer.open({
							title: false,
							content: data,
							yes: function(index, layero){
								//do something
								location.reload();
								layer.close(index); 
							},
							cancel: function(index, layero){
								//do something 
								location.reload();
								layer.close(index);
							}    
						});     
					}
				});	//$.ajax end	  
				layer.close(index);
			});//layer.confirm end   
		});//layui.use end 			
						
	});	// end click a.ok_ass_finish
	
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

