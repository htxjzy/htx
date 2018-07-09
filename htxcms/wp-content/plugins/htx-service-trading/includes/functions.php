<?php
//从仪表盘中移除Meta模块
function remove_dashboard_widgets(){
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');   // 概况
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // 近期评论
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');  // 链入链接
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal');   // 插件
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');  // 快速发布
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');  // 近期草稿
    remove_meta_box('dashboard_primary', 'dashboard', 'side');   // WordPress blog
    remove_meta_box('dashboard_secondary', 'dashboard', 'side');   // 其它 WordPress 新闻
// 使用 'dashboard-network' 作为第二个参数，可以从多站点网络的仪表盘移除Meta模块
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

// 移除post编辑界面默认的Meta模块
//$post_type = array('slides', 'experts', 'assignments', 'shops', 'cases', 'voices', 'stories', 'news');
function remove_htx_post_metaboxes() {
		
	remove_meta_box( 'authordiv','post','normal' ); // 作者模块
	remove_meta_box( 'commentstatusdiv','post','normal' ); // 评论状态模块
	remove_meta_box( 'commentsdiv','post','normal' ); // 评论模块
	remove_meta_box( 'postcustom','post','normal' ); // 自定义字段模块
	remove_meta_box( 'postexcerpt','post','normal' ); // 摘要模块
	remove_meta_box( 'revisionsdiv','post','normal' ); // 修订版本模块
	remove_meta_box( 'slugdiv','post','normal' ); // 别名模块
	remove_meta_box( 'trackbacksdiv','post','normal' ); // 引用模块
	 
	remove_meta_box( 'categorydiv','post','normal' ); // 分类模块
	remove_meta_box( 'formatdiv','post','normal' ); // 文章格式模块
	remove_meta_box( 'submitdiv','post','normal' ); // 发布模块
	remove_meta_box( 'tagsdiv-post_tag','post','normal' ); // 标签模块
	
	//remove_meta_box( 'radio-assignmentstaxdiv', 'bidposts', 'side' );	//Remove the meta_box of the post type bidposts's taxonomy	

}
add_action('admin_menu','remove_htx_post_metaboxes');
 
//移除post特色图像模块
add_action('do_meta_boxes', 'remove_thumbnail_box');
function remove_thumbnail_box() {
    remove_meta_box( 'postimagediv','post','side' );
}

// 移除page编辑窗口的模块
/*function remove_my_page_metaboxes() {
	remove_meta_box( 'postcustom','page','normal' ); // 自定义字段模块
	remove_meta_box( 'postexcerpt','page','normal' ); // 摘要模块
	remove_meta_box( 'commentstatusdiv','page','normal' ); // 评论模块
	remove_meta_box( 'pageparentdiv','page','normal' ); // 页面属性模块
	remove_meta_box( 'slugdiv','page','normal' ); // 别名模块
	remove_meta_box( 'authordiv','page','normal' ); // 作者模块
	remove_meta_box( 'submitdiv','page','normal' ); // 发布模块
}
add_action('admin_menu','remove_my_page_metaboxes');*/


//移除page特色图像模块
add_action('do_meta_boxes', 'remove_page_thumbnail_box');
function remove_page_thumbnail_box() {
    remove_meta_box( 'postimagediv','page','side' );
}


//自定义后台登录的样式
function diy_login_page(){
	echo '<link rel="stylesheet" href="/p/css/bo_login.css" type="text/css" media="all" />'."\n";
}
add_action('login_enqueue_scripts', 'diy_login_page');

//WP网站后台的ico更改
function favicon4admin() {
    echo '<link type="image/x-icon" rel="shortcut icon" href="/p/images/icon.png" />';
}
add_action( 'admin_head', 'favicon4admin' );

//WP更改后台字体为雅黑
function Fanly_admin_lettering() {
	echo '<style type="text/css">
* { font-family: "Microsoft YaHei"; }
#activity-widget #the-comment-list .avatar { max-width:50px; max-height:50px; }
</style>';
}
add_action( 'admin_head', 'Fanly_admin_lettering' );

// 移除自动保存和修订版本
 remove_action('pre_post_update', 'wp_save_post_revision' );
 add_action( 'wp_print_scripts', 'disable_autosave' );
 function disable_autosave() {
 wp_deregister_script('autosave');
 }
 
 
//屏蔽后台左上LOGO
function annointed_admin_bar_remove() {
	global $wp_admin_bar;
	/* Remove their stuff */
	$wp_admin_bar->remove_menu('wp-logo');
}
add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove', 0);

//屏蔽后台“帮助”选项卡
add_filter( 'contextual_help', 'wpse50723_remove_help', 999, 3 );
function wpse50723_remove_help($old_help, $screen_id, $screen){
$screen->remove_help_tabs();
return $old_help;
}

//给wordpress仪表盘添加自定义信息模块

/*function custom_dashboard_help() {
    echo '这里填使用说明的内容，可填写HTML代码';
}
function example_add_dashboard_widgets() {
    wp_add_dashboard_widget('custom_help_widget', '这里替换成面板标题', 'custom_dashboard_help');
}
add_action('wp_dashboard_setup', 'example_add_dashboard_widgets' );
*/

//屏蔽左侧菜单中的“仪表盘”和“文章”及“工具”
function remove_menus() {
	global $menu;
	$restricted = array(
		__('Dashboard'),
		__('Posts'),
		__('Media'),
		//__('Links'),
		__('Pages'),
		//__('Appearance'),
		__('Tools'),
		//__('Users'),
		//__('Settings'),
		__('Comments'),
		//__('Plugins')
	);
	if( current_user_can( 'publish_pages' ) && !current_user_can( 'edit_themes' ) ) {
		$restricted = array(
			__('Dashboard'),
			__('Posts'),
			__('Media'),
			//__('Links'),
			__('Pages'),
			//__('Appearance'),
			__('Tools'),
			//__('Users'),
			__('Settings'),
			__('Comments'),
			//__('Plugins')
		);
	}
	
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(strpos($value[0], '<') === FALSE) {
			if(in_array($value[0] != NULL ? $value[0]:"" , $restricted)){
				unset($menu[key($menu)]);
			}
		}else {
				$value2 = explode('<', $value[0]);
				if(in_array($value2[0] != NULL ? $value2[0]:"" , $restricted)){
					unset($menu[key($menu)]);
				}
		}
	}
}
if (is_admin()){
// 屏蔽左侧菜单
add_action('admin_menu', 'remove_menus');
}


//将Gravatar头像缓存到多说镜像服务器实现加速
/*function mytheme_get_avatar($avatar) {
    $avatar = str_replace(array("www.gravatar.com","0.gravatar.com","1.gravatar.com","2.gravatar.com"),"gravatar.duoshuo.com",$avatar);
    return $avatar;
}
add_filter( 'get_avatar', 'mytheme_get_avatar', 10, 3 );*/


//屏蔽google字体，避免后台加载缓慢-START
function coolwp_remove_open_sans_from_wp_core() {
	wp_deregister_style( 'open-sans' );   
	wp_register_style( 'open-sans', false );   
	wp_enqueue_style('open-sans','');
}
add_action( 'init', 'coolwp_remove_open_sans_from_wp_core' );
// Remove Open Sans that WP adds from frontend   
if (!function_exists('remove_wp_open_sans')) :   
function remove_wp_open_sans() {   
	wp_deregister_style( 'open-sans' );   
	wp_register_style( 'open-sans', false );   
}
// 前台删除Google字体CSS   
add_action('wp_enqueue_scripts', 'remove_wp_open_sans');
// 后台删除Google字体CSS   
add_action('admin_enqueue_scripts', 'remove_wp_open_sans'); 
endif;
//屏蔽google字体—END

//移除emoji并禁止头像加载s.w.org
remove_action('wp_head', 'print_emoji_detection_script', 7 );
remove_action('admin_print_scripts','print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
//禁止加载s.w.org并移动dns-prefetch
function remove_dns_prefetch( $hints, $relation_type ) {
    if ( 'dns-prefetch' === $relation_type ) {
		return array_diff( wp_dependencies_unique_hosts(), $hints );
    }
    return $hints;
}
add_filter( 'wp_resource_hints', 'remove_dns_prefetch', 10, 2 );


//自定义 WordPress 后台底部的版权和版本信息
add_filter('admin_footer_text', 'left_admin_footer_text');
function left_admin_footer_text($text) {
	// 左边信息
	$text = 'Copyright2017 火天信工程交易中心。';
	return $text;
}
add_filter('update_footer', 'right_admin_footer_text', 11);
function right_admin_footer_text($text) {
	// 右边信息
	$text = 'WP4.9.1版本';
	return $text;
}

//限制标题字数的函数
function excerpttitle($max_length) {
   	$title_str = get_the_title();
   	if (mb_strlen($title_str,'utf-8') > $max_length ) {
   	$title_str = mb_substr($title_str,0,$max_length,'utf-8');
   	}
   	return $title_str;
}

//限制摘要字数的函数
function excerptexcerpt($max_length) {
   	$excerpt_str = get_the_excerpt();
   	if (mb_strlen($excerpt_str,'utf-8') > $max_length ) {
   	$excerpt_str = mb_substr($excerpt_str,0,$max_length,'utf-8');
   	}
   	return $excerpt_str;
}

//去除正文P标签包裹
remove_filter( 'the_content', 'wpautop' );

//去除摘要P标签包裹 
remove_filter( 'the_excerpt', 'wpautop' );

//取消摘要转义
remove_filter('the_excerpt', 'wptexturize');

//支持PDF的函数
function modify_post_mime_types( $post_mime_types ) {
// 选择mime类型，这里用: 'application/pdf'
// 然后扩充数组，定义label的文字
$post_mime_types['application/pdf'] = array( __( 'PDFs' ), __( 'Manage PDFs' ),
_n_noop( 'PDF <span class="count">(%s)</span>', 'PDFs <span class="count">(%s)</span>' ) );
// then we return the $post_mime_types variable
return $post_mime_types;
}



//实现不同文章类型文档页面显示文章数量不同(is_post_type_archive的参数array/string)
add_action('pre_get_posts','custom_posts_per_page'); 
function custom_posts_per_page($query){
	if(is_archive()&&(!is_admin())){		
		if(is_post_type_archive(array('subcats'))){
			$posts_per_page=200;
		}		
        $query->set( 'posts_per_page', $posts_per_page );       
	}
}


	//功能：更新当前文章的浏览量。必须处于主循环当中。
	//参数：$postID: 当前文章的ID; 返回：无
	function phsy_set_post_views($postID) {
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        $count = 0;
	        delete_post_meta($postID, $count_key);
	       add_post_meta($postID, $count_key, '0');
   		 }else{
	        //administrator的浏览量不统计
	        //if(!current_user_can("administrator")){
			//管理员的浏览不会统计在内，如果还需要过滤其他的角色浏览量，比如编辑者，把if(!current_user_can("administrator"))改成
			//if(!current_user_can("administrator") && !current_user_can("editor"))即可
	            $count++;
            update_post_meta($postID, $count_key, $count);
	       // }
	    }
	}

	//功能：获取当前文章的浏览量。必须处于主循环当中。
	//参数：$postID: 当前文章的ID; 返回：浏览数量
	function phsy_get_post_views($postID){
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
    	if($count==''){
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	        return "0";
	    }
	    return 50+$count;
	}
	
/*	
//自定义后台菜单顺序
function gs_custom_menu_order($menu_ord) {
	if (!$menu_ord) return true;
		return array(
			'separator1',
			'edit.php?post_type=myslides',
			'edit.php?post_type=notice',
			'edit.php?post_type=information',
			'edit.php?post_type=analysis',
			'edit.php?post_type=video',
			'edit.php?post_type=case',
			'edit.php?post_type=platform',
			'edit.php?post_type=product',
			'edit.php?post_type=guide',
			'edit.php?post_type=help',
			'edit.php?post_type=agreement',
			'edit.php?post_type=investment'
			//'separator2'
	);
}
add_filter('custom_menu_order', 'gs_custom_menu_order');
add_filter('menu_order', 'gs_custom_menu_order');*/

function gs_custom_menu_order($menu_ord) {
	if (!$menu_ord) return true;
		return array(
			'separator1'
	);
}
add_filter('custom_menu_order', 'gs_custom_menu_order');
add_filter('menu_order', 'gs_custom_menu_order');



/*
截取内容中第一张图
*/
function catch_that_image() {
    global $post, $posts;
    ob_start();
    ob_end_clean();
	preg_match('/src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"]/', $post->post_content, $matche);
	//preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matche);  调用的是文章最后一张图的url地址
    if($matche[1])return $matche[1]; //如果执行了return，则return 语句后面的内容将不会被执行了
    return '/mbsbinary/images/default.jpg';
		
}
/*自动更改上传文件名*/
function lgc_wp_handle_upload_prefilter($file){
	$time=date("YmdHis"); 
	$file['name'] = $time."".mt_rand(10,99).".".pathinfo($file['name'] , PATHINFO_EXTENSION);
	return $file;
}
add_filter('wp_handle_upload_prefilter', 'lgc_wp_handle_upload_prefilter');

/*距离还有多少时间*/
function dtime3second($seconds){
	$seconds = (int)$seconds;
	if( $seconds>3600 ){
		if( $seconds>24*3600 ){
			$days		= (int)($seconds/86400);
			$days_num	= "<i>".$days."</i>天";
			$seconds	= $seconds%86400;//remainder
		}
		$hours = intval($seconds/3600);
		$minutes = $seconds%3600;//Get the remaining seconds
		//$dtime = $days_num.$hours."小时".gmstrftime('%M分钟%S秒', $minutes);
		$dtime = $days_num."<i>".$hours."</i>小时".gmstrftime('<i>%M</i>分钟', $minutes);
	}else{
		//$dtime = gmstrftime('%H小时%M分钟%S秒', $seconds);
		$dtime = gmstrftime('%H小时', $seconds);
	}
	return $dtime;
}


// Description: to obtain a complete URL
function curPageURL(){
  $pageURL = 'http';
   
  if ($_SERVER["HTTPS"] == "on")
  {
    $pageURL .= "s";
  }
  $pageURL .= "://";
   
  if ($_SERVER["SERVER_PORT"] != "80")
  {
    $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
  }
  else
  {
    $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
  }
  return $pageURL;
}



// 关闭核心提示
add_filter('pre_site_transient_update_core',    create_function('$a', "return null;"));

//Distance to the deadline of bidding
function dtime2second($seconds){
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
}



//给编辑授权，授了想要回来得删掉这个权限
/*function add_theme_caps() {
    
    $role = get_role( 'editor' );
        //然后添加编辑其他用户文章权限
    $role->add_cap( 'manage_options' );
}
//最后，在后台初始化的时候，执行这个动作
add_action( 'admin_init', 'add_theme_caps');*/

//以上是主题原来functions.php中的内容。


//将Gravatar头像缓存到七牛国内镜像服务器实现加速
/*function mytheme_get_avatar($avatar) {
    $avatar = str_replace(array("www.gravatar.com","0.gravatar.com","1.gravatar.com","2.gravatar.com"),"dadu2.qiniudn.com",$avatar);
    return $avatar;
}
add_filter( 'get_avatar', 'mytheme_get_avatar', 10, 3 );*/

/*function mytheme_get_avatar( $avatar ) {
$avatar = preg_replace( "/http:\/\/(www|\d).gravatar.com/","http://gravatar.duoshuo.com",$avatar );
return $avatar;
}
add_filter( 'get_avatar', 'mytheme_get_avatar' );*/

/*//设置默认头像 
add_filter( 'avatar_defaults', 'htx_custom_gravatar' ); 
function htx_custom_gravatar($avatar_defaults) { 
	$myavatar = home_url(). '/p/images/avatar.jpg'; 
	$avatar_defaults[$myavatar] = "2018新头像"; 
	return $avatar_defaults; 
}*/


//给默认编辑器添加选择字体
function custum_fontfamily($initArray){
   $initArray['font_formats'] = "微软雅黑='微软雅黑';宋体='宋体';黑体='黑体';仿宋='仿宋';楷体='楷体';隶书='隶书';幼圆='幼圆';";
   return $initArray;
}
add_filter('tiny_mce_before_init', 'custum_fontfamily');

function customize_text_sizes($initArray){
   $initArray['fontsize_formats'] = "12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 25px 26px 27px 28px 29px 30px 32px 34px 36px 38px 42px 44px 46px 48px";
   return $initArray;
}
add_filter('tiny_mce_before_init', 'customize_text_sizes');

function add_more_buttons($buttons) {
	$buttons[] = 'del';
	$buttons[] = 'sub';
	$buttons[] = 'sup';
	$buttons[] = 'fontselect';
	$buttons[] = 'fontsizeselect';
	$buttons[] = 'cleanup';
	$buttons[] = 'styleselect';
	$buttons[] = 'removeformat';
	$buttons[] = 'anchor';
	$buttons[] = 'forecolor';
	$buttons[] = 'backcolor';
	$buttons[] = 'underline';
	$buttons[] = 'strikethrough';
	$buttons[] = 'indent';
	$buttons[] = 'outdent';
	$buttons[] = 'undo';
	$buttons[] = 'redo';
	return $buttons;
}
add_filter("mce_buttons", "add_more_buttons");


//设置缩略图
function setting_thumbnails(){	
	if ( function_exists( 'add_theme_support' )){				
		add_theme_support( 'post-thumbnails' );
	}				
} 
add_action('admin_menu', 'setting_thumbnails');


//设置缩略图注释
add_filter('admin_post_thumbnail_html', 'htx_admin_post_thumbnail_html',10,2);
function htx_admin_post_thumbnail_html($htx_content, $htx_post_id){
$htx_post = get_post($htx_post_id);
$htx_post_type = $htx_post->post_type;
if($htx_post_type == 'shops'){
return $htx_content.'<p>用作商铺LOGO，<br/>图片尺寸：<span style="color:rgba(210,19,86,1)">（200x200px）</span></p>';
}
return $htx_content;
}

//设置缩略图注释
add_filter('admin_post_thumbnail_html', 'htx_admin_experts_thumbnail_html',10,2);
function htx_admin_experts_thumbnail_html($htx_content, $htx_post_id){
$htx_post = get_post($htx_post_id);
$htx_post_type = $htx_post->post_type;
if($htx_post_type == 'experts'){
return $htx_content.'<p>用作形象照，图片尺寸：<span style="color:rgba(210,19,86,1)">（220x220px）</span></p>';
}
return $htx_content;
}

//设置缩略图注释-recommended ass use
add_filter('admin_post_thumbnail_html', 'htx_admin_assignments_thumbnail_html',10,2);
function htx_admin_assignments_thumbnail_html($htx_content, $htx_post_id){
$htx_post = get_post($htx_post_id);
$htx_post_type = $htx_post->post_type;
if($htx_post_type == 'assignments'){
return $htx_content.'<p>任务被推荐时用到，<br/>图片尺寸：<span style="color:rgba(210,19,86,1)">（300x200px）</span></p>';
}
return $htx_content;
}

/*//After the assignment is released, change its status into tendering
function publish_post_to_change_terms($post_ID){
	if( has_term(23, 'assignmentsstatus', $post_ID) ){
		wp_set_object_terms($post_ID, array(24), 'assignmentsstatus');	//The third parameter must be to fill in the string, otherwise the error will be prompted.
	}
}
add_action('publish_post', 'publish_post_to_change_terms');*/


//友情链接
//add_filter('pre_option_link_manager_enabled','__return_true');

//add menu and widget
/*if ( function_exists('register_sidebar') )
register_sidebar(
	array(
		'before_widget' => '<div class="sidebox"> ',
		 'after_widget' => '</div>',
		 'before_title' => '<h2>',
		 'after_title' => '</h2>'
		 )
);*/


/**custom serach start**/
/**
 * Extend WordPress search to include custom fields
 *
 * https://adambalee.com
 */

/**
 * Join posts and postmeta tables
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
/*function cf_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {    
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }

    return $join;
}
add_filter('posts_join', 'cf_search_join' );*/

/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
function cf_search_where( $where ) {
    global $pagenow, $wpdb;

    /*if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }*/
	
 	if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
			"(".$wpdb->posts.".ID LIKE $1) OR (".$wpdb->posts.".post_title LIKE $1)", $where );
    }

    return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct( $where ) {
    global $wpdb;

    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );

/**custom serach end**/

//External communication function - SMS authentication
function vcurl($url, $post = '', $cookie = '', $cookiejar = '', $referer = '') {
	$tmpInfo = '';
	$cookiepath = getcwd () . '. / ' . $cookiejar;
	$curl = curl_init ();
	curl_setopt ( $curl, CURLOPT_URL, $url );
	curl_setopt ( $curl, CURLOPT_USERAGENT, $_SERVER ['HTTP_USER_AGENT'] );
	if ($referer) {
		curl_setopt ( $curl, CURLOPT_REFERER, $referer );
	} else {
		curl_setopt ( $curl, CURLOPT_AUTOREFERER, 1 );
	}
	if ($post) {
		curl_setopt ( $curl, CURLOPT_POST, 1 );
		curl_setopt ( $curl, CURLOPT_POSTFIELDS, $post );
	}
	if ($cookie) {
		curl_setopt ( $curl, CURLOPT_COOKIE, $cookie );
	}
	if ($cookiejar) {
		curl_setopt ( $curl, CURLOPT_COOKIEJAR, $cookiepath );
		curl_setopt ( $curl, CURLOPT_COOKIEFILE, $cookiepath );
	}
	// curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt ( $curl, CURLOPT_TIMEOUT, 100 );
	curl_setopt ( $curl, CURLOPT_HEADER, 0 );
	curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
	$tmpInfo = curl_exec ( $curl );
	if (curl_errno ( $curl )) {
		// echo ' < pre > < b > 错误: < /b><br / > ' . curl_error ( $curl );
	}
	curl_close ( $curl );
	return $tmpInfo;
}
