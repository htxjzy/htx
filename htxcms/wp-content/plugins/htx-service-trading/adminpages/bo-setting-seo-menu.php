<?php
function bo_setting_seo_menu(){  
   	
	add_submenu_page( 'bo_setting_menu_slug', 'SEO设置', 'SEO设置', 'publish_pages', 'bo_setting_seo_menu_slug', 'bo_setting_seo_menu_display' ); 
		
}     
function bo_setting_seo_menu_display(){ 
	//admin CSS
	/*function htx_seo_menu_enqueue_css() {	
		wp_enqueue_style('htx-plugin-admin-seo-menu-css-layui', home_url().'/layui/css/layui.css' );
		wp_enqueue_style('htx-plugin-admin-seo-menu-css-seo-menu', home_url().'/p/css/admin/seo-menu.css');		
	}
	add_action( 'admin_enqueue_scripts', 'htx_seo_menu_enqueue_css' );*/
	wp_enqueue_style('htx-plugin-admin-seo-menu-css-layui', home_url().'/layui/css/layui.css' );
	wp_enqueue_style('htx-plugin-admin-seo-menu-css-seo-menu', home_url().'/p/css/admin/seo-menu.css');	
?>
<div class="statwrap">
    <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
      <ul class="layui-tab-title">
        <li class="layui-this">首页</li>
        <li>专家荟萃</li>
        <li>任务大厅</li>
        <li>任务列表</li>
        <li>服务商列表</li>
        <!--<li>公告列表</li>
        <li>雇主声音</li>
        <li>服务商故事</li>
        <li>行业资讯</li>-->
      </ul>
      <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
<form class="layui-form" action="">
  <?php wp_nonce_field( 'htx_nonce_field_id', 'htx_nonce_field_name' ); ?>
  <div class="layui-form-item">
    <label class="layui-form-label">标题（title）</label>
    <div class="layui-input-block">
      <input type="text" name="htx_home_title" value="<?php echo get_option('htx_home_title'); ?>" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">关键词（keywords多个用,隔开）</label>
    <div class="layui-input-block">
      <input type="text" name="htx_home_keywords" value="<?php echo get_option('htx_home_keywords'); ?>" required  lay-verify="required" placeholder="请输入关键词" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">概述（description）</label>
    <div class="layui-input-block">
      <textarea name="htx_home_description" placeholder="请输入栏目概要" class="layui-textarea"><?php echo get_option('htx_home_description'); ?></textarea>
    </div>
  </div>
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="formNo1button">保存设置</button>
    </div>
  </div>
</form>        
        </div>
        <div class="layui-tab-item">
<form class="layui-form" action="">
  <?php wp_nonce_field( 'htx_nonce_field_id', 'htx_nonce_field_name' ); ?>
  <div class="layui-form-item">
    <label class="layui-form-label">标题（title）</label>
    <div class="layui-input-block">
      <input type="text" name="htx_experts_title" value="<?php echo get_option('htx_experts_title'); ?>" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">关键词（keywords多个用,隔开）</label>
    <div class="layui-input-block">
      <input type="text" name="htx_experts_keywords" value="<?php echo get_option('htx_experts_keywords'); ?>" required  lay-verify="required" placeholder="请输入关键词" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">概述（description）</label>
    <div class="layui-input-block">
      <textarea name="htx_experts_description" placeholder="请输入栏目概要" class="layui-textarea"><?php echo get_option('htx_experts_description'); ?></textarea>
    </div>
  </div>
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="formNo2button">保存设置</button>
    </div>
  </div>
</form>            
        </div>
        <div class="layui-tab-item">
<form class="layui-form" action="">
  <?php wp_nonce_field( 'htx_nonce_field_id', 'htx_nonce_field_name' ); ?>
  <div class="layui-form-item">
    <label class="layui-form-label">标题（title）</label>
    <div class="layui-input-block">
      <input type="text" name="htx_assignments_big_title" value="<?php echo get_option('htx_assignments_big_title'); ?>" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">关键词（keywords多个用,隔开）</label>
    <div class="layui-input-block">
      <input type="text" name="htx_assignments_big_keywords" value="<?php echo get_option('htx_assignments_big_keywords'); ?>" required  lay-verify="required" placeholder="请输入关键词" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">概述（description）</label>
    <div class="layui-input-block">
      <textarea name="htx_assignments_big_description" placeholder="请输入栏目概要" class="layui-textarea"><?php echo get_option('htx_assignments_big_description'); ?></textarea>
    </div>
  </div>
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="formNo3button">保存设置</button>
    </div>
  </div>
</form>    
        </div>
        <div class="layui-tab-item">
<form class="layui-form" action="">
  <?php wp_nonce_field( 'htx_nonce_field_id', 'htx_nonce_field_name' ); ?>
  <div class="layui-form-item">
    <label class="layui-form-label">工程咨询-标题（title）</label>
    <div class="layui-input-block">
      <input type="text" name="htx_assignmentstax_consulting_title" value="<?php echo get_option('htx_assignmentstax_consulting_title'); ?>" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">工程咨询-关键词（keywords多个用,隔开）</label>
    <div class="layui-input-block">
      <input type="text" name="htx_assignmentstax_consulting_keywords" value="<?php echo get_option('htx_assignmentstax_consulting_keywords'); ?>" required  lay-verify="required" placeholder="请输入关键词" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">工程咨询-概述（description）</label>
    <div class="layui-input-block">
      <textarea name="htx_assignmentstax_consulting_description" placeholder="请输入栏目概要" class="layui-textarea"><?php echo get_option('htx_assignmentstax_consulting_description'); ?></textarea>
    </div>
  </div>
  <hr/>
  <div class="layui-form-item">
    <label class="layui-form-label">工程勘察-标题（title）</label>
    <div class="layui-input-block">
      <input type="text" name="htx_assignmentstax_investigation_title" value="<?php echo get_option('htx_assignmentstax_investigation_title'); ?>" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">工程勘察-关键词（keywords多个用,隔开）</label>
    <div class="layui-input-block">
      <input type="text" name="htx_assignmentstax_investigation_keywords" value="<?php echo get_option('htx_assignmentstax_investigation_keywords'); ?>" required  lay-verify="required" placeholder="请输入关键词" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">工程勘察-概述（description）</label>
    <div class="layui-input-block">
      <textarea name="htx_assignmentstax_investigation_description" placeholder="请输入栏目概要" class="layui-textarea"><?php echo get_option('htx_assignmentstax_investigation_description'); ?></textarea>
    </div>
  </div>

  <hr/>
  <div class="layui-form-item">
    <label class="layui-form-label">工程设计-标题（title）</label>
    <div class="layui-input-block">
      <input type="text" name="htx_assignmentstax_design_title" value="<?php echo get_option('htx_assignmentstax_design_title'); ?>" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">工程设计-关键词（keywords多个用,隔开）</label>
    <div class="layui-input-block">
      <input type="text" name="htx_assignmentstax_design_keywords" value="<?php echo get_option('htx_assignmentstax_design_keywords'); ?>" required  lay-verify="required" placeholder="请输入关键词" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">工程设计-概述（description）</label>
    <div class="layui-input-block">
      <textarea name="htx_assignmentstax_design_description" placeholder="请输入栏目概要" class="layui-textarea"><?php echo get_option('htx_assignmentstax_design_description'); ?></textarea>
    </div>
  </div>

  <hr/>
  <div class="layui-form-item">
    <label class="layui-form-label">工程招标-标题（title）</label>
    <div class="layui-input-block">
      <input type="text" name="htx_assignmentstax_bidding_title" value="<?php echo get_option('htx_assignmentstax_bidding_title'); ?>" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">工程招标-关键词（keywords多个用,隔开）</label>
    <div class="layui-input-block">
      <input type="text" name="htx_assignmentstax_bidding_keywords" value="<?php echo get_option('htx_assignmentstax_bidding_keywords'); ?>" required  lay-verify="required" placeholder="请输入关键词" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">工程招标-概述（description）</label>
    <div class="layui-input-block">
      <textarea name="htx_assignmentstax_bidding_description" placeholder="请输入栏目概要" class="layui-textarea"><?php echo get_option('htx_assignmentstax_bidding_description'); ?></textarea>
    </div>
  </div>

  <hr/>
  <div class="layui-form-item">
    <label class="layui-form-label">工程造价-标题（title）</label>
    <div class="layui-input-block">
      <input type="text" name="htx_assignmentstax_cost_title" value="<?php echo get_option('htx_assignmentstax_cost_title'); ?>" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">工程造价-关键词（keywords多个用,隔开）</label>
    <div class="layui-input-block">
      <input type="text" name="htx_assignmentstax_cost_keywords" value="<?php echo get_option('htx_assignmentstax_cost_keywords'); ?>" required  lay-verify="required" placeholder="请输入关键词" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">工程造价-概述（description）</label>
    <div class="layui-input-block">
      <textarea name="htx_assignmentstax_cost_description" placeholder="请输入栏目概要" class="layui-textarea"><?php echo get_option('htx_assignmentstax_cost_description'); ?></textarea>
    </div>
  </div>
  
  <hr/>
  <div class="layui-form-item">
    <label class="layui-form-label">工程监理-标题（title）</label>
    <div class="layui-input-block">
      <input type="text" name="htx_assignmentstax_supervision_title" value="<?php echo get_option('htx_assignmentstax_supervision_title'); ?>" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">工程监理-关键词（keywords多个用,隔开）</label>
    <div class="layui-input-block">
      <input type="text" name="htx_assignmentstax_supervision_keywords" value="<?php echo get_option('htx_assignmentstax_supervision_keywords'); ?>" required  lay-verify="required" placeholder="请输入关键词" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">工程监理-概述（description）</label>
    <div class="layui-input-block">
      <textarea name="htx_assignmentstax_supervision_description" placeholder="请输入栏目概要" class="layui-textarea"><?php echo get_option('htx_assignmentstax_supervision_description'); ?></textarea>
    </div>
  </div>
  
  <hr/>
  <div class="layui-form-item">
    <label class="layui-form-label">工程施工-标题（title）</label>
    <div class="layui-input-block">
      <input type="text" name="htx_assignmentstax_construction_title" value="<?php echo get_option('htx_assignmentstax_construction_title'); ?>" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">工程施工-关键词（keywords多个用,隔开）</label>
    <div class="layui-input-block">
      <input type="text" name="htx_assignmentstax_construction_keywords" value="<?php echo get_option('htx_assignmentstax_construction_keywords'); ?>" required  lay-verify="required" placeholder="请输入关键词" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">工程施工-概述（description）</label>
    <div class="layui-input-block">
      <textarea name="htx_assignmentstax_construction_description" placeholder="请输入栏目概要" class="layui-textarea"><?php echo get_option('htx_assignmentstax_construction_description'); ?></textarea>
    </div>
  </div>
  
  <hr/>
  <div class="layui-form-item">
    <label class="layui-form-label">财务服务-标题（title）</label>
    <div class="layui-input-block">
      <input type="text" name="htx_assignmentstax_finance_title" value="<?php echo get_option('htx_assignmentstax_finance_title'); ?>" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">财务服务-关键词（keywords多个用,隔开）</label>
    <div class="layui-input-block">
      <input type="text" name="htx_assignmentstax_finance_keywords" value="<?php echo get_option('htx_assignmentstax_finance_keywords'); ?>" required  lay-verify="required" placeholder="请输入关键词" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">财务服务-概述（description）</label>
    <div class="layui-input-block">
      <textarea name="htx_assignmentstax_finance_description" placeholder="请输入栏目概要" class="layui-textarea"><?php echo get_option('htx_assignmentstax_finance_description'); ?></textarea>
    </div>
  </div>

  <hr/>
  <div class="layui-form-item">
    <label class="layui-form-label">评估服务-标题（title）</label>
    <div class="layui-input-block">
      <input type="text" name="htx_assignmentstax_valuation_title" value="<?php echo get_option('htx_assignmentstax_valuation_title'); ?>" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">评估服务-关键词（keywords多个用,隔开）</label>
    <div class="layui-input-block">
      <input type="text" name="htx_assignmentstax_valuation_keywords" value="<?php echo get_option('htx_assignmentstax_valuation_keywords'); ?>" required  lay-verify="required" placeholder="请输入关键词" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">评估服务-概述（description）</label>
    <div class="layui-input-block">
      <textarea name="htx_assignmentstax_valuation_description" placeholder="请输入栏目概要" class="layui-textarea"><?php echo get_option('htx_assignmentstax_valuation_description'); ?></textarea>
    </div>
  </div>

  <hr/>
  <div class="layui-form-item">
    <label class="layui-form-label">其他服务-标题（title）</label>
    <div class="layui-input-block">
      <input type="text" name="htx_assignmentstax_rest_title" value="<?php echo get_option('htx_assignmentstax_rest_title'); ?>" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">其他服务-关键词（keywords多个用,隔开）</label>
    <div class="layui-input-block">
      <input type="text" name="htx_assignmentstax_rest_keywords" value="<?php echo get_option('htx_assignmentstax_rest_keywords'); ?>" required  lay-verify="required" placeholder="请输入关键词" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">其他服务-概述（description）</label>
    <div class="layui-input-block">
      <textarea name="htx_assignmentstax_rest_description" placeholder="请输入栏目概要" class="layui-textarea"><?php echo get_option('htx_assignmentstax_rest_description'); ?></textarea>
    </div>
  </div>   
  
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="formNo4button">保存设置</button>
    </div>
  </div>
</form>          
        </div>
        <div class="layui-tab-item">
<form class="layui-form" action="">
  <?php wp_nonce_field( 'htx_nonce_field_id', 'htx_nonce_field_name' ); ?>
  <div class="layui-form-item">
    <label class="layui-form-label">标题（title）</label>
    <div class="layui-input-block">
      <input type="text" name="htx_shops_title" value="<?php echo get_option('htx_shops_title'); ?>" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">关键词（keywords多个用,隔开）</label>
    <div class="layui-input-block">
      <input type="text" name="htx_shops_keywords" value="<?php echo get_option('htx_shops_keywords'); ?>" required  lay-verify="required" placeholder="请输入关键词" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">概述（description）</label>
    <div class="layui-input-block">
      <textarea name="htx_shops_description" placeholder="请输入栏目概要" class="layui-textarea"><?php echo get_option('htx_shops_description'); ?></textarea>
    </div>
  </div>
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="formNo5button">保存设置</button>
    </div>
  </div>
</form> 
        </div>
        
        
      </div>
    </div>
</div>
 


<?php
	//admin JS
	/*function htx_seo_menu_enqueue_scripts() {	
		wp_enqueue_script('htx-plugin-admin-seo-menu-js-layui', home_url().'/layui/layui.js' );		
	}
	add_action( 'admin_enqueue_scripts', 'htx_seo_menu_enqueue_scripts' );*/
	//wp_enqueue_script('htx-plugin-admin-seo-menu-js-layui', home_url().'/layui/layui.js' );
?>
<script src="/layui/layui.js"></script>
<script>
//Tab relys on the element module
layui.use(['jquery', 'element', 'form'], function(){
	var $ = layui.$; 
  	var element = layui.element	
    ,form = layui.form;
	
	var submitUrl = "/other/dataproccess";

	form.on('submit(formNo1button)', function(data){
		$.ajax({
			type:"post",
			dataType:'json',
			url:submitUrl,
			data:data.field,
			//async:false, 同步
			success:function(rdata) {
				layer.msg(JSON.stringify(rdata));												
			}
		});
		return false;

	});//formNo1button end
	
	form.on('submit(formNo2button)', function(data){
		$.ajax({
			type:"post",
			dataType:'json',
			url:submitUrl,
			data:data.field,
			//async:false, 同步
			success:function(rdata) {
				layer.msg(JSON.stringify(rdata));												
			}
		});
		return false;

	});//formNo2button end
	
	form.on('submit(formNo3button)', function(data){
		$.ajax({
			type:"post",
			dataType:'json',
			url:submitUrl,
			data:data.field,
			//async:false, 同步
			success:function(rdata) {
				layer.msg(JSON.stringify(rdata));												
			}
		});
		return false;

	});//formNo3button end
	
	form.on('submit(formNo4button)', function(data){
		$.ajax({
			type:"post",
			dataType:'json',
			url:submitUrl,
			data:data.field,
			//async:false, 同步
			success:function(rdata) {
				layer.msg(JSON.stringify(rdata));												
			}
		});
		return false;

	});//formNo4button end
	
	form.on('submit(formNo5button)', function(data){
		$.ajax({
			type:"post",
			dataType:'json',
			url:submitUrl,
			data:data.field,
			//async:false, 同步
			success:function(rdata) {
				layer.msg(JSON.stringify(rdata));												
			}
		});
		return false;

	});//formNo5button end


	
  //监听提交
  /*form.on('submit(formNo1)', function(data){	  
    layer.msg(JSON.stringify(data.field));
    return false;
  });*/
  
  //…
});
</script>
<?php
}  
add_action('admin_menu', 'bo_setting_seo_menu');
?>