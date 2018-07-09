<?php
function bo_setting_standard_menu(){  
   	
	add_submenu_page( 'edit.php?post_type=assignments', '行业标准', '行业标准', 'publish_pages', 'bo_setting_standard_menu_slug', 'bo_setting_standard_menu_display' ); 
		
}     
function bo_setting_standard_menu_display(){ 
	wp_enqueue_style('htx-plugin-admin-standard-menu-css-layui', home_url().'/layui/css/layui.css' );
	wp_enqueue_style('htx-plugin-admin-standard-menu-css-seo-menu', home_url().'/p/css/admin/standard-menu.css');
	
?>
<div class="statwrap">
<div class="layui-fluid">
<div class="layui-row layui-col-space20">
<div class="layui-col-md12">
<table class="layui-table">
  <thead>
    <tr>
      <th>大类-子类-行业标准</th>
      <th>操作</th>
    </tr> 
  </thead>
  <tbody>
<?php

for ($i=10; $i<=19; $i++) {
	
	$args=array('post_type' => array('subcats'), 'tax_query'=> array(array('taxonomy'=>'assignmentstax', 'terms'=>array($i) ) ), 'orderby'=>'post_date','order'=>'ASC' );
	$recentPosts=new WP_Query($args);
	while ($recentPosts->have_posts()) : $recentPosts->the_post();	//loop1 start
	echo "<tr><td>".get_term($i, 'assignmentstax')->name."-".get_the_title()."-".get_post_meta(get_the_ID(), '_standard_title', true)."</td><td><a target='_blank' href='".get_the_permalink()."'>查看</a></td></tr>";
	endwhile;	//loop1 end  
	wp_reset_postdata();
	
	echo "<tr><td colspan='2' style='padding:0px 0; border-bottom:1px solid #5FB878;'></td></tr>";

} 	
?> 
  </tbody>
</table>
</div>

</div>
</div><!--.layui-container end-->
</div>
<?php
}  
add_action('admin_menu', 'bo_setting_standard_menu');
?>