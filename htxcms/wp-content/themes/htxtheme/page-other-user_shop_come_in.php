<?php 
/*
Template Name: 我的商铺进来
*/
header ( "Content-type:text/html;charset=utf-8" );
date_default_timezone_set('prc');  //Time shows Beijing time

// process form data if $_POST is set
if(!isset( $_POST['htx_shop_nonce_field_name'] )){ 
	echo '{"reg":"店铺数据提交失败001"}';
	exit(); 
}
	
//check nonce for security
$nonce = $_POST['htx_shop_nonce_field_name'];
if(!wp_verify_nonce( $nonce, 'htx_shop_nonce_field_id' )){
	echo '{"reg":"店铺数据提交失败002"}';
	exit(); 
}
$no_prefix="HTX";

if(is_user_logged_in()){
	$cur_user = $current_user->ID;	
	$cur_shop = $wpdb->get_row("SELECT ID FROM htx_posts WHERE post_author='{$cur_user}' AND post_type='shops'");
	$shop_id = $cur_shop->ID;		
}

//An expert came in
if(!empty($_POST['like']) && isset($_POST['whosedata'])){	
	$likes = $_POST['like'];
	$whosedata = $_POST['whosedata'];
	
	if($whosedata=="per"){
		$shop_meta_arr = array(			
			'_htx_pc_name'  			=> wp_strip_all_tags($_POST['p_name']),
			'_htx_pc_front_photo'  		=> $_POST['p_front_photo'],
			'_htx_pc_back_photo'  		=> $_POST['p_back_photo'],	

			'_htx_shop_name'  			=> wp_strip_all_tags( $_POST['shop_name'] ),			
			'_htx_shop_provid'  		=> wp_strip_all_tags( $_POST['ass_must_provid'] ),
			'_htx_shop_cityid'  		=> wp_strip_all_tags( $_POST['ass_must_cityid'] ),		
			'_htx_shop_areaid'  		=> wp_strip_all_tags( $_POST['ass_must_areaid'] )
					
		);
		$shopcat = 30;				
	}

	if($whosedata=="cor"){
		$shop_meta_arr = array(			
			'_htx_pc_name'  			=> wp_strip_all_tags($_POST['c_name']),
			'_htx_pc_front_photo'  		=> $_POST['c_front_photo'],
			'_htx_pc_back_photo'  		=> $_POST['c_back_photo'],
			
			'_shop_enterprise_name'  	=> wp_strip_all_tags($_POST['c_enterprise_name']),
			'_shop_enterprise_code'  	=> wp_strip_all_tags($_POST['c_enterprise_code']),
			'_shop_enterprise_license'  => $_POST['c_enterprise_license'],				
			'_htx_shop_name'  			=> wp_strip_all_tags( $_POST['shop_name'] ),
			'_htx_shop_provid'  		=> wp_strip_all_tags( $_POST['ass_must_provid'] ),
			'_htx_shop_cityid'  		=> wp_strip_all_tags( $_POST['ass_must_cityid'] ),		
			'_htx_shop_areaid'  		=> wp_strip_all_tags( $_POST['ass_must_areaid'] )		
		);
		$shopcat = 31;				
	}

	$shop_post = array(
		'ID'							=> $shop_id,
		//'post_title'    				=> "EXP".date('is').rand(100,999),	//The title of the expert
		'post_title'    				=> wp_strip_all_tags($_POST['shop_name']),
		'post_content'  				=> str_replace( array('<?','?>'), array('',''), $_POST['shop_desc'] ),		
		'post_type'						=> 'shops',
		'post_status'   				=> 'draft',	//[ 'draft' | 'publish' | 'pending'| 'future' | 'private' | custom registered status ] // the status of post， default: 'draft'.
		'post_author'   				=> get_current_user_id(),
		'tax_input' 	  				=> array('assignmentstax' => $likes, 'shopstax' => $shopcat ),
		'meta_input'    				=> $shop_meta_arr	   
	);
	

	if( 0 !== wp_insert_post($shop_post)){
		echo '{"reg":"您好，店铺资料已更新，审核过后即发布 <i class=\"layui-icon\" style=\"font-size:30px; color:#FF5722;\">&#xe60c;</i>"}';		
		//echo '{"reg":"提交成功，审核过后即发布", "bid":"'.$_POST['bid'].'", "bigcat":"'.$_POST['bigcat'].'"}';
		return false; 	
	}
		 	
}	//end !empty($_POST['like'])