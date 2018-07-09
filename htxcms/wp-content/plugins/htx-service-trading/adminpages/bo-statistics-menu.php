<?php
function bo_statistics_menu(){  
    add_menu_page( '经营统计', '统计', 'publish_pages', 'bo_statistics_menu_slug', 'display_bo_statistics_menu', 'dashicons-analytics', 6 ); 	
}     
function display_bo_statistics_menu(){ 
global $wpdb;
?>
<style>
<!--
.statwrap{ width:94%; min-height:600px; margin:15px auto 0 auto;  }

-->
</style>

<?php
}  
add_action('admin_menu', 'bo_statistics_menu');
?>