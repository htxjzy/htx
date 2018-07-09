<?php
function bs_custom_post_information() {
	$labels = array(
		'name'               => _x( '最新资讯', 'information' ),
		'singular_name'      => _x( '最新资讯', 'information' ),
		'add_new'            => _x( '写文章', '添加新内容的链接名称' ),
		'add_new_item'       => __( '写文章' ),
		'edit_item'          => __( '编辑文章' ),
		'new_item'           => __( '新文章' ),
		'all_items'          => __( '所有文章' ),
		'view_item'          => __( '预览' ),
		'search_items'       => __( '搜索文章' ),
		'not_found'          => __( '没有找到有关文章' ),
		'not_found_in_trash' => __( '回收站里面没有相关文章' ),
		'parent_item_colon'  => '',
		'menu_name'          => '最新资讯'
	  );
	  $args = array(
		'labels'        => $labels,
		'description'   => '宝盛微交易整理发布的最新资讯',
		'public'        => true,
		'taxonomies'=> array('category'), 
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt'),
		'has_archive'   => true,
		'menu_position' => 45,
		'menu_icon' => 'dashicons-rss',
	  );
     register_post_type( 'information', $args ); 
}
add_action( 'init', 'bs_custom_post_information' );


//修改自定义文章类型information的固定链接【 变量：information（5处）   _bs_（4处）  qid（3处）  】
add_action('init', 'custom_bs_2_rewrite');
function custom_bs_2_rewrite() {
  global $wp_rewrite;
  $queryarg = 'post_type=information&p=';
  $wp_rewrite->add_rewrite_tag('%qid2%', '([^/]+)', $queryarg);
  $wp_rewrite->add_permastruct('information', '/information/%qid2%.html', false);
}
  
add_filter('post_type_link', 'custom_bs_2_permalink', 1, 3);
function custom_bs_2_permalink($post_link, $post = 0) {
  global $wp_rewrite;
  if ( $post->post_type == 'information' ){
      $post = &get_post($id);
      if ( is_wp_error( $post ) )
        return $post;
      $newlink = $wp_rewrite->get_extra_permastruct('information');
      $newlink = str_replace("%qid2%", $post->ID, $newlink);
      $newlink = home_url(user_trailingslashit($newlink));
      return $newlink;
    } else {
        return $post_link;
    }
}

add_action('init', 'bs_baosheng');
function bs_baosheng()
{
	$labels = array(
		'name' => '宝盛国际',
		'singular_name' => '宝盛国际',
		'add_new' => '添加页面',
		'add_new_item' => '发布一个新页面',
		'edit_item' => '编辑页面',
		'new_item' => '新页面',
		'all_items' => '所有页面',
		'view_item' => '查看页面',
		'search_items' => '搜索页面',
		'not_found' => '没有找到相关页面',
		'not_found_in_trash' => '回收站中没有相关页面',
		'parent_item_colon' => '',
		'menu_name' => '宝盛国际'
	
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'page',
		'has_archive' => true,
		'hierarchical' => false,
		//'supports' => array('title','editor', 'page-attributes'),
		'supports' => array('title','page-attributes'),
		'menu_position' => 58,
		'menu_icon' => 'dashicons-admin-site'
	);
	register_post_type('baosheng',$args);
}
?>