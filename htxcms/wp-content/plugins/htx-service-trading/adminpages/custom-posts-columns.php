<?php
function add_bo_style_for_custom_posts_columns(){
	echo '<link rel="stylesheet" type="text/css" href="'.home_url().'/p/css/admin/bo-custom-posts-columns.css?ver=1.7">';
}
add_action('admin_head', 'add_bo_style_for_custom_posts_columns');

//custom post type assignments columns
//The order of rearranging the fields
add_filter( 'manage_assignments_posts_columns', 'htx_assignments_custom_columns_order' );
add_action( 'manage_assignments_posts_custom_column', 'htx_assignments_custom_columns_output', 10, 2 );
function htx_assignments_custom_columns_order( $columns ){
    $new_columns_order = array(
        'cb' 						=> $columns['cb'],
        'title'						=> __( '任务标题' ),
        'ass_number_order' 			=> __( 'ID' ),
		'assignmentsmode'			=> __( '发布形式' ),
		'assignmentstax'			=> __( '任务分类' ),		
		'assignmentsstatus' 		=> __( '任务状态' ),	
        '_htx_ass_fei' 				=> __( '费预算(元)' ),		
        'author' 					=> __( '雇主' ),
		'_htx_ass_bid_end' 			=> __( '距投止期' ),	
		'bidcount'					=> __( '投标数' ),
        '_htx_ass_accept_fee' 		=> __( '已收费(元)' ),
		'_htx_ass_exp_candidates' 	=> __( '可选专家' ),
		'_htx_ass_exp_selected' 	=> __( '选中专家' ),
		'_htx_ass_winning_bidder'	=> __( '中标者' ),	
		'_htx_ass_make_start'		=> __( '动工日' ),
		
		'_htx_ass_must_provid' 		=> __( '要求省' ),
        '_htx_ass_must_cityid' 		=> __( '要求市' ),
			
		'final_editor'				=> __( '终编者' ),	
        'date'						=> __( '上线日期' )
    );
    return $new_columns_order;
}
//$post_id is a variable that can be defined arbitrarily, but its value must be the ID of the post.
function htx_assignments_custom_columns_output( $column_name, $post_id ){
    switch( $column_name ){
        /*case "ass_title" :
            // Retrieve data and echo result
            $ass_title = get_post_meta( $post_id, '_htx_ass_title', true );
            echo $ass_title;
            break;*/
        case "ass_number_order" :
            // Retrieve data and echo result
            $ass_number_order = $post_id;
            echo $ass_number_order;
            break;
        case "assignmentsmode" :
            // Retrieve data and echo result
			$terms = wp_get_object_terms($post_id, 'assignmentsmode', array('fields'=>'all') );
			$admindir = admin_url().'edit.php?post_type=assignments&assignmentsmode=';
			foreach($terms as $term){
				$linkname .= "<a href='".$admindir.$term->slug."'>".$term->name."</a>, ";
			}
			$linkname = rtrim($linkname, ', ');
			echo $linkname;
            break;
        case "assignmentstax" :
			$terms = wp_get_object_terms($post_id, 'assignmentstax', array('fields'=>'all') );
			$admindir = admin_url().'edit.php?post_type=assignments&assignmentstax=';
			foreach($terms as $term){
				$linkname .= "<a href='".$admindir.$term->slug."'>".$term->name."</a>, ";
			}
			$linkname = rtrim($linkname, ', ');
			echo $linkname;
            break;
        case "assignmentsstatus" :
            // Retrieve data and echo result
			$terms = wp_get_object_terms($post_id, 'assignmentsstatus', array('fields'=>'all') );
			$admindir = admin_url().'edit.php?post_type=assignments&assignmentsstatus=';
			foreach($terms as $term){
				$linkname .= "<a href='".$admindir.$term->slug."'>".$term->name."</a>, ";
			}
			$linkname = rtrim($linkname, ', ');
			echo $linkname;
            break;
        case "_htx_ass_fei" :
            // Retrieve data and echo result
            $ass_fei = get_post_meta( $post_id, '_htx_ass_fei', true );
            echo $ass_fei;
            break;
        case "_htx_ass_bid_end" :
            // Retrieve data and echo result
			date_default_timezone_set('prc');  //Time shows Beijing time
            $ass_bid_end = get_post_meta( $post_id, '_htx_ass_bid_end', true );
			$distance = strtotime($ass_bid_end)-time();
			if($distance>0){
			echo dtime2second($distance);
			}else{
				echo "0";
			}
            break;
		case "bidcount" :
			$bid_args = array(
				'type'			=> 'bid',
				//'status '	=> 'all', //default all
				'post_id' 		=> $post_id,	
				'count' 		=> true //return only the count
			);
			$total_bid_num = get_comments($bid_args); 			
			echo $total_bid_num;
			break;
        case "_htx_ass_accept_fee" :
            // Retrieve data and echo result
            $ass_accept_fee = get_post_meta( $post_id, '_htx_ass_accept_fee', true );
			echo '<a href="/htxcms/wp-admin/edit.php?post_type=experts&page=bo_recommend_experts_slug&assid='.$post_id.'" target="_blank" title="分配候选专家">'.$ass_accept_fee.'</a>';
            break;
        case "_htx_ass_exp_candidates" :
            // Retrieve data and echo result
            $ass_exp_candidates = get_post_meta( $post_id, '_htx_ass_exp_candidates', true );
			echo $ass_exp_candidates;
            break;
        case "_htx_ass_exp_selected" :
            // Retrieve data and echo result
            $ass_exp_selected = get_post_meta( $post_id, '_htx_ass_exp_selected', true );
			echo $ass_exp_selected;
            break;									
        case "_htx_ass_winning_bidder" :
            // Retrieve data and echo result
            $ass_winning_bidder = get_post_meta( $post_id, '_htx_ass_winning_bidder', true );
            echo $ass_winning_bidder;
            break;
		case "_htx_ass_make_start":
			$ass_make_start = get_post_meta( $post_id, '_htx_ass_make_start', true );
			echo $ass_make_start;
			break;
        case "_htx_ass_must_provid" :
            // Retrieve data and echo result
            $htx_ass_must_provid = get_post_meta( $post_id, '_htx_ass_must_provid', true );			
            echo $htx_ass_must_provid;
            break;
        case "_htx_ass_must_cityid" :
            // Retrieve data and echo result
            $htx_ass_must_cityid = get_post_meta( $post_id, '_htx_ass_must_cityid', true );			
            echo $htx_ass_must_cityid;
            break;		
        case "final_editor" :
            // Retrieve data and echo result
            $final_editor = get_post_meta( $post_id, '_final_editor', true );
            echo $final_editor;
            break;
    }
}

//Another already declared in functions.php
/*function dtime2second($seconds){
	$seconds = (int)$seconds;
	if( $seconds>3600 ){
		if( $seconds>24*3600 ){
			$days		= (int)($seconds/86400);
			$days_num	= $days."天";
			$seconds	= $seconds%86400;//remainder
		}
		$hours = intval($seconds/3600);
		$minutes = $seconds%3600;//Get the remaining seconds
		//$dtime = $days_num.$hours."小时".gmstrftime('%M分钟%S秒', $minutes);
		$dtime = $days_num.$hours."小时";
	}else{
		//$dtime = gmstrftime('%H小时%M分钟%S秒', $seconds);
		$dtime = gmstrftime('%H小时', $seconds);
	}
	return $dtime;
}*/

//The order of the field of _htx_ass_fei - START
add_filter( 'manage_edit-assignments_sortable_columns', 'htx_sortable_columns' );
function htx_sortable_columns( $columns ) {
    $columns['_htx_ass_fei'] = '_htx_ass_fei';
    $columns['_htx_ass_accept_fee'] = '_htx_ass_accept_fee';
	
    $columns['_htx_ass_must_provid'] = '_htx_ass_must_provid';
    $columns['_htx_ass_must_cityid'] = '_htx_ass_must_cityid';
		
    return $columns;
}

//Only when the administrator is at 'edit.php', it is handled
add_action( 'load-edit.php', 'htx_edit_assignments_load' );  
function htx_edit_assignments_load(){  
    add_filter( 'request', 'htx_sort_assignments' );  
}  
//assignments sorting
function htx_sort_assignments( $vars ) {  
    //It is assignments to judge whether or not to browse
    if ( isset( $vars['post_type'] ) && 'assignments' == $vars['post_type'] ) { 
	 
        //See if the _htx_ass_fei has been sorted
        if ( isset( $vars['orderby'] ) && '_htx_ass_fei' == $vars['orderby'] ) {  
            //Add custom sort to $vars
            $vars = array_merge(  
                $vars,  
                array(  
                    'meta_key' => '_htx_ass_fei',
					//Meta_value_num is sorted after being forced into a digital type  
                    'orderby' => 'meta_value_num'
                )  
            );  
        }  
		
       //See if the _htx_ass_accept_fee has been sorted
        if ( isset( $vars['orderby'] ) && '_htx_ass_accept_fee' == $vars['orderby'] ) {  
            //Add custom sort to $vars
            $vars = array_merge(  
                $vars,  
                array(  
                    'meta_key' => '_htx_ass_accept_fee',
					//Meta_value_num is sorted after being forced into a digital type  
                    'orderby' => 'meta_value_num'
                )  
            );  
        } 
		
        if ( isset( $vars['orderby'] ) && '_htx_ass_must_provid' == $vars['orderby'] ) {  
            //Add custom sort to $vars
            $vars = array_merge(  
                $vars,  
                array(  
                    'meta_key' => '_htx_ass_must_provid',
					//Meta_value_num is sorted after being forced into a digital type  
                    'orderby' => 'meta_value'
                )  
            );  
        }  
		
       //See if the _htx_shop_cityid has been sorted
        if ( isset( $vars['orderby'] ) && '_htx_ass_must_cityid' == $vars['orderby'] ) {  
            //Add custom sort to $vars
            $vars = array_merge(  
                $vars,  
                array(  
                    'meta_key' => '_htx_ass_must_cityid',
					//Meta_value_num is sorted after being forced into a digital type  
                    'orderby' => 'meta_value'
                )  
            );  
        }  				 		
				
    }  
    return $vars;  
}  
//The order of the field of _htx_ass_fei - END



//custom post type experts columns
//The order of rearranging the fields
add_filter( 'manage_experts_posts_columns', 'htx_experts_custom_columns_order' );
add_action( 'manage_experts_posts_custom_column', 'htx_experts_custom_columns_output', 10, 2 );
function htx_experts_custom_columns_order( $columns ){
    $new_columns_order = array(
        'cb' 						=> $columns['cb'],
		'title'						=> __( '标题' ),
		'thumbnail'					=> __( '形象照' ),
		'expert_id' 				=> __( 'ID' ),		
		//'_htx_exp_number_order' 	=> __( '编号' ),
        '_htx_exp_name' 			=> __( '姓名' ),		
        '_htx_exp_title' 			=> __( '职称' ),
        '_htx_exp_project_timelimit'=> __( '工龄' ),		
        'assignmentstax' 			=> __( '擅长' ),
        '_htx_exp_star' 			=> __( '星级' ),	
        '_htx_exp_work_times' 		=> __( '把关次数' ),
		'author' 					=> __( '用户名' ),	
        'exp_mobile' 				=> __( '手机号' ),
		'exp_email' 				=> __( '邮箱' ),			
        '_htx_exp_provid' 			=> __( '所在省' ),
        '_htx_exp_cityid' 			=> __( '所在市' ),
        '_htx_exp_areaid' 			=> __( '所在区/县' ),
		'final_editor'				=> __( '终编者' ),				
        'date' 						=> __( '上线日期' ),
    );
    return $new_columns_order;
}
//$post_id is a variable that can be defined arbitrarily, but its value must be the ID of the post.
function htx_experts_custom_columns_output( $column_name, $post_id ){
    switch( $column_name ){
        case "thumbnail" :
            // Retrieve data and echo result
            the_post_thumbnail('thumbnail');		
            break;	
        case "expert_id" :
            // Retrieve data and echo result
			$expert_id = $post_id; 
			echo $expert_id;           	
            break;				
        /*case "_htx_exp_number_order" :
            // Retrieve data and echo result
            $htx_exp_number_order = get_post_meta( $post_id, '_htx_exp_number_order', true );			
            echo $htx_exp_number_order;
            break;*/
        case "_htx_exp_name" :
            // Retrieve data and echo result
            $htx_exp_name = get_post_meta( $post_id, '_htx_exp_name', true );			
            echo $htx_exp_name;
            break;
        case "_htx_exp_title" :
            // Retrieve data and echo result
            $htx_exp_title = get_post_meta( $post_id, '_htx_exp_title', true );			
            echo $htx_exp_title;
            break;			
        case "_htx_exp_project_timelimit" :
            // Retrieve data and echo result
            $htx_exp_project_timelimit = get_post_meta( $post_id, '_htx_exp_project_timelimit', true );			
            echo $htx_exp_project_timelimit;
            break;			
        case "assignmentstax" :
			$terms = wp_get_object_terms($post_id, 'assignmentstax', array('fields'=>'all') );
			$admindir = admin_url().'edit.php?post_type=experts&assignmentstax=';
			foreach($terms as $term){
				$linkname .= "<a href='".$admindir.$term->slug."'>".$term->name."</a>, ";
			}
			$linkname = rtrim($linkname, ', ');
			echo $linkname;
            break;
        case "exp_mobile" :
            // Retrieve data and echo result
			$post = get_post($post_id);
			$user = get_user_by('id', $post->post_author);
            $exp_mobile = get_user_meta( $user->ID, 'custom_user_mobile', ture );			
            echo $exp_mobile;
            break;	
        case "exp_email" :
            // Retrieve data and echo result
			$post = get_post($post_id);
			$user = get_user_by('id', $post->post_author);
            $exp_email = $user->user_email;			
            echo $exp_email;
            break;	
        case "_htx_exp_provid" :
            // Retrieve data and echo result
            $htx_exp_provid = get_post_meta( $post_id, '_htx_exp_provid', true );			
            echo $htx_exp_provid;
            break;
        case "_htx_exp_cityid" :
            // Retrieve data and echo result
            $htx_exp_cityid = get_post_meta( $post_id, '_htx_exp_cityid', true );			
            echo $htx_exp_cityid;
            break;
        case "_htx_exp_areaid" :
            // Retrieve data and echo result
            $htx_exp_areaid = get_post_meta( $post_id, '_htx_exp_areaid', true );			
            echo $htx_exp_areaid;
            break;			
        case "final_editor" :
            // Retrieve data and echo result
            $final_editor = get_post_meta( $post_id, '_final_editor', true );
            echo $final_editor;
            break;					

    }
}

//The order of the field of _htx_exp_provid and _htx_exp_cityid - START
add_filter( 'manage_edit-experts_sortable_columns', 'exp_sortable_columns' );
function exp_sortable_columns( $columns ) {
    $columns['_htx_exp_provid'] = '_htx_exp_provid';
    $columns['_htx_exp_cityid'] = '_htx_exp_cityid';
    return $columns;
}

//Only when the administrator is at 'edit.php', it is handled
add_action( 'load-edit.php', 'htx_edit_experts_load' );  
function htx_edit_experts_load(){  
    add_filter( 'request', 'htx_sort_experts' );  
}  
//experts sorting
function htx_sort_experts( $vars ) {  
    //It is experts to judge whether or not to browse
    if ( isset( $vars['post_type'] ) && 'experts' == $vars['post_type'] ) {  
        //See if the _htx_exp_provid has been sorted
        if ( isset( $vars['orderby'] ) && '_htx_exp_provid' == $vars['orderby'] ) {  
            //Add custom sort to $vars
            $vars = array_merge(  
                $vars,  
                array(  
                    'meta_key' => '_htx_exp_provid',
					//Meta_value_num is sorted after being forced into a digital type  
                    'orderby' => 'meta_value'
                )  
            );  
        }  
		
       //See if the _htx_exp_cityid has been sorted
        if ( isset( $vars['orderby'] ) && '_htx_exp_cityid' == $vars['orderby'] ) {  
            //Add custom sort to $vars
            $vars = array_merge(  
                $vars,  
                array(  
                    'meta_key' => '_htx_exp_cityid',
					//Meta_value_num is sorted after being forced into a digital type  
                    'orderby' => 'meta_value'
                )  
            );  
        }  		
				
    }  
    return $vars;  
}  
//The order of the field of _htx_exp_provid and _htx_exp_cityid - END

//custom post type shops columns
//The order of rearranging the fields
add_filter( 'manage_shops_posts_columns', 'htx_shops_custom_columns_order' );
add_action( 'manage_shops_posts_custom_column', 'htx_shops_custom_columns_output', 10, 2 );
function htx_shops_custom_columns_order( $columns ){
    $new_columns_order = array(
        'cb' 						=> $columns['cb'],
		'title'						=> __( '标题' ),
		'_htx_shop_logo'			=> __( '商铺LOGO' ),
		'shop_id' 					=> __( 'ID' ),		
        '_htx_shop_name' 			=> __( '商铺名称' ),
		'shopstax' 					=> __( '分类' ),			
        'assignmentstax' 			=> __( '擅长' ),
		'author' 					=> __( '用户名' ),
        'shop_mobile' 				=> __( '手机号' ),
		'shop_email' 				=> __( '邮箱' ),		
        '_htx_shop_provid' 			=> __( '所在省' ),
        '_htx_shop_cityid' 			=> __( '所在市' ),
        '_htx_shop_areaid' 			=> __( '所在区/县' ),
		'final_editor'				=> __( '终编者' ),				
        'date' 						=> __( '上线日期' ),
    );
    return $new_columns_order;
}
//$post_id is a variable that can be defined arbitrarily, but its value must be the ID of the post.
function htx_shops_custom_columns_output( $column_name, $post_id ){
    switch( $column_name ){
        case "_htx_shop_logo" :
            // Retrieve data and echo result
            $shop_logo_url=get_post_meta( $post_id, '_htx_shop_logo', true );
			echo '<img src="'.$shop_logo_url.'" width="88" height="88" />';		
            break;	
        case "shop_id" :
            // Retrieve data and echo result
			$shop_id = $post_id; 
			echo $shop_id;           	
            break;				
        case "_htx_shop_name" :
            // Retrieve data and echo result
            $htx_shop_name = get_post_meta( $post_id, '_htx_shop_name', true );			
            echo $htx_shop_name;
            break;	
        case "shopstax" :
			$terms = wp_get_object_terms($post_id, 'shopstax', array('fields'=>'all') );
			$admindir = admin_url().'edit.php?post_type=shops&shopstax=';
			foreach($terms as $term){
				$linkname .= "<a href='".$admindir.$term->slug."'>".$term->name."</a>, ";
			}
			$linkname = rtrim($linkname, ', ');
			echo $linkname;
            break;			
        case "assignmentstax" :
			$terms = wp_get_object_terms($post_id, 'assignmentstax', array('fields'=>'all') );
			$admindir = admin_url().'edit.php?post_type=shops&assignmentstax=';
			foreach($terms as $term){
				$linkname .= "<a href='".$admindir.$term->slug."'>".$term->name."</a>, ";
			}
			$linkname = rtrim($linkname, ', ');
			echo $linkname;
            break;
        case "shop_mobile" :
            // Retrieve data and echo result
			$post = get_post($post_id);
			$user = get_user_by('id', $post->post_author);
            $shop_mobile = get_user_meta( $user->ID, 'custom_user_mobile', ture );			
            echo $shop_mobile;
            break;	
        case "shop_email" :
            // Retrieve data and echo result
			$post = get_post($post_id);
			$user = get_user_by('id', $post->post_author);
            $shop_email = $user->user_email;			
            echo $shop_email;
            break;	
        case "_htx_shop_provid" :
            // Retrieve data and echo result
            $htx_shop_provid = get_post_meta( $post_id, '_htx_shop_provid', true );			
            echo $htx_shop_provid;
            break;
        case "_htx_shop_cityid" :
            // Retrieve data and echo result
            $htx_shop_cityid = get_post_meta( $post_id, '_htx_shop_cityid', true );			
            echo $htx_shop_cityid;
            break;
        case "_htx_shop_areaid" :
            // Retrieve data and echo result
            $htx_shop_areaid = get_post_meta( $post_id, '_htx_shop_areaid', true );			
            echo $htx_shop_areaid;
            break;			
        case "final_editor" :
            // Retrieve data and echo result
            $final_editor = get_post_meta( $post_id, '_final_editor', true );
            echo $final_editor;
            break;					

    }
}

//The order of the field of _htx_shop_provid and _htx_shop_cityid - START
add_filter( 'manage_edit-shops_sortable_columns', 'shop_sortable_columns' );
function shop_sortable_columns( $columns ) {
    $columns['_htx_shop_provid'] = '_htx_shop_provid';
    $columns['_htx_shop_cityid'] = '_htx_shop_cityid';
    return $columns;
}

//Only when the administrator is at 'edit.php', it is handled
add_action( 'load-edit.php', 'htx_edit_shops_load' );  
function htx_edit_shops_load(){  
    add_filter( 'request', 'htx_sort_shops' );  
}  
//shops sorting
function htx_sort_shops( $vars ) {  
    //It is shops to judge whether or not to browse
    if ( isset( $vars['post_type'] ) && 'shops' == $vars['post_type'] ) {  
        //See if the _htx_shop_provid has been sorted
        if ( isset( $vars['orderby'] ) && '_htx_shop_provid' == $vars['orderby'] ) {  
            //Add custom sort to $vars
            $vars = array_merge(  
                $vars,  
                array(  
                    'meta_key' => '_htx_shop_provid',
					//Meta_value_num is sorted after being forced into a digital type  
                    'orderby' => 'meta_value'
                )  
            );  
        }  
		
       //See if the _htx_shop_cityid has been sorted
        if ( isset( $vars['orderby'] ) && '_htx_shop_cityid' == $vars['orderby'] ) {  
            //Add custom sort to $vars
            $vars = array_merge(  
                $vars,  
                array(  
                    'meta_key' => '_htx_shop_cityid',
					//Meta_value_num is sorted after being forced into a digital type  
                    'orderby' => 'meta_value'
                )  
            );  
        }  		
				
    }  
    return $vars;  
}  
//The order of the field of _htx_shop_provid and _htx_shop_cityid - END