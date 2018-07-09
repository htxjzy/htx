<?php 
/*
Template Name: 我的专家设置
*/
?>	
<?php get_header(); ?>
<link rel="stylesheet" href="/p/css/member.css">
<style>
.add-color{color:#FF5722;}
</style>
<a class="banner_box" style="background:url(/p/images/banners/banner_user.jpg) center top no-repeat;" href="#"></a>
<!-- banner end -->

<article class="layui-main">
<?php include(TEMPLATEPATH . '/p_user_menu.php'); ?>
    <div class="layui-center-box layui-clear">
        <div class="user-left">
<?php include(TEMPLATEPATH . '/p_user_center_sidebar.php'); ?>
<script>
$(function(){
	$(".layui-main .layui-clear > a:nth-child(1)").addClass("cur");
	$(".layui-main .layui-clear > .user-left > ul li.c-expert dl dd:nth-child(1) a").addClass("active");
	
});
</script>
        </div>
        <!--左边 end-->
        <div class="user-right">

			<div class="htx-box htx-box-add">
<?php
	$cur_user = $current_user->ID;
	$get_expert = $wpdb->get_results("SELECT ID FROM htx_posts WHERE post_type='experts' AND post_author='{$cur_user}'");
	if(empty($get_expert)){
		echo '<p style="margin-top:50px; color:#898989; text-align:center;">如果您具备专家的资格和能力，请点击下面按钮去申请做专家</p><a target="_blank" href="/other/expert">专家申请</a>';	
	}else{
	$cur_user = $current_user->ID;	
	$cur_expert = $wpdb->get_row("SELECT ID, post_content FROM htx_posts WHERE post_author='{$cur_user}' AND post_type='experts'");
	$expert_id = $cur_expert->ID;	
	$expert_content = $cur_expert->post_content;	
?>            
            
            
                <h3 style="margin-bottom:20px;">
                    <b class="bc-red">专家设置</b>
                </h3>
			<div class="page-submission-content">

<form class="layui-form layui-form-expert" id="htx_exp_form" action="">
	<?php wp_nonce_field( 'htx_expert_nonce_field_id', 'htx_expert_nonce_field_name' ); ?>        
	<div class="layui-form-item layui-form-item-exp">
    	<label class="layui-form-label">姓名</label>
    	<div class="layui-input-inline exp-inline">
        	<input type="text" name="exp_name" lay-verify="required|zhName" value="<?php echo get_post_meta( $expert_id, '_htx_exp_name', true ); ?>" placeholder="请输入真实姓名" class="layui-input" autocomplete="off" />
      	</div>
    	<div class="layui-input-inline exp-inline">
    		<input type="radio" name="exp_sex" value="男" title="男" <?php if(get_post_meta( $expert_id, '_htx_exp_sex', true )=='男') echo "checked"; ?>>
    		<input type="radio" name="exp_sex" value="女" title="女" <?php if(get_post_meta( $expert_id, '_htx_exp_sex', true )=='女') echo "checked"; ?>>
    	</div>
        <span class="sex">性别</span>
	</div>
	<div class="layui-form-item layui-form-item-exp">
    	<label class="layui-form-label">职称</label>
    	<div class="layui-input-inline exp-inline">
      		<input type="text" name="exp_title" required  lay-verify="required|title" placeholder="请输入专家职称" value="<?php echo get_post_meta( $expert_id, '_htx_exp_title', true ); ?>" class="layui-input" autocomplete="off">
    	</div>
    	<div class="layui-input-inline exp-inline exp-inline-wys">
      		<input type="text" name="exp_project_timelimit" value="<?php echo get_post_meta( $expert_id, '_htx_exp_project_timelimit', true ); ?>"  lay-verify="required|positiveInteger" placeholder="请输入阿拉伯数字" class="layui-input" autocomplete="off">
    	</div>
    	<span class="wys">工作年限</span>
        <span class="years">年</span>
	</div>
<?php 
$idsarr = wp_get_object_terms($expert_id, 'assignmentstax', array('fields'=>'ids'));
?>
    <div class="layui-form-item">
        <label class="layui-form-label">擅长领域（最多选3个）</label>
        <div class="layui-input-block exp_checkbox">
            <input type="checkbox" lay-filter="expCheckbox" lay-verify="isNOCheck" name="like[]" value="10" <?php if(in_array('10', $idsarr)) echo 'checked="checked"'; ?> title="工程咨询">
            <input type="checkbox" lay-filter="expCheckbox" lay-verify="isNOCheck" name="like[]" value="11" <?php if(in_array('11', $idsarr)) echo 'checked="checked"'; ?> title="工程勘察">
            <input type="checkbox" lay-filter="expCheckbox" lay-verify="isNOCheck" name="like[]" value="12" <?php if(in_array('12', $idsarr)) echo 'checked="checked"'; ?> title="工程设计">
            <input type="checkbox" lay-filter="expCheckbox" lay-verify="isNOCheck" name="like[]" value="13" <?php if(in_array('13', $idsarr)) echo 'checked="checked"'; ?> title="工程招标">
            <input type="checkbox" lay-filter="expCheckbox" lay-verify="isNOCheck" name="like[]" value="14" <?php if(in_array('14', $idsarr)) echo 'checked="checked"'; ?> title="工程造价">
            <input type="checkbox" lay-filter="expCheckbox" lay-verify="isNOCheck" name="like[]" value="15" <?php if(in_array('15', $idsarr)) echo 'checked="checked"'; ?> title="工程监理">
            <input type="checkbox" lay-filter="expCheckbox" lay-verify="isNOCheck" name="like[]" value="16" <?php if(in_array('16', $idsarr)) echo 'checked="checked"'; ?> title="工程施工">
            <input type="checkbox" lay-filter="expCheckbox" lay-verify="isNOCheck" name="like[]" value="17" <?php if(in_array('17', $idsarr)) echo 'checked="checked"'; ?> title="财务服务">
            <input type="checkbox" lay-filter="expCheckbox" lay-verify="isNOCheck" name="like[]" value="18" <?php if(in_array('18', $idsarr)) echo 'checked="checked"'; ?> title="评估服务">
            <input type="checkbox" lay-filter="expCheckbox" lay-verify="isNOCheck" name="like[]" value="19" <?php if(in_array('19', $idsarr)) echo 'checked="checked"'; ?> title="其他服务">
        </div>
    </div>
<?php 
	$getProv = get_post_meta( $expert_id, '_htx_exp_provid', true );
	$getCity = get_post_meta( $expert_id, '_htx_exp_cityid', true );
	$getArea = get_post_meta( $expert_id, '_htx_exp_areaid', true );	
	echo "<script> var getProv='{$getProv}', getCity='{$getCity}', getArea='{$getArea}';</script>";
?>
	<div class="layui-form-item layui-form-item-for-must-address"  style="z-index:1000; position:relative; left:-5px;">
    	<label class="layui-form-label">所在地区</label>
    	<div class="layui-input-inline layui-input-inline-for-must-address">
            <select name="provid" id="provid" lay-verify="isNullValue1" lay-filter="provid">
            <!--<option value="">请选择省</option>-->	
            </select>
        </div>
        <div class="layui-input-inline layui-input-inline-for-must-address">
            <select name="cityid" id="cityid" lay-verify="isNullValue2" lay-filter="cityid">
            <!--<option value="">请选择市</option>-->
            </select>           
        </div>
        <div class="layui-input-inline layui-input-inline-for-must-address">
            <select name="areaid" id="areaid" lay-verify="isNullValue3" lay-filter="areaid">
            <!--<option value="">请选择县/区</option>-->
            </select>            
        </div>
        <span>省</span>
        <span>市</span>
        <span>区/县</span>    
	</div>
<script type="text/javascript" src="/p/js/prov_city_area_data.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.for.expert.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">项目经验</label>
        <div class="layui-input-block">
            <div style="width:100%;"><script id="editor2" type="text/plain" name="exp_work_project" lay-verify="isEmptyEdit" placeholder="列出做过的项目" style="width:646px;height:240px;"><?php echo get_post_meta( $expert_id, '_htx_exp_work_project', true ); ?></script></div>
            <p style="color:#898989;">备注：项目经验栏中，请列出参与过的工程项目</p>        
        </div>
    </div>   

    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">自我介绍</label>
        <div class="layui-input-block">
            <div style="width:100%;"><script id="editor" type="text/plain" name="exp_desc" lay-verify="isEmptyEdit|nodisplay" placeholder="介绍从业资历" style="width:646px;height:240px;"><?php echo $expert_content; ?></script></div>
            <p style="color:#898989;">备注：自我介绍栏中，请填写从业资历等基本情况</p>      
        </div>
    </div>
   
<script type="text/javascript">
    var ue2 = UE.getEditor('editor2');	//ue is an operable object		
    var ue = UE.getEditor('editor');	//ue is an operable object			
</script>
    <div class="layui-form-item" style="margin-top:70px;">     
    	<div class="layui-inline layui-inline-upimg my-exp-upimg">
        <span>上传职称证书照</span> 
        <img class="layui-upload-img" src="<?php if(!empty(get_post_meta( $expert_id, '_htx_exp_upimg', true ))){ echo get_post_meta( $expert_id, '_htx_exp_upimg', true ); }else{ echo '/p/images/upimg_local_default2.png'; } ?>" id="locaimg">
            <button type="button" class="layui-btn" id="img-upload">
              <i class="layui-icon">&#xe681;</i>职称证书
            </button>
            <input type="hidden" name="exp_upimg" value="<?php echo get_post_meta( $expert_id, '_htx_exp_upimg', true ); ?>" lay-verify="isUpload" class="layui-input" autocomplete="off"/>
    	</div>
        
        
    	<div class="layui-inline layui-inline-upphoto my-exp-upphoto">
        	<span>上传专家形象照</span>
            <img class="layui-upload-img" src="<?php if(!empty(get_post_meta( $expert_id, '_htx_exp_upphoto', true ))){ echo get_post_meta( $expert_id, '_htx_exp_upphoto', true ); }else{ echo '/p/images/upimg_local_default2.png'; } ?>" id="locaphoto">
            <button type="button" class="layui-btn" id="photo-upload">
              	<i class="layui-icon">&#xe67c;</i>专家照片
            </button>
            <input type="hidden" name="exp_upphoto" value="<?php echo get_post_meta( $expert_id, '_htx_exp_upphoto', true ); ?>" lay-verify="isUpload" class="layui-input" autocomplete="off" />
    	</div>       
    </div>
    

	<div class="layui-form-item" style="margin-top:50px;">     
		<p class="pnotice2" style="width:420px;">备注：图片（小于1M）上传格式（jpg | jpeg | png | gif），<span class="add-color">多出的职称证书请点击自我介绍栏编辑器中的图片上传按钮进行上传</span>。</p>
	</div>
    <div class="layui-form-item">   
        <p class="pnotice" style="margin-left:160px; "><span style="margin-right:10px;">温馨提示：</span>为规范管理，避免不正当竞争，以上编辑的信息及上传的资料中请勿出现电话号码、E-mail、QQ、微信号等联系方式，否则可能无法通过审核，切记。</p>
    </div>  
    <!--<div class="layui-form-item">
      <label class="layui-form-label">专家协议</label>
      <div class="layui-input-block">
        <input type="checkbox" name="likeyes" title="同意" lay-filter="ischeckbox" checked="checked"><a style="margin-left:15px; position:relative; top:3px;" title="查阅" target="_blank" href="#">《成为火天信服务交易平台专家遵守的协议》</a>
      </div>
    </div>-->
            <input type="hidden" name="ass_must_provid" />
            <input type="hidden" name="ass_must_cityid" />
            <input type="hidden" name="ass_must_areaid" />       
    <hr class="layui-bg-gray">
    <div class="layui-form-item">
      <div class="layui-input-block layui-input-block-submit">
        <button class="layui-btn formSubmit" lay-submit lay-filter="expFormSubmit">保 存</button>
      </div>
    </div>
</form>
<script type="text/javascript" src="/p/js/submission_user_expert.js?ver=1.6"></script>
            </div>               
<?php
	} //end if is an expert
?> 
            </div><!--.htx-box end-->									         
															            
        </div>
    </div>
</article>
<?php get_footer(); ?>
<?php if(!is_user_logged_in()){ ?>
<script>	
layui.use('layer', function(){ 
		var $ = layui.$ 
		,layer = layui.layer;

		//layer.close(layer.index);
		layer.closeAll();
		layer.open({
			title: false,
			type: 1,
			content: $('#login-htx'),
			area: ['530px', '475px']
			,cancel: function(){ 
    			location.reload();
  			}			
		});				
});
</script>
<?php 
}
?>