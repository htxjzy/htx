<?php session_start(); ?>
<?php
/*
Template Name: SSO接口
*/
?>
<?php
// process form data if $_POST is set
if(!isset( $_POST['htx_nonce_field_name'] )){ 
	echo '{"reg":"保存失败01"}';
	return false; 
}
	
//check nonce for security
$nonce = $_POST['htx_nonce_field_name'];
if(!wp_verify_nonce( $nonce, 'htx_nonce_field_id' )){
	echo '{"reg":"保存失败02"}';
	return false;
}

//Does the iphone exist
if(isset($_POST['iphoneIsRegistered'])){
	$iphone = $_POST['iphoneIsRegistered'];
	$iphonequery = "SELECT meta_key, meta_value FROM htx_usermeta WHERE meta_key='custom_user_mobile' AND meta_value='{$iphone}'";
	$iphone_result = $wpdb->get_results($iphonequery); 			
	if(!empty($iphone_result)){
		echo "theIphoneRegistered";
	}
}

if(isset($_POST['iphoneExistInDb'])){
	$iphone = $_POST['iphoneExistInDb'];
	$iphonequery = "SELECT meta_key, meta_value FROM htx_usermeta WHERE meta_key='custom_user_mobile' AND meta_value='{$iphone}'";
	$iphone_result = $wpdb->get_results($iphonequery); 			
	if(empty($iphone_result)){
		echo "iphoneNotInDb";
	}
}

//Does the email exist
if(isset($_POST['emailIsRegistered'])){
	$email = $_POST['emailIsRegistered'];
	$email_result = email_exists( $email );		
	if(!empty($email_result)){
		echo "theEmailRegistered";
	}
}

if(isset($_POST['emailExistInDb'])){
	$email = $_POST['emailExistInDb'];
	$email_result = email_exists( $email );				
	if(empty($email_result)){
		echo "emailNotInDb";
	}
}

//reg  Get mobile phone verification code
if(isset($_POST['phoneyanzheng'])){	
	$smscode=rand(100000, 999999);
	$_SESSION['smscode']= $smscode;
	$url="http://f.htxgcw.com/subject/htx/api/htx-api.php";
	$post="api=ServicePlatform&code={$smscode}&tel={$_POST['phoneyanzheng']}&name=火天信工程网";
	$redata=vcurl($url, $post);
	//var_dump($redata);	//直接打印json都得
}

//log  Get mobile phone verification code
if(isset($_POST['phoneyanzheng_login'])){	
	$smscode=rand(100000, 999999);
	$_SESSION['smscode']= $smscode;
	$url="http://f.htxgcw.com/subject/htx/api/htx-api.php";
	$post="api=ServicePlatformLogin&code={$smscode}&tel={$_POST['phoneyanzheng_login']}&name=火天信工程网";
	$redata=vcurl($url, $post);
	//var_dump($redata);	//直接打印json都得
}


//Get email verification code
if(isset($_POST['emailyanzheng'])){	
	$code=rand(100000, 999999);
	$_SESSION['code']= $code;
	$cont = urlencode("<div><p>您好，您在火天信工程交易中心所用的邮箱{$_POST['emailyanzheng']}的验证码为<span style='color:rgba(210,19,86,1)'>{$code}</span>，有效期30分钟，请及时完成相关操作，祝您愉快！</p><p>如果你未申请此服务，请忽略该邮件。</p><p>如果仍有问题，请拨打我们的客服热线：400-626-3980</p></div>");
	$email=urlencode($_POST['emailyanzheng']);	
	$subject=urlencode("邮箱注册");	
	$name=urlencode("火天信工程网");	
	$url="http://f.htxgcw.com/subject/htx/api/htx-api.php";
	$post="api=EmailPlatform&cont={$cont}&email={$email}&subject={$subject}&name={$name}";	
	$redata=vcurl($url, $post);
	//var_dump($redata);	//直接打印json都得
}

//Register for pop
if(isset($_POST['mod'])){		
	if($_POST['mod']=='email'){
		if($_POST['code']==$_SESSION['code']){			
			$user_login = "htx".date("ymdHis").rand(100, 999);
			
			$accept_passwd = $_POST['password2'];
			
			$userdata = array(
				'user_login'			=>$user_login,
				'user_pass'				=>$accept_passwd,
				'user_email'			=>$_POST['email'],
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

				include(TEMPLATEPATH . '/api-reg.php');	
									
				echo "regsuccess";
				$_SESSION['user_session'] = $email;
				
			}				
		}else{
			echo "validateCodeError";
		}			
	}else{
		if($_POST['smscode']==$_SESSION['smscode']){
			
			$user_login = "htx".date("ymdHis").rand(100, 999);
			
			$accept_passwd = $_POST['password'];

			$userdata = array(
				'user_login'			=>$user_login,
				'user_pass'				=>$accept_passwd,

				//'user_email'			=>$user_login.'@htxgcw.com',
				'role'					=>"contributor"	 
			);
			$userid=wp_insert_user($userdata);
			$username = $userdata['user_login'];
						
			if(!empty($userid)){
				add_user_meta($userid, 'custom_user_passwd', $accept_passwd, true);
				add_user_meta($userid, 'custom_user_mobile', $_POST['phone'], true);	
				$user = get_user_by('id', $userid);
				if($user){
					wp_set_current_user($userid, $username);
					wp_set_auth_cookie($userid);
					do_action('wp_login', $username);
				}
				
				include(TEMPLATEPATH . '/api-reg.php');			
				
				echo "regsuccess";
				$_SESSION['user_session'] = $phone;							
			}
		}else{
			echo "validateCodeError";
		}	
	}
}

//Is Login password correct for pop
if(isset($_POST['isPasswdCorrect'])){
	
	$passwordValue = $_POST['password']; 	
	$eorp = $_POST['isPasswdCorrect'];
	$checkmail="/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/";
	if(preg_match($checkmail, $eorp)){		
		$email = $eorp;
		$passwordquery = "SELECT user_pass FROM htx_users WHERE user_email = '{$email}'";				
	}else{				
		$iphone = $eorp;
		$iphonequery = "SELECT user_id FROM htx_usermeta WHERE meta_key='custom_user_mobile' AND meta_value='{$iphone}'";
		$iphone_result = $wpdb->get_row($iphonequery); 
		$user_id = $iphone_result->user_id;	
		$passwordquery = "SELECT user_pass FROM htx_users WHERE ID = '{$user_id}'";		
	}
	
	$pwd_result = $wpdb->get_row($passwordquery); 
	$pwd_value = $pwd_result->user_pass;

	global $wp_hasher;  
	if ( empty($wp_hasher) ) {  
		require_once( dirname(dirname(dirname(dirname(__FILE__)))).'/wp-includes/class-phpass.php');  
		$wp_hasher = new PasswordHash(8, TRUE);  
	} 
	//Verify password  
	$data_validate = $wp_hasher->CheckPassword($passwordValue,$pwd_value);  
	if(!$data_validate){
		echo "PasswordIsNotCorrect";
	}
	
}



//Account login for pop
if(isset($_POST['EmailOrPhone'])){
		
	$passwordValue = $_POST['txtPassword7']; 
	
	$eorp = $_POST['EmailOrPhone'];
	$checkmail="/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/";	
	
	if(preg_match($checkmail, $eorp)){
		
		$email = $eorp;
		$usernamequery = "SELECT user_login FROM htx_users WHERE user_email = '{$email}'";
		$passwordquery = "SELECT user_pass FROM htx_users WHERE user_email = '{$email}'";				
	}else{				
		$iphone = $eorp;
		$iphonequery = "SELECT user_id FROM htx_usermeta WHERE meta_key='custom_user_mobile' AND meta_value='{$iphone}'";
		$iphone_result = $wpdb->get_row($iphonequery); 
		$user_id = $iphone_result->user_id;	
		$usernamequery = "SELECT user_login FROM htx_users WHERE ID = '{$user_id}'";	
		$passwordquery = "SELECT user_pass FROM htx_users WHERE ID = '{$user_id}'";		
	}
	
	$user_session = $eorp;
		
	$username_result = $wpdb->get_row($usernamequery); 
	$username = $username_result->user_login;	

	$pwd_result = $wpdb->get_row($passwordquery); 
	$pwd_value = $pwd_result->user_pass;

	global $wp_hasher;  
	if ( empty($wp_hasher) ) {  
		require_once( dirname(dirname(dirname(dirname(__FILE__)))).'/wp-includes/class-phpass.php');  
		$wp_hasher = new PasswordHash(8, TRUE);  
	} 
	//Verify password  
	$data_validate = $wp_hasher->CheckPassword($passwordValue,$pwd_value);  
	if($data_validate){  
		$credentials['user_login'] = $username;
		$credentials['user_password'] = $passwordValue;
		wp_signon( $credentials );
		
		$_SESSION['user_session'] = $user_session;
		
		include(TEMPLATEPATH . '/api-log.php');	
		
		//echo $_SESSION['user_session'];
		header ("location:{$redirect}");
													
		//echo 'pwdsuccess'; 
		 
	}else{  
		//echo 'pwdfailure';
		$homeurl = home_url().'/other/prompt';
		header ("location:{$homeurl}");  
	} 	
	 		
}


//Quick login
if(isset($_POST['mobile']) && isset($_POST['sms-yzm'])){
		if($_POST['sms-yzm']==$_SESSION['smscode']){

			$iphone = $_POST['mobile'];
			$useridquery = "SELECT user_id FROM htx_usermeta WHERE meta_key='custom_user_mobile' AND meta_value='{$iphone}'";
			$userid_result = $wpdb->get_row($useridquery); 
			$user_id = $userid_result->user_id;		
			$usernamequery = "SELECT user_login FROM htx_users WHERE ID = '{$user_id}'";
			$username_result = $wpdb->get_row($usernamequery); 
			$username = $username_result->user_login;									
			
			$user = get_user_by('id', $user_id);
			if($user){
				wp_set_current_user($user_id, $username);
				wp_set_auth_cookie($user_id);
				do_action('wp_login', $username);
			}
			
			$_SESSION['user_session'] = $iphone;
			
			include(TEMPLATEPATH . '/api-log.php');		
			
			header ("location:{$redirect}");
					
			
			//echo "logsuccess";							
			//exit(json_encode($redata));
		}else{
			//echo "loginValidateCodeError";
			$homeurl = home_url().'/other/prompt';
			header ("location:{$homeurl}");  
		}	
}
