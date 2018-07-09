<?php
//1
function htx_custom_post_experts() {
    $labels = array(
        'name'               => '专家荟萃',
        'singular_name'      => '专家荟萃',
        'add_new'            => '写文章',
        'add_new_item'       => '写文章-专家荟萃',
        'edit_item'          => '编辑专家荟萃文章',
        'new_item'           => '新专家荟萃文章',
        'all_items'          => '专家荟萃',
        'view_item'          => '预览',
        'search_items'       => '搜索专家荟萃文章',
        'not_found'          => '没有找到有关专家荟萃文章',
        'not_found_in_trash' => '回收站里面没有相关专家荟萃文章',
        'parent_item_colon'  => '',
        'menu_name'          => '专家'
      );
      $args = array(
        'labels'        => $labels,
        'description'   => '火天信服务交易平台发布的专家荟萃',
        'public'        => true,
        //'taxonomies'=> array('category'),
        //'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt'),
		//'supports' => array('title', 'editor', 'comments', 'revisions', 'trackbacks', 'author', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields', 'post-formats')
		'supports'      => array( 'title', 'thumbnail'),
        'has_archive'   => true,
        'menu_position' => 34,
        'menu_icon' => 'dashicons-welcome-learn-more',
		'capabilities' => array('create_posts' => 'do_not_allow'),
		'map_meta_cap' => true
              
        //'show_in_menu' => ''
              
      );
     register_post_type( 'experts', $args );
}
add_action( 'init', 'htx_custom_post_experts' );

//2
function htx_custom_post_projects() {
    $labels = array(
        'name'               => '专项',
        'singular_name'      => '专项',
        'add_new'            => '写文章',
        'add_new_item'       => '写文章',
        'edit_item'          => '编辑专项文章',
        'new_item'           => '新专项文章',
        'all_items'          => '专项',
        'view_item'          => '预览',
        'search_items'       => '搜索专项文章',
        'not_found'          => '没有找到有关专项文章',
        'not_found_in_trash' => '回收站里面没有相关专项文章',
        'parent_item_colon'  => '',
        'menu_name'          => '专项'
      );
      $args = array(
        'labels'        => $labels,
        'description'   => '指定火天信承接的项目',
        'public'        => true,
        //'taxonomies'=> array('category'),
        //'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt'),
		'supports'      => array( 'title'),
        'has_archive'   => true,
        'menu_position' => 35,
        'menu_icon' => 'dashicons-editor-table',
		'capabilities' => array('create_posts' => 'do_not_allow'),
		'map_meta_cap' => true,
		'comments'	   	=>false             
        //'show_in_menu' => ''
              
      );
     register_post_type( 'projects', $args );
}
add_action( 'init', 'htx_custom_post_projects' );

//3
function htx_custom_post_assignments() {
    $labels = array(
        'name'               => '任务',
        'singular_name'      => '任务',
        'add_new'            => '写文章',
        'add_new_item'       => '写文章',
        'edit_item'          => '编辑任务文章',
        'new_item'           => '新任务文章',
        'all_items'          => '任务',
        'view_item'          => '预览',
        'search_items'       => '搜索任务文章',
        'not_found'          => '没有找到有关任务文章',
        'not_found_in_trash' => '回收站里面没有相关任务文章',
        'parent_item_colon'  => '',
        'menu_name'          => '任务'
      );
      $args = array(
        'labels'        => $labels,
        'description'   => '火天信服务交易平台发布的任务',
        'public'        => true,
        //'taxonomies'=> array('category'),
        //'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt'),
		'supports'      => array( 'title', 'thumbnail'),
        'has_archive'   => true,
        'menu_position' => 36,
        'menu_icon' 	=> 'dashicons-money',
		'capabilities' 	=> array('create_posts' => 'do_not_allow'),
		'map_meta_cap' 	=> true,
		'comments'	   	=>false
              
        //'show_in_menu' => ''
              
      );
     register_post_type( 'assignments', $args );
}
add_action( 'init', 'htx_custom_post_assignments' );



//4
function htx_custom_post_shops() {
    $labels = array(
        'name'               => '商铺',
        'singular_name'      => '商铺',
        'add_new'            => '写文章',
        'add_new_item'       => '写文章',
        'edit_item'          => '编辑商铺文章',
        'new_item'           => '新商铺文章',
        'all_items'          => '商铺',
        'view_item'          => '预览',
        'search_items'       => '搜索商铺文章',
        'not_found'          => '没有找到有关商铺文章',
        'not_found_in_trash' => '回收站里面没有相关商铺文章',
        'parent_item_colon'  => '',
        'menu_name'          => '商铺'
      );
      $args = array(
        'labels'        => $labels,
        'description'   => '火天信服务交易平台发布的商铺',
        'public'        => true,
        //'taxonomies'=> array('category'),
        'supports'      => array( 'title', 'thumbnail' ),
        'has_archive'   => true,
        'menu_position' => 38,
        'menu_icon' => 'dashicons-welcome-view-site',
		'capabilities' => array('create_posts' => 'do_not_allow'),
		'map_meta_cap' 	=> true,              
        //'show_in_menu' => ''
              
      );
     register_post_type( 'shops', $args );
}
add_action( 'init', 'htx_custom_post_shops' );

//5
/*function htx_custom_post_cases() {
    $labels = array(
        'name'               => '成功案例',
        'singular_name'      => '成功案例',
        'add_new'            => '写文章',
        'add_new_item'       => '写文章',
        'edit_item'          => '编辑成功案例文章',
        'new_item'           => '新成功案例文章',
        'all_items'          => '成功案例',
        'view_item'          => '预览',
        'search_items'       => '搜索成功案例文章',
        'not_found'          => '没有找到有关成功案例文章',
        'not_found_in_trash' => '回收站里面没有相关成功案例文章',
        'parent_item_colon'  => '',
        'menu_name'          => '案例'
      );
      $args = array(
        'labels'        => $labels,
        'description'   => '火天信服务交易平台发布的成功案例',
        'public'        => true,
        //'taxonomies'=> array('category'),
        //'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt'),
		'supports'      => array( 'title', 'editor'),
        'has_archive'   => true,
        'menu_position' => 39,
        'menu_icon' => 'dashicons-thumbs-up',
              
        //'show_in_menu' => ''
              
      );
     register_post_type( 'cases', $args );
}
add_action( 'init', 'htx_custom_post_cases' );*/


//6
function htx_custom_post_slides() {
    $labels = array(
        'name'               => '图片管理',
        'singular_name'      => '图片管理',
        'add_new'            => '添加图片',
        'add_new_item'       => '添加图片-图片管理',
        'edit_item'          => '编辑图片',
        'new_item'           => '新图片',
        'all_items'          => '图片管理',
        'view_item'          => '预览',
        'search_items'       => '搜索图片',
        'not_found'          => '没有找到有关图片',
        'not_found_in_trash' => '回收站里面没有相关图片',
        'parent_item_colon'  => '',
        'menu_name'          => '图片管理'
      );
      $args = array(
        'labels'        => $labels,
        'description'   => '火天信服务交易平台发布的幻灯片',
        'public'        => true,
        //'taxonomies'=> array('category'),
        'supports'      => array( 'title', 'thumbnail'),
        'has_archive'   => true,
        //'menu_position' => 40,
        //'menu_icon' => 'dashicons-rss',
              
        'show_in_menu' => 'bo_setting_menu_slug'
              
      );
     register_post_type( 'slides', $args );
}
add_action( 'init', 'htx_custom_post_slides' );

//7
function htx_custom_post_subcats() {
    $labels = array(
        'name'               => '子分类',
        'singular_name'      => '子分类',
        'add_new'            => '添加子分类',
        'add_new_item'       => '添加子分类',
        'edit_item'          => '编辑子分类',
        'new_item'           => '新子分类',
        'all_items'          => '子分类标准管理',
        'view_item'          => '预览',
        'search_items'       => '搜索子分类',
        'not_found'          => '没有找到有关子分类',
        'not_found_in_trash' => '回收站里面没有相关子分类',
        'parent_item_colon'  => '',
        'menu_name'          => '子分类'
      );
      $args = array(
        'labels'        => $labels,
        'description'   => '火天信服务交易平台发布的子分类',
        'public'        => true,
        //'taxonomies'=> array('category'),
        //'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt'),
		'supports'      => array( 'title', 'thumbnail'),
        'has_archive'   => true,
        //'menu_position' => 43,
        //'menu_icon' => 'dashicons-money',
              
        'show_in_menu' => 'bo_setting_menu_slug'
              
      );
     register_post_type( 'subcats', $args );
}
add_action( 'init', 'htx_custom_post_subcats' );


//fixed links setting
$htx_post_type = array(
    'experts' 	  => 'expert',//Notice the complex and singular problems here. 值是url显示的
	'candidates'  => 'candidate',
	'projects' 	  => 'project',
    'assignments' => 'assignment',
	'bidposts' 	  => 'bidpost',
	'shops' 	  => 'shop',
	//'cases' 	  => 'case',
	'slides' 	  => 'slide',
	'subcats' 	  => 'subcat',	
);
         
add_filter('post_type_link', 'custom_htxpost_link', 1, 3);
function custom_htxpost_link( $link, $post = 0 ){
    global $htx_post_type;
    if ( in_array( $post->post_type,array_keys($htx_post_type) ) ){
        return home_url( $htx_post_type[$post->post_type].'/' . $post->ID .'.html' );
    } else {
        return $link;
    }
}
         
add_action( 'init', 'custom_htxpost_rewrites_init' );
function custom_htxpost_rewrites_init(){
    global $htx_post_type;
    foreach( $htx_post_type as $k => $v ) {
    add_rewrite_rule(
    $v.'/([0-9]+)?.html$',
    'index.php?post_type='.$k.'&p=$matches[1]',
    'top' );
    }
}