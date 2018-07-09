<?php session_start(); ?>
<?php
/*
Template Name: 数据处理
*/
?>
<?php
//header ( "Content-type:text/html;charset=utf-8" );
// process form data if $_POST is set
date_default_timezone_set('prc');  //Time shows Beijing time
if(!isset( $_POST['htx_nonce_field_name'] )){ 
	echo '{"reg":"保存失败01"}';
	exit();
}
	
//check nonce for security
$nonce = $_POST['htx_nonce_field_name'];
if(!wp_verify_nonce( $nonce, 'htx_nonce_field_id' )){
	echo '{"reg":"保存失败02"}';
	exit();
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

//reg Get mobile phone verification code
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

//forget password  Get mobile phone verification code
if(isset($_POST['phoneyanzheng_pwd'])){	
	$smscode=rand(100000, 999999);
	$_SESSION['smscode']= $smscode;
	$url="http://f.htxgcw.com/subject/htx/api/htx-api.php";
	$post="api=RetrieveThePassword&code={$smscode}&tel={$_POST['phoneyanzheng_pwd']}&name=火天信工程网";
	$redata=vcurl($url, $post);
	//var_dump($redata);	//直接打印json都得
}

//Get email verification code
if(isset($_POST['emailyanzheng'])){	
	$code=rand(100000, 999999);
	$_SESSION['code']= $code;
	$cont = urlencode("<div><p>您好，您在火天信工程网所用的邮箱{$_POST['emailyanzheng']}的验证码为<span style='color:rgba(210,19,86,1)'>{$code}</span>，有效期30分钟，请及时完成相关操作，祝您愉快！</p><p>如果你未申请此服务，请忽略该邮件。</p><p>如果仍有问题，请拨打我们的客服热线：400-626-3980</p></div>");
	$email=urlencode($_POST['emailyanzheng']);	
	$subject=urlencode("邮箱注册");	
	$name=urlencode("火天信工程网");	
	$url="http://f.htxgcw.com/subject/htx/api/htx-api.php";
	$post="api=EmailPlatform&cont={$cont}&email={$email}&subject={$subject}&name={$name}";	
	$redata=vcurl($url, $post);
	//var_dump($redata);	//直接打印json都得
}

//Register
if(isset($_POST['mod'])){		
	if($_POST['mod']=='email'){
		$email = $_POST['email'];
		if($_POST['code']==$_SESSION['code']){			
			$user_login = "htx".date("ymdHis").rand(100, 999);
			
			$accept_passwd = $_POST['password2'];
			
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

				include(TEMPLATEPATH . '/api-reg.php');		
									
				
				$_SESSION['user_session'] = $email;
				
				echo "regsuccess";
				
			}				
		}else{
			echo "validateCodeError";
		}			
	}else{
		if($_POST['smscode']==$_SESSION['smscode']){
			
			$phone = $_POST['phone'];
			
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
				add_user_meta($userid, 'custom_user_mobile', $phone, true);	
				$user = get_user_by('id', $userid);
				if($user){
					wp_set_current_user($userid, $username);
					wp_set_auth_cookie($userid);
					do_action('wp_login', $username);
				}
				
				include(TEMPLATEPATH . '/api-reg.php');							
				
				$_SESSION['user_session'] = $phone;	
				
				echo "regsuccess";
										
			}
		}else{
			echo "validateCodeError";
		}	
	}
}

//Account login
//Check whether it is Ajax submission
if(isset($_POST['emailOrIphone'])){
		
	$passwordValue = $_POST['password']; 
	
	$eorp = $_POST['emailOrIphone'];	
	
	if($eorp == 'email'){
		$email = $_POST['username'];
		$usernamequery = "SELECT user_login FROM htx_users WHERE user_email = '{$email}'";
		$passwordquery = "SELECT user_pass FROM htx_users WHERE user_email = '{$email}'";				
	}else{				
		$iphone = $_POST['username'];
		
		$useridquery = "SELECT user_id FROM htx_usermeta WHERE meta_key='custom_user_mobile' AND meta_value='{$iphone}'";
		$userid_result = $wpdb->get_row($useridquery); 
		$user_id = $userid_result->user_id;	
		$usernamequery = "SELECT user_login FROM htx_users WHERE ID = '{$user_id}'";	
		$passwordquery = "SELECT user_pass FROM htx_users WHERE ID = '{$user_id}'";		
	}
	
	$user_session = $_POST['username'];
	
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
	$data = $wp_hasher->CheckPassword($passwordValue,$pwd_value);  
	if($data){  
		$credentials['user_login'] = $username;
		$credentials['user_password'] = $passwordValue;
		wp_signon( $credentials );

				
		$_SESSION['user_session'] = $user_session;

		include(TEMPLATEPATH . '/api-log.php');
									
		echo 'pwdsuccess'; 
		 
	}else{  
		echo 'pwdfailure';  
	} 	
	 		
}


//Quick login
if(isset($_POST['loginPhone']) && isset($_POST['loginSmscode'])){
		if($_POST['loginSmscode']==$_SESSION['smscode']){

			$iphone = $_POST['loginPhone'];
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
			
			echo "logsuccess";							
			//exit(json_encode($redata));
		}else{
			echo "loginValidateCodeError";
		}	
}


//Retrieve the password
if(isset($_POST['modForgetPwd'])){
	
	if($_POST['modForgetPwd']=='email'){
		if($_POST['code']==$_SESSION['code']){	
			$email = $_POST['email'];
			$emailquery = "SELECT user_email FROM htx_users WHERE user_email = '{$email}'";
			$email_result = $wpdb->get_results($emailquery); 			
			if(!empty($email_result)){
				echo "thiscodeOK";
			}else{
				echo "该邮箱不存在";
			}											
		}else{
			echo "邮箱验证码错误";
		}			
	}else{
		if($_POST['smscode']==$_SESSION['smscode']){
			$iphone = $_POST['iphone'];
			$iphonequery = "SELECT meta_key, meta_value FROM htx_usermeta WHERE meta_key='custom_user_mobile' AND meta_value='{$iphone}'";
			$iphone_result = $wpdb->get_results($iphonequery); 			
			if(!empty($iphone_result)){
				echo "thiscodeOK";
			}else{
				echo "该手机号不存在";
			}
		}else{
			echo "手机验证码错误";
		}	
	}
	
}

//submit the new password
if(isset($_POST['againPassword'])){
	
	$passwordValue = $_POST['againPassword']; 	
     global $wp_hasher;  
     if ( empty($wp_hasher) ) {  
     require_once( dirname(dirname(dirname(dirname(__FILE__)))).'/wp-includes/class-phpass.php');  
     	$wp_hasher = new PasswordHash(8, TRUE);  
     }  
     $againPassword = $wp_hasher->HashPassword($passwordValue);  
			
	if(isset($_SESSION['txtEmail']) && !empty($_SESSION['txtEmail'])){
		$txtEmail = $_SESSION['txtEmail'];
		
		$usernamequery = "SELECT ID, user_login FROM htx_users WHERE user_email = '{$txtEmail}'";		
		$username_result = $wpdb->get_row($usernamequery); 
		$username = $username_result->user_login;
		
		$user_id = $username_result->ID;
		$passwd = get_user_meta($user_id, 'custom_user_passwd', true);	
				
		//$sql = "UPDATE htx_users SET user_pass = %s WHERE user_email = %s";
		//$result = $wpdb->query($wpdb->prepare($sql, $againPassword, $txtEmail));		
		
		//$result = $wpdb->update( 'htx_users', array( 'user_pass' => $againPassword, 'user_url' => $passwordValue ), array( 'user_email' => $txtEmail ), array( '%s', '%s' ), array( '%s' ));	
		$result = $wpdb->update( 'htx_users', array( 'user_pass' => $againPassword ), array( 'user_email' => $txtEmail ), array( '%s' ), array( '%s' ));
		
		$updatepwd = update_user_meta($user_id, 'custom_user_passwd', $passwordValue);		
		
		if(!empty($result)){
			
			include(TEMPLATEPATH . '/api-pwd.php');
			
			echo "resetpwdOK";
			
			unset($_SESSION['txtEmail']);
			exit();	
		}
		
						
	}else{
		$txtiPhone = $_SESSION['txtiPhone'];

		$useridquery = "SELECT user_id FROM htx_usermeta WHERE meta_key='custom_user_mobile' AND meta_value='{$txtiPhone}'";
		
		$userid_result = $wpdb->get_row($useridquery); 
		$user_id = $userid_result->user_id;			
		$usernamequery = "SELECT user_login FROM htx_users WHERE ID = '{$user_id}'";		
		$username_result = $wpdb->get_row($usernamequery); 
		$username = $username_result->user_login;	
					
		//$sql2 = "UPDATE htx_users SET user_pass = %s WHERE ID = %d";
		//$result2 = $wpdb->query($wpdb->prepare($sql2, $againPassword, $user_id));
		
		
		$result = $wpdb->update( 'htx_users', array( 'user_pass' => $againPassword ), array( 'ID' => $user_id ), array( '%s' ), array( '%d' ));		
		$updatepwd = update_user_meta($user_id, 'custom_user_passwd', $passwordValue);	
		
		
		if(!empty($result)){
			
			include(TEMPLATEPATH . '/api-pwd.php');
			
			echo "resetpwdOK";	
			
			unset($_SESSION['txtiPhone']);
						
			exit();		
		}	
	}
}


//seo list page data proccess
if(isset($_POST['htx_home_title'])){
	update_option( 'htx_home_title', strip_tags($_POST['htx_home_title']) );
	update_option( 'htx_home_keywords', strip_tags($_POST['htx_home_keywords']) );
	update_option( 'htx_home_description', strip_tags($_POST['htx_home_description']) );
	echo '{"reg":"保存成功"}';
	return false;  
}

if(isset($_POST['htx_experts_title'])){
	update_option( 'htx_experts_title', strip_tags($_POST['htx_experts_title']) );
	update_option( 'htx_experts_keywords', strip_tags($_POST['htx_experts_keywords']) );
	update_option( 'htx_experts_description', strip_tags($_POST['htx_experts_description']) );
	echo '{"reg":"保存成功"}';
	return false;  
}

if(isset($_POST['htx_assignments_big_title'])){
	update_option( 'htx_assignments_big_title', strip_tags($_POST['htx_assignments_big_title']) );
	update_option( 'htx_assignments_big_keywords', strip_tags($_POST['htx_assignments_big_keywords']) );
	update_option( 'htx_assignments_big_description', strip_tags($_POST['htx_assignments_big_description']) );
	echo '{"reg":"保存成功"}';
	return false;  
}

if(isset($_POST['htx_assignmentstax_consulting_title'])){
	update_option( 'htx_assignmentstax_consulting_title', strip_tags($_POST['htx_assignmentstax_consulting_title']) );
	update_option( 'htx_assignmentstax_consulting_keywords', strip_tags($_POST['htx_assignmentstax_consulting_keywords']) );
	update_option( 'htx_assignmentstax_consulting_description', strip_tags($_POST['htx_assignmentstax_consulting_description']) );
	
	update_option( 'htx_assignmentstax_investigation_title', strip_tags($_POST['htx_assignmentstax_investigation_title']) );
	update_option( 'htx_assignmentstax_investigation_keywords', strip_tags($_POST['htx_assignmentstax_investigation_keywords']) );
	update_option( 'htx_assignmentstax_investigation_description', strip_tags($_POST['htx_assignmentstax_investigation_description']) );	

	update_option( 'htx_assignmentstax_design_title', strip_tags($_POST['htx_assignmentstax_design_title']) );
	update_option( 'htx_assignmentstax_design_keywords', strip_tags($_POST['htx_assignmentstax_design_keywords']) );
	update_option( 'htx_assignmentstax_design_description', strip_tags($_POST['htx_assignmentstax_design_description']) );	
	
	update_option( 'htx_assignmentstax_bidding_title', strip_tags($_POST['htx_assignmentstax_bidding_title']) );
	update_option( 'htx_assignmentstax_bidding_keywords', strip_tags($_POST['htx_assignmentstax_bidding_keywords']) );
	update_option( 'htx_assignmentstax_bidding_description', strip_tags($_POST['htx_assignmentstax_bidding_description']) );	
	
	update_option( 'htx_assignmentstax_cost_title', strip_tags($_POST['htx_assignmentstax_cost_title']) );
	update_option( 'htx_assignmentstax_cost_keywords', strip_tags($_POST['htx_assignmentstax_cost_keywords']) );
	update_option( 'htx_assignmentstax_cost_description', strip_tags($_POST['htx_assignmentstax_cost_description']) );	
	
	update_option( 'htx_assignmentstax_supervision_title', strip_tags($_POST['htx_assignmentstax_supervision_title']) );
	update_option( 'htx_assignmentstax_supervision_keywords', strip_tags($_POST['htx_assignmentstax_supervision_keywords']) );
	update_option( 'htx_assignmentstax_supervision_description', strip_tags($_POST['htx_assignmentstax_supervision_description']) );	
	
	update_option( 'htx_assignmentstax_construction_title', strip_tags($_POST['htx_assignmentstax_construction_title']) );
	update_option( 'htx_assignmentstax_construction_keywords', strip_tags($_POST['htx_assignmentstax_construction_keywords']) );
	update_option( 'htx_assignmentstax_construction_description', strip_tags($_POST['htx_assignmentstax_construction_description']) );	
	
	update_option( 'htx_assignmentstax_finance_title', strip_tags($_POST['htx_assignmentstax_finance_title']) );
	update_option( 'htx_assignmentstax_finance_keywords', strip_tags($_POST['htx_assignmentstax_finance_keywords']) );
	update_option( 'htx_assignmentstax_finance_description', strip_tags($_POST['htx_assignmentstax_finance_description']) );	
	
	update_option( 'htx_assignmentstax_valuation_title', strip_tags($_POST['htx_assignmentstax_valuation_title']) );
	update_option( 'htx_assignmentstax_valuation_keywords', strip_tags($_POST['htx_assignmentstax_valuation_keywords']) );
	update_option( 'htx_assignmentstax_valuation_description', strip_tags($_POST['htx_assignmentstax_valuation_description']) );	
	
	update_option( 'htx_assignmentstax_rest_title', strip_tags($_POST['htx_assignmentstax_rest_title']) );
	update_option( 'htx_assignmentstax_rest_keywords', strip_tags($_POST['htx_assignmentstax_rest_keywords']) );
	update_option( 'htx_assignmentstax_rest_description', strip_tags($_POST['htx_assignmentstax_rest_description']) );	
	
	echo '{"reg":"保存成功"}';
	return false;  
}

/*if(isset($_POST['htx_notices_title'])){
	update_option( 'htx_notices_title', strip_tags($_POST['htx_notices_title']) );
	update_option( 'htx_notices_keywords', strip_tags($_POST['htx_notices_keywords']) );
	update_option( 'htx_notices_description', strip_tags($_POST['htx_notices_description']) );
	echo '{"reg":"保存成功"}';
	return false;  
}*/

if(isset($_POST['htx_shops_title'])){
	update_option( 'htx_shops_title', strip_tags($_POST['htx_shops_title']) );
	update_option( 'htx_shops_keywords', strip_tags($_POST['htx_shops_keywords']) );
	update_option( 'htx_shops_description', strip_tags($_POST['htx_shops_description']) );
	echo '{"reg":"保存成功"}';
	return false;  
}

/*if(isset($_POST['htx_voices_title'])){
	update_option( 'htx_voices_title', strip_tags($_POST['htx_voices_title']) );
	update_option( 'htx_voices_keywords', strip_tags($_POST['htx_voices_keywords']) );
	update_option( 'htx_voices_description', strip_tags($_POST['htx_voices_description']) );
	echo '{"reg":"保存成功"}';
	return false;  
}*/

/*if(isset($_POST['htx_stories_title'])){
	update_option( 'htx_stories_title', strip_tags($_POST['htx_stories_title']) );
	update_option( 'htx_stories_keywords', strip_tags($_POST['htx_stories_keywords']) );
	update_option( 'htx_stories_description', strip_tags($_POST['htx_stories_description']) );
	echo '{"reg":"保存成功"}';
	return false;  
}*/

/*if(isset($_POST['htx_news_title'])){
	update_option( 'htx_news_title', strip_tags($_POST['htx_news_title']) );
	update_option( 'htx_news_keywords', strip_tags($_POST['htx_news_keywords']) );
	update_option( 'htx_news_description', strip_tags($_POST['htx_news_description']) );
	echo '{"reg":"保存成功"}';
	return false;  
}*/

//basic list page data proccess
if(isset($_POST['htx_platform_state'])){
	update_option( 'htx_platform_state', strip_tags($_POST['htx_platform_state']) );
	update_option( 'htx_service_phone', strip_tags($_POST['htx_service_phone']) );
	update_option( 'htx_service_qq', strip_tags($_POST['htx_service_qq']) );
	update_option( 'htx_wxfw_erweima', strip_tags($_POST['htx_wxfw_erweima']) );
	update_option( 'htx_wxdy_erweima', strip_tags($_POST['htx_wxdy_erweima']) );	
	echo '{"reg":"保存成功"}';
	return false;  
}

//bid validate user condiction
if(!empty($_POST['bid_valid_provinceAndcity']) && !empty($_POST['cur_user_id'])){
	$ass_id = $_POST['bid_valid_provinceAndcity'];
	$cur_userid = $_POST['cur_user_id'];	
	$shop_obj = $wpdb->get_row("SELECT ID FROM htx_posts WHERE post_type='shops' AND post_author='{$cur_userid}'");
	if(empty($shop_obj)){
		echo '请先申请开通商铺，开通商铺的服务商方可进行<br/>投标，请点击<a title="去开通商铺" class="iopenshop" target="_blank" href="/other/shop">开通商铺</a>';
	}else{
		$shop_id = $shop_obj->ID;
		$req_provid = trim(get_post_meta( $ass_id, '_htx_ass_must_provid', true ));
		$req_cityid = trim(get_post_meta( $ass_id, '_htx_ass_must_cityid', true ));
		$shop_provid = trim(get_post_meta( $shop_id, '_htx_shop_provid', true ));
		$shop_cityid = trim(get_post_meta( $shop_id, '_htx_shop_cityid', true ));	
		if( ($req_provid!='不限' && $req_provid!=$shop_provid) || ($req_cityid!='不限' && $req_cityid!=$shop_cityid)){
			echo '商铺所在省市和该任务要求的不符！ <i class="layui-icon" style="font-size:30px; color:#FF5722;">&#xe69c;</i>';		
		}else{
			$ass_cat_arr = wp_get_object_terms($ass_id, 'assignmentstax', array('fields'=>'names')); 
			$ass_cat = $ass_cat_arr[0]; 
			$shop_be_good_at_arr = wp_get_object_terms($shop_id, 'assignmentstax', array('fields'=>'names'));
			if(!in_array($ass_cat, $shop_be_good_at_arr)){
				echo '任务属于【'.$ass_cat.'】，不是商铺<br/>所擅长的领域 <i class="layui-icon" style="font-size:30px; color:#FF5722;">&#xe69c;</i>';
			}else{
				echo 'youcanbid';
			}
		}		
	}
}

//bid submit
if(!empty($_POST['bid_desc'])){
	$biddata = array(
		'comment_post_ID'   => $_POST['bid_for_id'] ,
		'user_id'			=> get_current_user_id(),
		'comment_content'	=> str_replace( array('<?','?>'), array('',''), $_POST['bid_desc'] ),
		'comment_date'		=> date('Y-m-d H:i:s'),
		'comment_type'		=> 'bid',
		'comment_approved'	=> 0			
	);
	$bid_id = wp_insert_comment( $biddata );	
	add_comment_meta($bid_id, '_bid_price', $_POST['bid_price'], true);
	add_comment_meta($bid_id, '_bid_work_period', $_POST['bid_work_period'], true);	
	if($bid_id){
		echo '{"reg":"标投过去了，审核过后即显示 <i class=\"layui-icon\" style=\"font-size:30px; color:#FF5722;\">&#xe6af;</i> "}';		
		return false; 		
	} 	
}

//get winbidder
if(isset($_POST['authorid'])&& isset($_POST['cpostid']) ){
	$userid = $_POST['authorid'];
	$user = get_user_by( 'id', $userid );
	$winbidder_name = $user->user_login;	
	$comment_post_id = $_POST['cpostid'];
	if(update_post_meta( $comment_post_id, '_htx_ass_winning_bidder', $winbidder_name )){
		date_default_timezone_set('prc');  //Time shows Beijing time
		update_post_meta( $comment_post_id, '_htx_ass_bid_end', date('Y-m-d', time())) ;
		wp_set_object_terms( $comment_post_id, array(26), 'assignmentsstatus');	//bidopening end
		
/***
一旦任务状态变成“开标中”，可在此发送一封邮件或站内信通知中标的服务商（让服务商确定项目制作的起始时间）；另外，（审核后）一旦任务文章的状态变成发布，则发送一封邮件或站内信通知招标的雇主；（审核后）一旦投标文章的状态变成发布，则发送一封邮件或站内信通知投标的服务商。
***/		
		echo "设置中标成功 <i class=\"layui-icon\" style=\"font-size:30px; color:#FF5722;\">&#xe6af;</i>";						
	}	
}

//accept want to delete the ID of a bid from BO
if(!empty($_POST['delete_bid_id'])){
	if(wp_delete_comment($_POST['delete_bid_id'], true))
	echo "已成功删除ID为".$_POST['delete_bid_id']."的投标帖子 <i class=\"layui-icon\" style=\"font-size:30px; color:#FF5722;\">&#xe6af;</i>";
}

//accept want to delete the ID of a user from BO
if(!empty($_POST['delete_user_id'])){
	global $wpdb;
	if(wp_delete_user($_POST['delete_user_id']))
	echo "已成功删除ID为".$_POST['delete_user_id']."的会员 <i class=\"layui-icon\" style=\"font-size:30px; color:#FF5722;\">&#xe6af;</i>";
}


//accept save_bid_id
if(!empty($_POST['save_bid_id'])){	
	$save_bid_id = $_POST['save_bid_id'];
	$bid_price = $_POST['bid_price'];
	$bid_work_period = $_POST['bid_work_period'];
	$bid_desc = $_POST['edit_bid_desc'];
	//$final_editor = $_POST['final_editor'];
	
	$comment_meta = array(
		'_bid_price'			=> $bid_price,
		'_bid_work_period'		=> $bid_work_period,
		//'_final_editor'			=> $final_editor
	);

	$args = array(
		'comment_ID' 			=> $save_bid_id,
		'comment_meta'			=> $comment_meta,
	);
	
	wp_update_comment($args);
	
	//Referencing the wp-config.php file to get the database information
	require (dirname(dirname(dirname(dirname(__FILE__))))."/wp-config.php");
	$con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Connection server error：".mysql_error());
    mysql_query("SET NAMES 'UTF8'");
    mysql_select_db(DB_NAME, $con) or die("Connection database error：".mysql_error());
	
	$new_content = str_replace( array('<?','?>'), array('',''), $bid_desc );
	$update_sql = "UPDATE htx_comments SET comment_content='{$new_content}' WHERE comment_ID='{$save_bid_id}'";
	$bool_result = mysql_query($update_sql);
	mysql_close($con);
	
	//$wpdb->update( 'htx_comments', array( 'comment_content' => $bid_desc ), array( 'comment_ID' => $save_bid_id ), array( '%s' ), array( '%d' ) );
	
	echo "更新成功 <i class=\"layui-icon\" style=\"font-size:30px; color:#FF5722;\">&#xe6af;</i>";

	/*if(!empty(wp_update_comment($args))){	//内容相同不更新
		echo "更新成功 <i class=\"layui-icon\" style=\"font-size:30px; color:#FF5722;\">&#xe6af;</i>";
	}else{
		echo "更新失败 <i class=\"layui-icon\" style=\"font-size:30px; color:#FF5722;\">&#xe69c;</i>";
	}*/	
}

//accept save_bid_id_for_bo
if(!empty($_POST['save_bid_id_for_bo'])){	
	$save_bid_id = $_POST['save_bid_id_for_bo'];
	//$bid_price = $_POST['bid_price'];
	//$bid_work_period = $_POST['bid_work_period'];
	$bid_desc = $_POST['update_bid_desc'];
	$final_editor = $_POST['final_editor'];
	
	$comment_meta = array(
		//'_bid_price'			=> $bid_price,
		//'_bid_work_period'		=> $bid_work_period,
		'_final_editor'			=> $final_editor
	);

	$args = array(
		'comment_ID' 			=> $save_bid_id,
		'comment_content' 		=> $bid_desc,
		'comment_meta'			=> $comment_meta,
	);
	
	wp_update_comment($args);
	echo "更新成功 <i class=\"layui-icon\" style=\"font-size:30px; color:#FF5722;\">&#xe6af;</i>";
}


//accept pass_bid_id from BO
if(!empty($_POST['pass_bid_id'])){
	$pass_bid_id = $_POST['pass_bid_id'];
	$final_editor = $_POST['final_editor'];
	$comment_meta = array(
		'_bid_modified'			=> date('Y-m-d H:i:s'),
		'_final_editor'			=> $final_editor
	);

	$args = array(
		'comment_ID' 			=> $pass_bid_id,
		'comment_approved' 		=> 1,
		'comment_meta'			=> $comment_meta,
	);

	wp_update_comment($args);
	echo "发布成功 <i class=\"layui-icon\" style=\"font-size:30px; color:#FF5722;\">&#xe6af;</i>";
	//echo "发布失败 <i class=\"layui-icon\" style=\"font-size:30px; color:#FF5722;\">&#xe69c;</i>";

}

//accept bidder_comment_id_for_confirm_time
if(!empty($_POST['bidder_comment_id_for_confirm_time'])){
	$comment_id = $_POST['bidder_comment_id_for_confirm_time'];
	
	if(update_comment_meta($comment_id, 'bidder_conform_start_time', 1)){
		$post_id = get_comment($comment_id)->comment_post_ID;	
		wp_set_object_terms($post_id, 27, 'assignmentsstatus' ); //making 	
		echo "确认时间成功 <i class=\"layui-icon\" style=\"font-size:30px; color:#FF5722;\">&#xe6af;</i>";		
	}else{
		echo "确认完工失败 <i class=\"layui-icon\" style=\"font-size:30px; color:#FF5722;\">&#xe69c;</i>";	
	}	
}

//accept bidder_comment_id_for_confirm_finish
if(!empty($_POST['bidder_comment_id_for_confirm_finish'])){
	$comment_id = $_POST['bidder_comment_id_for_confirm_finish'];
	
	if(update_comment_meta($comment_id, 'bidder_conform_finish', 1)){
		$post_id = get_comment($comment_id)->comment_post_ID;	
		wp_set_object_terms($post_id, 28, 'assignmentsstatus' ); //finished 	
		echo "确认完工成功 <i class=\"layui-icon\" style=\"font-size:30px; color:#FF5722;\">&#xe6af;</i>";		
	}else{
		echo "确认完工失败 <i class=\"layui-icon\" style=\"font-size:30px; color:#FF5722;\">&#xe69c;</i>";
	}
		
}

//favorite_the_ass_id
if(!empty($_POST['favorite_the_ass_id']) && !empty($_POST['user_id']) ){
	$comment_post_id = $_POST['favorite_the_ass_id'];
	$user_id = $_POST['user_id'];	
	$favorite_args = array(
		'type'			=> 'favorite',
		'user_id'		=> $user_id,
		'count' 		=> true //return only the count
	);
	$total_favorite_num = get_comments($favorite_args); 
	if($total_favorite_num <= 20){	
		$commenttype_query = " SELECT comment_type FROM htx_comments WHERE comment_post_ID='{$comment_post_id}' AND user_id='{$user_id}' ";
		$commenttype_Arrs = $wpdb->get_results($commenttype_query);
		foreach($commenttype_Arrs as $commenttype){
			$comment_type_arr[] = $commenttype->comment_type;
		}
		if(empty($comment_type_arr) || !in_array('favorite', $comment_type_arr)){
			$favorite_data = array(
				'user_id'			=> $user_id,
				'comment_post_ID'	=> $comment_post_id,
				'comment_type'		=> 'favorite'	
			);			
			if(wp_insert_comment( $favorite_data )){
				echo "收藏成功 <i class=\"layui-icon\" style=\"font-size:30px; color:#FF5722;\">&#xe6af;</i>";
			}
		//}elseif(!in_array('favorite', $comment_type_arr) && ){
			
		}else{
			echo "已收藏 <i class=\"layui-icon\" style=\"font-size:30px; color:#FF5722;\">&#xe6af;</i>";
		}	
	}else{
		echo "收藏任务数已超过20个，请在会员中心中的'我收藏的任务'里取消关注状态过期的任务再收藏。 <i class=\"layui-icon\" style=\"font-size:30px; color:#FF5722;\">&#xe69c;</i>";
	}	
}

//accept delete_favorite_ass_id
if(!empty($_POST['delete_favorite_ass_id']) && !empty($_POST['favorite_user_id'])){
	$comment_post_id = $_POST['delete_favorite_ass_id'];
	$user_id = $_POST['favorite_user_id'];
	$commentid_query = " SELECT comment_ID FROM htx_comments WHERE comment_post_ID='{$comment_post_id}' AND user_id='{$user_id}' AND comment_type='favorite' ";
	$commentid_result = $wpdb->get_row($commentid_query);
	$comment_id = $commentid_result->comment_ID;	
	if(wp_delete_comment($comment_id, true))
	echo "已成功取消关注ID为".$_POST['delete_favorite_ass_id']."的任务 <i class=\"layui-icon\" style=\"font-size:30px; color:#FF5722;\">&#xe6af;</i>";
}


//get the IDs of the rememended experts
if(isset($_POST['ass_id'])&& isset($_POST['experts']) ){
	
	$ass_id = intval($_POST['ass_id']);		
	$exp_id_arr = array_filter($_POST['experts']);
			
	$args=array('post_type' => array('experts'), 'post__in'=>$exp_id_arr);
	$expPosts=new WP_Query($args);	
	while ($expPosts->have_posts()) : $expPosts->the_post();	//the loop start
		$canPosts .= '<a target="_blank" href="/htxcms/wp-admin/post.php?post='.$post->ID.'&action=edit">'.$post->ID.'-'.get_post_meta( $post->ID, '_htx_exp_name', true ).'</a>, ' ;	
	endwhile;
	wp_reset_postdata(); //the loop end	
	
	$current_user = get_currentuserinfo();	
	$canPosts = rtrim($canPosts, ', ').'(推荐人：'.$current_user->user_login.')';
	update_post_meta($ass_id, '_htx_ass_exp_candidates', $canPosts);
	
	$return['candidates']=$canPosts;	
	$return['reg']="设置成功，为该项目推荐的专家如上所示";
	
	exit(json_encode($return));
	
}

//get wincandidate
if(isset($_POST['wincan_id'])&& isset($_POST['this_ass_id']) ){
	if(update_post_meta( $_POST['this_ass_id'], '_htx_ass_exp_selected', $_POST['wincan_id'] )){
		
/***
一旦选定把关专家，可在此发送一封邮件或站内信通知被选的专家。
***/		
		
		echo "设置把关专家成功，可邀请TA协助在本页面下方选标 <i class=\"layui-icon\" style=\"font-size:30px; color:#FF5722;\">&#xe60c;</i>";						
	}
}


//accept IM
/*if(isset($_POST['api']) && $_POST['api']=='insertIM'){	
	$cur_user = $_POST['userid'];		
	$subject = urldecode($_POST['subject']);		
	$im_type = urldecode($_POST['im_type']);		
	$imdata = array(
		'user_id'			=> $cur_user,
		'comment_content'	=> $subject,
		'comment_date'		=> date('Y-m-d H:i:s'),
		'comment_type'		=> 'msmmail'	
	);
			
	$im_id = wp_insert_comment( $imdata );	
	add_comment_meta($im_id, 'im_type', $im_type, true);	
	add_comment_meta($im_id, 'im_reading', 0, true);

}*/


//update IM reading status
if(isset($_POST['update_read_status'])&& $_POST['update_read_status']=='updateImStatus' ){
	
	$comment_id = $_POST['comment_id'];	
	$im_reading = get_comment($comment_id)->comment_approved;
	if($im_reading==0){		
		wp_update_comment( array('comment_ID' => $comment_id, 'comment_approved' => 1) );
		echo "gray";
	}

}

//mobile auth bind
if(isset($_POST['mobile_auth']) && $_POST['mobile_auth']=='bindMobileAuth' ){
	$iphone = $_POST['mobile'];
	$iphonequery = "SELECT meta_key, meta_value FROM htx_usermeta WHERE meta_key='custom_user_mobile' AND meta_value='{$iphone}'";
	$iphone_result = $wpdb->get_results($iphonequery); 			
	if(!empty($iphone_result)){
		echo "theMobileHasBeenBind";
	}
}

if(isset($_POST['smscode_auth']) && $_POST['smscode_auth']=='getMsmcode' ){
	$smscode=mt_rand(100000, 999999);
	$_SESSION['smscode']= $smscode;
	$url="http://f.htxgcw.com/subject/htx/api/htx-api.php";
	$post="api=ServicePlatform&code={$smscode}&tel={$_POST['mobile']}&name=火天信工程交易中心";
	$redata=vcurl($url, $post);
	//var_dump($redata);	//直接打印json都得
}

if(isset($_POST['mobile_submit']) && $_POST['mobile_submit']=='mobileBind' ){
	if($_POST['msmcode']==$_SESSION['smscode']){
		if(update_user_meta($_POST['userid_auth'], 'custom_user_mobile', $_POST['mobile'])) echo '{"reg":"mobileBindSuccess"}';	
	}else{
		echo '{"reg":"msmcodeError"}';	
	}
}

//email auth bind
if(isset($_POST['email_auth']) && $_POST['email_auth']=='bindEmailAuth' ){
	$email = $_POST['email'];
	$email_result = email_exists( $email );				
	if(!empty($email_result)){
		echo "theEmailHasBeenBind";
	}
}

if(isset($_POST['emacode_auth']) && $_POST['emacode_auth']=='getEmacode' ){
	$emacode=mt_rand(100000, 999999);
	$_SESSION['emacode']= $emacode;
	$cont = urlencode("<div><p>您好，您在火天信网工程交易中心所用的邮箱{$_POST['email']}的验证码为<span style='color:rgba(210,19,86,1)'>{$emacode}</span>，有效期30分钟，请及时完成相关操作，祝您愉快！</p><p>如果你未申请此服务，请忽略该邮件。</p><p>如果仍有问题，请拨打我们的客服热线：400-626-3980</p></div>");
	$email=urlencode($_POST['email']);	
	$subject=urlencode("邮箱注册");	//这里的值不能改变
	$name=urlencode("火天信工程网");	//这里的值不能改变
	$url="http://f.htxgcw.com/subject/htx/api/htx-api.php";
	$post="api=EmailPlatform&cont={$cont}&email={$email}&subject={$subject}&name={$name}";	
	$redata=vcurl($url, $post);
	//var_dump($redata);	//直接打印json都得
}

if(isset($_POST['email_submit']) && $_POST['email_submit']=='emailBind' ){
	if($_POST['emacode']==$_SESSION['emacode']){
		$userdata = array(
			'ID'			=>$_POST['userid_auth'],
			'user_email'	=>$_POST['email']
		);
		if(wp_update_user($userdata)) echo '{"reg":"emailBindSuccess"}';	
	}else{
		echo '{"reg":"emacodeError"}';	
	}
}

//accept user account set data
if(isset($_POST['account_submit']) && $_POST['account_submit']=='accountSetting' ){
	$userid = $_POST['userid_auth'];
	if( !empty($_POST['nick_name']) && $_POST['nick_name']!=get_user_meta($userid, 'nickname', true )){
		update_user_meta($userid, 'nickname', $_POST['nick_name']);
	}
	if( !empty($_POST['avatar_upimg'])){
		update_user_meta($userid, 'custom_user_avatar', $_POST['avatar_upimg']);
	}
	if( !empty($_POST['my_slogan']) && $_POST['my_slogan']!=get_user_meta($userid, 'description', true )){
		update_user_meta($userid, 'description', $_POST['my_slogan']);
	}	
	echo '{"reg":"设置成功"}';	
}


















