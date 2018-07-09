<?php

//add meta box
function htx_add_meta_box_init(){ 
	//$post_type_common_metas = array('slides', 'voices', 'stories', 'news');
	$post_type_common_metas = array('slides');
	foreach ( $post_type_common_metas as $post_type_common_meta ) {
        add_meta_box('common_meta_box_div', '设置SEO', 'display_common_meta_box', $post_type_common_meta, 'normal', 'high');
    }

	//add subcats meta box
	add_meta_box('subcats_meta_box_div', '行业服务收费标准', 'display_subcats_meta_box', 'subcats', 'normal', 'high');
	
	//add assignments meta box
	add_meta_box('assignments_meta_box_div', '项目属性', 'display_assignments_meta_box', 'assignments', 'normal', 'high');	
	
	//add projects meta box
	add_meta_box('projects_meta_box_div', '专项属性', 'display_projects_meta_box', 'projects', 'normal', 'high');	
		
	//add experts meta box
	add_meta_box('experts_meta_box_div', '专家属性', 'display_experts_meta_box', 'experts', 'normal', 'high');	

	//add shops meta box
	add_meta_box('shops_meta_box_div', '商铺属性', 'display_shops_meta_box', 'shops', 'normal', 'high');	
	
}
add_action( 'add_meta_boxes', 'htx_add_meta_box_init' );

function display_common_meta_box( $post ) {
	
	wp_enqueue_style('htx-plugin-admin-seo-menu-css-seo-menu', home_url().'/p/css/admin/custom-meta.css');	
	//nonce for security
	wp_nonce_field( plugin_basename( __FILE__ ), 'htx_nonce_field_name' );
	
	// retrieve the custom meta box values
	$htxwp_subtitle 	= get_post_meta( $post->ID, '_htxwp_subtitle', true );
	$htxwp_keywords 	= get_post_meta( $post->ID, '_htxwp_keywords', true );
	$htxwp_description	= get_post_meta( $post->ID, '_htxwp_description', true );
	//$news_content 		= $post->post_content;
	$final_editor		= get_currentuserinfo()->user_login;
	
	// custom meta box form elements
?>
    <table class="custom_table">
        <tr>
            <td>副标题<span>（选填）</span></td>
            <td><input type="text" name="htxwp_subtitle" value="<?php echo esc_attr($htxwp_subtitle); ?>" /></td>
        </tr>
        <tr>
            <td>关键词<span>（keywords内容 多个用,隔开）</span></td>
            <td><input type="text" name="htxwp_keywords" value="<?php echo esc_attr($htxwp_keywords); ?>" required="required" /></td>
        </tr>
        <tr>
            <td>概述<span>（description内容）</span></td>
            <td><textarea name="htxwp_description" rows="3" class="text"  required="required"><?php echo esc_attr($htxwp_description); ?></textarea></td>
        </tr>
<!--<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config2.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
        <tr>
            <td>内容</td>
            <td style="padding-bottom:10px;">
            <textarea style="display:none;" name="news_content" rows="3" class="text" id="useueditor2"  required="required"><?//php echo $news_content; ?></textarea>
			<div style="width:100%;"><script id="editor" type="text/plain" style="width:100%;height:320px;"><?//php echo $news_content; ?></script></div>            
            </td>
        </tr>
<script type="text/javascript">
    var ue2 = UE.getEditor('editor');	//ue2 is an operable object		
	ue2.onblur=function(){				
		$("#useueditor2").empty().html(ue2.getContent());			
	}
</script>--> 
        <tr>
            <td>终编者<span>（最后编辑审核人）</span></td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo get_post_meta( $post->ID, '_final_editor', true ); ?></div></td>
            <input type="hidden"  name="final_editor" value="<?php echo $final_editor; ?>" />
        </tr>        
        
        
    </table>
<?php
	wp_enqueue_script('display_common_meta_box_jquery', home_url().'/p/js/jquery.min.js' );
}	//display_common_meta_box() end

function display_subcats_meta_box( $post ) {
	
	wp_enqueue_style('htx-plugin-admin-seo-menu-css-seo-menu', home_url().'/p/css/admin/custom-meta.css');
	
	//nonce for security
	wp_nonce_field( plugin_basename( __FILE__ ), 'htx_nonce_field_name' );
	
	// retrieve the custom meta box values
	$standard_title = get_post_meta( $post->ID, '_standard_title', true );
	$htxwp_subtitle = get_post_meta( $post->ID, '_htxwp_subtitle', true );
	$htxwp_keywords = get_post_meta( $post->ID, '_htxwp_keywords', true );
	$htxwp_description = get_post_meta( $post->ID, '_htxwp_description', true );
	
	$htxwp_content = $post->post_content;
	
	$final_editor = get_currentuserinfo()->user_login;

		
?>	
	<p>备注：<span style="color:rgba(210,19,86,1)">以上标题域请填子分类的名称</span></p>
    <table class="custom_table">
        <tr>
            <td>该子类对应行业收费标准名称</td>
            <td><input type="text" name="standard_title" value="<?php echo esc_attr($standard_title); ?>" /></td>
        </tr>
        <tr>
            <td>行业标准SEO标题</td>
            <td><input type="text" name="htxwp_subtitle" value="<?php echo esc_attr($htxwp_subtitle); ?>" /></td>
        </tr>
        <tr>
            <td>行业标准SEO关键词<span>（keywords内容 多个用,隔开）</span></td>
            <td><input type="text" name="htxwp_keywords" value="<?php echo esc_attr($htxwp_keywords); ?>" required="required" /></td>
        </tr>
        <tr>
            <td>行业标准SEO概述<span>（description内容）</span></td>
            <td><textarea name="htxwp_description" rows="3" class="text"  required="required"><?php echo esc_attr($htxwp_description); ?></textarea></td>
        </tr>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config2.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
        <tr>
            <td>行业收费标准介绍</td>
            <td style="padding-bottom:10px;">
            <!--<textarea style="display:none;" name="bid_desc" rows="3" class="text" id="useueditor3"  required="required"><?//php echo $bid_desc; ?></textarea>-->
			<div style="width:100%;"><script id="editor_subcats" type="text/plain" name="subcats_fee_desc" style="width:100%;height:320px;"><?php echo $htxwp_content; ?></script></div>            
            </td>
        </tr>
<script type="text/javascript">
    var ue_subcats = UE.getEditor('editor_subcats');	//ue2 is an operable object		
</script> 
        <tr>
            <td>终编者<span>（最后编辑审核人）</span></td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo get_post_meta( $post->ID, '_final_editor', true ); ?></div></td>
            <input type="hidden"  name="final_editor" value="<?php echo $final_editor; ?>" />
        </tr>        
    </table>
<?php
}	//display_subcats_meta_box() end

function display_assignments_meta_box($post){

	wp_enqueue_style('htx-plugin-admin-seo-menu-css-seo-menu', home_url().'/p/css/admin/custom-meta.css');	
	//nonce for security
	wp_nonce_field( plugin_basename( __FILE__ ), 'htx_nonce_field_name' );	
	// retrieve assignments meta box values	
	$ass_title				= get_post_meta( $post->ID, '_htx_ass_title', true );		
	$ass_subcat_id			= get_post_meta( $post->ID, '_htx_ass_subcat_id', true );
	$ass_fei 				= get_post_meta( $post->ID, '_htx_ass_fei', true );		
	$ass_url 				= get_post_meta( $post->ID, '_htx_ass_url', true );
	$ass_make_url 			= get_post_meta( $post->ID, '_htx_ass_make_url', true );
	$ass_must_provid 		= get_post_meta( $post->ID, '_htx_ass_must_provid', true );
	$ass_must_cityid 		= get_post_meta( $post->ID, '_htx_ass_must_cityid', true );
	$ass_must_areaid 		= get_post_meta( $post->ID, '_htx_ass_must_areaid', true );	
	$ass_scale 				= get_post_meta( $post->ID, '_htx_ass_scale', true );
	$ass_bid_end 			= get_post_meta( $post->ID, '_htx_ass_bid_end', true );
	$ass_make_start			= get_post_meta( $post->ID, '_htx_ass_make_start', true );
	$ass_project_timelimit	= get_post_meta( $post->ID, '_htx_ass_project_timelimit', true );
	$ass_desc 				= $post->post_content;
	$ass_work_demand 		= get_post_meta( $post->ID, '_htx_ass_work_demand', true );
	$ass_quali_demand 		= get_post_meta( $post->ID, '_htx_ass_quali_demand', true );
	$ass_now_have 			= get_post_meta( $post->ID, '_htx_ass_now_have', true );	
	$ass_author_obj			= get_user_by('id', $post->post_author);
	$ass_contacts 			= $ass_author_obj->nickname;
	$ass_mobile 			= get_user_meta($ass_author_obj->ID, 'custom_user_mobile', true);
	$ass_email 				= $ass_author_obj->user_email;
	$ass_accept_fee			= get_post_meta( $post->ID, '_htx_ass_accept_fee', true );	
	$ass_exp_candidates		= get_post_meta( $post->ID, '_htx_ass_exp_candidates', true );		
	$ass_exp_selected		= get_post_meta( $post->ID, '_htx_ass_exp_selected', true );		
	$ass_winning_bidder 	= get_post_meta( $post->ID, '_htx_ass_winning_bidder', true );
	
	$win_bidder_id 			= get_user_by('login', $ass_winning_bidder)->ID;
	$win_bidder_mobile 		= get_user_meta($win_bidder_id, 'custom_user_mobile', true);
	$win_bidder_email 		= get_user_by('login', $ass_winning_bidder)->user_email;	
		
	$ass_making_start		= get_post_meta( $post->ID, '_htx_ass_making_start', true );	
	$ass_look_and_notes		= get_post_meta( $post->ID, '_htx_ass_look_and_notes', true );
	
	$final_editor			= get_currentuserinfo()->user_login;	
		
	$ass_bigcat_id = get_post_meta( $post->ID, '_htx_ass_bigcat_id', true );
	$big_name = get_term($ass_bigcat_id, 'assignmentstax')->name;	
	$currentsubcat = get_post( $ass_subcat_id );
	$subcat_name = $currentsubcat->post_title;
	$standard_title = get_post_meta($ass_subcat_id, '_standard_title', true);

	global $wpdb;
	$postid = $post->ID;
	$bidder_userid = get_user_by('login', $ass_winning_bidder)->ID;	
	$commentid_query = " SELECT comment_ID FROM htx_comments WHERE comment_post_ID='{$postid}' AND user_id='{$bidder_userid}' ";
	$bid_obj = $wpdb->get_row($commentid_query);
	$commentid = $bid_obj->comment_ID;
	$bidder_conform_start_time = get_comment_meta($commentid, 'bidder_conform_start_time', true);
	$con_time = $bidder_conform_start_time ? '已确认' : '未确认';	
	
	$bidder_conform_finish = get_comment_meta($commentid, 'bidder_conform_finish', true);
	
	$ass_complete = get_comment_meta($commentid, 'bidder_conform_complete', true);
	
?>
    <table class="custom_table">
<?php
//if( !empty(get_post_meta( $post->ID, '_htx_ass_accept_fee', true )) && !empty(get_post_meta( $post->ID, '_htx_ass_exp_selected', true )) ){
$post_status = get_post($post->ID)->post_status	;
$bidder_conform_start_time = get_comment_meta( $commentid, 'bidder_conform_start_time', true );
$bidder_conform_finish = get_comment_meta( $commentid, 'bidder_conform_finish', true );
$bidder_conform_complete = get_comment_meta( $commentid, 'bidder_conform_complete', true );

if($post_status=='publish' && empty($ass_winning_bidder)){ 
	wp_set_object_terms($post->ID, 24, 'assignmentsstatus' ); //tendering 
}
$termArr = wp_get_object_terms($post->ID, 'assignmentsstatus', array('fields' => 'names')); 
$termname = $termArr[0]; 	
?>
        <tr>
            <td>任务状态</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $termname; ?></div></td>
        </tr>    
        <tr>
            <td>任务标题</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $ass_title; ?></div></td>
        </tr>
        <tr>
            <td>ID</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $post->ID; ?></div></td>
        </tr>
          
        <tr>
        <td><a target="_blank" title="查看" href="/htxcms/wp-admin/edit.php?post_type=assignments&page=bo_setting_standard_menu_slug">大类-子类-行业标准</a></td><td><input type="text"  name="ass_subcat_tit" value="<?php echo $big_name."-".$subcat_name."-".$standard_title; ?>" /></td>
        </tr>
        <tr>
            <td>服务费预算(元)</td>
            <td><input type="text"  name="ass_fei" id="ass_fei" value="<?php echo esc_attr($ass_fei); ?>" /></td>
        </tr>
        <tr>
            <td>任务所在地址</td>
            <td><input type="text"  name="ass_url" value="<?php echo esc_attr($ass_url); ?>" /></td>
        </tr>
        <tr>
            <td>任务制作地址</td>
            <td><input type="text"  name="ass_make_url" value="<?php echo esc_attr($ass_make_url); ?>" /></td>
        </tr>
        
        <tr>
            <td>要求服务商所在地</td>
            <td class="pca">            
				<span>省</span><select name="ass_must_provid" id="province">
					<option value="<?php echo esc_attr($ass_must_provid); ?>"><?php echo esc_attr($ass_must_provid); ?></option>
				</select>
				<span>市</span><select name="ass_must_cityid" id="city">
					<option value="<?php echo esc_attr($ass_must_cityid); ?>"><?php echo esc_attr($ass_must_cityid); ?></option>
				</select>
				<span>县/区</span><select name="ass_must_areaid" id="area">
					<option value="<?php echo esc_attr($ass_must_areaid); ?>"><?php echo esc_attr($ass_must_areaid); ?></option>		
				</select>                       
            </td>
        </tr>  
        <tr>
            <td>任务规模</td>
            <td><input type="text"  name="ass_scale" value="<?php echo esc_attr($ass_scale); ?>" /></td>
        </tr>
        <tr>
            <td>投标截止期<span>（比如：2017-01-01）</span></td>
            <td><input type="text"  name="ass_bid_end" id="ass_bid_end" value="<?php echo esc_attr($ass_bid_end); ?>" onClick="laydate({istime:true, format:'YYYY-MM-DD'})"/></td>
        </tr>
        <tr>
        	<td>动工日<span>（要求中标方制作起始时间）</span></td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo esc_attr($ass_make_start); ?></div></td>
        </tr>
        <tr>
        	<td>确认动工日<span>（中标方是否确认动工日）</span></td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $con_time; ?></div></td>
        </tr>
        <tr>
            <td>预计服务工期<span>（服务天数）</span></td>
            <td><input type="text"  name="ass_project_timelimit" id="ass_project_timelimit" value="<?php echo $ass_project_timelimit; ?>"/></td>
        </tr> 
<script type="text/javascript">	
	document.getElementById("ass_fei").onblur=function(){	
		if(!document.getElementById("ass_fei").value.match(/^\+?[1-9][0-9]*$/)){ //If it is not a non - positive integer
			alert("请输入正整数");
			return false;
		}
	}
	
	document.getElementById("ass_project_timelimit").onblur=function(){	
		if(!document.getElementById("ass_project_timelimit").value.match(/^\+?[1-9][0-9]*$/)){ //If it is not a non - positive integer
			alert("请输入正整数");
			return false;
		}
	}
	
	document.getElementById("ass_bid_end").onblur=function(){	
		if(!document.getElementById("ass_bid_end").value.match(/(([0-9]{3}[1-9]|[0-9]{2}[1-9][0-9]{1}|[0-9]{1}[1-9][0-9]{2}|[1-9][0-9]{3})-(((0[13578]|1[02])-(0[1-9]|[12][0-9]|3[01]))|((0[469]|11)-(0[1-9]|[12][0-9]|30))|(02-(0[1-9]|[1][0-9]|2[0-8]))))|((([0-9]{2})(0[48]|[2468][048]|[13579][26])|((0[48]|[2468][048]|[3579][26])00))-02-29)/)){ 
			alert("请正确的日期格式");
			return false;
		}
	}
</script>       
<script src="/p/js/admin/laydate/laydate.js"></script>
<script src="/p/js/admin/laydate/laydate_use.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config2.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
        <tr>
            <td>任务介绍</td>
            <td style="padding-bottom:10px;">
            <textarea style="display:none;" name="ass_desc" rows="3" class="text" id="useueditor2"  required="required"><?php echo $ass_desc; ?></textarea>
			<div style="width:100%;"><script id="editor" type="text/plain" style="width:100%;height:320px;"><?php echo $ass_desc; ?></script></div>            
            </td>
        </tr>
<script type="text/javascript">
    var ue2 = UE.getEditor('editor');	//ue2 is an operable object		
	ue2.onblur=function(){				
		$("#useueditor2").empty().html(ue2.getContent());			
	}
</script> 
        <tr>
            <td>任务对工作的要求</td>
            <td><textarea name="ass_work_demand" rows="3" class="text"  required="required"><?php echo esc_attr($ass_work_demand); ?></textarea></td>
        </tr>
        <tr>
            <td>任务对资质的要求</td>
            <td><textarea name="ass_quali_demand" rows="3" class="text"  required="required"><?php echo esc_attr($ass_quali_demand); ?></textarea></td>
        </tr>
        <tr>
            <td>现有资料注明<span>（选填）</span></td>
            <td><textarea name="ass_now_have" rows="3" class="text" ><?php echo esc_attr($ass_now_have); ?></textarea></td>
        </tr>
        <tr>
            <td>发来者<span> （雇主） </span></td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo esc_attr($ass_contacts); ?></div></td>
        </tr>
        <tr>
            <td>发来者手机号码</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo esc_attr($ass_mobile); ?></div></td>
        </tr>
        <tr>
            <td>发来者电子邮箱</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo esc_attr($ass_email); ?></div></td>
        </tr>
        <tr>
            <td>已收服务费(元)</td>
            <td><input type="text"  name="ass_accept_fee" value="<?php echo esc_attr($ass_accept_fee); ?>" /></td>
        </tr>
        <tr>
            <td>可选专家</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $ass_exp_candidates; ?></div></td>
        </tr> 
        <tr>
            <td>选中专家<span>（作为项目把关的专家）</span></td>
            <td><div class="disabled_update" style="border:1px solid #ccc"><?php if($ass_exp_selected) echo $ass_exp_selected.'-'.get_post_meta($ass_exp_selected, '_htx_exp_name', true); ?></div></td>
        </tr>        
        <tr>
        	<td>中标者</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo esc_attr($ass_winning_bidder); ?></div></td>
        </tr>
        <tr>
            <td>中标者手机号码</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $win_bidder_mobile; ?></div></td>
        </tr>
        <tr>
            <td>中标者电子邮箱</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $win_bidder_email; ?></div></td>
        </tr>
<?php if(!empty($bidder_conform_finish)){ ?>       
        <tr>
            <td>任务竣工请勾选</td>
            <td><input style="width:30px; height:30px;" type="checkbox"  name="ass_complete" value="1" <?php if($ass_complete) echo 'checked="checked"'; ?> /></td>
        </tr>  
        <tr>
            <td>&nbsp;</td>
            <td><p style="color:#898989; margin-bottom:15px;">当完工后，雇主在专家协助验收合格，点击【会员中心-我发布的任务-操作-绿色结款按钮】结清款项之后，核对人在此勾选，表示竣工。</p></td>
        </tr> 
<?php } ?>     
        <tr>
            <td>审核备注<span>（供核对人选填）</span></td>
            <td><textarea name="ass_look_and_notes" rows="3" class="text"><?php echo esc_attr($ass_look_and_notes); ?></textarea></td>
        </tr>
        <tr>
            <td>终编者<span>（最后编辑审核人）</span></td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo get_post_meta( $post->ID, '_final_editor', true ); ?></div></td>
            <input type="hidden"  name="final_editor" value="<?php echo $final_editor; ?>" />
        </tr>
    </table>
    
    
    
<?php
	wp_enqueue_script('display_assignments_meta_box_jquery', home_url().'/p/js/jquery.min.js' );
	wp_enqueue_script('display_assignments_meta_box_datajs', home_url().'/p/js/prov_city_area_data.js' );
	wp_enqueue_script('display_assignments_meta_box_cutom_meta', home_url().'/p/js/admin/custom_meta.js', array('jquery'));	
}	//display_assignments_meta_box() end

function display_projects_meta_box($post){

	wp_enqueue_style('htx-plugin-admin-seo-menu-css-seo-menu', home_url().'/p/css/admin/custom-meta.css');	
	//nonce for security
	wp_nonce_field( plugin_basename( __FILE__ ), 'htx_nonce_field_name' );	
	// retrieve projects meta box values
	$pro_title				= get_post_meta( $post->ID, '_htx_pro_title', true );	
	$pro_subcat_id 			= get_post_meta( $post->ID, '_htx_pro_subcat_id', true );
	$pro_fei 				= get_post_meta( $post->ID, '_htx_pro_fei', true );		
	$pro_url 				= get_post_meta( $post->ID, '_htx_pro_url', true );
	$pro_make_url 			= get_post_meta( $post->ID, '_htx_pro_make_url', true );
	$pro_scale 				= get_post_meta( $post->ID, '_htx_pro_scale', true );
	$pro_make_start		= get_post_meta( $post->ID, '_htx_pro_make_start', true );
	$pro_project_timelimit	= get_post_meta( $post->ID, '_htx_pro_project_timelimit', true );
	$pro_desc 				= $post->post_content;
	$pro_work_demand 		= get_post_meta( $post->ID, '_htx_pro_work_demand', true );
	$pro_now_have 			= get_post_meta( $post->ID, '_htx_pro_now_have', true );	
	$pro_author_obj			= get_user_by('id', $post->post_author);
	$pro_contacts 			= $pro_author_obj->nickname;
	$pro_mobile 			= get_user_meta($pro_author_obj->ID, 'custom_user_mobile', true);
	$pro_email 				= $pro_author_obj->user_email;
	$pro_accept_fee			= get_post_meta( $post->ID, '_htx_pro_accept_fee', true );	
	$pro_making_start		= get_post_meta( $post->ID, '_htx_pro_making_start', true );	
	$pro_look_and_notes		= get_post_meta( $post->ID, '_htx_pro_look_and_notes', true );
	
	$final_editor			= get_currentuserinfo()->user_login;	
		
	$pro_bigcat_id = get_post_meta( $post->ID, '_htx_pro_bigcat_id', true );
	$big_name = get_term($pro_bigcat_id, 'assignmentstax')->name;	
	$currentsubcat = get_post( $pro_subcat_id );
	$subcat_name = $currentsubcat->post_title;
	$standard_title = get_post_meta($pro_subcat_id, '_standard_title', true);				
?>
    <table class="custom_table">
<?php
//if( !empty(get_post_meta( $post->ID, '_htx_ass_accept_fee', true )) && !empty(get_post_meta( $post->ID, '_htx_ass_exp_selected', true )) ){
$post_status = get_post($post->ID)->post_status	;
$termArr = wp_get_object_terms($post->ID, 'projectsstatus', array('fields' => 'names')); 
$termname = $termArr[0]; 	
?>
        <tr>
            <td>项目状态</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $termname; ?></div></td>
        </tr>    
        <tr>
            <td>项目标题</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $pro_title; ?></div></td>
        </tr>
        <tr>
            <td>ID</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $post->ID; ?></div></td>
        </tr>
          
        <tr>
            <td><a target="_blank" title="查看" href="/htxcms/wp-admin/edit.php?post_type=assignments&page=bo_setting_standard_menu_slug">大类-子类-行业标准</a></td><td><input type="text"  name="pro_subcat_tit" value="<?php echo $big_name."-".$subcat_name."-".$standard_title; ?>" /></td>
        </tr>
        <tr>
            <td>服务费预算(元)</td>
            <td><input type="text"  name="pro_fei" id="pro_fei" value="<?php echo esc_attr($pro_fei); ?>" /></td>
        </tr>
        <tr>
            <td>项目所在地址</td>
            <td><input type="text"  name="pro_url" value="<?php echo esc_attr($pro_url); ?>" /></td>
        </tr>
        <tr>
            <td>项目制作地址</td>
            <td><input type="text"  name="pro_make_url" value="<?php echo esc_attr($pro_make_url); ?>" /></td>
        </tr>
        
        <tr>
            <td>项目规模</td>
            <td><input type="text"  name="pro_scale" value="<?php echo esc_attr($pro_scale); ?>" /></td>
        </tr>
        <tr>
            <td>预计服务工期<span>（服务天数）</span></td>
            <td><input type="text"  name="pro_project_timelimit" id="pro_project_timelimit" value="<?php echo $pro_project_timelimit; ?>"/></td>
        </tr> 
<script type="text/javascript">	
	document.getElementById("pro_fei").onblur=function(){	
		if(!document.getElementById("pro_fei").value.match(/^\+?[1-9][0-9]*$/)){ //If it is not a non - positive integer
			alert("请输入正整数");
			return false;
		}
	}
	
	document.getElementById("pro_project_timelimit").onblur=function(){	
		if(!document.getElementById("pro_project_timelimit").value.match(/^\+?[1-9][0-9]*$/)){ //If it is not a non - positive integer
			alert("请输入正整数");
			return false;
		}
	}
</script>       
<script src="/p/js/admin/laydate/laydate.js"></script>
<script src="/p/js/admin/laydate/laydate_use.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config2.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
        <tr>
            <td>项目介绍</td>
            <td style="padding-bottom:10px;">
			<div style="width:100%;"><script id="editor_pro" name="pro_desc" type="text/plain" style="width:100%;height:320px;"><?php echo $pro_desc; ?></script></div>            
            </td>
        </tr>
<script type="text/javascript">
    var ue_pro = UE.getEditor('editor_pro');	//ue_pro is an operable object		
</script> 
        <tr>
            <td>项目对工作的要求</td>
            <td><textarea name="pro_work_demand" rows="3" class="text"  required="required"><?php echo esc_attr($pro_work_demand); ?></textarea></td>
        </tr>
        <tr>
            <td>现有资料注明<span>（选填）</span></td>
            <td><textarea name="pro_now_have" rows="3" class="text" ><?php echo esc_attr($pro_now_have); ?></textarea></td>
        </tr>
        <tr>
            <td>发来者<span> （雇主） </span></td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo esc_attr($pro_contacts); ?></div></td>
        </tr>
        <tr>
            <td>发来者手机号码</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo esc_attr($pro_mobile); ?></div></td>
        </tr>
        <tr>
            <td>发来者电子邮箱</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo esc_attr($pro_email); ?></div></td>
        </tr>
        <tr>
            <td>已收服务费(元)</td>
            <td><input type="text"  name="pro_accept_fee" value="<?php echo esc_attr($pro_accept_fee); ?>" /></td>
        </tr>
        <tr>
        	<td>动工日<span>（制作起始时间）</span></td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo esc_attr($pro_make_start); ?></div></td>
        </tr>
        <tr>
            <td>审核备注<span>（供核对人选填）</span></td>
            <td><textarea name="pro_look_and_notes" rows="3" class="text"><?php echo esc_attr($pro_look_and_notes); ?></textarea></td>
        </tr>
        <tr>
            <td>终编者<span>（最后编辑审核人）</span></td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo get_post_meta( $post->ID, '_final_editor', true ); ?></div></td>
            <input type="hidden"  name="final_editor" value="<?php echo $final_editor; ?>" />
        </tr>
    </table>
<?php
	wp_enqueue_script('display_projects_meta_box_jquery', home_url().'/p/js/jquery.min.js' );
	wp_enqueue_script('display_projects_meta_box_cutom_meta', home_url().'/p/js/admin/custom_meta.js', array('jquery'));	
}	//display_projects_meta_box() end


function display_experts_meta_box($post){

	wp_enqueue_style('htx-plugin-admin-seo-menu-css-seo-menu', home_url().'/p/css/admin/custom-meta.css');	
	//nonce for security
	wp_nonce_field( plugin_basename( __FILE__ ), 'htx_nonce_field_name' );
	
	// retrieve the expert meta box values
	//$exp_number_order		= get_post_meta( $post->ID, '_htx_exp_number_order', true );	
	$exp_name		 		= get_post_meta( $post->ID, '_htx_exp_name', true );
	$exp_sex		 		= get_post_meta( $post->ID, '_htx_exp_sex', true );		
			
	$exp_title		 		= get_post_meta( $post->ID, '_htx_exp_title', true );
	$exp_project_timelimit 	= get_post_meta( $post->ID, '_htx_exp_project_timelimit', true );
	$exp_work_project		= get_post_meta( $post->ID, '_htx_exp_work_project', true );			
	$exp_desc				= $post->post_content;
	$exp_upimg		 		= get_post_meta( $post->ID, '_htx_exp_upimg', true );		
	$exp_upphoto		 	= get_post_meta( $post->ID, '_htx_exp_upphoto', true );	
	
	$htx_exp_provid 		= get_post_meta( $post->ID, '_htx_exp_provid', true );
	$htx_exp_cityid 		= get_post_meta( $post->ID, '_htx_exp_cityid', true );
	$htx_exp_areaid 		= get_post_meta( $post->ID, '_htx_exp_areaid', true );	
	
	$user = get_user_by('id', $post->post_author);
	$exp_username = $user->user_login;	
    $exp_mobile = get_user_meta( $user->ID, 'custom_user_mobile', ture );
	$exp_email = $user->user_email;	

	$final_editor			= get_currentuserinfo()->user_login;	
?>
<table class="custom_table">
	<tr>
       <td>ID</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $post->ID; ?></div></td>
    </tr>
        <tr>
            <td>真实姓名</td>
            <td><input type="text"  name="exp_name" id="exp_name" value="<?php echo $exp_name; ?>" /></td>
        </tr>
        <tr>
           <td>性别</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $exp_sex; ?></div></td>
        </tr>
        <tr>
            <td>职称</td>
            <td><input type="text"  name="exp_title" id="exp_title" value="<?php echo $exp_title; ?>"/></td>
        </tr>
        <tr>
            <td>专家所在地</td>
            <td class="pca">            
				<span>省</span><select name="htx_exp_provid" id="province">
					<option value="<?php echo esc_attr($htx_exp_provid); ?>"><?php echo esc_attr($htx_exp_provid); ?></option>
				</select>
				<span>市</span><select name="htx_exp_cityid" id="city">
					<option value="<?php echo esc_attr($htx_exp_cityid); ?>"><?php echo esc_attr($htx_exp_cityid); ?></option>
				</select>
				<span>县/区</span><select name="htx_exp_areaid" id="area">
					<option value="<?php echo esc_attr($htx_exp_areaid); ?>"><?php echo esc_attr($htx_exp_areaid); ?></option>		
				</select>                       
            </td>
        </tr>  
        <tr>
            <td>工作年限</td>
            <td><input type="text"  name="exp_project_timelimit" id="exp_project_timelimit" value="<?php echo $exp_project_timelimit; ?>"/></td>
        </tr>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config2.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
    
        <tr>
            <td>项目经验</td>
            <td style="padding-bottom:10px;">        
            <script id="editor2" type="text/plain" name="exp_work_project" style="width:100%;height:240px;"><?php echo $exp_work_project; ?></script>          
            </td>
        </tr>
        <tr>
            <td>自我介绍</td>
            <td style="padding-bottom:10px;">
            <script id="editor" name="exp_desc" type="text/plain" style="width:100%;height:240px;"><?php echo $exp_desc; ?></script>           
            </td>
        </tr>
   
<script type="text/javascript">
    var ue2 = UE.getEditor('editor2');	//ue is an operable object		
    var ue = UE.getEditor('editor');	//ue is an operable object		
</script>
        <tr>
            <td>资质证书</td>
            <td><a href="<?php echo $exp_upimg; ?>" target="_blank"><img src="<?php echo $exp_upimg; ?>" /></a></td>
        </tr>
        <tr>
            <td>资质证书地址</td>
        	<td><input type="text"  name="exp_upimg" id="exp_upimg" value="<?php echo $exp_upimg; ?>"/></td>
        </tr>
        <tr>
            <td>形象照片</td>
            <td><a href="<?php echo $exp_upphoto; ?>" target="_blank"><img src="<?php echo $exp_upphoto; ?>" /></a></td>
        </tr>
        <tr>
            <td>形象照片地址</td>
        	<td><input type="text"  name="exp_upphoto" id="exp_upphoto" value="<?php echo $exp_upphoto; ?>"/></td>
        </tr> 
        <tr>
           <td>用户名</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $exp_username; ?></div></td>
        </tr>
        <tr>
           <td>手机号</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $exp_mobile; ?></div></td>
        </tr>
        <tr>
           <td>电子邮箱</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $exp_email; ?></div></td>
        </tr> 
        <tr>
            <td>终编者<span>（最后编辑审核人）</span></td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo get_post_meta( $post->ID, '_final_editor', true ); ?></div></td>
            <input type="hidden"  name="final_editor" value="<?php echo $final_editor; ?>" />
        </tr>     
</table>
<?php
	wp_enqueue_script('display_experts_meta_box_jquery', home_url().'/p/js/jquery.min.js' );
	wp_enqueue_script('display_experts_meta_box_datajs', home_url().'/p/js/prov_city_area_data.js' );
	wp_enqueue_script('display_experts_meta_box_cutom_meta', home_url().'/p/js/admin/custom_meta_for_exp_shop.js', array('jquery'));			
}	//display_experts_meta_box() end


function display_shops_meta_box($post){

	wp_enqueue_style('htx-plugin-admin-seo-menu-css-seo-menu', home_url().'/p/css/admin/custom-meta.css?ver=1.0');	
	//nonce for security
	wp_nonce_field( plugin_basename( __FILE__ ), 'htx_nonce_field_name' );
	
	// retrieve the shop meta box values	
	$htx_pc_name		 		= get_post_meta( $post->ID, '_htx_pc_name', true );		
	$htx_pc_front_photo			= get_post_meta( $post->ID, '_htx_pc_front_photo', true );
	$htx_pc_back_photo 			= get_post_meta( $post->ID, '_htx_pc_back_photo', true );
		
	$shop_pc_qualifi_name		= get_post_meta( $post->ID, '_shop_pc_qualifi_name', true );
	$shop_pc_qualifi_cont 		= get_post_meta( $post->ID, '_shop_pc_qualifi_cont', true );	
		
	$shop_enterprise_name		= get_post_meta( $post->ID, '_shop_enterprise_name', true );			
	//$shop_enterprise_code		= get_post_meta( $post->ID, '_shop_enterprise_code', true );
	$shop_enterprise_license	= get_post_meta( $post->ID, '_shop_enterprise_license', true );		
	$shop_enterprise_qualifi	= get_post_meta( $post->ID, '_shop_enterprise_qualifi', true );	
		
	$htx_shop_name		 		= get_post_meta( $post->ID, '_htx_shop_name', true );		
	$htx_shop_logo		 		= get_post_meta( $post->ID, '_htx_shop_logo', true );	
	$htx_shop_provid 			= get_post_meta( $post->ID, '_htx_shop_provid', true );
	$htx_shop_cityid 			= get_post_meta( $post->ID, '_htx_shop_cityid', true );
	$htx_shop_areaid 			= get_post_meta( $post->ID, '_htx_shop_areaid', true );	

	$htx_shop_desc				= $post->post_content;
	
	$user = get_user_by('id', $post->post_author);
	$shop_username = $user->user_login;	
    $shop_mobile = get_user_meta( $user->ID, 'custom_user_mobile', true);
	$shop_email = $user->user_email;	

	$final_editor			= get_currentuserinfo()->user_login;	
?>
<table class="custom_table">
	<tr>
       <td>ID</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $post->ID; ?></div></td>
    </tr>
        <tr>
            <td>店铺名称</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $htx_shop_name; ?></div></td>
        </tr>
        
        <tr>
            <td>商铺LOGO</td>
            <td><a href="<?php echo $htx_shop_logo; ?>" target="_blank"><img src="<?php echo $htx_shop_logo; ?>" /></a></td>
        </tr>
        <tr>
            <td>商铺LOGO地址</td>
        	<td><input type="text"  name="shop_logo" id="shop_logo" value="<?php echo $htx_shop_logo; ?>"/></td>
        </tr>         
        
        <tr>
            <td>商铺所在地</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $htx_shop_provid."-".$htx_shop_cityid."-".$htx_shop_areaid; ?></div></td>
            <!--<td class="pca">            
				<span>省</span><select name="shop_provid" id="province">
					<option value="<?//php echo esc_attr($htx_shop_provid); ?>"><?//php echo esc_attr($htx_shop_provid); ?></option>
				</select>
				<span>市</span><select name="shop_cityid" id="city">
					<option value="<?//php echo esc_attr($htx_shop_cityid); ?>"><?//php echo esc_attr($htx_shop_cityid); ?></option>
				</select>
				<span>县/区</span><select name="shop_areaid" id="area">
					<option value="<?//php echo esc_attr($htx_shop_areaid); ?>"><?//php echo esc_attr($htx_shop_areaid); ?></option>		
				</select>                       
            </td>-->
        </tr>  
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config2.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
        <tr>
            <td>店铺概述</td>
            <td style="padding-bottom:10px;">
            <script id="editor" name="shop_desc" type="text/plain" style="width:100%;height:240px;"><?php echo $htx_shop_desc; ?></script>           
            </td>
        </tr>  
<script type="text/javascript">	
    var ue = UE.getEditor('editor');	//ue is an operable object		
</script>
        <tr>
            <td>负责人或法定代表人姓名</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $htx_pc_name; ?></div></td>
        </tr>
        <tr>
            <td>身份证正面</td>
            <td><a href="<?php echo $htx_pc_front_photo; ?>" target="_blank"><img src="<?php echo $htx_pc_front_photo; ?>" /></a></td>
        </tr>
        <!--<tr>
            <td>身份证正面地址</td>
        	<td><input type="text"  name="pc_front_photo" id="pc_front_photo" value="<?//php echo $htx_pc_front_photo; ?>"/></td>
        </tr>-->         
        <tr>
            <td>身份证背面</td>
            <td><a href="<?php echo $htx_pc_back_photo; ?>" target="_blank"><img src="<?php echo $htx_pc_back_photo; ?>" /></a></td>
        </tr>
        <!--<tr>
            <td>身份证背面地址</td>
        	<td><input type="text"  name="pc_back_photo" id="pc_back_photo" value="<?//php echo $htx_pc_back_photo; ?>"/></td>
        </tr>--> 
<?php
	$idsarr = wp_get_object_terms($post->ID, 'shopstax', array('fields'=>'ids')); 
	$shop_term_id = $idsarr[0];
	if($shop_term_id==30){
?>  
        <tr>
            <td>执业资格证名称</td>
            <td><a href="<?php echo $shop_pc_qualifi_name; ?>" target="_blank"><img src="<?php echo $shop_pc_qualifi_name; ?>" /></a></td>
        </tr>
        <tr>
            <td>执业资格证正文</td>
            <td><a href="<?php echo $shop_pc_qualifi_cont; ?>" target="_blank"><img src="<?php echo $shop_pc_qualifi_cont; ?>" /></a></td>
        </tr>
<?php
	}
	if($shop_term_id==31){
?>     
        <tr>
            <td>企业名称</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $shop_enterprise_name; ?></div></td>
        </tr> 
        <tr>
            <td>统一社会信用代码</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $shop_enterprise_code; ?></div></td>
        </tr>         
        <tr>
            <td>营业执照</td>
            <td><a href="<?php echo $shop_enterprise_license; ?>" target="_blank"><img src="<?php echo $shop_enterprise_license; ?>" /></a></td>
        </tr>
        <tr>
            <td>建筑业企业资质证书</td>
            <td><a href="<?php echo $shop_enterprise_qualifi; ?>" target="_blank"><img src="<?php echo $shop_enterprise_qualifi; ?>" /></a></td>
        </tr>
<?php
	}
?>
        <!--<tr>
            <td>营业执照地址</td>
        	<td><input type="text"  name="shop_enterprise_license" id="shop_enterprise_license" value="<?//php echo $shop_enterprise_license; ?>"/></td>
        </tr>-->   
        <tr>
           <td>用户名</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $shop_username; ?></div></td>
        </tr>
        <tr>
           <td>手机号</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $shop_mobile; ?></div></td>
        </tr>
        <tr>
           <td>电子邮箱</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $shop_email; ?></div></td>
        </tr> 
        <tr>
            <td>终编者<span>（最后编辑审核人）</span></td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo get_post_meta( $post->ID, '_final_editor', true ); ?></div></td>
            <input type="hidden"  name="final_editor" value="<?php echo $final_editor; ?>" />
        </tr>     
</table>
<?php
	wp_enqueue_script('display_shops_meta_box_jquery', home_url().'/p/js/jquery.min.js' );
	//wp_enqueue_script('display_shops_meta_box_datajs', home_url().'/p/js/prov_city_area_data.js' );
	wp_enqueue_script('display_shops_meta_box_cutom_meta', home_url().'/p/js/admin/custom_meta_for_exp_shop.js', array('jquery'));			
}	//display_shops_meta_box() end

// hook to save our meta box data when the post is saved
add_action( 'save_post', 'htxwp_save_meta_box' );
function htxwp_save_meta_box( $post_id ) {
	
	// process form data if $_POST is set
	if(!isset( $_POST['htx_nonce_field_name'] ))
	return $post_id; 
		
	// if auto saving skip saving our meta box data
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
	return $post_id;
		
	//check nonce for security
	$nonce = $_POST['htx_nonce_field_name'];
	if(!wp_verify_nonce( $nonce, plugin_basename( __FILE__ ) ))
	return $post_id;

	//Referencing the wp-config.php file to get the database information
	require(dirname(dirname(dirname(dirname(dirname(__FILE__)))))."/wp-config.php");
	$con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Connection server error：".mysql_error());
    mysql_query("SET NAMES 'UTF8'");
    mysql_select_db(DB_NAME, $con) or die("Connection database error：".mysql_error());

//'slides', 'experts', 'assignments', 'shops', 'cases', 'voices', 'stories', 'news'
//if(get_post_type($post_id)=='slides'||get_post_type($post_id)=='voices'||get_post_type($post_id)=='stories'||get_post_type($post_id)=='news'){
if(get_post_type($post_id)=='slides'){		
	// save the meta box data as post meta using the post ID as a unique prefix
	update_post_meta( $post_id, '_htxwp_subtitle',				sanitize_text_field( $_POST['htxwp_subtitle'] ) );
	update_post_meta( $post_id, '_htxwp_keywords',				sanitize_text_field( $_POST['htxwp_keywords'] ) );
	update_post_meta( $post_id, '_htxwp_description', 			sanitize_text_field( $_POST['htxwp_description'] ) );

	// save the meta box data for news		
	//$new_content = str_replace( array('<?','?/>'), array('',''), $_POST['news_content'] );
	//$update_sql = "UPDATE htx_posts SET post_content='{$new_content}' WHERE ID='{$post_id}'";
	//$bool_result = mysql_query($update_sql);
		
	update_post_meta( $post_id, '_final_editor',				sanitize_text_field( $_POST['final_editor'] ) );	
	
}elseif(get_post_type($post_id)=='subcats'){
	
	update_post_meta( $post_id, '_standard_title',				sanitize_text_field( $_POST['standard_title'] ) );

	// save the meta box data as post meta using the post ID as a unique prefix
	update_post_meta( $post_id, '_htxwp_subtitle',				sanitize_text_field( $_POST['htxwp_subtitle'] ) );
	update_post_meta( $post_id, '_htxwp_keywords',				sanitize_text_field( $_POST['htxwp_keywords'] ) );
	update_post_meta( $post_id, '_htxwp_description', 			sanitize_text_field( $_POST['htxwp_description'] ) );	
	
	//$args = array( 'ID' => $post_id, 'post_content' => $_POST['editorValue'] );	
	//wp_update_post($args);
	//wp_insert_post($args8);
	/*global $wpdb;
	$table_posts = "htx_posts"; 
	$data_array = array( 
 		'post_content' => $_POST['editorValue']
	); 
	$where_clause = array( 
		'ID' => $post_id 
	); 
	$wpdb->update($table_posts,$data_array,$where_clause);*/
	
	$new_content = str_replace( array('<?','?>'), array('',''), $_POST['subcats_fee_desc'] );
	$update_sql = "UPDATE htx_posts SET post_content='{$new_content}' WHERE ID='{$post_id}'";
	$bool_result = mysql_query($update_sql);

	update_post_meta( $post_id, '_final_editor',				sanitize_text_field( $_POST['final_editor'] ) );	

}elseif(get_post_type($post_id)=='assignments'){		
	// save the meta box data for assignments	
	update_post_meta( $post_id, '_htx_ass_subcat_tit',   		sanitize_text_field( $_POST['ass_subcat_tit'] ) );
	update_post_meta( $post_id, '_htx_ass_fei',					sanitize_text_field( $_POST['ass_fei'] ) );	
	update_post_meta( $post_id, '_htx_ass_url',		    		sanitize_text_field( $_POST['ass_url'] ) );	
	update_post_meta( $post_id, '_htx_ass_make_url',			sanitize_text_field( $_POST['ass_make_url'] ) );	
	update_post_meta( $post_id, '_htx_ass_must_provid',			sanitize_text_field( $_POST['ass_must_provid'] ) );
	update_post_meta( $post_id, '_htx_ass_must_cityid',			sanitize_text_field( $_POST['ass_must_cityid'] ) );
	update_post_meta( $post_id, '_htx_ass_must_areaid',			sanitize_text_field( $_POST['ass_must_areaid'] ) );			
	update_post_meta( $post_id, '_htx_ass_scale',				sanitize_text_field( $_POST['ass_scale'] ) );	
	update_post_meta( $post_id, '_htx_ass_bid_end',				sanitize_text_field( $_POST['ass_bid_end'] ) );	
	update_post_meta( $post_id, '_htx_ass_project_timelimit',	sanitize_text_field( $_POST['ass_project_timelimit'] ) );	
	
	$new_content = str_replace( array('<?','?>'), array('',''), $_POST['ass_desc'] );
	$update_sql = "UPDATE htx_posts SET post_content='{$new_content}' WHERE ID='{$post_id}'";
	$bool_result = mysql_query($update_sql);
		
	update_post_meta( $post_id, '_htx_ass_work_demand',			sanitize_text_field( $_POST['ass_work_demand'] ) );	
	update_post_meta( $post_id, '_htx_ass_quali_demand',		sanitize_text_field( $_POST['ass_quali_demand'] ) );	
	update_post_meta( $post_id, '_htx_ass_now_have',			sanitize_text_field( $_POST['ass_now_have'] ) );
	update_post_meta( $post_id, '_htx_ass_accept_fee',			sanitize_text_field( $_POST['ass_accept_fee'] ) );
	update_post_meta( $post_id, '_htx_ass_look_and_notes',		sanitize_text_field( $_POST['ass_look_and_notes'] ) );
	update_post_meta( $post_id, '_final_editor',				sanitize_text_field( $_POST['final_editor'] ) );
	
	
	global $wpdb;
	$ass_complete = $_POST['ass_complete'];
	$postid = $post_id;
	$ass_winning_bidder = get_post_meta( $post_id, '_htx_ass_winning_bidder', true );
	$bidder_userid = get_user_by('login', $ass_winning_bidder)->ID;	
	$commentid_query = " SELECT comment_ID FROM htx_comments WHERE comment_post_ID='{$postid}' AND user_id='{$bidder_userid}' ";
	$bid_obj = $wpdb->get_row($commentid_query);
	$commentid = $bid_obj->comment_ID;
	
	$bidder_conform_finish = get_comment_meta($commentid, 'bidder_conform_finish', true);
	if(!empty($bidder_conform_finish)){	
		update_comment_meta($commentid, 'bidder_conform_complete', $ass_complete);		
		$bidder_conform_complete = get_comment_meta($commentid, 'bidder_conform_complete', true);
		if(!empty($bidder_conform_complete)){
			wp_set_object_terms($post_id, 29, 'assignmentsstatus' ); //completed
		}else{
			wp_set_object_terms($post_id, 28, 'assignmentsstatus' ); //finished
		}		
	}				

}elseif(get_post_type($post_id)=='projects'){		
	// save the meta box data for projects	
	update_post_meta( $post_id, '_htx_pro_subcat_tit',   		sanitize_text_field( $_POST['pro_subcat_tit'] ) );
	update_post_meta( $post_id, '_htx_pro_fei',					sanitize_text_field( $_POST['pro_fei'] ) );	
	update_post_meta( $post_id, '_htx_pro_url',		    		sanitize_text_field( $_POST['pro_url'] ) );	
	update_post_meta( $post_id, '_htx_pro_make_url',			sanitize_text_field( $_POST['pro_make_url'] ) );			
	update_post_meta( $post_id, '_htx_pro_scale',				sanitize_text_field( $_POST['pro_scale'] ) );
	//update_post_meta( $post_id, '_htx_pro_make_start',			sanitize_text_field( $_POST['pro_make_start'] ) );		
	update_post_meta( $post_id, '_htx_pro_project_timelimit',	sanitize_text_field( $_POST['pro_project_timelimit'] ) );	
	
	$new_content = str_replace( array('<?','?>'), array('',''), $_POST['pro_desc'] );
	$update_sql = "UPDATE htx_posts SET post_content='{$new_content}' WHERE ID='{$post_id}'";
	$bool_result = mysql_query($update_sql);
		
	update_post_meta( $post_id, '_htx_pro_work_demand',			sanitize_text_field( $_POST['pro_work_demand'] ) );	
	update_post_meta( $post_id, '_htx_pro_now_have',			sanitize_text_field( $_POST['pro_now_have'] ) );
	update_post_meta( $post_id, '_htx_pro_accept_fee',			sanitize_text_field( $_POST['pro_accept_fee'] ) );
	update_post_meta( $post_id, '_htx_pro_look_and_notes',		sanitize_text_field( $_POST['pro_look_and_notes'] ) );
	update_post_meta( $post_id, '_final_editor',				sanitize_text_field( $_POST['final_editor'] ) );	

}elseif(get_post_type($post_id)=='experts'){

	update_post_meta( $post_id, '_htx_exp_name',				sanitize_text_field( $_POST['exp_name'] ) );
	update_post_meta( $post_id, '_htx_exp_title',				sanitize_text_field( $_POST['exp_title'] ) );
	update_post_meta( $post_id, '_htx_exp_project_timelimit', 	sanitize_text_field( $_POST['exp_project_timelimit'] ) );
	
	update_post_meta( $post_id, '_htx_exp_provid',				sanitize_text_field( $_POST['htx_exp_provid'] ) );
	update_post_meta( $post_id, '_htx_exp_cityid',				sanitize_text_field( $_POST['htx_exp_cityid'] ) );
	update_post_meta( $post_id, '_htx_exp_areaid',				sanitize_text_field( $_POST['htx_exp_areaid'] ) );		
	
	update_post_meta( $post_id, '_htx_exp_work_project', str_replace( array('<?','?>'), array('',''), $_POST['exp_work_project'] ));

	$new_exp_desc		 		= str_replace( array('<?','?>'), array('',''), $_POST['exp_desc'] );
	$update_post_content_sql 	= "UPDATE htx_posts SET post_content='{$new_exp_desc}' WHERE ID='{$post_id}'";
	mysql_query($update_post_content_sql);		
		
	update_post_meta( $post_id, '_htx_exp_upimg',				sanitize_text_field( $_POST['exp_upimg'] ) );
	update_post_meta( $post_id, '_htx_exp_upphoto',				sanitize_text_field( $_POST['exp_upphoto'] ) );		
	
	update_post_meta( $post_id, '_final_editor',				sanitize_text_field( $_POST['final_editor'] ) );	

}elseif(get_post_type($post_id)=='shops'){

	$new_shop_desc		 		= str_replace( array('<?','?>'), array('',''), $_POST['shop_desc'] );
	$update_post_content_sql 	= "UPDATE htx_posts SET post_content='{$new_shop_desc}' WHERE ID='{$post_id}'";
	mysql_query($update_post_content_sql);	
	
	update_post_meta( $post_id, '_htx_shop_logo',				sanitize_text_field( $_POST['shop_logo'] ) );		
			
	update_post_meta( $post_id, '_final_editor',				sanitize_text_field( $_POST['final_editor'] ) );	

}

	mysql_close($con);
	
}	//htxwp_save_meta_box() end