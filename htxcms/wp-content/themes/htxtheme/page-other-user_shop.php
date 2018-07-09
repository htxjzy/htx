<?php 
/*
Template Name: 我的商铺
*/
?>	
<?php include TEMPLATEPATH . '/header.php'; ?>
<link rel="stylesheet" href="/p/css/member.css">
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
	$(".layui-main .layui-clear > .user-left > ul li:nth-child(3) dl dd:nth-child(1) a").addClass("active");
	
});
</script>
        </div>
        <!--左边 end-->
        <div class="user-right">
            <div class="htx-box htx-box-add">
<?php
	$cur_user = $current_user->ID;
	$get_shop = $wpdb->get_results("SELECT ID FROM htx_posts WHERE post_type='shops' AND post_author='{$cur_user}'");
	if(empty($get_shop)){
		echo '<p style="margin-top:50px; color:#898989; text-align:center;">您目前仍未开通商铺，必须要有商铺才能接任务哦，请点击下面按钮去申请开通商铺</p><a target="_blank" href="/other/shop">开通商铺</a>';	
	}else{
	$cur_user = $current_user->ID;	
	$cur_shop = $wpdb->get_row("SELECT ID, post_content FROM htx_posts WHERE post_author='{$cur_user}' AND post_type='shops'");
	$shop_id = $cur_shop->ID;	
	$shop_content = $cur_shop->post_content;	
	$idsarr = wp_get_object_terms($shop_id, 'shopstax', array('fields'=>'ids')); 
	$shop_term_id = $idsarr[0];
?>           
<!---->            
            
            <h3>
            	<b class="bc-red">我开通的商铺</b>
            </h3>
			<div class="page-submission-content">
 
<form class="layui-form layui-form-expert" id="htx_shop_form" action="">
	<?php wp_nonce_field( 'htx_shop_nonce_field_id', 'htx_shop_nonce_field_name' ); ?>
    <div class="layui-tab">
        <ul class="layui-tab-title">
            <li value="per" <?php if($shop_term_id != 31) echo 'class="layui-this"'; ?> >个人商铺<i></i></li>
            <li value="cor" <?php if($shop_term_id == 31) echo 'class="layui-this"'; ?> >公司商铺<i></i></li>
        </ul>
        <input type="hidden" name="whosedata" value="<?php if($shop_term_id != 31){ echo 'per';}else{ echo 'cor'; } ?>" />
        <hr>
        <div class="layui-tab-content">
            <div class="layui-tab-item  <?php if($shop_term_id != 31) echo 'layui-show'; ?>"> 
                <div class="layui-form-item">
                    <h2 class="shoph2"><i class="layui-icon">&#xe61f;</i> 个人实名认证</h2>
                </div>       
                <div class="layui-form-item">
                    <label class="layui-form-label">负责人真实姓名</label>
                    <div class="layui-input-inline shop-inline">
                        <input type="text" name="p_name" placeholder="请输入负责人姓名" value="<?php if($shop_term_id == 30) echo get_post_meta( $shop_id, '_htx_pc_name', true ); ?>" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item" style="margin-top:40px;">
                    <label class="layui-form-label">负责人身份证照正面</label>                 
                    <div class="layui-inline layui-inline-upimg"><img class="layui-upload-img" src="<?php if($shop_term_id == 30){ echo get_post_meta( $shop_id, '_htx_pc_front_photo', true ); }else{ echo "/p/images/upimg_local_default2.png"; } ?>" id="locaimg">
                        <button type="button" class="layui-btn" id="img-upload">
                          <i class="layui-icon">&#xe67c;</i>证件正面
                        </button>
                        <input type="hidden" name="p_front_photo" value="<?php if($shop_term_id == 30) echo get_post_meta( $shop_id, '_htx_pc_front_photo', true ); ?>" class="layui-input" autocomplete="off"/>
                    </div>
                </div>
                <div class="layui-form-item" style="margin-top:60px;">
                    <label class="layui-form-label">负责人身份证照背面</label>
                    <div class="layui-inline layui-inline-upphoto">
                        <img class="layui-upload-img" src="<?php if($shop_term_id == 30){ echo get_post_meta( $shop_id, '_htx_pc_back_photo', true ); }else{ echo "/p/images/upimg_local_default2.png"; } ?>" id="locaphoto">
                        <button type="button" class="layui-btn" id="photo-upload">
                            <i class="layui-icon">&#xe67c;</i>证件背面
                        </button>
                        <input type="hidden" name="p_back_photo" value="<?php if($shop_term_id == 30) echo get_post_meta( $shop_id, '_htx_pc_back_photo', true ); ?>" class="layui-input" autocomplete="off" />
                    </div>    
                </div>
                <div class="layui-form-item">     
                    <p class="pnotice2" style="width:420px;">备注：证件（小于1M）上传格式（jpg | jpeg | png | gif）</p>
                </div>            
                             
            </div>
            <div class="layui-tab-item <?php if($shop_term_id == 31) echo 'layui-show'; ?>">
            
                <div class="layui-form-item">
                    <h2 class="shoph2"><i class="layui-icon">&#xe61f;</i> 公司实名认证</h2>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">企业名称</label>
                    <div class="layui-input-block">
                        <input type="text" name="c_enterprise_name" placeholder="请输入与营业执照上一致的企业名称" value="<?php if($shop_term_id == 31) echo get_post_meta( $shop_id, '_shop_enterprise_name', true ); ?>" autocomplete="off" class="layui-input" style="width:50%;">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">营业执照号码</label>
                    <div class="layui-input-block">
                        <input type="text" name="c_enterprise_code" placeholder="请输入营业执照编号或统一社会信用代码" value="<?php if($shop_term_id == 31) echo get_post_meta( $shop_id, '_shop_enterprise_code', true ); ?>" autocomplete="off" class="layui-input" style="width:50%;">
                    </div>
                </div>
               <div class="layui-form-item" style="margin-top:35px;">
                    <label class="layui-form-label">营业执照图片</label>
                  
                    <div class="layui-inline layui-inline-upimg">
                    	<img class="layui-upload-img" src="<?php if($shop_term_id == 31){ echo get_post_meta( $shop_id, '_shop_enterprise_license', true ); }else{ echo "/p/images/upimg_local_default2.png"; } ?>" id="locaimgzz">
                        <button type="button" class="layui-btn" id="img-upload2">
                          <i class="layui-icon">&#xe67c;</i>营业执照
                        </button>
                        <input type="hidden" name="c_enterprise_license" value="<?php if($shop_term_id == 31) echo get_post_meta( $shop_id, '_shop_enterprise_license', true ); ?>" class="layui-input" autocomplete="off"/>
                    </div>
                </div>

                       
                <div class="layui-form-item" style="margin-top:60px;">
                    <label class="layui-form-label">法定代表人姓名</label>
                    <div class="layui-input-block">
                        <input type="text" name="c_name" placeholder="请输入负责人的姓名" value="<?php if($shop_term_id == 31) echo get_post_meta( $shop_id, '_htx_pc_name', true ); ?>" autocomplete="off" class="layui-input" style="width:50%;">
                    </div>
                </div>
                <div class="layui-form-item" style="margin-top:40px;">
                    <label class="layui-form-label">法定代表人身份证正面</label>
                  
                    <div class="layui-inline layui-inline-upimg">
                    	<img class="layui-upload-img" src="<?php if($shop_term_id == 31){ echo get_post_meta( $shop_id, '_htx_pc_front_photo', true ); }else{ echo "/p/images/upimg_local_default2.png"; } ?>" id="locaimg2">
                        <button type="button" class="layui-btn" id="img-upload3">
                          <i class="layui-icon">&#xe67c;</i>证照正面
                        </button>
                        <input type="hidden" name="c_front_photo" value="<?php if($shop_term_id == 31) echo get_post_meta( $shop_id, '_htx_pc_front_photo', true ); ?>" class="layui-input" autocomplete="off"/>
                    </div>
                </div>
                <div class="layui-form-item" style="margin-top:60px;">
                    <label class="layui-form-label">法定代表人身份证背面</label>
                    <div class="layui-inline layui-inline-upphoto">
                        <img class="layui-upload-img" src="<?php if($shop_term_id == 31){ echo get_post_meta( $shop_id, '_htx_pc_back_photo', true ); }else{ echo "/p/images/upimg_local_default2.png"; } ?>" id="locaimg3">
                        <button type="button" class="layui-btn" id="img-upload4">
                            <i class="layui-icon">&#xe67c;</i>证照背面
                        </button>
                        <input type="hidden" name="c_back_photo" value="<?php if($shop_term_id == 31) echo get_post_meta( $shop_id, '_htx_pc_back_photo', true ); ?>" class="layui-input" autocomplete="off" />
                    </div>    
                </div>
                <div class="layui-form-item">     
                    <p class="pnotice2" style="width:420px;">备注：证件（小于1M）上传格式（jpg | jpeg | png | gif）</p>
                </div>             
            </div><!--the 2rst-->
        </div>
    </div><!--.layui-tab end-->
	<div class="layui-form-item" style="margin-top:22px;">
    	<h2 class="shoph2" style="position:relative; left:12px;"><i class="layui-icon">&#xe61f;</i> 商铺基本资料</h2>
	</div>      
	<div class="layui-form-item">
    	<label class="layui-form-label">店铺名称</label>
    	<div class="layui-input-block">
      		<input type="text" name="shop_name" lay-verify="required|shopName" placeholder="请输入店铺名称" value="<?php echo get_post_meta( $shop_id, '_htx_shop_name', true ); ?>" autocomplete="off" class="layui-input" style="width:650px;">
    	</div>
	</div>

    <div class="layui-form-item shoplogo">
    	<label class="layui-form-label">店铺LOGO</label>                 
          <div class="layui-inline layui-inline-uplogo">
              <img class="layui-upload-img" src="<?php if(!empty(get_post_meta( $shop_id, '_htx_shop_logo', true ))){ echo get_post_meta( $shop_id, '_htx_shop_logo', true ); }else{ echo '/p/images/upimg_local_default2.png';  } ?>" id="logoimg">
              <button type="button" class="layui-btn" id="logoimg-upload">
              	<i class="layui-icon">&#xe67c;</i>上传LOGO
              </button>
              <input type="hidden" name="logo_img" value="<?php echo get_post_meta( $shop_id, '_htx_shop_logo', true ); ?>" lay-verify="isUpload" class="layui-input" autocomplete="off"/>
          </div>
    </div>
    
<?php 
	$getProv = get_post_meta( $shop_id, '_htx_shop_provid', true );
	$getCity = get_post_meta( $shop_id, '_htx_shop_cityid', true );
	$getArea = get_post_meta( $shop_id, '_htx_shop_areaid', true );	
	echo "<script> var getProv='{$getProv}', getCity='{$getCity}', getArea='{$getArea}';</script>";
?>
	<div class="layui-form-item layui-form-item-for-must-address"  style="z-index:1000;">
    	<label class="layui-form-label">所在地区</label>
    	<div class="layui-input-inline layui-input-inline-for-must-address">
            <select name="provid" id="provid" lay-filter="provid">
            <!--<option value="">请选择省</option>-->	
            </select>
        </div>
        <div class="layui-input-inline layui-input-inline-for-must-address">
            <select name="cityid" id="cityid" lay-filter="cityid">
            <!--<option value="">请选择市</option>-->
            </select>           
        </div>
        <div class="layui-input-inline layui-input-inline-for-must-address">
            <select name="areaid" id="areaid" lay-filter="areaid">
            <!--<option value="">请选择县/区</option>-->
            </select>            
        </div>
        <span>省</span>
        <span>市</span>
        <span>区/县</span>    
	</div>

<?php 
$idsarr = wp_get_object_terms($shop_id, 'assignmentstax', array('fields'=>'ids')); 
?>
    <div class="layui-form-item">
        <label class="layui-form-label">承接领域（最多选3个）</label>
        <div class="layui-input-block exp_checkbox shop_checkbox">
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
<script type="text/javascript" src="/p/js/prov_city_area_data.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.for.expert.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">商铺概述</label>
        <div class="layui-input-block">
            <div style="width:100%;"><script id="editor" name="shop_desc" lay-verify="isEmptyEdit|nodisplay" type="text/plain" style="width:646px;height:240px;">
<?php 
echo $shop_content; 
?>
            </script></div>
            <p style="color:#898989;">备注：商铺概述栏中，请填写商铺经营范围等基本情况</p>      
        </div>
    </div>
   
<script type="text/javascript">
    var ue = UE.getEditor('editor');	//ue is an operable object			
</script>
    <div class="layui-form-item">   
        <p class="pnotice" style="margin-left:160px; "><span style="margin-right:10px;">温馨提示：</span>为规范管理，避免不正当竞争，以上填写的信息及上传的资料中请勿出现电话号码、<br/>E-mail、QQ、微信号等联系方式，否则可能无法通过审核，切记。</p>
    </div>  
    <!--<div class="layui-form-item">
      <label class="layui-form-label">商铺协议</label>
      <div class="layui-input-block">
        <input type="checkbox" name="likeyes" title="同意" lay-filter="ischeckbox" checked="checked"><a style="margin-left:15px; position:relative; top:3px;" title="查阅" target="_blank" href="#">《成为火天信服务交易平台商铺遵守的协议》</a>
      </div>
    </div>-->
            <input type="hidden" name="ass_must_provid" />
            <input type="hidden" name="ass_must_cityid" />
            <input type="hidden" name="ass_must_areaid" />       
    <hr class="layui-bg-gray">
    <div class="layui-form-item">
      <div class="layui-input-block layui-input-block-submit">
        <button class="layui-btn formSubmit" lay-submit lay-filter="shopFormSubmit">保 存</button>
      </div>
    </div>
</form>
<script type="text/javascript" src="/p/js/submission_user_shop.js?ver=1.3"></script>
            </div>               
<?php
	} //end if has shop
?>                                               
            </div>
        </div>        
    </div>
</article>
<?php include TEMPLATEPATH . '/footer.php'; ?>
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
<?php } ?>	