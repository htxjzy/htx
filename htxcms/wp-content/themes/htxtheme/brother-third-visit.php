<?php
//print_r($_POST);

if( isset($_POST['openid']) && isset($_POST['username']) ){
	
	if(!empty($_POST['username'])){
		$qqnickname = $_POST['qq'];
	}else{
		$qqnickname = '合作方匿名访客';	
	}
	$openid = $_POST['openid'];
	
	$qq_openid = 'qq-'.$_POST['openid'];
	
	$qq_openidquery = "SELECT meta_key, meta_value FROM htx_usermeta WHERE meta_key='custom_user_openid' AND meta_value='{$qq_openid}'";
	$qq_openid_result = $wpdb->get_results($qq_openidquery); 	
			
	if(empty($qq_openid_result)){	
	
		$auto_passwd = "autoPwd#".rand(100000, 999999);
			
		$userdata = array(
			'user_login'			=>"htx".date("ymdHis").rand(100, 999),
			'user_pass'				=>$auto_passwd			
		);
		$userid=wp_insert_user($userdata);
		$username = $userdata['user_login'];						
		if(!empty($userid)){
			add_user_meta($userid, 'custom_user_openid', $qq_openid, true);	
			add_user_meta($userid, 'custom_user_qqid', $qqnickname, true);		
		}		
	}else{
		$useridquery = "SELECT user_id FROM htx_usermeta WHERE meta_key='custom_user_openid' AND meta_value='{$qq_openid}'";
		$userid_result = $wpdb->get_row($useridquery); 
		$userid = $userid_result->user_id;
		$user = get_user_by('id', $userid);
		$username = $user->user_login;	
	
	}
	
	$user = get_user_by('id', $userid);
	if($user){
		wp_set_current_user($userid, $username);
		wp_set_auth_cookie($userid);
		do_action('wp_login', $username);
		
	
		$_SESSION['user_session'] = $qqnickname;
		
	}
	//$toUrl=home_url()."/other/user_center";
	//$toUrl=home_url();
	//header ("location:{$toUrl}");	
		
}
