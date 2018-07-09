<?php 
/*
Template Name: 编辑专项
*/
?>
<?php 
if( empty($_GET['edit_pro_id']) ){ 
	echo "<script>history.back();</script>";
} else {
	$pro_id = $_GET['edit_pro_id'];
	if(is_user_logged_in()){
		$cur_user = $current_user->ID;	
		
		$ids_bigcat_arr = wp_get_object_terms($pro_id, 'assignmentstax', array('fields'=>'ids'));
		$names_bigcat_arr = wp_get_object_terms($pro_id, 'assignmentstax', array('fields'=>'names'));
		$ids = $ids_bigcat_arr[0];
		$names = $names_bigcat_arr[0];
			
	}	//end is_user_logged_in()
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
	$(".layui-main .layui-clear > .user-left > ul li:nth-child(2) dl dd:nth-child(2) a").addClass("active");
	
});
</script>
        </div>
        <!--左边 end-->
        <div class="user-right">
         
			<div class="htx-box htx-box-edit-ass">
            	<div class="edit-location"><i class="layui-icon">&#xe715;</i> 当前位置：<a href="/" title="返回首页">首页</a> &gt; <a href="/other/my_sent_projects" title="查阅">我委托的项目</a> &gt; <span>正编辑编号为 <i class="ass-no"><?php echo $pro_id; ?></i> 的项目</span></div>
			<div class="ass-edit-content">
<form class="layui-form formWidth" action="">
	<?php wp_nonce_field( 'htx_boarding_project_nonce_field_id', 'htx_boarding_project_nonce_field_name' ); ?>
    <input type="hidden" name="pro_id" value="<?php echo $pro_id ; ?>" />
  <div class="layui-form-item layui-form-item-demandcat">
    <label class="layui-form-label">需求类别</label>
    <div class="layui-input-block catbox-block"  style="z-index:2000;">
      <select name="bigcat" id="bigcat" lay-filter="bigcat" lay-verify="required">
      	<option value="<?php echo $ids; ?>"><?php echo $names; ?></option>
        <option value="1">工程咨询</option>
        <option value="2">工程勘察</option>
        <option value="3">工程设计</option>
        <option value="4">工程招标</option>
        <option value="5">工程造价</option>
        <option value="6">工程监理</option>
        <option value="7">工程施工</option>
        <option value="8">财务服务</option>
        <option value="9">评估服务</option>
        <option value="10">其他服务</option>
      </select>
	</div>
    <div class="layui-input-block catbox-block"  style="z-index:2000; width:206px;">
        <select name="subcat" id="subcat" lay-filter="subcat">
<option value="<?php echo get_post_meta( $pro_id, '_htx_pro_subcat_id', true ); ?>"><?php echo get_post(get_post_meta( $pro_id, '_htx_pro_subcat_id', true ))->post_title; ?></option>	
        </select>      
    </div>
    <!--<span class="span">备注：当项目涉及多个子类时，请依次发布</span>-->
  </div>

<div class="layui-form-item dynimcBox">
</div>  

  <div class="layui-form-item">
  	<label class="layui-form-label">服务费预算(元)</label>
  	<div class="layui-input-block">
    	<input type="text" name="ass_fei" required  lay-verify="required|positiveInteger" value="<?php echo get_post_meta($pro_id, '_htx_pro_fei', true); ?>" autocomplete="off" class="layui-input">
    </div>
  </div>
  
  
  <div class="layui-form-item">
    <label class="layui-form-label">项目标题</label>
    <div class="layui-input-block">
      <input type="text" name="ass_title" required  lay-verify="required|title" value="<?php echo get_post($pro_id)->post_title ; ?>" class="layui-input" autocomplete="off">
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">项目地址</label>
    <div class="layui-input-block">
      <input type="text" name="ass_url" required  lay-verify="required|title" value="<?php echo get_post_meta($pro_id, '_htx_pro_url', true); ?>" class="layui-input" autocomplete="off">
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">制作地址</label>
    <div class="layui-input-block">
      <input type="text" name="ass_make_url" required  lay-verify="required|title" value="<?php echo get_post_meta($pro_id, '_htx_pro_make_url', true); ?>" class="layui-input" autocomplete="off">
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">项目规模</label>
    <div class="layui-input-block">
      <input type="text" name="ass_scale" lay-verify="required|title" value="<?php echo get_post_meta($pro_id, '_htx_pro_scale', true); ?>" class="layui-input" autocomplete="off">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">要求制作起始日</label>
    <div class="layui-input-block">
      <input type="text" name="ass_make_start" id="timestart" value="<?php echo date('Y-m-d', strtotime('+3 day')); ?>"  lay-verify="required|date" placeholder="请输入制作开始日期" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item layui-form-item-time">
    <label class="layui-form-label">预计服务工期</label>
    <div class="layui-input-block  timebox-block">
      <input type="text" name="ass_project_timelimit" lay-verify="required|positiveInteger" value="<?php echo get_post_meta($pro_id, '_htx_pro_project_timelimit', true); ?>" class="layui-input" autocomplete="off">
    </div>
    <span class="span1">天</span>
    <span class="span2">备注：请合理安排服务工期</span>
  </div>

    
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">项目介绍</label>
    <div class="layui-input-block">
      <div style="width:100%;"><script id="editor" name="ass_desc" lay-verify="isEmptyEdit|nodisplay" type="text/plain" style="width:646px;height:320px;"><?php echo get_post($pro_id)->post_content; ?></script></div>
      <p style="color:#898989;">备注：项目介绍栏中，请介绍项目规模、规划、进度等基本情况以及上传相关资料。</p>      
    </div>
  </div>
<script type="text/javascript">
    var ue = UE.getEditor('editor');	//ue is an operable object		
</script>  
  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">工作要求</label>
    <div class="layui-input-block">
      <textarea name="ass_work_demand" lay-verify="required|nodisplay" class="layui-textarea" autocomplete="off"><?php echo get_post_meta($pro_id, '_htx_pro_work_demand', true); ?></textarea>    
    </div>
  </div> 

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">现有资料注明（选填）</label>
    <div class="layui-input-block">
      <textarea name="ass_now_have" lay-verify="nodisplay" class="layui-textarea" autocomplete="off"><?php echo get_post_meta($pro_id, '_htx_pro_now_have', true); ?></textarea>
    </div>
  </div> 
  
	<div class="layui-form-item">   
		<p class="pnotice" style="margin-left:160px;"><span style="margin-right:10px;">温馨提示：</span>为规范管理，避免不正当竞争，以上填写的信息及上传的资料中请勿出现电话号码、E-mail、QQ、微信号等联系方式，否则可能无法通过审核，切记。</p>
	</div>

    
    <div class="layui-form-item">
      <label class="layui-form-label">发布协议</label>
      <div class="layui-input-block">
        <input type="checkbox" name="likeyes" title="同意" lay-filter="ischeckbox" checked="checked"><a style="margin-left:15px; position:relative; top:3px;" title="查阅" target="_blank" href="#">《火天信服务交易平台信息发布协议》</a>
      </div>
    </div>
    <hr class="layui-bg-gray" style="margin-left:15px;">
    <div class="layui-form-item">
      <div class="layui-input-block layui-input-block-submit">
        <button class="layui-btn formSubmit" lay-submit lay-filter="formSubmit">保 存</button>
      </div>
    </div>
    
</form>
<script type="text/javascript" src="/p/js/edit_pro.js?ver=1.0"></script>
            </div>               

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
<?php
}
}	//end $_GET
?>	

