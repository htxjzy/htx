<?php
/*
Template Name: 用户数据跳转
*/

//unset($_SESSION['user_session']);

IndexUnifiedLogin();

// 统一登录

function IndexUnifiedLogin()
{
	session_start();
	$eorp = $_GET['user'];
	//$checkmail="/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/";
	/*if(preg_match($checkmail, $eorp)){		
		$email = $eorp;
		$email_result = email_exists( $email );	
		if($email_result){
			$_SESSION['user_session'] = $eorp;
		}		
					
	}else{				
		$iphone = $eorp;
		$iphonequery = "SELECT user_id FROM gcw_usermeta WHERE meta_key='custom_user_mobile' AND meta_value='{$iphone}'";
		$iphone_result = $wpdb->get_row($iphonequery); 
		if(!$iphone_result){
			$_SESSION['user_session'] = $eorp;
		}	
	}*/
	$_SESSION['user_session'] = $eorp;
		
	
	if(empty($_SESSION['user_session'])){
		
		// 删除我的cookie以便退出框架
		unset($_SESSION['user_session']);
		wp_clear_auth_cookie();		
			
	}
	
	//$callb_url = $_GET['user']==null?home_url():home_url.'?user='.$_GET['user'];
	$callb_url = $_GET['callb_url']==null?home_url():$_GET['callb_url'];
		
	header('location:'.$callb_url);
}
