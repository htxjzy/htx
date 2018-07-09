<?php
function bo_setting_api_menu(){  
   	
	add_submenu_page( 'bo_setting_menu_slug', '接口设置', '接口设置', 'publish_pages', 'bo_setting_api_menu_slug', 'bo_setting_api_menu_display' ); 
		
}     
function bo_setting_api_menu_display(){ 
global $wpdb;
?>
<style>
<!--
.statwrap{ width:94%; min-height:600px; margin:15px auto 0 auto;  }

-->
</style>

<?php
}  
add_action('admin_menu', 'bo_setting_api_menu');
?>