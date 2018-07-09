<?php
	if(!empty($postArr['email'])){
		$email_result = email_exists( $postArr['email'] );		
		if(empty($email_result)){
			$email = $postArr['email'];
			$user_login = "htx".date("ymdHis").rand(100, 999);
			$accept_passwd = $postArr['passwd'];					
			$userdata = array(
				'user_login'			=>$user_login,
				'user_pass'				=>$accept_passwd,
				'user_email'			=>$email,
				'role'					=>"contributor"	//role: A string used to set the user's role. 
			);
			$userid=wp_insert_user($userdata);
			$username = $userdata['user_login'];
			if(!empty($userid)){
				
				add_user_meta($userid, 'custom_user_passwd', $accept_passwd, true);
				
				$user = get_user_by('id', $userid);
				if($user){
					wp_set_current_user($userid, $username);
					wp_set_auth_cookie($userid);
					do_action('wp_login', $username);
				}
				$_SESSION['user_session'] = $email;				
			}				
		}else{
			$user = get_user_by( 'email', $email );
			$username = $user->user_login;
			$userid = $user->ID;			
			if($user){
				wp_set_current_user($userid, $username);
				wp_set_auth_cookie($userid);
				do_action('wp_login', $username);
			}			
			$_SESSION['user_session'] = $email;				
		}			
	}

	if(!empty($postArr['phone'])){
		$phone = $postArr['phone'];
		$phonequery = "SELECT meta_key, meta_value FROM htx_usermeta WHERE meta_key='custom_user_mobile' AND meta_value='{$phone}'";
		$phone_result = $wpdb->get_results($phonequery); 			
		if(empty($phone_result)){
			$user_login = "htx".date("ymdHis").rand(100, 999);			
			$accept_passwd = $postArr['passwd'];
			$userdata = array(
				'user_login'			=>$user_login,
				'user_pass'				=>$accept_passwd,
				'role'					=>"contributor"	 
			);
			$userid=wp_insert_user($userdata);
			$username = $userdata['user_login'];						
			if(!empty($userid)){
				add_user_meta($userid, 'custom_user_passwd', $accept_passwd, true);
				add_user_meta($userid, 'custom_user_mobile', $phone, true);	
				$user = get_user_by('id', $userid);
				if($user){
					wp_set_current_user($userid, $username);
					wp_set_auth_cookie($userid);
					do_action('wp_login', $username);
				}				
				$_SESSION['user_session'] = $phone;										
			}	
		}else{
			$useridquery = "SELECT user_id FROM htx_usermeta WHERE meta_key='custom_user_mobile' AND meta_value='{$phone}'";
			$userid_result = $wpdb->get_row($useridquery); 
			$userid = $userid_result->user_id;
			$usernamequery = "SELECT user_login FROM htx_users WHERE ID = '{$userid}'";	
			$username_result = $wpdb->get_row($usernamequery);
			$username = $username_result->user_login;				
						
			$user = get_user_by('id', $userid);
						
			if($user){
				wp_set_current_user($userid, $username);
				wp_set_auth_cookie($userid);
				do_action('wp_login', $username);
			}							
			
			$_SESSION['user_session'] = $phone;						
		}			
	}
