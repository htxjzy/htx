<?php 
/*
Template Name: 消息管理
*/
?>	
<?php get_header(); ?>
<link rel="stylesheet" href="/p/css/member.css">
<a class="banner_box" style="background:url(/p/images/banners/banner_user.jpg) center top no-repeat;" href="#"></a>
<!-- banner end -->

<article class="layui-main user_im">
<?php include(TEMPLATEPATH . '/p_user_menu.php'); ?>
<script>
$(function(){
	$(".layui-main .layui-clear > a:nth-child(4)").addClass("cur");
});
</script>
    <!--用户中心导航 end-->
<div class="layui-center-box layui-clear">
        <div class="user-left">
<a href="javascript:;"><img src="/p/images/adh90.jpg" /></a>

        </div>
        <!--左边 end-->
        <div class="user-right">
<?php  
if(is_user_logged_in()){
	date_default_timezone_set('prc'); 
	$type = array('msmmail');
	$cur_url = home_url().'/other/user_im';	
	$cur_user = $current_user->ID;
	$args = array(
		'user_id' 		=> $cur_user,
		'type'			=> $type,
		'date_query' 	=> NULL,			
		'count' 		=> true //return only the count
	);		
	$total = get_comments($args);

	$args = array(
		'user_id' 		=> $cur_user,
		'type'			=> $type,
		'date_query' 	=> NULL,
		'status'		=>'hold',		
		'count' 		=> true //return only the count
	);		
	$total_no_read = get_comments($args);
}
?>
            <div class="htx-box">
            <p>共有 <span style="color:#666;"><?php echo $total; ?></span>  条消息，其中未读消息有 <span style="color:#e4393c;"><?php echo $total_no_read; ?></span> 条。 查看 <a title="查阅未读消息" href="/other/user_im?reading=no" class="readingIM">未读消息</a> <a title="查阅所有消息" href="/other/user_im" class="readingIM">全部消息</a></p>
<?php 
if(is_user_logged_in()){

	$paged = isset( $_GET[ 'cmpage' ] ) ? $_GET[ 'cmpage' ] : 1;
	//Number of reviews per page
	$number = 20;
	$offset = ( $paged - 1 ) * $number;		
	if( isset($_GET['reading']) && $_GET['reading']=='no' ){
		$args = array(
			// Arguments for your query.
			'type'		=> $type,		
			'user_id'	=> $cur_user,
			'status'	=> 'hold',
			'date_query' => NULL,
			'number' => $number,
			'offset' => $offset		
		);
		$args_num = array(
			'type'			=> $type,
			'user_id'	=> $cur_user,
			'status'	=> 'hold',
			'date_query' 	=> NULL,
			'count' 		=> true 		
		);
		$total = get_comments($args_num);	
		$format = $cur_url.'?reading=no&cmpage=%#%';
		$alink = $cur_url.'?reading=no';
		echo '<p>未读消息有 <span>'.$total.'</span> 如下所示：</p>';	
	}else{
		$args = array(
			// Arguments for your query.
			'type'		=> $type,		
			'user_id'	=> $cur_user,
			'date_query' => NULL,
			'number' => $number,
			'offset' => $offset		
		);
		$args_num = array(
			'type'			=> $type,
			'user_id'	=> $cur_user,
			'date_query' 	=> NULL,
			'count' 		=> true 		
		);
		$total = get_comments($args_num);	
		$format = $cur_url.'?reading=all&cmpage=%#%';
		$alink = $cur_url.'?reading=all';
		echo '<p>全部消息有 <span>'.$total.'</span> 如下所示：</p>';	
	}

}
?>
<div class="layui-row">
	<div class="layui-col-xs1"><h2>状态</h2></div>
	<div class="layui-col-xs2"><h2>推送时间</h2></div>
	<div class="layui-col-xs2"><h2>消息类型</h2></div>
	<div class="layui-col-xs7"><h2>消息内容</h2></div>
</div>
<?php 
if(is_user_logged_in()){					 
	$comments_query = new WP_Comment_Query;
	$comments = $comments_query->query( $args );		
	//$total  Total number of records
	
	if ( $comments ) {		 
		foreach ( $comments as $comment ) {		 
			// Do what you do for each comment here. 
			$comment_id = $comment->comment_ID;			
			$im_reading = $comment->comment_approved;
			if(empty($im_reading)){
				$reading = "<b class='red'>未读</b>";
			}else{
				$reading = "<b class='gray'>已阅</b>";
			}			
			$time = $comment->comment_date;
			$subject = $comment->comment_content;			
			$subject_excerpt = excerptsubject($comment_id, 34);			
			$im_type = get_comment_meta($comment_id, 'im_type', true);
			
			echo '<a id="'.$comment_id.'" class="layui-row" href="javascript:;" title="阅读全文"><div class="layui-col-xs1">'.$reading.'</div><div class="layui-col-xs2"><p>'.$time.'</p></div><div class="layui-col-xs2"><p>'.$im_type.'</p></div><div class="layui-col-xs7"><p>'.$subject_excerpt.'...... <span> 更多 </span></p><p>'.$subject.'</p></div></a> ';
				 
		}
		// Get the current page
		$current_page  = max( 1, $paged );
		$max_num_pages = ceil( $total / $number );		
		$pid = 9999999999999999; // need an unlikely integer
		$args = array(
			'base'         => get_permalink( $pid ) . '%_%',	// add_query_arg('cmpage', '%#%'),
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
			echo '<div id="tdpage">'.paginate_links($args).'</div>';
		}		
		 
	} else {
		// Display message because there are no comments.
		echo '<div id="tdpage"><div class="layui-none-information"><i></i><span>暂时没有信息</span></div></div>';		 
	}
}	// end is_user_logged_in()
?>
<?php wp_nonce_field( 'htx_nonce_field_id', 'htx_nonce_field_name' ); ?>
<?php

if(isset($_GET['test']) && $_GET['test']=='start'){	

	$cur_user = $current_user->ID;	
	$subject = urlencode("测试18往数据库中插898989入短消息第四届阿里中间件性能挑战赛火热进行时，邀你瓜分500,000元现金大奖，第四届阿里中间件性能挑战赛火热进行时，邀你瓜分500,000元现金大奖，第四届阿里中间件性能挑战赛火热进行时，邀你瓜分500,000元现金大奖，第四届阿里中间件性能挑战赛火热进行时，邀你瓜分500,000元现金大奖。");	
	$im_type = urlencode("测试站内信类型");

	$url=home_url()."/other/user_im";
	$post="api=insertIM&userid={$cur_user}&subject={$subject}&im_type={$im_type}";	
	$redata=vcurl($url, $post);
	//var_dump($redata);	//直接打印json都得
}


if(isset($_POST['api']) && $_POST['api']=='insertIM'){	
	$cur_user = $_POST['userid'];		
	$subject = urldecode($_POST['subject']);		
	$im_type = urldecode($_POST['im_type']);		
	$imdata = array(
		'user_id'			=> $cur_user,
		'comment_content'	=> $subject,
		'comment_date'		=> date('Y-m-d H:i:s'),
		'comment_type'		=> 'msmmail',
		'comment_approved'	=> 0
	);
			
	$im_id = wp_insert_comment( $imdata );	
	add_comment_meta($im_id, 'im_type', $im_type, true);	

}

?>
              
            </div>
        </div>
</div>
</article>
<script>
$(function(){
	$(".user_im .user-right .htx-box a.layui-row").click(function(){
		$(this).find(".layui-col-xs7 p:first-child").slideToggle();
		$(this).find(".layui-col-xs7 p:last-child").slideToggle();
		
		var bStatus = $(this).find(".layui-col-xs1 b");		
		var postUrl = '/other/dataproccess';
		var commentId = $(this).attr("id");		
		var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();
		var postData = {
			update_read_status: "updateImStatus",
			comment_id: commentId,
			htx_nonce_field_name: htx_nonce_field_name
		};
		$.ajax({
			url: postUrl,
			type: 'post',
			//dataType: 'json',
			data: postData,
			success: function (data) {
				//alert(data);
				if(data=="gray")
				bStatus.css({"color":"gray"}).text('已阅');						
			}
		});					
		
	});
	
	//paged start
    var curUrl = window.location.search;
    var numValue = (curUrl.split("&")).length-1;
    if(numValue >= 1 ){	//|| curUrl.length != 0
        $("#tdpage .page-numbers:nth-child(2)").attr("href", "<?php echo $alink; ?>");
    }
	var numofStr = (curUrl.split("2")).length-1;
    if(numofStr==1){
        $("#tdpage .page-numbers:nth-child(1)").attr("href", "<?php echo $alink; ?>");
    }
	//paged end	
	
		
});
</script>
<?php get_footer(); ?>
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
<?php } ?>	