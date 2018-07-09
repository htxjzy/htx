<?php 
/*
Template Name: 专家进来
*/
header ( "Content-type:text/html;charset=utf-8" );
date_default_timezone_set('prc');  //Time shows Beijing time

// process form data if $_POST is set
if(!isset( $_POST['htx_expert_nonce_field_name'] )){ 
	echo '{"reg":"专家数据提交失败001"}';
	return false; 
}
	
//check nonce for security
$nonce = $_POST['htx_expert_nonce_field_name'];
if(!wp_verify_nonce( $nonce, 'htx_expert_nonce_field_id' )){
	echo '{"reg":"专家数据提交失败002"}';
	return false;
}
$no_prefix="HTX";

//An expert came in
if(!empty($_POST['like'])){
	
	$likes = $_POST['like'];
	
	$exp_meta_arr = array(
		
		//'_htx_exp_number_order' 		=> $no_prefix.date('ymdHis').rand(100,999),
		'_htx_exp_name'  				=> wp_strip_all_tags($_POST['exp_name']),
		'_htx_exp_sex'  				=> wp_strip_all_tags($_POST['exp_sex']),
		'_htx_exp_title'  				=> wp_strip_all_tags($_POST['exp_title']),
		'_htx_exp_project_timelimit'  	=> $_POST['exp_project_timelimit'],
		'_htx_exp_upimg'   				=> $_POST['exp_upimg'],	
		'_htx_exp_upphoto'   			=> $_POST['exp_upphoto'],
		'_htx_exp_work_project'			=> str_replace( array('<?','?>'), array('',''), $_POST['exp_work_project'] ),
		
		'_htx_exp_provid'  		=> wp_strip_all_tags( $_POST['ass_must_provid'] ),
		'_htx_exp_cityid'  		=> wp_strip_all_tags( $_POST['ass_must_cityid'] ),		
		'_htx_exp_areaid'  		=> wp_strip_all_tags( $_POST['ass_must_areaid'] ),		
	
	);


	$exp_post = array(
		//'post_title'    				=> "EXP".date('is').rand(100,999),	//The title of the expert
		'post_title'    				=> wp_strip_all_tags($_POST['exp_name']),
		'post_content'  				=> str_replace( array('<?','?>'), array('',''), $_POST['exp_desc'] ),		
		'post_type'						=> 'experts',
		'post_status'   				=> 'draft',	//[ 'draft' | 'publish' | 'pending'| 'future' | 'private' | custom registered status ] // the status of post， default: 'draft'.
		'post_author'   				=> get_current_user_id(),
		'tax_input' 	  				=> array('assignmentstax' => $likes ),
		'meta_input'    				=> $exp_meta_arr	   
	);
	

	if( 0 !== wp_insert_post($exp_post)){
		echo '{"reg":"您好，已提交申请，审核过后即发布 <i class=\"layui-icon\" style=\"font-size:30px; color:#FF5722;\">&#xe60c;</i>"}';		
		//echo '{"reg":"提交成功，审核过后即发布", "bid":"'.$_POST['bid'].'", "bigcat":"'.$_POST['bigcat'].'"}';
		return false; 	
	}
		 	
}	//end !empty($_POST['like'])