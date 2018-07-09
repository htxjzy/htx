<?php 
/*
Template Name: 微信支付异步返回
*/
header ( "Content-type:text/html;charset=utf-8" );
date_default_timezone_set('prc');  //Time shows Beijing time
//$xmldata=$GLOBALS['HTTP_RAW_POST_DATA'];
/**
{"out_trade_no":"180601072027489","trade_no":"4200000128201806014263729131","trade_status":"SUCCESS","buyer_email":"1434595102","notify_time":"20180601152144","total_fee":"0.01"}
**/
$postArr = $_POST;
//$outputdata = json_encode($postArr);
//file_put_contents($_SERVER['DOCUMENT_ROOT']."/ueditor/php/upload/wxpay-outputdata.txt", $outputdata);

	if(isset($postArr['trade_status']) && $postArr['trade_status']=='SUCCESS'){
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
			add_comment_meta($order_id, 'pay_type', '微信', true);
			if($order_id) echo "SUCCESS"; 
		}							
	}

