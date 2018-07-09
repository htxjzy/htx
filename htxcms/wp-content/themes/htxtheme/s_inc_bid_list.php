<?php
$bid_args = array(
	'type'			=> 'bid',
	'post_id' 		=> get_the_ID(),	
	'count' 		=> true //return only the count
);
$total_bid_num = get_comments($bid_args);
$paged = isset( $_GET[ 'cmpage' ] ) ? $_GET[ 'cmpage' ] : 1;
$number = 20;
$offset = ( $paged - 1 ) * $number;	
$args = array(
	// Arguments for your query.
	'type'		=> 'bid',
	'status'	=> 'approve',
	'post_id'	=> get_the_ID(),
	'number' => $number,
	'offset' => $offset		
);					 
$comments_query = new WP_Comment_Query;
$comments = $comments_query->query( $args );		
//$total  Total number of records
foreach ( $comments as $comment ) {
	$comment_id = $comment->comment_ID;
	$user_id = $comment->user_id;
	$shopid_query = "SELECT ID, guid FROM htx_posts WHERE post_author='{$user_id}' AND post_type='shops'";
	$shopid_result = $wpdb->get_row($shopid_query);
	$shop_id = $shopid_result->ID;
	$shop_title = get_post_meta( $shop_id, '_htx_shop_name', true );
	$shop_tit = mb_substr($shop_title, 0, 18,'utf-8');
	$shop_logo = get_post_meta( $shop_id, '_htx_shop_logo', true );
	$shop_link = $shopid_result->guid;
	
	$termArr = wp_get_object_terms($shop_id, 'shopstax', array('fields' => 'names')); 
	$termname = $termArr[0];
	
	$shop_prov = get_post_meta( $shop_id, '_htx_shop_provid', true );
	$shop_city = get_post_meta( $shop_id, '_htx_shop_cityid', true );
	$shop_area = get_post_meta( $shop_id, '_htx_shop_areaid', true );	
?>
<div class="bidwrap layui-row">
	<div class="layui-col-md2">
    	<a href="<?php echo $shop_link; ?>" title="查看商铺-<?php echo $shop_title; ?>"><img src="<?php echo $shop_logo; ?>" /></a>
        <!--<a class="ar" href="#"></a>-->
<?php
if(!empty(get_user_meta( $user_id, 'custom_user_mobile', true ))){
	echo '<a class="ar ar3" style="background:url(/p/images/renzhengxiang.png) 8px -28px no-repeat;" href="javascript:;"></a>';
}
if( !empty(email_exists( get_user_by('id', $user_id)->user_email ))){ 
	echo '<a class="ar ar4" href="javascript:;"></a>';
}
?>        
        <!--<a class="ar" href="#"></a>-->
    </div>
	<div class="layui-col-md10">
    	<span><?php echo $termname; ?></span><a href="<?php echo $shop_link; ?>"><?php echo $shop_tit.'...'; ?></a><span style="float:right;">于 <?php echo $comment->comment_date; ?> 投标</span><!--<a class="a5"  title="已加入金牌诚信宝，官方建议您优先选择" href="#"><img alt="火天信诚信宝" src="/p/images/chengxins2.png" /> 金牌诚信宝</a><a class="a4" title="能力已达到5力等级" href="#">五力</a>--><p>投标帖子的ID <span><?php echo $comment_id; ?> </span></p>
        <!--<p>标ID <span><?//php echo $comment->comment_ID; ?> </span>另缴 <i>￥30000</i> <a href="#">诚信金</a><span>信用 <i class="layui-icon" style="font-size:16px; color:#cc3333;">&#xe658;</i><i class="layui-icon" style="font-size:16px; color:#cc3333;">&#xe658;</i><i class="layui-icon" style="font-size:16px; color:#cc3333;">&#xe658;</i><i class="layui-icon" style="font-size:14px; color:#cc3333;">&#xe600;</i><i class="layui-icon" style="font-size:14px; color: #cc3333;">&#xe600;</i> <a title="查看该投标商的详细信用状况" href="#">信用证书</a></span></p>-->
        <div class="layui-row">
        	<div class="layui-col-md3">服务报价 <span>￥<?php echo get_comment_meta( $comment_id, '_bid_price', true ); ?></span></div>
            <div class="layui-col-md3">工作周期 <span> <?php echo get_comment_meta( $comment_id, '_bid_work_period', true ); ?>天</span></div>
            <div class="layui-col-md6">所在地区 <span><?php echo $shop_prov.'-'.$shop_city.'-'.$shop_area ; ?></span></div>
        </div>
    </div>
<fieldset class="layui-elem-field">
  <legend><i class="layui-icon" style="font-size:20px; color:#cc3333; position:relative; top:2px;">&#xe857;</i>  服务说明</legend>
  <div class="layui-field-box">
<?php echo $comment->comment_content; ?>
  </div>
</fieldset> 
<?php 
if(!empty(get_post_meta( $the_single_ID, '_htx_ass_exp_selected', true )) && empty(get_post_meta( $the_single_ID, '_htx_ass_winning_bidder', true ))){ 
	if($cur_user_id == $the_single_author){ 
?>  
	<a class="winbidder" href="javascript:;" cpostid="<?php echo $the_single_ID; ?>" authorid="<?php echo $comment->user_id; ?>">设为中标</a>
<?php
	}
}else{
	$ass_winning_bidder = get_post_meta( $the_single_ID, '_htx_ass_winning_bidder', true );
  	$bid_username = get_user_by( 'id', $comment->user_id )->user_login;	
  	if($ass_winning_bidder == $bid_username){
		echo '<img alt="中标在火天信服务平台" src="/p/images/zbH80w.png" />';				
	}
}
?>     	
</div><!--.bidwrap end--> 
<div class="blk20"></div>
<?php  
}	//end foreach
?>