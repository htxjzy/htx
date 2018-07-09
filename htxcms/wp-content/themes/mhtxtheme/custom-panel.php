<?php
add_action('admin_init','my_admin');
function my_admin(){
	
	//加载bs_settings_upload.js文件  
    //wp_enqueue_script('my-upload', '/js/bs_settings_upload.js');
	wp_enqueue_script('my-upload', get_bloginfo( 'stylesheet_directory' ) . '/js/upload.js');   
    //加载上传图片的js(wp自带)  
    wp_enqueue_script('thickbox');  
    //加载css(wp自带)  
    wp_enqueue_style('thickbox');
	
	
	//add_meta_box 是用来给自定义文章类型添加 meta boxes 的函数
	$s_types = array('information');
	foreach ( $s_types as $s_type ) {
        add_meta_box(
            'mspc_meta_box_id', // Meta Box在前台页面中的id，可通过JS获取到该Meta Box
            '自定义面板', // 显示的标题
            'mspc_meta_box', // 回调方法，用于输出Meta Box的HTML代码
            $s_type, // 在哪个post type页面添加
            'normal', // 在哪显示该Meta Box
            'high' // 优先级
        );
    }
//------------------------------------------
	$s_types1 = array('video');
	foreach ( $s_types1 as $s_type1 ) {
        add_meta_box(
            'mspc1_meta_box_id', // Meta Box在前台页面中的id，可通过JS获取到该Meta Box
            '自定义面板2', // 显示的标题
            'mspc1_meta_box', // 回调方法，用于输出Meta Box的HTML代码
            $s_type1, // 在哪个post type页面添加
            'normal', // 在哪显示该Meta Box
            'high' // 优先级
        );
    }

	$s_types3 = array('hotact');
	foreach ( $s_types3 as $s_type3 ) {
        add_meta_box(
            'mspc3_meta_box_id', // Meta Box在前台页面中的id，可通过JS获取到该Meta Box
            '自定义面板2', // 显示的标题
            'mspc3_meta_box', // 回调方法，用于输出Meta Box的HTML代码
            $s_type3, // 在哪个post type页面添加
            'normal', // 在哪显示该Meta Box
            'high' // 优先级
        );
    }
	
	$s_types4 = array('ebook');
	foreach ( $s_types4 as $s_type4 ) {
        add_meta_box(
            'mspc4_meta_box_id', // Meta Box在前台页面中的id，可通过JS获取到该Meta Box
            '自定义面板', // 显示的标题
            'mspc4_meta_box', // 回调方法，用于输出Meta Box的HTML代码
            $s_type4, // 在哪个post type页面添加
            'normal', // 在哪显示该Meta Box
            'high' // 优先级
        );
    }
	
	
//-----------------------------------	
	//add_meta_box('page_meta_box','自定义面板','display_page_meta_box','page','normal','high');	
	$s_types2 = array('platform', 'product', 'guide', 'help', 'agreement', 'baosheng');
	foreach ( $s_types2 as $s_type2 ) {
        add_meta_box(
            'page2_meta_box_id', // Meta Box在前台页面中的id，可通过JS获取到该Meta Box
            '自定义面板', // 显示的标题
            'display_page2_meta_box', // 回调方法，用于输出Meta Box的HTML代码
            $s_type2, // 在哪个post type页面添加
            'normal', // 在哪显示该Meta Box
            'high' // 优先级
        );
    }

}
?>
<?php
function mspc_meta_box($post){
	$mspc_subtitle= esc_html( get_post_meta($post->ID,'mspc_subtitle',true));
	$mspc_keywords= esc_html( get_post_meta($post->ID,'mspc_keywords',true));
?>
<table style="width:100%;">
	<tr>
		<td style="width:20%;">副标题<span style="color:rgba(210,19,86,1)">（选填）</span></td>
		<td style="width:80%;"><input type="text" style="width:100%;" name="mspc_subtitle_name" value="<?php echo $mspc_subtitle; ?>" /></td>
	</tr>
	<tr>
		<td style="width:20%;">关键词<span style="color:rgba(210,19,86,1)">（keywords多个用,隔开）</span></td>
		<td style="width:80%;"><input type="text" style="width:100%;" name="mspc_keywords_name" value="<?php echo $mspc_keywords; ?>" /></td>
	</tr>
</table>
<?php
}
?>
<?php
function mspc1_meta_box($post){
	$mspc1_thum= esc_html( get_post_meta($post->ID,'mspc1_thum',true));
	$mspc1_code= esc_html( get_post_meta($post->ID,'mspc1_code',true));
	$mspc1_code2= get_post_meta($post->ID,'mspc1_code2',true);
?>
<table style="width:100%;">
	<tr>
		<td style="width:20%;">视频缩略图地址<span style="color:rgba(210,19,86,1)">（450X300px）</span></td>
		<td style="width:80%;">
        	<input type="text" style="width:86%; float:left;" name="mspc1_thum_name" value="<?php echo $mspc1_thum; ?>" /> 
            <input type="button" style="width:10%; float:right; cursor:pointer;" name="bs_upload_button" class="bs_upload_button" value="上传" />
        </td>
	</tr>
	<tr>
		<td style="width:20%;">视频链接代码</td>
		<td style="width:80%;">
        	<input type="text" style="width:100%;" name="mspc1_code_name" value="<?php echo $mspc1_code; ?>" />      
        </td>
	</tr>
	<tr>
		<td style="width:20%;">视频HTML代码串</td>
		<td style="width:80%;">
        	<textarea class="text" style="width:100%;"  name="mspc1_code2_name" rows="4"><?php echo $mspc1_code2; ?></textarea>      
        </td>
	</tr>    
    
</table>
<?php
}
?>
<?php
function mspc3_meta_box($post){
	$mspc3_thum= esc_html( get_post_meta($post->ID,'mspc3_thum',true));
	$mspc3_html= esc_html( get_post_meta($post->ID,'mspc3_html',true));
	//$mspc3_html5= esc_html( get_post_meta($post->ID,'mspc3_html5',true));
?>
<table style="width:100%;">
	<tr>
		<td style="width:20%;">活动缩略图地址（PC版填）<span style="color:rgba(210,19,86,1)">（900X370px）</span></td>
		<td style="width:80%;">
        	<input type="text" style="width:86%; float:left;" name="mspc3_thum_name" value="<?php echo $mspc3_thum; ?>" /> 
            <input type="button" style="width:10%; float:right; cursor:pointer;" name="bs_upload_button" class="bs_upload_button" value="上传" />  
        </td>
	</tr>
	<tr>
		<td style="width:20%;">html内容<span style="color:rgba(210,19,86,1)">（PC版html文本）</span></td>
		<td style="width:80%;">
            <textarea name="mspc3_html_name" rows="4"  style="width:100%;" class="text"><?php echo $mspc3_html; ?></textarea>   
        </td>
	</tr>
</table>
<?php
}
?>
<?php
function mspc4_meta_box($post){
	$mspc4_xiazai1= esc_html( get_post_meta($post->ID,'mspc4_xiazai1',true));
	$mspc4_xiazai2= esc_html( get_post_meta($post->ID,'mspc4_xiazai2',true));
?>
<table style="width:100%;">
	<tr>
		<td style="width:20%;">下载地址<span style="color:rgba(210,19,86,1)"></span></td>
		<td style="width:80%;">
        <input type="text" style="width:86%; float:left;" name="mspc4_xiazai1_name" value="<?php echo $mspc4_xiazai1; ?>" />
        <input type="button" style="width:10%; float:right; cursor:pointer;" name="bs_upload_button" class="bs_upload_button" value="上传" />
        </td>
	</tr>
	<tr>
		<td style="width:20%;">阅读地址<span style="color:rgba(210,19,86,1)"></span></td>
		<td style="width:80%;">
        <input type="text" style="width:86%; float:left;" name="mspc4_xiazai2_name" value="<?php echo $mspc4_xiazai2; ?>" />
        <input type="button" style="width:10%; float:right; cursor:pointer;" name="bs_upload_button" class="bs_upload_button" value="上传" />
        </td>
	</tr>
</table>
<?php
}
?>
<?php
function display_page2_meta_box($post){
	$page2_keywords= esc_html( get_post_meta($post->ID,'page2_keywords',true));
	$page2_description= esc_html( get_post_meta($post->ID,'page2_description',true));
	$page2_htmlcont1= get_post_meta($post->ID,'page2_htmlcont1',true);
	$page2_htmlcont2= get_post_meta($post->ID,'page2_htmlcont2',true);
?>
<table style="width:100%;">
	<tr>
		<td style="width:20%;">关键词<span style="color:rgba(210,19,86,1)">（keywords多个用,隔开）</span></td>
		<td style="width:80%;"><input type="text" style="width:100%;" name="page2_keywords_name" value="<?php echo $page2_keywords; ?>" /></td>
	</tr>
	<tr>
		<td style="width:20%;">页面描述<span style="color:rgba(210,19,86,1)">（description）</span></td>
		<td style="width:80%;"><input type="text" style="width:100%;" name="page2_description_name" value="<?php echo $page2_description; ?>" /></td>
	</tr>
	<tr>
		<td style="width:20%;">媒体库<span style="color:rgba(210,19,86,1)">（选用）</span></td>
		<td style="width:80%;">
        <input type="button" style="width:200px; float:left; cursor:pointer;" name="bs_upload_button" class="bs_upload_button" value="上传或查询图片等媒体url地址" />
        </td>
	</tr>
	<tr>
		<td style="width:20%;">html内容1<span style="color:rgba(210,19,86,1)">（选填）</span></td>
		<td style="width:80%;">
        <!--<input type="text" style="width:100%;" name="page2_htmlcont_name" value="<?//php echo $page2_htmlcont; ?>" />-->
        <textarea name="page2_htmlcont1_name" rows="5"  style="width:100%;" class="text"><?php echo $page2_htmlcont1; ?></textarea>              
        </td>
	</tr>
	<tr>
		<td style="width:20%;">html内容2<span style="color:rgba(210,19,86,1)">（选填）</span></td>
		<td style="width:80%;">
        <!--<input type="text" style="width:100%;" name="page2_htmlcont_name" value="<?//php echo $page2_htmlcont; ?>" />-->
        <textarea name="page2_htmlcont2_name" rows="5"  style="width:100%;" class="text"><?php echo $page2_htmlcont2; ?></textarea>              
        </td>
	</tr>
</table>
<?php
}
?>
<?php
//注册一个 Save Post 函数，该函数将在保存文章时调用。
add_action('save_post','add_spc_fields',10,2);
function add_spc_fields($posttype_id,$posttype_var){	
	//single
    if(	isset($_POST['mspc_subtitle_name'])&&$_POST['mspc_subtitle_name']!='' ){
			update_post_meta($posttype_id,'mspc_subtitle',$_POST['mspc_subtitle_name']);
	}
    if(	isset($_POST['mspc_keywords_name'])&&$_POST['mspc_keywords_name']!='' ){
			update_post_meta($posttype_id,'mspc_keywords',$_POST['mspc_keywords_name']);
	}
    if(	isset($_POST['mspc1_thum_name'])&&$_POST['mspc1_thum_name']!='' ){
			update_post_meta($posttype_id,'mspc1_thum',$_POST['mspc1_thum_name']);
	}
	if(	isset($_POST['mspc1_code_name'])&&$_POST['mspc1_code_name']!='' ){
			update_post_meta($posttype_id,'mspc1_code',$_POST['mspc1_code_name']);
	}
	if(	isset($_POST['mspc1_code2_name'])&&$_POST['mspc1_code2_name']!='' ){
			update_post_meta($posttype_id,'mspc1_code2',$_POST['mspc1_code2_name']);
	}
	if(	isset($_POST['mspc3_thum_name'])&&$_POST['mspc3_thum_name']!='' ){
			update_post_meta($posttype_id,'mspc3_thum',$_POST['mspc3_thum_name']);
	}	
    if(	isset($_POST['mspc3_html_name'])&&$_POST['mspc3_html_name']!='' ){
			update_post_meta($posttype_id,'mspc3_html',$_POST['mspc3_html_name']);
	}	
    if(	isset($_POST['mspc4_xiazai1_name'])&&$_POST['mspc4_xiazai1_name']!='' ){
			update_post_meta($posttype_id,'mspc4_xiazai1',$_POST['mspc4_xiazai1_name']);
	}
    if(	isset($_POST['mspc4_xiazai2_name'])&&$_POST['mspc4_xiazai2_name']!='' ){
			update_post_meta($posttype_id,'mspc4_xiazai2',$_POST['mspc4_xiazai2_name']);
	}
	
	//page2
	if(	isset($_POST['page2_keywords_name'])&&$_POST['page2_keywords_name']!='' ){
			update_post_meta($posttype_id,'page2_keywords',$_POST['page2_keywords_name']);
	}
	if(	isset($_POST['page2_description_name'])&&$_POST['page2_description_name']!='' ){
			update_post_meta($posttype_id,'page2_description',$_POST['page2_description_name']);
	}	
	if(	isset($_POST['page2_htmlcont1_name'])&&$_POST['page2_htmlcont1_name']!='' ){
			update_post_meta($posttype_id,'page2_htmlcont1',$_POST['page2_htmlcont1_name']);
	}
	if(	isset($_POST['page2_htmlcont2_name'])&&$_POST['page2_htmlcont2_name']!='' ){
			update_post_meta($posttype_id,'page2_htmlcont2',$_POST['page2_htmlcont2_name']);
	}
	

}