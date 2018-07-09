<?php 
if(is_user_logged_in()){	
	$cur_user = $current_user->ID;
	
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
            <div class="user-head layui-clear">
                <em>
                    <img src="<?php echo get_user_meta($cur_user, 'custom_user_avatar', true); ?>" alt="" class="rpositionimg">
                </em>
                <div class="rpositiondiv">
                    <a href="/other/i_want_to_recharge" >账户充值</a>
                    <a href="/other/i_want_to_withdraw_deposit">账户提现</a>
                </div>
            </div>
            <div class="user-price">
                <h3>火天信工程网</h3>
                <span class="balance">
                    <strong>余额：</strong>
                    <span class="bc-red f18">￥ <?php echo number_format($balance, 2); ?></span>
                </span>
            </div>
            <div class="finance-nav">
                <ul>
                    <li><a href="/other/user_finance">财务明细</a></li>
                    <li><a href="/other/my_recharge_records">充值记录</a></li>
                    <!--<li><a href="/other/my_withdrawals_records">我要付款</a></li>-->
                    <!--<li><a href="/other/my_adv_fee_records">广告费用明细</a></li>-->
                    <li><a href="/other/i_want_to_recharge">我要充值</a></li>
                    <li><a href="/other/i_want_to_withdraw_deposit">我要提现</a></li>
                    <!--<li><a href="/other/my_withdrawals_records">提现记录</a></li>-->
                </ul>
            </div>