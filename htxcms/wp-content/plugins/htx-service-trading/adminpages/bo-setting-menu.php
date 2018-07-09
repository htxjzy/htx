<?php
function bo_setting_menu(){  
    add_menu_page( '全局配置', '配置', 'publish_pages', 'bo_setting_menu_slug', 'display_bo_setting_menu', 'dashicons-admin-generic', 8 ); 	
}     
function display_bo_setting_menu(){ 
global $wpdb;
?>
<style>
<!--
.statwrap{ width:94%; min-height:600px; margin:15px auto 0 auto;  }

-->
</style>

<?php
}  
add_action('admin_menu', 'bo_setting_menu');
?>