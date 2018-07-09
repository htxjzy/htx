<?php
	$passwordValue = $postArr['passwd']; 	
    global $wp_hasher;  
    if ( empty($wp_hasher) ) {  
    	require_once( dirname(dirname(dirname(dirname(__FILE__)))).'/wp-includes/class-phpass.php');  
     	$wp_hasher = new PasswordHash(8, TRUE);  
    }  
    $againPassword = $wp_hasher->HashPassword($passwordValue); 
	 
	if(!empty($postArr['email'])){
		
		$email = $postArr['email'];
		$useridquery = "SELECT ID FROM htx_users WHERE user_email = '{$email}'";		
		$userid_result = $wpdb->get_row($useridquery); 
		$user_id = $userid_result->ID;	
				
		$wpdb->update( 'htx_users', array( 'user_pass' => $againPassword ), array( 'ID' => $user_id ), array( '%s' ), array( '%d' ));	
		update_user_meta($user_id, 'custom_user_passwd', $passwordValue);
						
	}else{
		$phone = $postArr['phone'];
		$useridquery = "SELECT user_id FROM htx_usermeta WHERE meta_key='custom_user_mobile' AND meta_value='{$phone}'";
		$userid_result = $wpdb->get_row($useridquery); 
		$user_id = $userid_result->user_id;		
			
		$wpdb->update( 'htx_users', array( 'user_pass' => $againPassword ), array( 'ID' => $user_id ), array( '%s' ), array( '%d' ));
		update_user_meta($user_id, 'custom_user_passwd', $passwordValue);
					
	}//end else
