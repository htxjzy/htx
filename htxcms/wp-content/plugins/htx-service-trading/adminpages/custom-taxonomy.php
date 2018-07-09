<?php
//experts public
function htx_custom_experts_public(){
    $labels=array(
        'name'=> _x('隐私设置','expertspublic'),
        'singular_name'=> _x('隐私设置','expertspublic'),
        'search_items'=> __('搜索隐私设置'),
        'all_items'=> __('所有隐私设置'),
        'parent_item'=> __('该隐私设置的上级分类'),
        'parent_item_colon'=> __('该隐私设置的上级分类：'),
        'edit_item'=> __('编辑隐私设置'),
        'update_item'=> __('更新隐私设置'),
        'add_new_item'=> __('添加新的隐私设置'),
        'new_item_name'=> __('新隐私设置'),
        'menu_name'=> __('隐私设置'),
    );
    $args=array(
        'labels'=>$labels,
        'hierarchical'=>true,
        'show_admin_column'=>true
    );
    register_taxonomy('expertspublic','experts',$args);
}       
add_action('init','htx_custom_experts_public',0);

//shops set
function htx_custom_shops_set(){
    $labels=array(
        'name'=> _x('相关设置','shopsset'),
        'singular_name'=> _x('相关设置','shopsset'),
        'search_items'=> __('搜索相关设置'),
        'all_items'=> __('所有相关设置'),
        'parent_item'=> __('该相关设置的上级分类'),
        'parent_item_colon'=> __('该相关设置的上级分类：'),
        'edit_item'=> __('编辑相关设置'),
        'update_item'=> __('更新相关设置'),
        'add_new_item'=> __('添加新的相关设置'),
        'new_item_name'=> __('新相关设置'),
        'menu_name'=> __('相关设置'),
    );
    $args=array(
        'labels'=>$labels,
        'hierarchical'=>true,
        'show_admin_column'=>true
    );
    register_taxonomy('shopsset','shops',$args);
}       
add_action('init','htx_custom_shops_set',0);


//assignments cases at the same time is related settings.
function htx_custom_assignments_cases(){
    $labels=array(
        'name'=> _x('相关设置','assignmentscases'),
        'singular_name'=> _x('相关设置','assignmentscases'),
        'search_items'=> __('搜索相关设置'),
        'all_items'=> __('所有相关设置'),
        'parent_item'=> __('该相关设置的上级分类'),
        'parent_item_colon'=> __('该相关设置的上级分类：'),
        'edit_item'=> __('编辑相关设置'),
        'update_item'=> __('更新相关设置'),
        'add_new_item'=> __('添加新的相关设置'),
        'new_item_name'=> __('新相关设置'),
        'menu_name'=> __('相关设置'),
    );
    $args=array(
        'labels'=>$labels,
        'hierarchical'=>true,
        'show_admin_column'=>true
    );
    register_taxonomy('assignmentscases','assignments',$args);
}       
add_action('init','htx_custom_assignments_cases',0);

//assignments mode
function htx_custom_assignments_mode(){
    $labels=array(
        'name'=> _x('发布形式','assignmentsmode'),
        'singular_name'=> _x('发布形式','assignmentsmode'),
        'search_items'=> __('搜索发布形式'),
        'all_items'=> __('所有发布形式'),
        'parent_item'=> __('该发布形式的上级分类'),
        'parent_item_colon'=> __('该发布形式的上级分类：'),
        'edit_item'=> __('编辑发布形式'),
        'update_item'=> __('更新发布形式'),
        'add_new_item'=> __('添加新的发布形式'),
        'new_item_name'=> __('新发布形式'),
        'menu_name'=> __('发布形式'),
    );
    $args=array(
        'labels'=>$labels,
        'hierarchical'=>true,
        'show_admin_column'=>true
    );
    register_taxonomy('assignmentsmode','assignments',$args);
}       
add_action('init','htx_custom_assignments_mode',0);


//assignments taxonomy
function htx_custom_assignments_taxonomy(){
    $labels=array(
        'name'=> _x('项目分类','assignmentstax'),
        'singular_name'=> _x('项目分类','assignmentstax'),
        'search_items'=> __('搜索项目分类'),
        'all_items'=> __('所有项目分类'),
        'parent_item'=> __('该项目分类的上级分类'),
        'parent_item_colon'=> __('该项目分类的上级分类：'),
        'edit_item'=> __('编辑项目分类'),
        'update_item'=> __('更新项目分类'),
        'add_new_item'=> __('添加新的项目分类'),
        'new_item_name'=> __('新项目分类'),
        'menu_name'=> __('项目分类'),
    );
    $args=array(
        'labels'=>$labels,
        'hierarchical'=>true,
        //'show_admin_column'=>true	//default true
    );
    register_taxonomy('assignmentstax','assignments',$args);
}       
add_action('init','htx_custom_assignments_taxonomy',0);

//assignments status
function htx_custom_assignments_status(){
    $labels=array(
        'name'=> _x('任务状态','assignmentsstatus'),
        'singular_name'=> _x('任务状态','assignmentsstatus'),
        'search_items'=> __('搜索任务状态'),
        'all_items'=> __('所有任务状态'),
        'parent_item'=> __('该任务状态的上级分类'),
        'parent_item_colon'=> __('该任务状态的上级分类：'),
        'edit_item'=> __('编辑任务状态'),
        'update_item'=> __('更新任务状态'),
        'add_new_item'=> __('添加新的任务状态'),
        'new_item_name'=> __('新任务状态'),
        'menu_name'=> __('任务状态'),
    );
    $args=array(
        'labels'=>$labels,
        'hierarchical'=>true,
		'show_ui'=>false	//false means hide BO display
        //'show_admin_column'=>true
    );
    register_taxonomy('assignmentsstatus','assignments',$args);
}       
add_action('init','htx_custom_assignments_status',0);

//projects status
function htx_custom_projects_status(){
    $labels=array(
        'name'=> _x('专项状态','projectsstatus'),
        'singular_name'=> _x('专项状态','projectsstatus'),
        'search_items'=> __('搜索专项状态'),
        'all_items'=> __('所有专项状态'),
        'parent_item'=> __('该专项状态的上级分类'),
        'parent_item_colon'=> __('该专项状态的上级分类：'),
        'edit_item'=> __('编辑专项状态'),
        'update_item'=> __('更新专项状态'),
        'add_new_item'=> __('添加新的专项状态'),
        'new_item_name'=> __('新专项状态'),
        'menu_name'=> __('专项状态'),
    );
    $args=array(
        'labels'=>$labels,
        'hierarchical'=>true,
		'show_admin_column'=>true
    );
    register_taxonomy('projectsstatus','projects',$args);
}       
add_action('init','htx_custom_projects_status',0);

//shops taxonomy
function htx_custom_shops_taxonomy(){
    $labels=array(
        'name'=> _x('商铺分类','shopstax'),
        'singular_name'=> _x('商铺分类','shopstax'),
        'search_items'=> __('搜索商铺分类'),
        'all_items'=> __('所有商铺分类'),
        'parent_item'=> __('该商铺分类的上级分类'),
        'parent_item_colon'=> __('该商铺分类的上级分类：'),
        'edit_item'=> __('编辑商铺分类'),
        'update_item'=> __('更新商铺分类'),
        'add_new_item'=> __('添加新的商铺分类'),
        'new_item_name'=> __('新商铺分类'),
        'menu_name'=> __('商铺分类'),
    );
    $args=array(
        'labels'=>$labels,
        'hierarchical'=>true,
        'show_admin_column'=>true
    );
    register_taxonomy('shopstax','shops',$args);
}       
add_action('init','htx_custom_shops_taxonomy',0);

/*//assignmentstax for the post type bidposts
function htx_register_taxonomy_for_bidposts(){
	register_taxonomy_for_object_type( 'assignmentstax', 'bidposts' );
}
add_action( 'init', 'htx_register_taxonomy_for_bidposts' );*/

//assignmentstax for the post type subcats
function htx_register_taxonomy_for_subcats(){
	register_taxonomy_for_object_type( 'assignmentstax', 'subcats' );
}
add_action( 'init', 'htx_register_taxonomy_for_subcats' );

//assignmentstax for the post type experts
function htx_register_taxonomy_for_experts(){
	register_taxonomy_for_object_type( 'assignmentstax', 'experts' );
}
add_action( 'init', 'htx_register_taxonomy_for_experts' );

//assignmentstax for the post type shops
function htx_register_taxonomy_for_shops(){
	register_taxonomy_for_object_type( 'assignmentstax', 'shops' );
}
add_action( 'init', 'htx_register_taxonomy_for_shops' );

//assignmentstax for the post type projects
function htx_register_taxonomy_for_projects(){
	register_taxonomy_for_object_type( 'assignmentstax', 'projects' );
}
add_action( 'init', 'htx_register_taxonomy_for_projects' );

//assignmentscases for the post type projects
/*function htx_register_assignmentscases_for_projects(){
	register_taxonomy_for_object_type( 'assignmentscases', 'projects' );
}
add_action( 'init', 'htx_register_assignmentscases_for_projects' );*/
