<?php 
/*
Template Name: 开通商铺
*/
?>
<?php 
if(is_user_logged_in()){	//is_user_logged_in()
	$cur_user = $current_user->ID;
	$shoparrs = $wpdb->get_results("SELECT post_author FROM htx_posts WHERE post_type='shops'");		
	foreach($shoparrs as $shoparr){
		$sho_author = $shoparr->post_author;		
		if($cur_user == $sho_author){
			$toUrl=home_url()."/other/user_shop";
			header ("location:{$toUrl}");
			break;
		}		
	}//end foreach
}
?>
<?php include TEMPLATEPATH . '/header.php'; ?>
<div class="page-submission">
	<div class="dyn-nav">
		<blockquote class="layui-elem-quote">当前位置 <i class="layui-icon" style="font-size:22px; margin:0 10px; color:#FF5722;">&#xe715;</i> <a href="/" title="返回首页">首页</a><i class="layui-icon" style="font-size:16px; margin:0 10px; color:#666;">&#xe602;</i><span>开通商铺</span></blockquote>
    </div>
    <div class="page-submission-wrap layui-row layui-col-space30">
    
    	<div class="layui-col-md9">
			<div class="page-submission-content">
            	<h1>开通商铺 <i class="layui-icon" style="font-size:28px; color:#cc3333; font-weight:bold; float:left;">&#xe609;</i></h1>
                <hr class="layui-bg-gray">
<form class="layui-form layui-form-expert" id="htx_shop_form" action="">
	<?php wp_nonce_field( 'htx_shop_nonce_field_id', 'htx_shop_nonce_field_name' ); ?>
    <div class="layui-tab">
        <ul class="layui-tab-title">
            <li value="per" class="layui-this">个人商铺<i></i></li>
            <li value="cor">公司商铺<i></i></li>
        </ul>
        <input type="hidden" name="whosedata" value="per" />
        <hr>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show"> 
                <div class="layui-form-item">
                    <h2 class="shoph2"><i class="layui-icon">&#xe61f;</i> 个人实名认证</h2>
                </div>       
                <div class="layui-form-item">
                    <label class="layui-form-label">负责人真实姓名</label>
                    <div class="layui-input-inline exp-inline">
                        <input type="text" name="p_name" lay-verify="required|zhName" placeholder="请输入负责人姓名" autocomplete="off" class="layui-input">
                    </div>
                </div>
                
                <div class="layui-form-item" style="margin-top:40px;">
                    <label class="layui-form-label">负责人身份证照正面</label>                 
                    <div class="layui-inline layui-inline-upimg"><img class="layui-upload-img" src="/p/images/upimg_local_default2.png" id="locaimg">
                        <button type="button" class="layui-btn" id="img-upload">
                          <i class="layui-icon">&#xe67c;</i>证件正面
                        </button>
                        <input type="hidden" name="p_front_photo" value="" lay-verify="isUpload" class="layui-input" autocomplete="off"/>
                    </div>
                </div>
                <div class="layui-form-item" style="margin-top:60px;">
                    <label class="layui-form-label">负责人身份证照背面</label>
                    <div class="layui-inline layui-inline-upphoto">
                        <img class="layui-upload-img" src="/p/images/upimg_local_default2.png" id="locaphoto">
                        <span>参考如右图所示 <i class="layui-icon">&#xe602;</i></span>
                        <button type="button" class="layui-btn" id="photo-upload">
                            <i class="layui-icon">&#xe67c;</i>证件背面
                        </button>
                        <input type="hidden" name="p_back_photo" value="" lay-verify="isUpload" class="layui-input" autocomplete="off" />
                    </div>    
                </div>
                
               <div class="layui-form-item" style="margin-top:160px;">
                    <label class="layui-form-label">执业资格证照名称</label>                 
                    <div class="layui-inline layui-inline-upimg">
                    	<img class="layui-upload-img" src="/p/images/upimg_local_default2.png" id="locaimg-qualifi-name">
                        <button type="button" class="layui-btn" id="qualifi-name-upload">
                          <i class="layui-icon">&#xe67c;</i>证照名称
                        </button>
                        <input type="hidden" name="p_qualification_name" value="" lay-verify="isUpload" class="layui-input" autocomplete="off"/>
                    </div>
                </div>
                <div class="layui-form-item" style="margin-top:60px; margin-bottom:60px;">
                    <label class="layui-form-label">执业资格证照正文</label>
                    <div class="layui-inline layui-inline-upphoto">
                        <img class="layui-upload-img" src="/p/images/upimg_local_default2.png" id="locaimg-qualifi-cont">
                        <span>参考如右图所示 <i class="layui-icon">&#xe602;</i></span>
                        <button type="button" class="layui-btn" id="qualifi-cont-upload">
                            <i class="layui-icon">&#xe67c;</i>证照正文
                        </button>
                        <input type="hidden" name="p_qualification_cont" value="" lay-verify="isUpload" class="layui-input" autocomplete="off" />
                    </div>    
                </div>
                
                   
                
                
                <div class="layui-form-item">     
                    <p class="pnotice2" style="width:420px;">备注：证件（小于1M）上传格式（jpg | jpeg | png | gif）</p>
                </div>            
                <img class="zp" src="/p/images/shenfenzheng.jpg" /> 
                <img class="yb" src="/p/images/shops/yangben.jpg" />              
            </div>
            <div class="layui-tab-item">
            
                <div class="layui-form-item">
                    <h2 class="shoph2"><i class="layui-icon">&#xe61f;</i> 公司实名认证</h2>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">企业名称</label>
                    <div class="layui-input-block">
                        <input type="text" name="c_enterprise_name" placeholder="请输入与营业执照上一致的企业名称" autocomplete="off" class="layui-input" style="width:50%;">
                    </div>
                </div>
                
                <!--<div class="layui-form-item">
                    <label class="layui-form-label">营业执照号码</label>
                    <div class="layui-input-block">
                        <input type="text" name="c_enterprise_code" placeholder="请输入营业执照编号或统一社会信用代码" autocomplete="off" class="layui-input" style="width:50%;">
                    </div>
                </div>-->
               <div class="layui-form-item" style="margin-top:35px;">
                    <label class="layui-form-label">营业执照图片</label>
                  
                    <div class="layui-inline layui-inline-upimg">
                    	<img class="layui-upload-img" src="/p/images/upimg_local_default2.png" id="locaimgzz">
                        <button type="button" class="layui-btn" id="img-upload2">
                          <i class="layui-icon">&#xe67c;</i>营业执照
                        </button>
                        <input type="hidden" name="c_enterprise_license" value="" class="layui-input" autocomplete="off"/>
                    </div>
                </div>
                
               <div class="layui-form-item" style="margin-top:225px;">
                    <label class="layui-form-label">建筑业企业资质证书</label>
                  
                    <div class="layui-inline layui-inline-upimg">
                    	<img class="layui-upload-img" src="/p/images/upimg_local_default2.png" id="locaimgzz-qualifi">
                        <button type="button" class="layui-btn" id="qualifi-upload">
                          <i class="layui-icon">&#xe67c;</i>资质证书
                        </button>
                        <input type="hidden" name="c_enterprise_qualification" value="" class="layui-input" autocomplete="off"/>
                    </div>
                </div>

                       
                <div class="layui-form-item" style="margin-top:60px;">
                    <label class="layui-form-label">法定代表人姓名</label>
                    <div class="layui-input-block">
                        <input type="text" name="c_name" placeholder="请输入负责人的姓名" autocomplete="off" class="layui-input" style="width:50%;">
                    </div>
                </div>
                <div class="layui-form-item" style="margin-top:60px;">
                    <label class="layui-form-label">法定代表人身份证正面</label>
                  
                    <div class="layui-inline layui-inline-upimg">
                    	<img class="layui-upload-img" src="/p/images/upimg_local_default2.png" id="locaimg2">
                        <button type="button" class="layui-btn" id="img-upload3">
                          <i class="layui-icon">&#xe67c;</i>证照正面
                        </button>
                        <input type="hidden" name="c_front_photo" value="" class="layui-input" autocomplete="off"/>
                    </div>
                </div>
                <div class="layui-form-item" style="margin-top:60px;">
                    <label class="layui-form-label">法定代表人身份证背面</label>
                    <div class="layui-inline layui-inline-upphoto">
                        <img class="layui-upload-img" src="/p/images/upimg_local_default2.png" id="locaimg3">
                        <span class="span2">参考如右图所示 <i class="layui-icon">&#xe602;</i></span>
                        <button type="button" class="layui-btn" id="img-upload4">
                            <i class="layui-icon">&#xe67c;</i>证照背面
                        </button>
                        <input type="hidden" name="c_back_photo" value="" class="layui-input" autocomplete="off" />
                    </div>    
                </div>
                <div class="layui-form-item">     
                    <p class="pnotice2" style="width:420px;">备注：证件（小于1M）上传格式（jpg | jpeg | png | gif）</p>
                </div> 
                <span class="span1">参考如右图所示 <i class="layui-icon">&#xe602;</i></span>  
                <span class="span2">参考如右图所示 <i class="layui-icon">&#xe602;</i></span>
                <img class="zp1" src="/p/images/yingyezhizhao.jpg" />  
                <img class="yb2" src="/p/images/shops/yb2-600.jpg" />       
                <img class="zp2" src="/p/images/shenfenzheng.jpg" />            
            
            </div><!--the 2rst-->
        </div>
    </div><!--.layui-tab end-->
	<div class="layui-form-item" style="margin-top:22px;">
    	<h2 class="shoph2" style="position:relative; left:12px;"><i class="layui-icon">&#xe61f;</i> 商铺基本资料</h2>
	</div>      
	<div class="layui-form-item">
    	<label class="layui-form-label">店铺名称</label>
    	<div class="layui-input-block">
      		<input type="text" name="shop_name" lay-verify="required|shopName" placeholder="请输入店铺名称" autocomplete="off" class="layui-input" style="width:97%; position:relative; left:3px;">
    	</div>
	</div>
    <div class="layui-form-item shoplogo">
    	<label class="layui-form-label">店铺LOGO</label>                 
          <div class="layui-inline layui-inline-uplogo">
              <img class="layui-upload-img" src="/p/images/upimg_local_default2.png" id="logoimg">
              <button type="button" class="layui-btn" id="logoimg-upload">
              	<i class="layui-icon">&#xe67c;</i>上传LOGO
              </button>
              <input type="hidden" name="logo_img" value="" lay-verify="isUpload" class="layui-input" autocomplete="off"/>
          </div>
    </div>

	<div class="layui-form-item layui-form-item-for-must-address"  style="z-index:1000;">
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
    <div class="layui-form-item">
        <label class="layui-form-label">承接领域（最多选3个）</label>
        <div class="layui-input-block exp_checkbox shop_checkbox">
            <input type="checkbox" lay-filter="expCheckbox" lay-verify="isNOCheck" name="like[]" value="10" title="工程咨询">
            <input type="checkbox" lay-filter="expCheckbox" lay-verify="isNOCheck" name="like[]" value="11" title="工程勘察">
            <input type="checkbox" lay-filter="expCheckbox" lay-verify="isNOCheck" name="like[]" value="12" title="工程设计">
            <input type="checkbox" lay-filter="expCheckbox" lay-verify="isNOCheck" name="like[]" value="13" title="工程招标">
            <input type="checkbox" lay-filter="expCheckbox" lay-verify="isNOCheck" name="like[]" value="14" title="工程造价">
            <input type="checkbox" lay-filter="expCheckbox" lay-verify="isNOCheck" name="like[]" value="15" title="工程监理">
            <input type="checkbox" lay-filter="expCheckbox" lay-verify="isNOCheck" name="like[]" value="16" title="工程施工">
            <input type="checkbox" lay-filter="expCheckbox" lay-verify="isNOCheck" name="like[]" value="17" title="财务服务">
            <input type="checkbox" lay-filter="expCheckbox" lay-verify="isNOCheck" name="like[]" value="18" title="评估服务">
            <input type="checkbox" lay-filter="expCheckbox" lay-verify="isNOCheck" name="like[]" value="19" title="其他服务">
        </div>
    </div>
<script type="text/javascript" src="/p/js/prov_city_area_data.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.for.expert.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">商铺概述</label>
        <div class="layui-input-block">
            <textarea style="display:none;" id="useueditor" name="shop_desc" lay-verify="isEmptyEdit|nodisplay" placeholder="介绍从业资历" class="layui-textarea" autocomplete="off"></textarea>
            <div style="width:100%;"><script id="editor" type="text/plain" style="width:646px;height:240px;"></script></div>
            <p style="color:#898989;">备注：商铺概述栏中，请填写商铺经营范围等基本情况</p>      
        </div>
    </div>
   
<script type="text/javascript">

    var ue = UE.getEditor('editor');	//ue is an operable object		
	ue.onblur=function(){	
		if(ue.hasContents()){		
			$("#useueditor").empty().html(ue.getContent());		
		}			
	}
	
</script>
    <div class="layui-form-item">   
        <p class="pnotice" style="margin-left:160px; "><span style="margin-right:10px;">温馨提示：</span>为规范管理，避免不正当竞争，以上填写的信息及上传的资料中请勿出现电话号码、E-mail、QQ、微信号等联系方式，否则可能无法通过审核，切记。</p>
    </div>  
    <div class="layui-form-item">
      <label class="layui-form-label">商铺协议</label>
      <div class="layui-input-block">
        <input type="checkbox" name="likeyes" title="同意" lay-filter="ischeckbox" checked="checked"><a style="margin-left:15px; position:relative; top:3px;" title="查阅" target="_blank" href="#">《成为火天信服务交易平台商铺遵守的协议》</a>
      </div>
    </div>
            <input type="hidden" name="ass_must_provid" />
            <input type="hidden" name="ass_must_cityid" />
            <input type="hidden" name="ass_must_areaid" />       
    <hr class="layui-bg-gray">
    <div class="layui-form-item">
      <div class="layui-input-block layui-input-block-submit">
        <button class="layui-btn formSubmit" lay-submit lay-filter="shopFormSubmit">提 交</button>
      </div>
    </div>
</form>
<script type="text/javascript" src="/p/js/submission_shop.js?ver=1.0"></script>
            </div>               
        </div>
    
    	<div class="layui-col-md3">
			<div class="page-submission-sidebar">
<?php include(TEMPLATEPATH . '/sidebar_two.php');  ?>
        	</div>           
        </div>    
    </div><!--.page-submission-wrap end-->

</div>
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
<?php
} 
?>		