<?php
		//sso start
		$name = $username;
				
		$emailquery = "SELECT ID, user_email FROM htx_users WHERE user_login = '{$name}'";
		$email_result = $wpdb->get_row($emailquery);
		$email = $email_result->user_email;
		
		$user_id = $email_result->ID;
		$phone = get_user_meta($user_id, 'custom_user_mobile', true);
		
		$passwd = get_user_meta($user_id, 'custom_user_passwd', true);
		
		$redirect2 =  $_REQUEST['redirect'];		
		$redirect_default = home_url();
		$redirect = $redirect2 ? $redirect2 : $redirect_default;
		
		/*$url="http://f.htxgcw.com/subject/htx/api/data-info.php";
		$post="act=LoginUserGCW&name={$name}&passwd={$passwd}&email={$email}&phone={$phone}&redirect={$redirect}";	
		vcurl($url, $post);
		
		$url2="http://job.htxgcw.com/members/sso";
		$post2="flag=log02&name={$name}&passwd={$passwd}&email={$email}&phone={$phone}&redirect={$redirect}";	
		vcurl($url2, $post2);*/
		//以上先屏蔽掉，网上正式上线后在打开
		
		//echo $name.'-'.$passwd.'-'.$email.'-'.$phone.'-'.$redirect;
		
				
		//sso end