<?php 
/*
Template Name: 专家申请
*/
?>
<?php 
if(is_user_logged_in()){	//is_user_logged_in
	$cur_user = $current_user->ID;
	$expertarrs = $wpdb->get_results("SELECT post_author FROM htx_posts WHERE post_type='experts'");	
		
	foreach($expertarrs as $expertarr){
		$exp_author = $expertarr->post_author;		
		if($cur_user == $exp_author){
			$toUrl=home_url()."/other/user_expert";
			header ("location:{$toUrl}");
			break;
		}		
	}//end foreach
}
?>
<?php include TEMPLATEPATH . '/header.php'; ?>
<div class="page-submission">
	<div class="dyn-nav">
		<blockquote class="layui-elem-quote">当前位置 <i class="layui-icon" style="font-size:22px; margin:0 10px; color:#FF5722;">&#xe715;</i> <a href="/" title="返回首页">首页</a><i class="layui-icon" style="font-size:16px; margin:0 10px; color:#666;">&#xe602;</i><span>专家申请</span></blockquote>
    </div>
    <div class="page-submission-wrap layui-row layui-col-space30">
    
    	<div class="layui-col-md9">
			<div class="page-submission-content">
            	<h1>专家申请 <i class="layui-icon" style="font-size:28px; color:#FF5722; float:left;">&#xe609;</i></h1>
                <hr class="layui-bg-gray">
<form class="layui-form layui-form-expert" id="htx_exp_form" action="">
	<?php wp_nonce_field( 'htx_expert_nonce_field_id', 'htx_expert_nonce_field_name' ); ?>        
	<div class="layui-form-item layui-form-item-exp">
    	<label class="layui-form-label">姓名</label>
    	<div class="layui-input-inline exp-inline">
        	<input type="text" name="exp_name" lay-verify="required|zhName" placeholder="请输入真实姓名" class="layui-input" autocomplete="off" />
      	</div>
    	<div class="layui-input-inline exp-inline">
    		<input type="radio" name="exp_sex" value="男" title="男" checked>
    		<input type="radio" name="exp_sex" value="女" title="女">
    	</div>
        <span class="sex">性别</span>
	</div>
	<div class="layui-form-item layui-form-item-exp">
    	<label class="layui-form-label">职称</label>
    	<div class="layui-input-inline exp-inline">
      		<input type="text" name="exp_title" required  lay-verify="required|title" placeholder="请输入专家职称" class="layui-input" autocomplete="off">
    	</div>
    	<div class="layui-input-inline exp-inline exp-inline-wys">
      		<input type="text" name="exp_project_timelimit" value=""  lay-verify="required|positiveInteger" placeholder="请输入阿拉伯数字" class="layui-input" autocomplete="off">
    	</div>
    	<span class="wys">工作年限</span>
        <span class="years">年</span>
	</div>
    <div class="layui-form-item">
        <label class="layui-form-label">擅长领域（最多选3个）</label>
        <div class="layui-input-block exp_checkbox">
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
<script type="text/javascript" src="/p/js/prov_city_area_data.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.for.expert.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">项目经验</label>
        <div class="layui-input-block">
            <textarea style="display:none;" id="useueditor2" name="exp_work_project" lay-verify="isEmptyEdit" placeholder="列出做过的项目" class="layui-textarea" autocomplete="off"></textarea>
            <div style="width:100%;"><script id="editor2" type="text/plain" style="width:646px;height:240px;"></script></div>
            <p style="color:#898989;">备注：项目经验栏中，请列出参与过的工程项目</p>        
        </div>
    </div>   

    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">自我介绍</label>
        <div class="layui-input-block">
            <textarea style="display:none;" id="useueditor" name="exp_desc" lay-verify="isEmptyEdit|nodisplay" placeholder="介绍从业资历" class="layui-textarea" autocomplete="off"></textarea>
            <div style="width:100%;"><script id="editor" type="text/plain" style="width:646px;height:240px;"></script></div>
            <p style="color:#898989;">备注：自我介绍栏中，请填写从业资历等基本情况</p>      
        </div>
    </div>
   
<script type="text/javascript">
    var ue2 = UE.getEditor('editor2');	//ue is an operable object		
	ue2.onblur=function(){	
		if(ue2.hasContents()){		
			$("#useueditor2").empty().html(ue2.getContent());		
		}		
	}

    var ue = UE.getEditor('editor');	//ue is an operable object		
	ue.onblur=function(){	
		if(ue.hasContents()){		
			$("#useueditor").empty().html(ue.getContent());		
		}			
	}
	
</script>
    <div class="layui-form-item">
    	<label class="layui-form-label">上传职称证书照</label>
      
    	<div class="layui-inline layui-inline-upimg"><img class="layui-upload-img" src="/p/images/upimg_local_default2.png" id="locaimg">
            <button type="button" class="layui-btn" id="img-upload">
              <i class="layui-icon">&#xe681;</i>职称证书
            </button>
            <input type="hidden" name="exp_upimg" value="" lay-verify="isUpload" class="layui-input" autocomplete="off"/>
    	</div>
    </div>
    <div class="layui-form-item" style="margin-top:40px;">
    	<label class="layui-form-label">上传专家形象照</label>
    	<div class="layui-inline layui-inline-upphoto">
            <img class="layui-upload-img" src="/p/images/upimg_local_default2.png" id="locaphoto">
        	<span>形象照参考如右图所示 <i class="layui-icon">&#xe602;</i></span>
            <button type="button" class="layui-btn" id="photo-upload">
              	<i class="layui-icon">&#xe67c;</i>专家照片
            </button>
            <input type="hidden" name="exp_upphoto" value="" lay-verify="isUpload" class="layui-input" autocomplete="off" />
    	</div>    
    </div>
	<div class="layui-form-item">     
		<p class="pnotice2" style="width:420px;">备注：图片（小于1M）上传格式（jpg | jpeg | png | gif），多出的职称证书请点击自我介绍栏编辑器中的图片上传按钮进行上传。</p>
	</div>
    <div class="layui-form-item">   
        <p class="pnotice" style="margin-left:160px; "><span style="margin-right:10px;">温馨提示：</span>为规范管理，避免不正当竞争，以上填写的信息及上传的资料中请勿出现电话号码、E-mail、QQ、微信号等联系方式，否则可能无法通过审核，切记。</p>
    </div>  
    <div class="layui-form-item">
      <label class="layui-form-label">专家协议</label>
      <div class="layui-input-block">
        <input type="checkbox" name="likeyes" title="同意" lay-filter="ischeckbox" checked="checked"><a style="margin-left:15px; position:relative; top:3px;" title="查阅" target="_blank" href="#">《成为火天信服务交易平台专家遵守的协议》</a>
      </div>
    </div>
            <input type="hidden" name="ass_must_provid" />
            <input type="hidden" name="ass_must_cityid" />
            <input type="hidden" name="ass_must_areaid" />       
    <hr class="layui-bg-gray">
    <div class="layui-form-item">
      <div class="layui-input-block layui-input-block-submit">
        <button class="layui-btn formSubmit" lay-submit lay-filter="expFormSubmit">提 交</button>
      </div>
    </div>
	<img class="zp" src="/p/images/expertimage-220.jpg" />    
</form>
<script type="text/javascript" src="/p/js/submission_expert.js?ver=1.6"></script>
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