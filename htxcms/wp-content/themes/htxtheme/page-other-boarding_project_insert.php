<?php 
/*
Template Name: 委托项目插入
*/
header ( "Content-type:text/html;charset=utf-8" );
date_default_timezone_set('prc');  //Time shows Beijing time

// process form data if $_POST is set
if(!isset( $_POST['htx_boarding_project_nonce_field_name'] )){ 
	echo '{"reg":"提交失败001"}';
	exit();
}
	
//check nonce for security
$nonce = $_POST['htx_boarding_project_nonce_field_name'];
if(!wp_verify_nonce( $nonce, 'htx_boarding_project_nonce_field_id' )){
	echo '{"reg":"提交失败002"}';
	exit();
}
$no_prefix="HTX";
//Insert one boarding_project
if(!empty($_POST['bigcat'])){
	
	switch($_POST['bigcat']){
		case 1 :
			$_POST['bigcat'] = 10;
			$no_prefix="HZX";
			break;
		case 2 :
			$_POST['bigcat'] = 11;
			$no_prefix="HKC";
			break;
		case 3 :
			$_POST['bigcat'] = 12;
			$no_prefix="HSJ";
			break;
		case 4 :
			$_POST['bigcat'] = 13;
			$no_prefix="HZB";
			break;
		case 5 :
			$_POST['bigcat'] = 14;
			$no_prefix="HZJ";
			break;
		case 6 :
			$_POST['bigcat'] = 15;
			$no_prefix="HJL";
			break;
		case 7 :
			$_POST['bigcat'] = 16;
			$no_prefix="HSG";
			break;
		case 8 :
			$_POST['bigcat'] = 17;
			$no_prefix="HCW";
			break;
		case 9 :
			$_POST['bigcat'] = 18;
			$no_prefix="HPG";
			break;
		case 10 :
			$_POST['bigcat'] = 19;
			$no_prefix="HQT";
			break;	
	}
	
	
	$pro_meta_arr = array(
		
		//'_htx_ass_number_order' 		=> $no_prefix.date('ymdHis').rand(100,999),
		'_htx_pro_title'  				=> wp_strip_all_tags( $_POST['ass_title'] ),
		'_htx_pro_bigcat_id'  			=> $_POST['bigcat'],
		'_htx_pro_subcat_id'  			=> $_POST['subcat'],		//Subclassification name 
		'_htx_pro_fei'   				=> $_POST['ass_fei'],		
		'_htx_pro_url'   				=> wp_strip_all_tags( $_POST['ass_url'] ),
		'_htx_pro_make_url'   			=> wp_strip_all_tags( $_POST['ass_make_url'] ),			
		'_htx_pro_scale'   				=> wp_strip_all_tags( $_POST['ass_scale'] ),
		'_htx_pro_make_start'   		=> $_POST['ass_make_start'],
		'_htx_pro_project_timelimit'   	=> $_POST['ass_project_timelimit'],
		'_htx_pro_work_demand'  		=> wp_strip_all_tags( $_POST['ass_work_demand'] ),
		'_htx_pro_now_have'   			=> wp_strip_all_tags( $_POST['ass_now_have'] ),		
	);


	$pro_post = array(
		'post_title'    				=> wp_strip_all_tags( $_POST['ass_title'] ),	//The title of the assignment
		'post_content'  				=> str_replace( array('<?','?>'), array('',''), $_POST['ass_desc'] ),
		'post_type'						=> 'projects',
		'post_status'   				=> 'draft',	//[ 'draft' | 'publish' | 'pending'| 'future' | 'private' | custom registered status ] // the status of post， default: 'draft'.
		'post_author'   				=> get_current_user_id(),
		'tax_input' 	  				=> array('assignmentstax' => $_POST['bigcat'], 'projectsstatus' => 32),
		'meta_input'    				=> $pro_meta_arr	   
	);
	

	if( 0 !== wp_insert_post($pro_post)){
		echo '{"reg":"提交成功，审核过后即制作 <i class=\"layui-icon\" style=\"font-size:30px; color:#FF5722;\">&#xe60c;</i>"}';		
		//echo '{"reg":"提交成功，审核过后即发布", "bid":"'.$_POST['bid'].'", "bigcat":"'.$_POST['bigcat'].'"}';
		return false; 	
	}
		 	
}	//end !empty($_POST['bigcat'])