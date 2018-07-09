<?php 
//$url_this = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
if(is_user_logged_in()){
//if(!empty($_SESSION['user_session'])){	
	//echo '<a href="javascript:;">'.$_SESSION["user_session"].'</a><a href="'.wp_logout_url(get_permalink()).'">退出</a>';
	$user_id = get_currentuserinfo()->ID;
	$user_mobile = get_user_meta($user_id, 'custom_user_mobile', true);
	$user_email = get_currentuserinfo()->user_email;
	$user_login = get_currentuserinfo()->user_login;
	if(!empty($user_mobile)){
		$_SESSION["user_session"] = $user_mobile;
	}elseif(!empty($user_email)){
		$_SESSION["user_session"] = $user_email;	
	}else{
		$_SESSION["user_session"] = $user_login;
	}
	echo '<a href="/other/user_center">'.$_SESSION["user_session"].'</a><a href="/other/user_sign_out">退出</a>';
}else{
	echo '<a href="javascript:;" class="loginhtx" onclick="loginhtx(this)" >登录</a><a href="javascript:;" class="reghtx" onclick="reghtx(this)" >注册</a>';
}