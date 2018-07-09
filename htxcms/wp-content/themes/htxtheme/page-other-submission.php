<?php 
/*
Template Name: 任务发布
*/
?>
<?php include TEMPLATEPATH . '/header.php'; ?>
<div class="page-submission">
	<div class="dyn-nav">
		<blockquote class="layui-elem-quote">当前位置 <i class="layui-icon" style="font-size:22px; margin:0 10px; color:#FF5722;">&#xe715;</i> <a href="/" title="返回首页">首页</a><i class="layui-icon" style="font-size:16px; margin:0 10px; color:#666;">&#xe602;</i><span>发布需求</span></blockquote>
    </div>
    <div class="page-submission-wrap layui-row layui-col-space30">
    
    	<div class="layui-col-md9">
			<div class="page-submission-content">
            	<h1>发布需求 <i class="layui-icon" style="font-size:28px; color:#FF5722; float:left;">&#xe609;</i></h1>
                <hr class="layui-bg-gray">
<form class="layui-form formWidth" id="htxsubForm" action="">
	<?php wp_nonce_field( 'htx_submission_nonce_field_id', 'htx_submission_nonce_field_name' ); ?>
  <div class="layui-form-item">
    <label class="layui-form-label">发布形式</label>
    <div class="layui-input-block">
      <input type="radio" name="bid" value="21" title="竞价招标">
      <input type="radio" name="bid" value="22" title="担保招标" checked>
    </div>
  </div>
  <div class="layui-form-item layui-form-item-demandcat">
    <label class="layui-form-label">需求类别</label>
    <div class="layui-input-block catbox-block"  style="z-index:2000;">
      <select name="bigcat" id="bigcat" lay-filter="bigcat" lay-verify="required">
        <option value="">请选择需求类别</option>
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
        </select>      
    </div>
    <span class="span">备注：当项目涉及多个子类时，请依次发布</span>
  </div>

<div class="layui-form-item dynimcBox">
</div>  
  
  
  <div class="layui-form-item">
    <label class="layui-form-label">项目标题</label>
    <div class="layui-input-block">
      <input type="text" name="ass_title" required  lay-verify="required|title" placeholder="请输入项目标题" class="layui-input" autocomplete="off">
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">项目地址</label>
    <div class="layui-input-block">
      <input type="text" name="ass_url" required  lay-verify="required|title" placeholder="请输入项目的所在地址" class="layui-input" autocomplete="off">
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">制作地址</label>
    <div class="layui-input-block">
      <input type="text" name="ass_make_url" required  lay-verify="required|title" placeholder="请输入项目的制作地址" class="layui-input" autocomplete="off">
    </div>
  </div>
  
  <div class="layui-form-item layui-form-item-for-must-address"  style="z-index:1000;">
    	<label class="layui-form-label">要求服务商所在地</label>
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
            <!--<option value="">请选择县/区</option>	-->
            </select>            
        </div>
        <span>省</span>
        <span>市</span>
        <span>县/区</span>    
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">项目规模</label>
    <div class="layui-input-block">
      <input type="text" name="ass_scale" lay-verify="required|title" placeholder="请输入项目预估的规模" class="layui-input" autocomplete="off">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">预计投标截止期</label>
    <div class="layui-input-block">
      <input type="text" name="ass_bid_end" id="timeend" value="<?php echo date('Y-m-d', strtotime('+7 day')); ?>"  lay-verify="required|date" placeholder="请输入预计的投标截止期" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">要求制作起始日</label>
    <div class="layui-input-block">
      <input type="text" name="ass_make_start" id="timestart" value="<?php echo date('Y-m-d', strtotime('+10 day')); ?>"  lay-verify="required|date" placeholder="请输入制作开始日期" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item layui-form-item-time">
    <label class="layui-form-label">预计服务工期</label>
    <div class="layui-input-block  timebox-block">
      <input type="text" name="ass_project_timelimit" value=""  lay-verify="required|positiveInteger" placeholder="请输入预计服务的天数" class="layui-input" autocomplete="off">
    </div>
    <span class="span1">天</span>
    <span class="span2">备注：请合理安排服务工期</span>
  </div>
    <!--<div class="layui-form-item layui-form-item-time">
      <label class="layui-form-label">服务时间</label>
      <div class="layui-input-block timebox-block"><?//php echo date('Y-m-d',strtotime('now')); ?>
        <input type="text" name="ass_start" id="time1" value="<?//php echo date('Y-m-d',strtotime('+10 day')); ?>" lay-verify="required|date" placeholder="请输入服务开始时间" class="layui-input">
      </div>
      <div class="layui-input-block timebox-block">
        <input type="text" name="ass_end" id="time2" value="<?//php echo date('Y-m-d', strtotime('+20 day')); ?>" lay-verify="required|date" placeholder="请输入服务结束时间" class="layui-input">
      </div>
      <span class="span1">至</span>
      <span class="span2">备注：请合理安排服务的时间</span>     
    </div>-->
    
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">项目介绍</label>
    <div class="layui-input-block">
      <textarea style="display:none;" id="useueditor" name="ass_desc" lay-verify="required|nodisplay" placeholder="介绍项目规模、规划、进度等基本情况。" class="layui-textarea" autocomplete="off"></textarea>
      <div style="width:100%;"><script id="editor" type="text/plain" style="width:646px;height:320px;"></script></div>
      <p style="color:#898989;">备注：项目介绍栏中，请介绍项目规模、规划、进度等基本情况，可上传相关图片或附件。</p>      
    </div>
  </div>
<script type="text/javascript">
    var ue = UE.getEditor('editor');	//ue is an operable object		
	ue.onblur=function(){	
		if(ue.hasContents()){		
			$("#useueditor").empty().html(ue.getContent());		
		}else{ alert("请填写项目介绍"); }			
	}
</script>  
  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">工作要求</label>
    <div class="layui-input-block">
      <textarea name="ass_work_demand" lay-verify="required|nodisplay" placeholder="对服务商的工作职责、双方资料对接方式等方面进行说明。" class="layui-textarea" autocomplete="off"></textarea>    
    </div>
  </div> 

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">资质要求</label>
    <div class="layui-input-block">
      <textarea name="ass_quali_demand" lay-verify="required|nodisplay" placeholder="对服务商的专业级别、实力的要求，注明需要个人或团队来为您服务。" class="layui-textarea" autocomplete="off"></textarea>
    </div>
  </div> 

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">现有资料注明（选填）</label>
    <div class="layui-input-block">
      <textarea name="ass_now_have" lay-verify="nodisplay" placeholder="如果项目有相关资料，请在此说明，便于项目成交" class="layui-textarea" autocomplete="off"></textarea>
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
            <input type="hidden" name="ass_must_provid" />
            <input type="hidden" name="ass_must_cityid" />
            <input type="hidden" name="ass_must_areaid" />
    <hr class="layui-bg-gray" style="margin-left:15px;">
    <div class="layui-form-item">
      <div class="layui-input-block layui-input-block-submit">
        <button class="layui-btn formSubmit" lay-submit lay-filter="formSubmit">提 交</button>
      </div>
    </div>
    
</form>
<script type="text/javascript" src="/p/js/prov_city_area_data.js"></script>
<script type="text/javascript" src="/p/js/submission_upload_cat.js?ver=1.1"></script>
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
<?php } ?>	