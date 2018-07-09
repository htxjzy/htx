<?php 
/*
Template Name: 费用提交
*/

header ( "Content-type:text/html;charset=utf-8" );
date_default_timezone_set('prc');  //Time shows Beijing time   
?>
<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="index,follow" />
<title>扫码支付</title>
<style>
.shuoming{ margin-top:150px; text-align:center; font-size:14px; color:#666; }
#pid div{ background:#e2e2e2; width:130px; height:130px; border:1px solid #ccc; margin:0 auto; }
.biaozhu{ margin-top:12px; text-align:center; font-size:14px; color:#cc3300; }
.tishi{ margin-top:12px; text-align:center; font-size:14px; color:#666; margin-top:30px; }
</style>
</head>
<body>
<?php
//header ( "Content-type:text/html;charset=utf-8" );
//date_default_timezone_set('prc');  //Time shows Beijing time   
// process form data if $_POST is set
/**
对于支付宝
return_url.php       （跳转页面，买家支付成功后跳转的页面，仅当买家支付成功后跳转一次。）
notify_url.php       （异步通知，下单成功后，支付宝服务器通知商户服务，并把这笔订单的状态通知给商户，商户根据返回的这笔订单的状态，修改网站订单的状态，比如等待买家付款状态，买家已经付款等待卖家发货.....）
**/

if(!isset( $_POST['htx_nonce_field_name'] )){ 
	echo '{"reg":"提交失败01"}';
	return false; 
}
	
//check nonce for security
$nonce = $_POST['htx_nonce_field_name'];
if(!wp_verify_nonce( $nonce, 'htx_nonce_field_id' )){
	echo '{"reg":"提交失败02"}';
	return false;
}
   
if(!empty($_POST['whosedata'])){
	
	$cur_user = $current_user->ID;
	$subject_code = $_POST['subject_code'];
	$total_fee = $_POST['total_fee'];

	$pay = $_POST['whosedata'];
	if($pay=='alipay'){
		
		$submit_html  = '<form action="http://newjob.htxgcw.com/alipay/pay.php" method="POST" id="aliFormm">';
		$submit_html .= '<input type="hidden" name="callback_url" value="'.home_url().'/other/alisreturn?act=alidata"/>'; 
		$submit_html .= '<input type="hidden" name="subject" value="火天信工程交易中心"/>'; 
		$submit_html .= '<input type="hidden" name="out_trade_no" value="'.date('ymdHis').mt_rand(100, 999).'-'.$subject_code.'-'.$cur_user.'"/>'; 
		$submit_html .= '<input type="hidden" name="total_fee" value="'.$total_fee.'"/>'; 
		$submit_html .= '<input type="hidden" name="fw" value="fw"/>'; 
		$submit_html .= '<input type="hidden" name="pay" value="alipay"/>'; 
		$submit_html .= '</form>';
		$submit_html .= '<script>document.getElementById("aliFormm").submit();</script>';
		
		echo $submit_html;
	
	}else{
		
		echo '<p class="shuoming">请用微信扫码支付</p><div id="pid"></div><p class="biaozhu">火天信工程交易中心</p><p class="tishi">支付完成后，点击这里<a href="/other/user_finance">查看财务记录</a></p>';

		$subject="火天信工程交易中心";	
		$out_trade_no=date('ymdHis').mt_rand(100, 999).'-'.$subject_code.'-'.$cur_user;  
		$total_fee =trim($total_fee*100);
		$tag=trim("div");	
		$id="pid";  
		$size="10";
		
		$url="http://newjob.htxgcw.com/weixinapi/pay.php?pay=weixin_fw";
		$post = 'subject='.$subject.'&out_trade_no='.$out_trade_no.'&total_fee='.$total_fee.'&tag='.$tag.'&id='.$id.'&size='.$size;
		
		$get_img_js = vcurl($url, $post);
		echo $get_img_js;
		
	}
}
?>
</body>
</html>