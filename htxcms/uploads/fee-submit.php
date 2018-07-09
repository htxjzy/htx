<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="index,follow" />
<title>扫码支付</title>
</head>
<body>
<div id="pid"></div> 
</body>
</html>
<?php
//header ( "Content-type:text/html;charset=utf-8" );
//date_default_timezone_set('prc');  //Time shows Beijing time  
//External communication function - SMS authentication
function vcurl($url, $post = '', $cookie = '', $cookiejar = '', $referer = '') {
	$tmpInfo = '';
	$cookiepath = getcwd () . '. / ' . $cookiejar;
	$curl = curl_init ();
	curl_setopt ( $curl, CURLOPT_URL, $url );
	curl_setopt ( $curl, CURLOPT_USERAGENT, $_SERVER ['HTTP_USER_AGENT'] );
	if ($referer) {
		curl_setopt ( $curl, CURLOPT_REFERER, $referer );
	} else {
		curl_setopt ( $curl, CURLOPT_AUTOREFERER, 1 );
	}
	if ($post) {
		curl_setopt ( $curl, CURLOPT_POST, 1 );
		curl_setopt ( $curl, CURLOPT_POSTFIELDS, $post );
	}
	if ($cookie) {
		curl_setopt ( $curl, CURLOPT_COOKIE, $cookie );
	}
	if ($cookiejar) {
		curl_setopt ( $curl, CURLOPT_COOKIEJAR, $cookiepath );
		curl_setopt ( $curl, CURLOPT_COOKIEFILE, $cookiepath );
	}
	// curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt ( $curl, CURLOPT_TIMEOUT, 100 );
	curl_setopt ( $curl, CURLOPT_HEADER, 0 );
	curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
	$tmpInfo = curl_exec ( $curl );
	if (curl_errno ( $curl )) {
		// echo ' < pre > < b > 错误: < /b><br / > ' . curl_error ( $curl );
	}
	curl_close ( $curl );
	return $tmpInfo;
}
     

if( isset($_GET['pay2']) && $_GET['pay2']=="alipay" ){

	/*$subject="服务费";	
	$out_trade_no=rand(1000, 9999);  
	$total_fee =trim(0.01);
	//$callback_url="http://www.huotianxin.com/other/alisreturn?fwjy=123";
	$callback_url="http://www.huotianxin.com/htxcms/uploads/alireturn.php?act=123";
	$fw="fw";  
	$url="http://newjob.htxgcw.com/alipay/pay.php?pay2=alipay";
	$post = 'subject='.$subject.'&out_trade_no='.$out_trade_no.'&total_fee='.$total_fee.'&callback_url='.$callback_url.'&fw='.$fw;
	
	$get_img_js = vcurl($url, $post);
	echo $get_img_js;*/

$html  = '<form action="http://newjob.htxgcw.com/alipay/pay.php 

" method="POST" id="frm">';
$html .= '<input type="hidden" name="callback_url" value="http://127.0.0.1/htxdata/getdata.php?act=data"/>'; 
$html .= '<input type="hidden" name="subject" value="火天信"/>'; 
$html .= '<input type="hidden" name="out_trade_no" value="HTX'.mt_rand(10000, 99999).'"/>'; 
$html .= '<input type="hidden" name="total_fee" value="0.01"/>'; 
$html .= '<input type="hidden" name="fw" value="fw"/>'; 
$html .= '<input type="hidden" name="pay" value="alipay"/>'; 
$html .= '</form>';
$html .= '<script>document.getElementById("frm").submit();</script>';

echo $html;


	

}else{

	$subject="服务费";	
	$out_trade_no=rand(1000, 9999);  
	$total_fee =trim(0.01*100);
	$tag=trim("div");	
	$id="pid";  
	$size="10";
	
	$url="http://newjob.htxgcw.com/weixinapi/pay.php?pay=weixin_fw";
	$post = 'subject='.$subject.'&out_trade_no='.$out_trade_no.'&total_fee='.$total_fee.'&tag='.$tag.'&id='.$id.'&size='.$size;
	
	$get_img_js = vcurl($url, $post);
	echo $get_img_js;

}
?>