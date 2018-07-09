<?php
function bs_settings(){  
    add_menu_page( '官网基本设置', '基本设置', 'manage_options', 'bs_settings_slug','display_function','',0);  
}     
function display_function(){ 
?>
<?php
  		//加载bs_settings_upload.js文件  
        //wp_enqueue_script('my-upload', '/js/bs_settings_upload.js');
		wp_enqueue_script('my-upload', get_bloginfo( 'stylesheet_directory' ) . '/js/upload.js');   
        //加载上传图片的js(wp自带)  
        wp_enqueue_script('thickbox');  
        //加载css(wp自带)  
        wp_enqueue_style('thickbox');
?>    
<link rel="stylesheet" href="/p/css/bs_settings_style.css" type="text/css" media="all" /> 
<!--<script src="/p/js/jquery-1.11.3.min.js"></script>-->
<script src="/p/js/jquery.min.js"></script>
<script src="/p/js/bs_settings.js"></script>
<div class="bs_settings">
	<div class="tab">
    	<a href="javascript:;" class="on">官网首页</a>
        <a href="javascript:;">最新资讯</a>
        <div style="clear:both;"></div>
    </div>
    <div class="content">
    	<ul>
        	<li style="display:block;">
                <form method="post" name="home_seo_form" id="home_seo_form" action="options.php"> 
                <h2>首页SEO设置</h2>                   
<table>
	<tr>
		<td style="width:20%">标题<span style="color:rgba(210,19,86,1)">（title）</span></td>
		<td style="width:80%"><input type="text" style="width:100%" name="home_title_name" value="<?php echo get_option('home_title_name'); ?>" /></td>
	</tr>
	<tr>
		<td style="width:20%">关键词<span style="color:rgba(210,19,86,1)">（keywords多个用,隔开）</span></td>
		<td style="width:80%"><input type="text" style="width:100%" name="home_keywords_name" value="<?php echo get_option('home_keywords_name'); ?>" /></td>
	</tr>
	<tr>
		<td style="width:20%">摘要<span style="color:rgba(210,19,86,1)">（description）</span></td>
		<td style="width:80%"><input type="text" style="width:100%" name="home_description_name" value="<?php echo get_option('home_description_name'); ?>" /></td>
	</tr>
    <?php wp_nonce_field('update-options'); ?>  
    <input type="hidden" name="action" value="update" />  
    <input type="hidden" name="page_options" value="home_title_name,home_keywords_name,home_description_name" />     
	<tr>
    	<td style="width:20%"></td>
        <td style="width:80%; padding-top:10px; text-align:right;">
        	<input class="submit" type="submit" name="option_save" value="<?php _e('保存设置'); ?>" />  
        </td>       
    </tr>    
</table> 
                </form> 
                                           
            </li>
            <li>
                <form method="post" name="information_seo_form" id="information_seo_form" action="options.php"> 
                <h2>最新资讯SEO设置</h2>  
<table>
	<tr>
		<td style="width:20%">栏目标题<span style="color:rgba(210,19,86,1)">（title）</span></td>
		<td style="width:80%"><input type="text" style="width:100%" name="m2ti_name" value="<?php echo get_option('m2ti_name'); ?>" /></td>
	</tr>
	<tr>
		<td style="width:20%">栏目关键词<span style="color:rgba(210,19,86,1)">（keywords）</span></td>
		<td style="width:80%"><input type="text" style="width:100%" name="m2k_name" value="<?php echo get_option('m2k_name'); ?>" /></td>
	</tr>
	<tr>
		<td style="width:20%">栏目摘要<span style="color:rgba(210,19,86,1)">（description）</span></td>
		<td style="width:80%"><input type="text" style="width:100%" name="m2s_name" value="<?php echo get_option('m2s_name'); ?>" /></td>
	</tr>
    <?php wp_nonce_field('update-options'); ?>  
    <input type="hidden" name="action" value="update" />  
    <input type="hidden" name="page_options" value="m2ti_name,m2k_name,m2s_name" /> 
	<tr>
    	<td style="width:20%"></td>
               <td style="width:80%; padding-top:10px; text-align:right;">
                    <input class="submit" type="submit" name="option_save" value="<?php _e('保存设置'); ?>" />  
                </td>       
    </tr>  
</table>
				</form>             
            
            </li>
        </ul>
    </div>
    
</div><!--.bs_settings END-->


<?php
}  
add_action('admin_menu', 'bs_settings');
?>