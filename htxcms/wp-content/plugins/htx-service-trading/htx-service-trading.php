<?php
/*
* Plugin Name: Htx Service Trarding
* Plugin URI: http://www.huotianxin.com/ 
* Description: This is htx service trading plugin description.
* Author: ligenchun
* Version: 1.0
* Author URI: http://www.cccc100.com 
* License: GPLv2 or later
*/

define("HTX_DIR", dirname(__FILE__));


//includes_custom
require_once HTX_DIR . "/adminpages/bo-statistics-menu.php";
require_once HTX_DIR . "/adminpages/bo-users-menu.php";
require_once HTX_DIR . "/adminpages/bo-setting-menu.php";
require_once HTX_DIR . "/adminpages/bo-setting-standard-menu.php";
require_once HTX_DIR . "/adminpages/bo-setting-basic-menu.php";
require_once HTX_DIR . "/adminpages/bo-setting-seo-menu.php";
require_once HTX_DIR . "/adminpages/bo-setting-api-menu.php";
require_once HTX_DIR . "/adminpages/bo-recommend-experts.php";
require_once HTX_DIR . "/adminpages/bo-bid-menu.php";
require_once HTX_DIR . "/adminpages/bo-finance-menu.php";

require_once HTX_DIR . "/adminpages/custom-post-type.php";
require_once HTX_DIR . "/adminpages/custom-taxonomy.php";
require_once HTX_DIR . "/adminpages/custom-page-type.php";
require_once HTX_DIR . "/adminpages/custom-meta-box.php";

require_once HTX_DIR . "/adminpages/custom-posts-columns.php";

require_once HTX_DIR . "/adminpages/custom-users-columns.php";
require_once HTX_DIR . "/adminpages/custom-user-profile.php";

require_once HTX_DIR . "/includes/functions.php";


//require_once HTX_DIR . "/includes/author-avatars.php";
//头像调取函数不变：get_simple_local_avatar 或 get_avatar

/*register_activation_hook( __FILE__, 'includes_custom' );
// function to load custom-post-type.php
function includes_custom() {
	//do something
}*/