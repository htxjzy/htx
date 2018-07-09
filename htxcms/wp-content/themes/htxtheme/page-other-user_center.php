<?php 
/*
Template Name: 用户中心
*/
?>		
<?php get_header(); ?>
<link rel="stylesheet" href="/p/css/member.css">
<style>
.ibox{ color:#454545; margin:15px 0 15px 30px; }
.ibox span{ color:#FF5722; margin:0 15px 0 0; }
.ibox a{ margin:0 15px; background:#e4393c; font-size:12px; color:#fff; border-radius:6px; padding:4px 10px; }
.ibox a:hover{ background:#f74e52; }
.ibox a.more{background:#5FB878;}
.ibox a.more:hover{background:#009688;}

</style>
<a class="banner_box" style="background:url(/p/images/center.jpg) center top no-repeat;" href="#"></a>
<!-- banner end -->

<article class="layui-main">
<?php include(TEMPLATEPATH . '/p_user_menu.php'); ?>
<script>
$(function(){
	$(".layui-main .layui-clear > a:nth-child(1)").addClass("cur");
});
</script>
    <!--用户中心导航 end-->
    <div class="layui-center-box layui-clear">
        <div class="user-left">
<?php include(TEMPLATEPATH . '/p_user_center_sidebar.php'); ?>
<script>
$(function(){
	$(".layui-main .layui-clear > .user-left > ul li:nth-child(1) > a.user_home").addClass("curA");	
});
</script>
        </div>
        <!--左边 end-->
<?php 
if(is_user_logged_in()){	
	$cur_user = $current_user->ID;
	$userObj = get_userdata($cur_user);
	$args = array(
		'user_id' 		=> $cur_user,
		'type'			=> 'msmmail',
		'date_query' 	=> NULL,
		'status'		=>'hold',	
		'count' 		=> true //return only the count
	);		
	$total_no_read = get_comments($args);
	
	$income_query = "SELECT comment_ID FROM htx_comments WHERE user_id='{$cur_user}' AND comment_type IN ('recharge', 'earning')";	
	$income_result = $wpdb->get_results($income_query); 
	foreach( $income_result as $income ){
		$comment_id = $income->comment_ID;
		$income_money = get_comment_meta($comment_id, 'sum_money', true);
		$sum_income += (float)$income_money; 	
	}	
	
	$payout_query = "SELECT comment_ID FROM htx_comments WHERE user_id='{$cur_user}' AND comment_type='consume'";
	$payout_result = $wpdb->get_results($payout_query); 
	foreach( $payout_result as $payout ){
		$comment_id = $payout->comment_ID;
		$payout_money = get_comment_meta($comment_id, 'sum_money', true);
		$sum_payout += (float)$payout_money; 	
	}
	
	$balance = $sum_income - $sum_payout;
	
	
}
?>
        <div class="user-right">
            <div class="fina_box layui-clear bg-white pt20 ">
                  <div class="user_center_info_left_new">
                  	<p><b>用户名：</b><span><?php echo $userObj->user_login; ?></span></p>
                    <p><b>未读站内信息数：</b><span><?php echo $total_no_read; ?></span><a title="去阅读" href="/other/user_im">去阅读</a></p>
                    <p><b>我的财务：</b> <span>余额 = 可用 + 暂不可用</span><a href="/other/user_finance">查看财务明细</a></p>
                    <p><b>余额：</b> ￥ <span><?php echo number_format($balance, 2); ?></span> <a href="/other/i_want_to_recharge">[ 充值 ]</a></p>
                    <p><b>可用：</b> ￥ <span><?php echo number_format($balance, 2); ?></span> <a href="/other/i_want_to_withdraw_deposit">[ 提现 ]</a></p>
                    <p><b>暂不可用：</b> ￥ <span>0.00</span></p>
                  
                  </div>
                  <div class="user_center_info_right_new">
                  	 <h2>绑定情况：</h2>
                      <ul>
                          <!--<li>
                              <span class="real_name bg-yellow"></span>
                              <p class="text-center mt10">实名</p>
                          </li>-->
                          <li>
<?php 
if(empty(get_user_meta( $cur_user, 'custom_user_mobile', true ))){ 
	echo '<a class="mobile-gray mobile-auth" title="绑定手机" href="javascript:;" ></a><p class="text-center mt10 gray">手机未绑定</p>';
}else{
	echo '<span class="mobile-green"></span><p class="text-center mt10 green">手机已绑定</p>';
} 
?>
                          </li>
                          <li>
<?php 
if( empty(email_exists( $userObj->user_email ))){ 
	echo '<a class="email-gray email-auth" title="绑定邮箱" href="javascript:;"></a><p class="text-center mt10 gray">邮箱未绑定</p>'; 
}else{
	echo '<span class="email-green email-auth"></span><p class="text-center mt10 green">邮箱已绑定</p>'; 
}
?>
                          </li>
                          <li style="float:none; clear:both;"></li>
                          <!--<li>
                              <span class="real_bannk bg-gay2"></span>
                              <p class="text-center mt10">银行</p>
                          </li>-->
                      </ul>
                      <p>说明：图标灰色代表未绑定，可点击去绑定；绿色表示已经绑定。</p>
                      <p>温馨提示：绑定仅用于接收重要提醒以及方便您登录，请放心绑定。</p>

                  </div>
              </div>
              <div class="fina_box layui-clear bg-white pr30 pt20">
<?php 
include TEMPLATEPATH .'/p_inc_user_center_box.php';
?>                
             </div>
            <div class="fina_box layui-clear">
                <div class="user_conter_task">

    <div class="ibox">我发布的任务总数：<span><?php echo $total_num_all; ?></span> <a class="more" href="/other/my_sent_assignments">任务详情</a> <a target="_blank" href="/other/submission">发布任务</a></div>    
    <div class="ibox">我全托的项目总数：<span><?php echo $pro_total; ?></span> <a class="more" href="/other/my_sent_projects">项目详情</a> <a target="_blank" href="/other/boarding_project">项目全托</a></div>
    <div class="ibox">我参与投标的任务总数：<span><?php echo $total_bid_num; ?></span>其中中标次数为：<span><?php echo $bidder_posts_num; ?></span> <a class="more" href="/other/my_join_assignments">投标详情</a> <a target="_blank" href="/assignments">找任务做</a></div>
    <div class="ibox">我收藏的任务总数：<span><?php echo $total_favorite; ?></span> <a class="more" href="/other/my_favorite_assignments">收藏详情</a></div>
 

    <h3>帮助中心<a class="asub" href="/help/more" title="点击行动" target="_blank">更多帮助</a></h3>
    <div class="z_tabcon">
        <div class="tab">
            <a href="javascript:;" class="on">雇主帮助</a>
            <a href="javascript:;">服务商帮助</a>
            <a href="javascript:;">专家帮助</a>
        </div>
        <div class="content">            
            <ul>
                <li style="display:block;">

                	<a href="#"><i class="layui-icon">&#xe617;</i> 什么是担保招标？</a>
                    <a href="#"><i class="layui-icon">&#xe617;</i> 什么是竞价招标？</a>
                    <a href="#"><i class="layui-icon">&#xe617;</i> 雇主如何发布任务？</a>
                    <a href="#"><i class="layui-icon">&#xe617;</i> 对服务商的服务不满意怎么办？</a>
                    <a href="#"><i class="layui-icon">&#xe617;</i> 任务已经进入制作阶段，中标人没有准时完成，要如何处理？</a>
                    <a href="#"><i class="layui-icon">&#xe617;</i> 雇主发起的任务没有响应怎么办？</a>
                    <a href="#"><i class="layui-icon">&#xe617;</i> 如何对项目进行委托代理？</a>
                    <a href="#"><i class="layui-icon">&#xe617;</i> 延期的条件有什么？如何进行延期？</a>

                </li>
                <li>

                    <a href="#"><i class="layui-icon">&#xe617;</i> 用户投标与金额限制的具体规则是什么？</a>
                    <a href="#"><i class="layui-icon">&#xe617;</i> 我参加了一个任务，为什么收到的酬金和任务金额的不一致？</a>                    
                    <a href="#"><i class="layui-icon">&#xe617;</i> 服务商如何投标？</a>
                    <a href="#"><i class="layui-icon">&#xe617;</i> 给火天信提意见和建议，能够增加服务商级别吗？</a>
                    <a href="#"><i class="layui-icon">&#xe617;</i> 服务商中标之后该如何操作？</a>
                    <a href="#"><i class="layui-icon">&#xe617;</i> 作弊与违约情况是如何处理的？</a>
         
                </li>
                <li>
                	专家申请帮助
                </li>
            </ul>
        </div>
   	</div>
<script>
<!--
$(function(){  
    /*$(".z_tabcon1 .tab a").click(function(){
        $(this).addClass('on').siblings().removeClass('on');
        var index = $(this).index();
        number = index;
		$('.z_tabcon1 .content ul li').hide();
        $('.z_tabcon1 .content ul li:eq('+index+')').show();
    });

    $(".z_tabcon2 .tab a").click(function(){
        $(this).addClass('on').siblings().removeClass('on');
        var index = $(this).index();
        number = index;
		$('.z_tabcon2 .content ul li').hide();
        $('.z_tabcon2 .content ul li:eq('+index+')').show();
    });*/

    $(".z_tabcon .tab a").click(function(){
        $(this).addClass('on').siblings().removeClass('on');
        var index = $(this).index();
        number = index;
		$('.z_tabcon .content ul li').hide();
        $('.z_tabcon .content ul li:eq('+index+')').show();
    });
});
-->
</script>

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
<?php } ?>	


