<?php 
/*
Template Name: 任务更新
*/
header ( "Content-type:text/html;charset=utf-8" );
date_default_timezone_set('prc');  //Time shows Beijing time

// process form data if $_POST is set
if(!isset( $_POST['htx_submission_nonce_field_name'] )){ 
	echo '{"reg":"提交失败001"}';
	exit();
}
	
//check nonce for security
$nonce = $_POST['htx_submission_nonce_field_name'];
if(!wp_verify_nonce( $nonce, 'htx_submission_nonce_field_id' )){
	echo '{"reg":"提交失败002"}';
	exit();
}
$no_prefix="HTX";

if(is_user_logged_in()){
	$cur_user = $current_user->ID;	
	$ass_id = $_POST['ass_id'];
	$author = get_post($ass_id)->post_author ;
	if($cur_user == $author){
		
		//Insert one assignment
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
			
			$ass_meta_arr = array(
				
				//'_htx_ass_number_order' 		=> $no_prefix.date('ymdHis').rand(100,999),
				'_htx_ass_title'  				=> wp_strip_all_tags( $_POST['ass_title'] ),
				'_htx_ass_bigcat_id'  			=> $_POST['bigcat'],
				'_htx_ass_subcat_id'  			=> $_POST['subcat'],		//Subclassification name 
				'_htx_ass_fei'   				=> $_POST['ass_fei'],		
				'_htx_ass_url'   				=> wp_strip_all_tags( $_POST['ass_url'] ),
				'_htx_ass_make_url'   			=> wp_strip_all_tags( $_POST['ass_make_url'] ),		
				'_htx_ass_must_provid'  		=> wp_strip_all_tags( $_POST['ass_must_provid'] ),
				'_htx_ass_must_cityid'  		=> wp_strip_all_tags( $_POST['ass_must_cityid'] ),		
				'_htx_ass_must_areaid'  		=> wp_strip_all_tags( $_POST['ass_must_areaid'] ),		
				'_htx_ass_scale'   				=> wp_strip_all_tags( $_POST['ass_scale'] ),
				'_htx_ass_bid_end'   			=> $_POST['ass_bid_end'],
				'_htx_ass_make_start'   		=> $_POST['ass_make_start'],
				'_htx_ass_project_timelimit'   	=> $_POST['ass_project_timelimit'],
				'_htx_ass_work_demand'  		=> wp_strip_all_tags( $_POST['ass_work_demand'] ),
				'_htx_ass_quali_demand' 		=> wp_strip_all_tags( $_POST['ass_quali_demand'] ),
				'_htx_ass_now_have'   			=> wp_strip_all_tags( $_POST['ass_now_have'] ),		
			);
		
		
			$ass_post = array(
				'ID'							=> $ass_id,
				'post_title'    				=> wp_strip_all_tags( $_POST['ass_title'] ),	//The title of the assignment
				'post_content'  				=> str_replace( array('<?','?>'), array('',''), $_POST['ass_desc'] ),
				'post_type'						=> 'assignments',
				'post_status'   				=> 'draft',	//[ 'draft' | 'publish' | 'pending'| 'future' | 'private' | custom registered status ] // the status of post， default: 'draft'.
				'post_author'   				=> get_current_user_id(),
				'tax_input' 	  				=> array('assignmentsmode' => $_POST['bid'], 'assignmentstax' => $_POST['bigcat'], 'assignmentsstatus' => 23 ),
				'meta_input'    				=> $ass_meta_arr	   
			);
			
		
			if( 0 !== wp_insert_post($ass_post)){
				echo '{"reg":"更新成功，审核过后即发布 <i class=\"layui-icon\" style=\"font-size:30px; color:#FF5722;\">&#xe60c;</i>"}';		
				//echo '{"reg":"提交成功，审核过后即发布", "bid":"'.$_POST['bid'].'", "bigcat":"'.$_POST['bigcat'].'"}';
				return false; 	
			}
					
		}	//end !empty($_POST['bigcat'])

	}// end $cur_user == $author

}	//end is_user_logged_in()
