<?php
add_action('init', 'htx_help');
function htx_help()
{
	$labels = array(
		'name' => '帮助中心',
		'singular_name' => '帮助中心',
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
		'menu_name' => '帮助'
	
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
		'menu_position' => 41,
		'menu_icon' => 'dashicons-sos'
	);
	register_post_type('help',$args);
}


add_action('init', 'htx_other');
function htx_other()
{
	$labels = array(
		'name' => '其他页面',
		'singular_name' => '其他页面',
		'add_new' => '添加页面',
		'add_new_item' => '发布一个新页面',
		'edit_item' => '编辑页面',
		'new_item' => '新页面',
		'all_items' => '其他页面',
		'view_item' => '查看页面',
		'search_items' => '搜索页面',
		'not_found' => '没有找到其他页面',
		'not_found_in_trash' => '回收站中没有其他页面',
		'parent_item_colon' => '',
		'menu_name' => '其他'
	
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
		'menu_position' => 44,
		'menu_icon' => 'dashicons-portfolio'
	);
	register_post_type('other',$args);
}