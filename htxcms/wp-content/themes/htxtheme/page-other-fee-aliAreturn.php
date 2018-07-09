<?php 
/*
Template Name: 支付宝异步返回
*/
header ( "Content-type:text/html;charset=utf-8" );
date_default_timezone_set('prc');  //Time shows Beijing time
/**
{"out_trade_no":"180602160958166-1-36","trade_no":"2018060221001004090534752783","trade_status":"TRADE_SUCCESS","buyer_email":"159****9062","notify_time":"2018-06-01 16:10:32","total_fee":"0.03"}
**/

	$postArr = $_POST;
	//$outputdata = json_encode($postArr);
	//file_put_contents($_SERVER['DOCUMENT_ROOT']."/ueditor/php/upload/alipay-outputdata.txt", $outputdata);
	
	if(isset($postArr['trade_status']) && $postArr['trade_status']=='TRADE_SUCCESS'){
		
		$comArr = explode('-', $postArr['out_trade_no']);
		$cur_user = $comArr[2];
		$subject_code = $comArr[1];		
		$out_trade_no = $comArr[0];
		
		$out_trade_no_query = "SELECT meta_value FROM htx_commentmeta WHERE meta_key='out_trade_no' AND meta_value='{$out_trade_no}'";	
		$out_trade_no_result = $wpdb->get_results($out_trade_no_query); 			
		if(empty($out_trade_no_result) && !empty($cur_user) && !empty($subject_code)){
				
			$total_fee = $postArr['total_fee'];
			
			if($subject_code==3){
				$subject = '消费';
				$ordertype = 'consume';
			}
			if($subject_code==1){
				$subject = '充值';
				$ordertype = 'recharge';
			}
			if($subject_code==2){
				$subject = '收获';
				$ordertype = 'gain';
			}
			
			$orderdata = array(
				'user_id'			=> $cur_user,
				'comment_content'	=> $subject,
				'comment_date'		=> date('Y-m-d H:i:s'),
				'comment_type'		=> $ordertype	
			);
			
			$order_id = wp_insert_comment( $orderdata );	
			add_comment_meta($order_id, 'sum_money', $total_fee, true);
			add_comment_meta($order_id, 'out_trade_no', $out_trade_no, true);
			add_comment_meta($order_id, 'pay_type', '支付宝', true);
			if($order_id) echo "TRADE_SUCCESS"; 
		}				
	}
		




