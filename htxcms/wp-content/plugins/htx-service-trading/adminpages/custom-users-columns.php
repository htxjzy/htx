<?php
// Add additional columns to the user list
add_filter('manage_users_columns', 'add_user_additional_column');
function add_user_additional_column($columns) {	
	//Default column
	//$columns['login']  	= __('用户名');
	//$columns['name']  	= __('姓名');
	//$columns['email']  	= __('电子邮件');
	//$columns['role']  	= __('角色');
	//$columns['posts'] 	= __('文章');
	//You can only add a new column to the default columns	
    //$columns['user_url'] = '网站';
	$columns['nicename'] = '昵称';
    $columns['custom_user_mobile'] = '手机号码';
    $columns['reg_time'] = '注册时间';
    $columns['signup_ip'] = '注册IP';
    $columns['last_login'] = '上次登录';
    $columns['last_login_ip'] = '登录IP';
	
	//unset($columns['cb']); //Remove the checkbox
    unset($columns['name']);
	unset($columns['posts']);
    return $columns;
}

function get_client_ip() {
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
        $ip = getenv("HTTP_CLIENT_IP");
    else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"),
"unknown"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
        $ip = getenv("REMOTE_ADDR");
    else if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR']
&& strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
        $ip = $_SERVER['REMOTE_ADDR'];
    else
        $ip = "unknown";
    return ($ip);
}
//Create a new field to store the IP address at the time of user registration
add_action('user_register', 'log_ip');
	function log_ip($user_id){
    $ip = get_client_ip();
    update_user_meta($user_id, 'signup_ip', $ip);
}
//Create a new field to store user login time and login IP
add_action( 'wp_login', 'insert_last_login' );
function insert_last_login( $login) {
    global $user_id;
    $user = get_userdatabylogin( $login );
    update_user_meta( $user->ID, 'last_login', current_time( 'mysql' ) );
    $last_login_ip = get_client_ip();
    update_user_meta( $user->ID, 'last_login_ip', $last_login_ip);
}

//Display the content of the column
add_action('manage_users_custom_column',  'show_user_additional_column_content', 10, 3);
function show_user_additional_column_content($value, $column_name, $user_id) {
    $user = get_userdata( $user_id );
    if ( 'custom_user_mobile' == $column_name ){
        return $user->custom_user_mobile;
	}
    // Output "nickname"
    if ( 'nicename' == $column_name ){
        return $user->nickname;
	}
		//return get_user_meta( $user->ID, 'nickname', true);
    // Outputting the user's Web site
    /*if ( 'user_url' == $column_name )
        return '<a href="'.$user->user_url.'" target="_blank">'.$user->user_url.'</a>';*/
    // Output registration time
    if('reg_time' == $column_name ){
        return get_date_from_gmt($user->user_registered) ;
    }
	// Output registration IP
    if('signup_ip' == $column_name ){
        return get_user_meta( $user->ID, 'signup_ip', true);
    }
    // Output the latest login time
    if ( 'last_login' == $column_name && $user->last_login ){
        return get_user_meta( $user->ID, 'last_login', ture );
    }
	//Output the latest logon IP
    if ( 'last_login_ip' == $column_name ){
        return get_user_meta( $user->ID, 'last_login_ip', ture );
    }
    return $value;
}

// Default by registration time
add_filter( "manage_users_sortable_columns", 'cmhello_users_sortable_columns' );
function cmhello_users_sortable_columns($sortable_columns){
    $sortable_columns['reg_time'] = 'reg_time';
    return $sortable_columns;
}
add_action( 'pre_user_query', 'cmhello_users_search_order' );
function cmhello_users_search_order($obj){
    if(!isset($_REQUEST['orderby']) || $_REQUEST['orderby']=='reg_time' ){
        if( !in_array($_REQUEST['order'],array('asc','desc')) ){
            $_REQUEST['order'] = 'desc';
        }
        $obj->query_orderby = "ORDER BY user_registered ".$_REQUEST['order']."";
    }
}